package tn.esprit.projet.config;

import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.SQLException;

/**
 * DatabaseConfig - Centralized database connection management
 * Handles all database connections for the Mental Health Platform
 */
public class DatabaseConfig {

    // Database connection parameters
    private static final String DB_HOST = "localhost";
    private static final String DB_PORT = "3306";
    private static final String DB_NAME = "mental_health_platform";
    private static final String DB_USER = "root";
    private static final String DB_PASSWORD = "";

    // Full database URL
    private static final String DB_URL = "jdbc:mysql://" + DB_HOST + ":" + DB_PORT + "/" + DB_NAME;

    // JDBC Driver class name
    private static final String JDBC_DRIVER = "com.mysql.cj.jdbc.Driver";

    // Connection pool settings (optional - for future optimization)
    private static final String CONNECTION_PROPERTIES =
            "?useSSL=false&serverTimezone=UTC&allowPublicKeyRetrieval=true";

    /**
     * Get a database connection
     * @return Connection object
     * @throws SQLException if connection fails
     */
    public static Connection getConnection() throws SQLException {
        try {
            // Load the JDBC driver
            Class.forName(JDBC_DRIVER);

            // Return connection with additional properties
            return DriverManager.getConnection(DB_URL + CONNECTION_PROPERTIES, DB_USER, DB_PASSWORD);

        } catch (ClassNotFoundException e) {
            throw new SQLException("MySQL JDBC Driver not found. Please add mysql-connector-java to your project.", e);
        } catch (SQLException e) {
            throw new SQLException("Failed to connect to database. Please check your database configuration.", e);
        }
    }

    /**
     * Test database connection
     * @return true if connection successful, false otherwise
     */
    public static boolean testConnection() {
        try (Connection conn = getConnection()) {
            System.out.println("✓ Database connection successful!");
            System.out.println("  Connected to: " + DB_NAME);
            System.out.println("  Host: " + DB_HOST + ":" + DB_PORT);
            return true;
        } catch (SQLException e) {
            System.err.println("✗ Database connection failed!");
            System.err.println("  Error: " + e.getMessage());
            return false;
        }
    }

    /**
     * Close database connection safely
     * @param conn Connection to close
     */
    public static void closeConnection(Connection conn) {
        if (conn != null) {
            try {
                conn.close();
            } catch (SQLException e) {
                System.err.println("Error closing connection: " + e.getMessage());
            }
        }
    }

    // Getters for configuration (useful for debugging or displaying info)
    public static String getDbHost() {
        return DB_HOST;
    }

    public static String getDbPort() {
        return DB_PORT;
    }

    public static String getDbName() {
        return DB_NAME;
    }

    public static String getDbUrl() {
        return DB_URL;
    }

    /**
     * Main method for testing database connection
     */
    public static void main(String[] args) {
        System.out.println("========================================");
        System.out.println("  Database Connection Test");
        System.out.println("========================================");

        if (testConnection()) {
            System.out.println("\nDatabase is ready to use!");
        } else {
            System.out.println("\nPlease check:");
            System.out.println("1. XAMPP MySQL is running");
            System.out.println("2. Database '" + DB_NAME + "' exists");
            System.out.println("3. MySQL Connector JAR is added to project");
            System.out.println("4. Database credentials are correct");
        }
    }
}