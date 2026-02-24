package TestPsychologique.dao;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class DataBaseConnection {
    private static final String URL = "jdbc:mysql://localhost:3306/nafseytidata";
    private static final String USER = "root";
    private static final String PASSWORD = ""; // Mettez votre mot de passe MySQL ici

    private static Connection connection = null;

    /**
     * Obtenir la connexion à la base de données
     * @return Connection
     */
    public static Connection getConnection() {
        try {
            // Si la connexion n'existe pas ou est fermée
            if (connection == null || connection.isClosed()) {
                // Charger le driver MySQL
                Class.forName("com.mysql.cj.jdbc.Driver");

                // Établir la connexion
                connection = DriverManager.getConnection(URL, USER, PASSWORD);

                System.out.println("✅ Connexion réussie à la base nafseyti");
            }
        } catch (ClassNotFoundException e) {
            System.err.println("❌ Driver MySQL introuvable : " + e.getMessage());
            e.printStackTrace();
        } catch (SQLException e) {
            System.err.println("❌ Erreur de connexion SQL : " + e.getMessage());
            e.printStackTrace();
        }
        return connection;
    }

    /**
     * Fermer la connexion
     */
    public static void closeConnection() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
                System.out.println("🔌 Connexion fermée");
            }
        } catch (SQLException e) {
            e.printStackTrace();
        }
    }

    /**
     * Méthode pour tester la connexion
     */
    public static void main(String[] args) {
        Connection conn = getConnection();
        if (conn != null) {
            System.out.println("🎉 Base de données connectée avec succès !");
        } else {
            System.out.println("❌ Échec de la connexion");
        }
    }
}

