package controllers;

import models.User;
import java.util.List;
import java.util.regex.Pattern;

/**
 * UserController - Handles all user-related operations
 * Acts as the intermediary between the View and Model
 */
public class UserController {

    // Email validation pattern
    private static final Pattern EMAIL_PATTERN =
            Pattern.compile("^[A-Za-z0-9+_.-]+@[A-Za-z0-9.-]+\\.[A-Za-z]{2,}$");

    // Password minimum length
    private static final int MIN_PASSWORD_LENGTH = 8;

    /**
     * Register a new user
     * @return User object if successful, null otherwise
     */
    public User registerUser(String firstname, String lastname, String email,
                             String password, String confirmPassword) {

        // Validation
        if (!validateRegistration(firstname, lastname, email, password, confirmPassword)) {
            return null;
        }

        // Check if email already exists
        if (User.emailExists(email)) {
            System.out.println("Error: Email already registered");
            return null;
        }

        // Create and save user
        User user = new User(firstname, lastname, email, hashPassword(password));

        if (user.save()) {
            System.out.println("User registered successfully: " + user.getEmail());
            return user;
        } else {
            System.out.println("Error: Failed to register user");
            return null;
        }
    }

    /**
     * Login user with email and password
     * @return User object if authentication successful, null otherwise
     */
    public User loginUser(String email, String password) {
        if (email == null || email.trim().isEmpty() ||
                password == null || password.trim().isEmpty()) {
            System.out.println("Error: Email and password are required");
            return null;
        }

        User user = User.authenticate(email, hashPassword(password));

        if (user != null) {
            System.out.println("Login successful: " + user.getEmail());
            return user;
        } else {
            System.out.println("Error: Invalid email or password");
            return null;
        }
    }

    /**
     * Get user by ID
     */
    public User getUserById(int id) {
        if (id <= 0) {
            System.out.println("Error: Invalid user ID");
            return null;
        }

        User user = User.findById(id);
        if (user == null) {
            System.out.println("Error: User not found with ID: " + id);
        }
        return user;
    }

    /**
     * Get user by email
     */
    public User getUserByEmail(String email) {
        if (!isValidEmail(email)) {
            System.out.println("Error: Invalid email format");
            return null;
        }

        User user = User.findByEmail(email);
        if (user == null) {
            System.out.println("Error: User not found with email: " + email);
        }
        return user;
    }

    /**
     * Get all users
     */
    public List<User> getAllUsers() {
        return User.findAll();
    }

    /**
     * Get users by role
     */
    public List<User> getUsersByRole(String role) {
        if (role == null || role.trim().isEmpty()) {
            System.out.println("Error: Role cannot be empty");
            return null;
        }
        return User.findByRole(role);
    }

    /**
     * Update user profile
     */
    public boolean updateUserProfile(User user, String firstname, String lastname,
                                     String address, String location, String phoneNumber) {
        if (user == null) {
            System.out.println("Error: User object is null");
            return false;
        }

        // Validate inputs
        if (firstname != null && !firstname.trim().isEmpty()) {
            if (firstname.length() > 20) {
                System.out.println("Error: First name too long (max 20 characters)");
                return false;
            }
            user.setFirstname(firstname.trim());
        }

        if (lastname != null && !lastname.trim().isEmpty()) {
            if (lastname.length() > 20) {
                System.out.println("Error: Last name too long (max 20 characters)");
                return false;
            }
            user.setLastname(lastname.trim());
        }

        if (address != null) {
            if (address.length() > 30) {
                System.out.println("Error: Address too long (max 30 characters)");
                return false;
            }
            user.setAddress(address.trim());
        }

        if (location != null) {
            if (location.length() > 30) {
                System.out.println("Error: Location too long (max 30 characters)");
                return false;
            }
            user.setLocation(location.trim());
        }

        if (phoneNumber != null) {
            if (phoneNumber.length() > 20) {
                System.out.println("Error: Phone number too long (max 20 characters)");
                return false;
            }
            user.setPhoneNumber(phoneNumber.trim());
        }

        if (user.update()) {
            System.out.println("User profile updated successfully");
            return true;
        } else {
            System.out.println("Error: Failed to update user profile");
            return false;
        }
    }

    /**
     * Update user email
     */
    public boolean updateUserEmail(User user, String newEmail) {
        if (user == null) {
            System.out.println("Error: User object is null");
            return false;
        }

        if (!isValidEmail(newEmail)) {
            System.out.println("Error: Invalid email format");
            return false;
        }

        // Check if new email already exists
        if (!newEmail.equals(user.getEmail()) && User.emailExists(newEmail)) {
            System.out.println("Error: Email already registered");
            return false;
        }

        user.setEmail(newEmail);

        if (user.update()) {
            System.out.println("Email updated successfully");
            return true;
        } else {
            System.out.println("Error: Failed to update email");
            return false;
        }
    }

    /**
     * Update user password
     */
    public boolean updateUserPassword(User user, String currentPassword,
                                      String newPassword, String confirmPassword) {
        if (user == null) {
            System.out.println("Error: User object is null");
            return false;
        }

        // Verify current password
        if (!user.getPassword().equals(hashPassword(currentPassword))) {
            System.out.println("Error: Current password is incorrect");
            return false;
        }

        // Validate new password
        if (!isValidPassword(newPassword)) {
            System.out.println("Error: Password must be at least " + MIN_PASSWORD_LENGTH + " characters");
            return false;
        }

        // Check if passwords match
        if (!newPassword.equals(confirmPassword)) {
            System.out.println("Error: Passwords do not match");
            return false;
        }

        user.setPassword(hashPassword(newPassword));

        if (user.update()) {
            System.out.println("Password updated successfully");
            return true;
        } else {
            System.out.println("Error: Failed to update password");
            return false;
        }
    }

    /**
     * Update profile photo
     */
    public boolean updateProfilePhoto(User user, String photoPath) {
        if (user == null) {
            System.out.println("Error: User object is null");
            return false;
        }

        if (photoPath != null && photoPath.length() > 255) {
            System.out.println("Error: Photo path too long (max 255 characters)");
            return false;
        }

        user.setProfilePhoto(photoPath);

        if (user.update()) {
            System.out.println("Profile photo updated successfully");
            return true;
        } else {
            System.out.println("Error: Failed to update profile photo");
            return false;
        }
    }

    /**
     * Update user role (admin function)
     */
    public boolean updateUserRole(User user, String newRole) {
        if (user == null) {
            System.out.println("Error: User object is null");
            return false;
        }

        if (newRole == null || newRole.trim().isEmpty()) {
            System.out.println("Error: Role cannot be empty");
            return false;
        }

        user.setRole(newRole.trim());

        if (user.update()) {
            System.out.println("User role updated successfully to: " + newRole);
            return true;
        } else {
            System.out.println("Error: Failed to update user role");
            return false;
        }
    }

    /**
     * Delete user account
     */
    public boolean deleteUser(int userId) {
        if (userId <= 0) {
            System.out.println("Error: Invalid user ID");
            return false;
        }

        if (User.deleteById(userId)) {
            System.out.println("User deleted successfully");
            return true;
        } else {
            System.out.println("Error: Failed to delete user");
            return false;
        }
    }

    // ========== VALIDATION METHODS ==========

    /**
     * Validate registration inputs
     */
    private boolean validateRegistration(String firstname, String lastname,
                                         String email, String password, String confirmPassword) {
        // Check for null or empty fields
        if (firstname == null || firstname.trim().isEmpty()) {
            System.out.println("Error: First name is required");
            return false;
        }

        if (lastname == null || lastname.trim().isEmpty()) {
            System.out.println("Error: Last name is required");
            return false;
        }

        if (email == null || email.trim().isEmpty()) {
            System.out.println("Error: Email is required");
            return false;
        }

        if (password == null || password.trim().isEmpty()) {
            System.out.println("Error: Password is required");
            return false;
        }

        // Validate field lengths
        if (firstname.length() > 20) {
            System.out.println("Error: First name too long (max 20 characters)");
            return false;
        }

        if (lastname.length() > 20) {
            System.out.println("Error: Last name too long (max 20 characters)");
            return false;
        }

        // Validate email format
        if (!isValidEmail(email)) {
            System.out.println("Error: Invalid email format");
            return false;
        }

        // Validate password
        if (!isValidPassword(password)) {
            System.out.println("Error: Password must be at least " + MIN_PASSWORD_LENGTH + " characters");
            return false;
        }

        // Check if passwords match
        if (!password.equals(confirmPassword)) {
            System.out.println("Error: Passwords do not match");
            return false;
        }

        return true;
    }

    /**
     * Validate email format
     */
    private boolean isValidEmail(String email) {
        return email != null && EMAIL_PATTERN.matcher(email).matches();
    }

    /**
     * Validate password strength
     */
    private boolean isValidPassword(String password) {
        return password != null && password.length() >= MIN_PASSWORD_LENGTH;
    }

    /**
     * Hash password (placeholder - implement proper hashing in production)
     * TODO: Implement BCrypt or similar hashing algorithm
     */
    private String hashPassword(String password) {
        // This is a placeholder. In production, use BCrypt or similar
        // For now, returning as-is for development purposes
        // Example with BCrypt: return BCrypt.hashpw(password, BCrypt.gensalt());
        return password;
    }

    /**
     * Display user information (for debugging/testing)
     */
    public void displayUserInfo(User user) {
        if (user == null) {
            System.out.println("No user to display");
            return;
        }

        System.out.println("\n===== User Information =====");
        System.out.println("ID: " + user.getId());
        System.out.println("Name: " + user.getFirstname() + " " + user.getLastname());
        System.out.println("Email: " + user.getEmail());
        System.out.println("Role: " + user.getRole());
        System.out.println("Phone: " + (user.getPhoneNumber() != null ? user.getPhoneNumber() : "N/A"));
        System.out.println("Address: " + (user.getAddress() != null ? user.getAddress() : "N/A"));
        System.out.println("Location: " + (user.getLocation() != null ? user.getLocation() : "N/A"));
        System.out.println("Profile Photo: " + (user.getProfilePhoto() != null ? user.getProfilePhoto() : "N/A"));
        System.out.println("===========================\n");
    }

    /**
     * Display all users (for debugging/testing)
     */
    public void displayAllUsers() {
        List<User> users = getAllUsers();

        if (users.isEmpty()) {
            System.out.println("No users found in the database");
            return;
        }

        System.out.println("\n===== All Users (" + users.size() + ") =====");
        for (User user : users) {
            System.out.println(user);
        }
        System.out.println("===========================\n");
    }
}