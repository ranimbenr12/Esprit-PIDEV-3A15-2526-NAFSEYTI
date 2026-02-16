package tn.esprit.projet.services;

import tn.esprit.projet.models.objectif;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class objectifService {

    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // ===================== INSERT =====================
    public void insertOne(objectif o) {
        String req = "INSERT INTO objectifs (id_suivi, titre, description, date_echeance) VALUES (?, ?, ?, ?)";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, o.getidsuivi());
            ps.setString(2, o.gettitre());
            ps.setString(3, o.getdescription());
            if (o.getdate_echeance() != null) {
                ps.setDate(4, new java.sql.Date(o.getdate_echeance().getTime()));
            } else {
                ps.setNull(4, Types.DATE);
            }
            ps.executeUpdate();
            System.out.println("✅ Objectif ajouté !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur insertOne : " + e.getMessage());
        }
    }

    // ===================== UPDATE =====================
    public void updateOne(objectif o) {
        String req = "UPDATE objectifs SET titre=?, description=?, date_echeance=? WHERE id_objectif=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(1, o.gettitre());
            ps.setString(2, o.getdescription());
            if (o.getdate_echeance() != null) {
                ps.setDate(3, new java.sql.Date(o.getdate_echeance().getTime()));
            } else {
                ps.setNull(3, Types.DATE);
            }
            ps.setInt(4, o.getidobjectif());
            ps.executeUpdate();
            System.out.println("✅ Objectif modifié !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur updateOne : " + e.getMessage());
        }
    }

    // ===================== DELETE =====================
    public void deleteOne(objectif o) {
        String req = "DELETE FROM objectifs WHERE id_objectif=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, o.getidobjectif());
            ps.executeUpdate();
            System.out.println("✅ Objectif supprimé !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur deleteOne : " + e.getMessage());
        }
    }

    // ===================== SELECT PAR SUIVI =====================
    public List<objectif> selectBySuivi(int idSuivi) {
        return getObjectifsBySuivi(idSuivi);
    }

    public List<objectif> getObjectifsBySuivi(int idSuivi) {
        List<objectif> liste = new ArrayList<>();
        String req = "SELECT * FROM objectifs WHERE id_suivi=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idSuivi);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                liste.add(mapResultSet(rs));
            }
            System.out.println("✅ Objectifs pour suivi " + idSuivi + " : " + liste.size());
        } catch (SQLException e) {
            System.err.println("❌ Erreur selectBySuivi : " + e.getMessage());
        }
        return liste;
    }

    // ===================== SELECT ALL =====================
    public List<objectif> selectAll() {
        List<objectif> liste = new ArrayList<>();
        String req = "SELECT * FROM objectifs";
        try {
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                liste.add(mapResultSet(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur selectAll : " + e.getMessage());
        }
        return liste;
    }

    // ===================== VALIDER =====================
    public void validerObjectif(int idObjectif) {
        String req = "UPDATE objectifs SET valide=1 WHERE id_objectif=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idObjectif);
            ps.executeUpdate();
            System.out.println("✅ Objectif validé !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur validerObjectif : " + e.getMessage());
        }
    }

    // ===================== UPLOAD FICHIER =====================
    public void uploadFichier(int idObjectif, String fichierPath, String fichierNom, String fichierType) {
        String req = "UPDATE objectifs SET fichier_path=?, fichier_nom=?, fichier_type=? WHERE id_objectif=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setString(1, fichierPath);
            ps.setString(2, fichierNom);
            ps.setString(3, fichierType);
            ps.setInt(4, idObjectif);
            ps.executeUpdate();
            System.out.println("✅ Fichier enregistré : " + fichierNom);
        } catch (SQLException e) {
            System.err.println("❌ Erreur uploadFichier : " + e.getMessage());
        }
    }

    // ===================== Mapper ResultSet → objectif =====================
    private objectif mapResultSet(ResultSet rs) throws SQLException {
        objectif o = new objectif();
        o.setidobjectif(rs.getInt("id_objectif"));
        o.setidsuivi(rs.getInt("id_suivi"));
        o.settitre(rs.getString("titre"));
        o.setdescription(rs.getString("description"));
        o.setdate_creation(rs.getTimestamp("date_creation"));
        o.setdate_echeance(rs.getDate("date_echeance"));
        o.setvalide(rs.getBoolean("valide"));
        // Fichiers (peuvent être null)
        try {
            o.setfichier_path(rs.getString("fichier_path"));
            o.setfichier_nom(rs.getString("fichier_nom"));
            o.setfichier_type(rs.getString("fichier_type"));
        } catch (SQLException ignored) {
            // Colonnes pas encore créées dans la BDD
        }
        return o;
    }
}
