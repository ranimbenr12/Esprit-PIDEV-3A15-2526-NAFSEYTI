package tn.esprit.projet.utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyBDConnexion {

    private static MyBDConnexion instance;
    private Connection cnx;

    // ⚠️ VÉRIFIER CES PARAMÈTRES
    private final String url = "jdbc:mysql://localhost:3306/suiviperso?serverTimezone=UTC";
    private final String user = "root";
    private final String pwd = ""; // ⚠️ Mettre ton mot de passe MySQL ici

    private MyBDConnexion() {
        try {
            // Charger le driver MySQL
            Class.forName("com.mysql.cj.jdbc.Driver");

            // Établir la connexion
            cnx = DriverManager.getConnection(url, user, pwd);

            System.out.println("✅ Connexion MySQL établie avec succès !");

        } catch (ClassNotFoundException e) {
            System.err.println("❌ Driver MySQL non trouvé !");
            System.err.println("Vérifiez que mysql-connector-java est dans pom.xml");
            e.printStackTrace();
        } catch (SQLException e) {
            System.err.println("❌ Erreur de connexion MySQL !");
            System.err.println("URL: " + url);
            System.err.println("User: " + user);
            System.err.println("Vérifiez que :");
            System.err.println("  1. MySQL est démarré (XAMPP ou WAMP)");
            System.err.println("  2. La base 'suiviperso' existe");
            System.err.println("  3. Le mot de passe est correct");
            e.printStackTrace();
        }
    }

    public static MyBDConnexion getInstance() {
        if (instance == null) {
            instance = new MyBDConnexion();
        }
        return instance;
    }

    public Connection getCnx() {
        try {
            // Vérifier si la connexion est toujours active
            if (cnx == null || cnx.isClosed()) {
                System.out.println("⚠️ Connexion fermée, reconnexion...");
                cnx = DriverManager.getConnection(url, user, pwd);
            }
        } catch (SQLException e) {
            System.err.println("❌ Erreur lors de la vérification de connexion");
            e.printStackTrace();
        }
        return cnx;
    }
}