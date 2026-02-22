package tn.esprit.nafseyti.utils;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyBDConnexion {
    private static final String URL = "jdbc:mysql://localhost:3306/nafseyti?serverTimezone=UTC";
    private static final String USER = "root";       // adapte selon ton user MySQL
    private static final String PASSWORD = "";

    private Connection cnx;

    //2nd Step = CREATE A STATIC VARIABLE AS THE SAME TYPE OF THE CLASS
    private static MyBDConnexion instance;

    //1st Step = MAKE CONSTRUCTOR PRIVATE
    public MyBDConnexion(){

        try {
            cnx = DriverManager.getConnection(URL, USER, PASSWORD);
            System.out.println("Connexion etablie!");
        } catch (SQLException e) {
            System.err.println(e.getMessage());
        }

    }
    //3nd Step = CREATE A STATIC METHOD TO RETURN THE INSTANCE
    public static MyBDConnexion getInstance(){
        if (instance == null) instance = new MyBDConnexion();
        return instance;
    }
    public Connection getCnx() {
        return cnx;
    }
}
