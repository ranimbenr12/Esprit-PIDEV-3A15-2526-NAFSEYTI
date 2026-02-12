package tn.esprit.projet.utils;

import java.sql.Connection;
import java.sql.SQLException;
import java.sql.DriverManager;

public class MyBDConnexion {
    private static final String USER = "root";
    private static final String PASSWORD = "";
    private static final String URL = "jdbc:mysql://localhost:3306/projetpi";

    private Connection cnx;

    private static MyBDConnexion instance;
    private MyBDConnexion(){

        try{
            cnx = DriverManager.getConnection(URL, USER, PASSWORD);
            System.out.println("Connexion OK");
        } catch (SQLException e ) {
            System.err.println(e.getMessage());
        }
    }
    public static MyBDConnexion getInstance(){
        if (instance == null)
            instance = new MyBDConnexion();
        return instance;
    }

    public Connection getCnx() {
        return cnx;
    }
}
