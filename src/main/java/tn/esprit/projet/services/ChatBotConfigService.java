package tn.esprit.projet.services;

import tn.esprit.projet.models.ChatBotConfig;
import tn.esprit.projet.utils.MyBDConnexion;

import java.sql.*;
import java.util.ArrayList;
import java.util.List;

public class ChatBotConfigService {

    private final Connection cnx = MyBDConnexion.getInstance().getCnx();

    /**
     * Créer ou mettre à jour une configuration
     */
    public void sauvegarderConfig(ChatBotConfig config) {
        // Vérifier si la config existe déjà
        String checkReq = "SELECT id_config FROM chatbot_config WHERE id_utilisateur=?";

        try {
            PreparedStatement checkPs = cnx.prepareStatement(checkReq);
            checkPs.setInt(1, config.getid_utilisateur());
            ResultSet rs = checkPs.executeQuery();

            if (rs.next()) {
                // UPDATE - Config existe déjà
                modifierConfig(config);
            } else {
                // INSERT - Nouvelle config
                String insertReq = "INSERT INTO chatbot_config (id_psychologue, id_utilisateur, suggestion_personnalisee, frequence_rappel) VALUES (?, ?, ?, ?)";
                PreparedStatement ps = cnx.prepareStatement(insertReq, Statement.RETURN_GENERATED_KEYS);
                ps.setInt(1, config.getid_psychologue());
                ps.setInt(2, config.getid_utilisateur());
                ps.setString(3, config.getsuggestion_personnalisee());
                ps.setString(4, config.getfrequence_rappel());
                ps.executeUpdate();

                // Récupérer l'ID généré
                ResultSet generatedKeys = ps.getGeneratedKeys();
                if (generatedKeys.next()) {
                    config.setid_config(generatedKeys.getInt(1));
                }

                System.out.println("✅ Configuration créée pour l'utilisateur " + config.getid_utilisateur());
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur sauvegarde config: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Mettre à jour une configuration existante
     */
    public void modifierConfig(ChatBotConfig config) {
        String updateReq = "UPDATE chatbot_config SET id_psychologue=?, suggestion_personnalisee=?, frequence_rappel=? WHERE id_utilisateur=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(updateReq);
            ps.setInt(1, config.getid_psychologue());
            ps.setString(2, config.getsuggestion_personnalisee());
            ps.setString(3, config.getfrequence_rappel());
            ps.setInt(4, config.getid_utilisateur());

            int rowsAffected = ps.executeUpdate();
            if (rowsAffected > 0) {
                System.out.println("✅ Configuration mise à jour pour l'utilisateur " + config.getid_utilisateur());
            } else {
                System.out.println("⚠️ Aucune configuration trouvée pour l'utilisateur " + config.getid_utilisateur());
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur modification config: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Mettre à jour une configuration par son ID
     */
    public void modifierConfigParId(ChatBotConfig config) {
        String updateReq = "UPDATE chatbot_config SET id_psychologue=?, id_utilisateur=?, suggestion_personnalisee=?, frequence_rappel=? WHERE id_config=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(updateReq);
            ps.setInt(1, config.getid_psychologue());
            ps.setInt(2, config.getid_utilisateur());
            ps.setString(3, config.getsuggestion_personnalisee());
            ps.setString(4, config.getfrequence_rappel());
            ps.setInt(5, config.getid_config());

            int rowsAffected = ps.executeUpdate();
            if (rowsAffected > 0) {
                System.out.println("✅ Configuration mise à jour (ID: " + config.getid_config() + ")");
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur modification config par ID: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Récupérer une configuration par utilisateur
     */
    public ChatBotConfig getConfigByUtilisateur(int idUtilisateur) {
        String req = "SELECT * FROM chatbot_config WHERE id_utilisateur=? LIMIT 1";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idUtilisateur);
            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                return mapResultSetToConfig(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération config utilisateur " + idUtilisateur + ": " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Récupérer une configuration par ID
     */
    public ChatBotConfig getConfigById(int idConfig) {
        String req = "SELECT * FROM chatbot_config WHERE id_config=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idConfig);
            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                return mapResultSetToConfig(rs);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération config ID " + idConfig + ": " + e.getMessage());
            e.printStackTrace();
        }

        return null;
    }

    /**
     * Récupérer toutes les configurations d'un psychologue
     */
    public List<ChatBotConfig> getConfigsByPsychologue(int idPsychologue) {
        List<ChatBotConfig> configs = new ArrayList<>();
        String req = "SELECT * FROM chatbot_config WHERE id_psychologue=? ORDER BY id_utilisateur";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idPsychologue);
            ResultSet rs = ps.executeQuery();

            while (rs.next()) {
                configs.add(mapResultSetToConfig(rs));
            }

            System.out.println("✅ " + configs.size() + " configuration(s) trouvée(s) pour le psychologue " + idPsychologue);
        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération configs psychologue " + idPsychologue + ": " + e.getMessage());
            e.printStackTrace();
        }

        return configs;
    }

    /**
     * Récupérer toutes les configurations
     */
    public List<ChatBotConfig> getAllConfigs() {
        List<ChatBotConfig> configs = new ArrayList<>();
        String req = "SELECT * FROM chatbot_config ORDER BY id_utilisateur";

        try {
            Statement stmt = cnx.createStatement();
            ResultSet rs = stmt.executeQuery(req);

            while (rs.next()) {
                configs.add(mapResultSetToConfig(rs));
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur récupération toutes les configs: " + e.getMessage());
            e.printStackTrace();
        }

        return configs;
    }

    /**
     * Supprimer une configuration par ID
     */
    public void supprimerConfig(int idConfig) {
        String req = "DELETE FROM chatbot_config WHERE id_config=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idConfig);

            int rowsAffected = ps.executeUpdate();
            if (rowsAffected > 0) {
                System.out.println("✅ Configuration supprimée (ID: " + idConfig + ")");
            } else {
                System.out.println("⚠️ Aucune configuration trouvée avec l'ID: " + idConfig);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur suppression config: " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Supprimer une configuration par utilisateur
     */
    public void supprimerConfigByUtilisateur(int idUtilisateur) {
        String req = "DELETE FROM chatbot_config WHERE id_utilisateur=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idUtilisateur);

            int rowsAffected = ps.executeUpdate();
            if (rowsAffected > 0) {
                System.out.println("✅ Configuration supprimée pour l'utilisateur " + idUtilisateur);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur suppression config utilisateur " + idUtilisateur + ": " + e.getMessage());
            e.printStackTrace();
        }
    }

    /**
     * Vérifier si une configuration existe pour un utilisateur
     */
    public boolean configExists(int idUtilisateur) {
        String req = "SELECT COUNT(*) FROM chatbot_config WHERE id_utilisateur=?";

        try {
            PreparedStatement ps = cnx.prepareStatement(req);
            ps.setInt(1, idUtilisateur);
            ResultSet rs = ps.executeQuery();

            if (rs.next()) {
                return rs.getInt(1) > 0;
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur vérification existence config: " + e.getMessage());
            e.printStackTrace();
        }

        return false;
    }

    /**
     * Mapper un ResultSet vers un objet ChatBotConfig
     */
    private ChatBotConfig mapResultSetToConfig(ResultSet rs) throws SQLException {
        ChatBotConfig config = new ChatBotConfig();
        config.setid_config(rs.getInt("id_config"));
        config.setid_psychologue(rs.getInt("id_psychologue"));
        config.setid_utilisateur(rs.getInt("id_utilisateur"));
        config.setsuggestion_personnalisee(rs.getString("suggestion_personnalisee"));
        config.setfrequence_rappel(rs.getString("frequence_rappel"));
        return config;
    }

    /**
     * Compter le nombre de configurations
     */
    public int countConfigs() {
        String req = "SELECT COUNT(*) FROM chatbot_config";

        try {
            Statement stmt = cnx.createStatement();
            ResultSet rs = stmt.executeQuery(req);

            if (rs.next()) {
                return rs.getInt(1);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur comptage configs: " + e.getMessage());
            e.printStackTrace();
        }

        return 0;
    }
}