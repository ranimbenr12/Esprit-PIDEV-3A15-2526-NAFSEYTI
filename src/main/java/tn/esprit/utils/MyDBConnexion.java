package tn.esprit.utils;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

public class MyDBConnexion {

    private static final String USER="root";
    private static final String PASSWORD="";
    private static final String URL="jdbc:mysql://localhost:3306/projetpi";

    private Connection cnx;

    public Connection getCnx() {
        return cnx;
    }

    private static MyDBConnexion instance;
    private MyDBConnexion() {
        try {
            cnx= DriverManager.getConnection(URL,USER,PASSWORD);
            System.out.println("connexion ok!");
        } catch (SQLException e) {
            System.err.println(e.getMessage());
        }
    }
    public static MyDBConnexion getInstance() {
        if (instance == null) instance = new MyDBConnexion();
        return instance;
    }
}
