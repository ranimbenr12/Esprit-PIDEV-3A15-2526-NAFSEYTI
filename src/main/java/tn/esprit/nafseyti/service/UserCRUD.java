package tn.esprit.nafseyti.service;

import tn.esprit.nafseyti.models.User;

import java.util.List;

/**
 * IUserService - Interface for User CRUD operations
 * Defines all data access methods for User entities
 */

public interface UserCRUD {

    // ========== CREATE ==========

    /**
     * Save a new user to the database
     * @param user User object to save
     * @return true if successful, false otherwise
     */
    boolean save(User user);

    // ========== READ ==========

    /**
     * Find user by ID
     * @param id User ID
     * @return User object if found, null otherwise
     */
    User findById(int id);

    /**
     * Find user by email
     * @param email User email
     * @return User object if found, null otherwise
     */
    User findByEmail(String email);

    /**
     * Find all users
     * @return List of all users
     */
    List<User> findAll();

    /**
     * Find users by role
     * @param role User role
     * @return List of users with specified role
     */
    List<User> findByRole(String role);

    /**
     * Check if email exists in database
     * @param email Email to check
     * @return true if exists, false otherwise
     */
    boolean emailExists(String email);

    /**
     * Authenticate user with email and password
     * @param email User email
     * @param password User password (hashed)
     * @return User object if authentication successful, null otherwise
     */
    User authenticate(String email, String password);

    // ========== UPDATE ==========

    /**
     * Update user information in database
     * @param user User object with updated information
     * @return true if successful, false otherwise
     */
    boolean update(User user);

    // ========== DELETE ==========

    /**
     * Delete user by ID
     * @param userId User ID to delete
     * @return true if successful, false otherwise
     */
    boolean deleteById(int userId);

    /**
     * Delete user object
     * @param user User to delete
     * @return true if successful, false otherwise
     */
    boolean delete(User user);
}
