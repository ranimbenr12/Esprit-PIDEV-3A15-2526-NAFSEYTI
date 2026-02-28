package tn.esprit.projet.services;

import tn.esprit.projet.models.User;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class AlerteService {

    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // Liste des mots à risque
    private static final List<String> MOTS_CRITIQUES = List.of(
            "suicide", "meurtre", "mourir", "mort", "suicider", "finir", "disparaître",
            "plus envie de vivre", "plus de sens", "abandonner", "lâcher prise",
            "faire du mal", "mauvaises pensées", "kill myself", "end my life",
            "die", "death", "no reason to live", "give up"
    );

    // Mots de renforcement (pour éviter les faux positifs)
    private static final List<String> MOTS_RASSURANTS = List.of(
            "film", "série", "livre", "jeu", "histoire", "personnage",
            "jeu vidéo", "fiction", "article", "documentaire"
    );

    /**
     * Vérifier si un message contient des mots à risque
     */
    public boolean verifierMessage(String message) {
        if (message == null || message.trim().isEmpty()) {
            return false;
        }

        String messageLower = message.toLowerCase();

        // Vérifier d'abord les mots rassurants (faux positifs)
        for (String mot : MOTS_RASSURANTS) {
            if (messageLower.contains(mot)) {
                return false;
            }
        }

        // Vérifier les mots critiques
        for (String mot : MOTS_CRITIQUES) {
            if (messageLower.contains(mot)) {
                return true;
            }
        }

        return false;
    }

    /**
     * Enregistrer une alerte dans la base de données
     */
    public void enregistrerAlerte(int idUtilisateur, String message) {
        String motsDetectes = extraireMotsDetectes(message);

        String req = "INSERT INTO alertes_suicide (id_utilisateur, message, mots_detectes) VALUES (?, ?, ?)";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idUtilisateur);
            ps.setString(2, message);
            ps.setString(3, motsDetectes);
            ps.executeUpdate();

            System.out.println("🚨 ALERTE SUICIDE enregistrée pour l'utilisateur " + idUtilisateur);

            // ✅ CRÉER UNE NOTIFICATION POUR LE PSYCHOLOGUE
            creerNotificationPourPsychologue(idUtilisateur, message);

        } catch (SQLException e) {
            System.err.println("❌ Erreur enregistrement alerte: " + e.getMessage());
        }
    }

    /**
     * Créer une notification pour le psychologue
     */
    private void creerNotificationPourPsychologue(int idPatient, String message) {
        try {
            // Récupérer l'ID du psychologue du patient
            String reqPsy = "SELECT psychologue_id FROM patient_psychologue WHERE patient_id = ? AND statut = 'actif'";
            int idPsychologue = -1;

            try (PreparedStatement ps = cnx.prepareStatement(reqPsy)) {
                ps.setInt(1, idPatient);
                ResultSet rs = ps.executeQuery();
                if (rs.next()) {
                    idPsychologue = rs.getInt("psychologue_id");
                }
            }

            if (idPsychologue == -1) {
                System.err.println("⚠️ Aucun psychologue trouvé pour le patient " + idPatient);
                return;
            }

            // Créer la notification
            String reqNotif = "INSERT INTO notifications (id_psychologue, id_patient, message, type) VALUES (?, ?, ?, 'alerte')";
            try (PreparedStatement ps = cnx.prepareStatement(reqNotif)) {
                ps.setInt(1, idPsychologue);
                ps.setInt(2, idPatient);

                String messageCourt = message.length() > 100 ? message.substring(0, 100) + "..." : message;
                ps.setString(3, "🚨 ALERTE: Patient a envoyé un message préoccupant: \"" + messageCourt + "\"");
                ps.executeUpdate();

                System.out.println("✅ Notification créée pour le psychologue " + idPsychologue);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur création notification: " + e.getMessage());
        }
    }

    /**
     * Récupérer les notifications non lues pour un psychologue
     */
    public List<Object[]> getNotificationsNonLues(int idPsychologue) {
        List<Object[]> notifications = new ArrayList<>();

        String req = "SELECT n.*, u.firstname, u.lastname FROM notifications n " +
                "JOIN users u ON n.id_patient = u.id " +
                "WHERE n.id_psychologue = ? AND n.lu = FALSE " +
                "ORDER BY n.date_creation DESC";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idPsychologue);
            ResultSet rs = ps.executeQuery();

            while (rs.next()) {
                Object[] notif = new Object[6];
                notif[0] = rs.getInt("id_notification");
                notif[1] = rs.getString("firstname") + " " + rs.getString("lastname");
                notif[2] = rs.getString("message");
                notif[3] = rs.getTimestamp("date_creation");
                notif[4] = rs.getBoolean("lu");
                notifications.add(notif);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur getNotificationsNonLues: " + e.getMessage());
        }

        return notifications;
    }

    /**
     * Marquer une notification comme lue
     */
    public void marquerCommeLue(int idNotification) {
        String req = "UPDATE notifications SET lu = TRUE WHERE id_notification = ?";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idNotification);
            ps.executeUpdate();
        } catch (SQLException e) {
            System.err.println("❌ Erreur marquerCommeLue: " + e.getMessage());
        }
    }

    /**
     * Notifier le psychologue (version améliorée)
     */
    public void notifierPsychologue(int idUtilisateur, String message) {
        System.out.println("\n🚨🚨🚨 NOTIFICATION PSYCHOLOGUE 🚨🚨🚨");
        System.out.println("Patient ID: " + idUtilisateur);
        System.out.println("Message: " + message);
        System.out.println("Mots détectés: " + extraireMotsDetectes(message));
        System.out.println("🚨🚨🚨 FIN NOTIFICATION 🚨🚨🚨\n");

        // La notification est déjà créée dans enregistrerAlerte()
        // Cette méthode sert surtout pour les logs
    }

    /**
     * Vérifier si un psychologue a des notifications non lues
     */
    public boolean aDesNotificationsNonLues(int idPsychologue) {
        String req = "SELECT COUNT(*) as nb FROM notifications WHERE id_psychologue = ? AND lu = FALSE";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idPsychologue);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return rs.getInt("nb") > 0;
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur aDesNotificationsNonLues: " + e.getMessage());
        }
        return false;
    }

    /**
     * Récupérer toutes les alertes non traitées pour un psychologue
     */
    public List<Object[]> getAlertesNonTraitees(int idPsychologue) {
        List<Object[]> alertes = new ArrayList<>();

        String req = "SELECT a.id_alerte, u.firstname, u.lastname, a.message, a.mots_detectes, a.date_alerte, a.traite " +
                "FROM alertes_suicide a " +
                "JOIN patient_psychologue pp ON a.id_utilisateur = pp.patient_id " +
                "JOIN users u ON a.id_utilisateur = u.id " +
                "WHERE pp.psychologue_id = ? AND a.traite = FALSE " +
                "ORDER BY a.date_alerte DESC";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idPsychologue);
            ResultSet rs = ps.executeQuery();

            while (rs.next()) {
                Object[] alerte = new Object[7];
                alerte[0] = rs.getInt("id_alerte");
                alerte[1] = rs.getString("firstname") + " " + rs.getString("lastname");
                alerte[2] = rs.getString("message");
                alerte[3] = rs.getString("mots_detectes");
                alerte[4] = rs.getTimestamp("date_alerte");
                alerte[5] = rs.getBoolean("traite");
                alertes.add(alerte);
            }

        } catch (SQLException e) {
            System.err.println("❌ Erreur getAlertesNonTraitees: " + e.getMessage());
        }

        return alertes;
    }

    /**
     * Récupérer le nombre d'alertes non traitées
     */
    public int getNombreAlertesNonTraitees(int idPsychologue) {
        String req = "SELECT COUNT(*) as nb FROM alertes_suicide a " +
                "JOIN patient_psychologue pp ON a.id_utilisateur = pp.patient_id " +
                "WHERE pp.psychologue_id = ? AND a.traite = FALSE";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idPsychologue);
            ResultSet rs = ps.executeQuery();
            if (rs.next()) {
                return rs.getInt("nb");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur getNombreAlertesNonTraitees: " + e.getMessage());
        }
        return 0;
    }

    /**
     * Marquer une alerte comme traitée
     */
    public void marquerTraitee(int idAlerte) {
        String req = "UPDATE alertes_suicide SET traite = TRUE WHERE id_alerte = ?";

        try (PreparedStatement ps = cnx.prepareStatement(req)) {
            ps.setInt(1, idAlerte);
            ps.executeUpdate();
            System.out.println("✅ Alerte " + idAlerte + " marquée comme traitée");
        } catch (SQLException e) {
            System.err.println("❌ Erreur mise à jour alerte: " + e.getMessage());
        }
    }

    /**
     * Extraire les mots critiques du message
     */
    private String extraireMotsDetectes(String message) {
        List<String> trouves = new ArrayList<>();
        String messageLower = message.toLowerCase();

        for (String mot : MOTS_CRITIQUES) {
            if (messageLower.contains(mot)) {
                trouves.add(mot);
            }
        }

        return String.join(", ", trouves);
    }
}