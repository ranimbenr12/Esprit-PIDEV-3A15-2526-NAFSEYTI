package tn.esprit.projet.services;

import tn.esprit.projet.models.Reduction;
import tn.esprit.projet.models.ReductionUtilisateur;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ReductionService {
    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    /**
     * Récupérer toutes les réductions disponibles (non expirées)
     */
    public List<Reduction> getAllReductions() {
        List<Reduction> liste = new ArrayList<>();
        String req = "SELECT id_reduction, nom_marque, description, points_requis, pourcentage_reduction, date_expiration, image_url FROM reductions WHERE date_expiration >= CURDATE() OR date_expiration IS NULL ORDER BY points_requis";

        System.out.println("\n🔍 EXÉCUTION REQUÊTE: " + req);

        try (Statement st = cnx.createStatement();
             ResultSet rs = st.executeQuery(req)) {

            int count = 0;
            while (rs.next()) {
                count++;
                int id = rs.getInt("id_reduction");
                String nom = rs.getString("nom_marque");
                int points = rs.getInt("points_requis");

                System.out.println("🔍 Ligne " + count + " - ID: " + id + ", Nom: " + nom + ", Points: " + points);

                Reduction r = mapResultSetToReduction(rs);
                liste.add(r);
            }
            System.out.println("✅ " + liste.size() + " réductions chargées");
        } catch (SQLException e) {
            System.err.println("❌ Erreur getAllReductions: " + e.getMessage());
            e.printStackTrace();
        }
        return liste;
    }

    /**
     * Récupérer les réductions qu'un utilisateur peut acheter avec ses points actuels
     */
    public List<Reduction> getReductionsDisponibles(int idUtilisateur, int pointsUtilisateur) {
        List<Reduction> liste = new ArrayList<>();
        String req = "SELECT * FROM reductions WHERE points_requis <= ? AND (date_expiration >= CURDATE() OR date_expiration IS NULL) ORDER BY points_requis";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, pointsUtilisateur);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                liste.add(mapResultSetToReduction(rs));
            }
            System.out.println("✅ " + liste.size() + " réductions disponibles pour l'utilisateur " + idUtilisateur);
        } catch (SQLException e) {
            System.err.println("❌ Erreur getReductionsDisponibles: " + e.getMessage());
        }
        return liste;
    }

    /**
     * Acheter une réduction avec des points
     */
    public boolean acheterReduction(int idUtilisateur, int idReduction) {
        // Vérifier d'abord que l'utilisateur a assez de points
        PointsService pointsService = new PointsService();
        int totalPoints = pointsService.getTotalPoints(idUtilisateur);

        Reduction reduction = getReductionById(idReduction);
        if (reduction == null) {
            System.err.println("❌ Réduction introuvable: " + idReduction);
            return false;
        }

        // LOGS DE DÉBOGAGE
        System.out.println("\n🔍 DEBUG - ACHAT RÉDUCTION:");
        System.out.println("   ID réduction reçu: " + idReduction);
        System.out.println("   Nom: " + reduction.getNomMarque());
        System.out.println("   Points requis: " + reduction.getPointsRequis());
        System.out.println("   Points utilisateur avant achat: " + totalPoints);

        if (totalPoints < reduction.getPointsRequis()) {
            System.err.println("❌ Points insuffisants: " + totalPoints + " < " + reduction.getPointsRequis() +
                    " pour " + reduction.getNomMarque());
            return false;
        }

        // Générer un code promo aléatoire
        String codePromo = genererCodePromo();

        // Utiliser une transaction pour garantir l'intégrité des données
        try {
            // Désactiver l'auto-commit pour la transaction
            cnx.setAutoCommit(false);

            // 1. Insérer l'achat dans reductions_utilisateur
            String reqAchat = "INSERT INTO reductions_utilisateur (id_utilisateur, id_reduction, code_promo) VALUES (?, ?, ?)";
            try (PreparedStatement ps = cnx.prepareStatement(reqAchat)) {
                ps.setInt(1, idUtilisateur);
                ps.setInt(2, idReduction);
                ps.setString(3, codePromo);
                ps.executeUpdate();
            }

            // 2. ✅ DÉDUIRE LES POINTS - Sans id_objectif (car c'est un achat de réduction)
            String reqPoints = "INSERT INTO points (id_utilisateur, nombre_points) VALUES (?, ?)";
            try (PreparedStatement ps = cnx.prepareStatement(reqPoints)) {
                ps.setInt(1, idUtilisateur);
                ps.setInt(2, -reduction.getPointsRequis());  // Points négatifs pour la consommation
                ps.executeUpdate();
            }

            // Valider la transaction
            cnx.commit();
            cnx.setAutoCommit(true);  // Réactiver l'auto-commit

            System.out.println("✅ Réduction achetée par l'utilisateur " + idUtilisateur + " - Code: " + codePromo);
            System.out.println("💰 Points déduits: " + reduction.getPointsRequis());
            System.out.println("💰 Nouveau total des points: " + (totalPoints - reduction.getPointsRequis()));

            return true;

        } catch (SQLException e) {
            // En cas d'erreur, annuler la transaction
            try {
                cnx.rollback();
                cnx.setAutoCommit(true);
                System.err.println("❌ Transaction annulée - Rollback effectué");
            } catch (SQLException ex) {
                System.err.println("❌ Erreur lors du rollback: " + ex.getMessage());
            }
            System.err.println("❌ Erreur achat réduction: " + e.getMessage());
            return false;
        }
    }

    /**
     * Récupérer les réductions d'un utilisateur
     */
    public List<ReductionUtilisateur> getReductionsUtilisateur(int idUtilisateur) {
        List<ReductionUtilisateur> liste = new ArrayList<>();
        String req = "SELECT ru.*, r.nom_marque, r.description, r.points_requis, r.pourcentage_reduction " +
                "FROM reductions_utilisateur ru " +
                "JOIN reductions r ON ru.id_reduction = r.id_reduction " +
                "WHERE ru.id_utilisateur = ? ORDER BY ru.date_obtention DESC";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                ReductionUtilisateur ru = new ReductionUtilisateur();
                ru.setId(rs.getInt("id"));
                ru.setIdUtilisateur(rs.getInt("id_utilisateur"));
                ru.setIdReduction(rs.getInt("id_reduction"));
                ru.setDateObtention(rs.getTimestamp("date_obtention"));
                ru.setUtilise(rs.getBoolean("utilise"));
                ru.setCodePromo(rs.getString("code_promo"));
                ru.setNomMarque(rs.getString("nom_marque"));
                ru.setDescription(rs.getString("description"));
                ru.setPointsRequis(rs.getInt("points_requis"));
                ru.setPourcentageReduction(rs.getDouble("pourcentage_reduction"));
                liste.add(ru);
            }
            System.out.println("✅ " + liste.size() + " réductions pour l'utilisateur " + idUtilisateur);
        } catch (SQLException e) {
            System.err.println("❌ Erreur getReductionsUtilisateur: " + e.getMessage());
        }
        return liste;
    }

    /**
     * Récupérer une réduction par son ID
     */
    private Reduction getReductionById(int id) {
        String req = "SELECT * FROM reductions WHERE id_reduction = ?";
        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, id);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return mapResultSetToReduction(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getReductionById: " + e.getMessage());
        }
        return null;
    }

    /**
     * Générer un code promo aléatoire
     */
    private String genererCodePromo() {
        String chars = "ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
        StringBuilder code = new StringBuilder();
        for (int i = 0; i < 8; i++) {
            int index = (int)(Math.random() * chars.length());
            code.append(chars.charAt(index));
        }
        return "NAFSEYTI-" + code.toString();
    }

    /**
     * Convertir un ResultSet en objet Reduction
     */
    private Reduction mapResultSetToReduction(ResultSet rs) throws SQLException {
        Reduction r = new Reduction();

        // Lecture de l'ID depuis la base
        int id = rs.getInt("id_reduction");
        System.out.println("🔍 Lecture BD - id_reduction = " + id);

        r.setId_reduction(id);
        r.setNom_marque(rs.getString("nom_marque"));
        r.setDescription(rs.getString("description"));
        r.setPoints_requis(rs.getInt("points_requis"));
        r.setPourcentage_reduction(rs.getDouble("pourcentage_reduction"));
        r.setDate_expiration(rs.getDate("date_expiration"));

        try {
            r.setImage_url(rs.getString("image_url"));
        } catch (SQLException e) {
            r.setImage_url(null);
        }

        return r;
    }
}