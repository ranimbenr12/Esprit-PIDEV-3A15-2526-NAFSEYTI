package tn.esprit.projet.services;

import tn.esprit.projet.models.mediaObjectif;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class mediaObjectifService {

    private Connection cnx = MyBDConnexion.getInstance().getCnx();

    // ===== INSERT =====
    public void insertOne(mediaObjectif m) {
        String req = "INSERT INTO medias_objectifs (id_objectif, type_media, chemin_fichier) VALUES (?, ?, ?)";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, m.getid_objectif());
            ps.setString(2, m.gettype_media());
            ps.setString(3, m.getchemin_fichier());
            int rows = ps.executeUpdate();
            System.out.println("✅ Média ajouté : " + m.getNomFichier() + " | rows=" + rows);
        } catch (SQLException e) {
            System.err.println("❌ Erreur insertOne média : " + e.getMessage());
        }
    }

    // ===== SELECT par objectif =====
    public List<mediaObjectif> getByObjectif(int idObjectif) {
        List<mediaObjectif> liste = new ArrayList<>();
        String req = "SELECT * FROM medias_objectifs WHERE id_objectif=? ORDER BY date_ajout DESC";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idObjectif);
            ResultSet rs = ps.executeQuery();
            while (rs.next()) {
                mediaObjectif m = new mediaObjectif();
                m.setid_media(rs.getInt("id_media"));
                m.setid_objectif(rs.getInt("id_objectif"));
                m.settype_media(rs.getString("type_media"));
                m.setchemin_fichier(rs.getString("chemin_fichier"));
                m.setdate_ajout(rs.getTimestamp("date_ajout"));
                liste.add(m);
            }
            System.out.println("✅ Médias pour objectif " + idObjectif + " : " + liste.size());
        } catch (SQLException e) {
            System.err.println("❌ Erreur getByObjectif : " + e.getMessage());
        }
        return liste;
    }

    // ===== DELETE =====
    public void deleteOne(int idMedia) {
        String req = "DELETE FROM medias_objectifs WHERE id_media=?";
        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idMedia);
            ps.executeUpdate();
            System.out.println("✅ Média supprimé !");
        } catch (SQLException e) {
            System.err.println("❌ Erreur deleteOne média : " + e.getMessage());
        }
    }

    // ===== SELECT ALL =====
    public List<mediaObjectif> selectAll() {
        List<mediaObjectif> liste = new ArrayList<>();
        String req = "SELECT * FROM medias_objectifs ORDER BY date_ajout DESC";
        try {
            Statement st = cnx.createStatement();
            ResultSet rs = st.executeQuery(req);
            while (rs.next()) {
                mediaObjectif m = new mediaObjectif();
                m.setid_media(rs.getInt("id_media"));
                m.setid_objectif(rs.getInt("id_objectif"));
                m.settype_media(rs.getString("type_media"));
                m.setchemin_fichier(rs.getString("chemin_fichier"));
                m.setdate_ajout(rs.getTimestamp("date_ajout"));
                liste.add(m);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur selectAll médias : " + e.getMessage());
        }
        return liste;
    }
}