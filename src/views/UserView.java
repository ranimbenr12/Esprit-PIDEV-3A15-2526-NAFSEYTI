package views;

import controllers.UserController;
import models.User;
import java.util.List;
import java.util.Scanner;

/**
 * UserView - Simple console-based view for User management
 * This is a basic implementation for testing. Replace with GUI (Swing/JavaFX) or web views as needed
 */
public class UserView {

    private UserController userController;
    private Scanner scanner;
    private User currentUser; // Logged-in user

    public UserView() {
        this.userController = new UserController();
        this.scanner = new Scanner(System.in);
        this.currentUser = null;
    }

    /**
     * Main menu
     */
    public void showMainMenu() {
        while (true) {
            System.out.println("\n========================================");
            System.out.println("  MENTAL HEALTH PLATFORM - User Module");
            System.out.println("========================================");

            if (currentUser == null) {
                // Not logged in
                System.out.println("1. Register");
                System.out.println("2. Login");
                System.out.println("3. Exit");
                System.out.print("\nSelect an option: ");

                int choice = getIntInput();

                switch (choice) {
                    case 1:
                        showRegistrationForm();
                        break;
                    case 2:
                        showLoginForm();
                        break;
                    case 3:
                        System.out.println("Thank you for using Mental Health Platform!");
                        scanner.close();
                        return;
                    default:
                        System.out.println("Invalid option. Please try again.");
                }
            } else {
                // Logged in
                System.out.println("Logged in as: " + currentUser.getFirstname() + " " + currentUser.getLastname());
                System.out.println("\n1. View My Profile");
                System.out.println("2. Update Profile");
                System.out.println("3. Change Password");
                System.out.println("4. Update Profile Photo");
                System.out.println("5. Delete My Account");

                if ("admin".equals(currentUser.getRole())) {
                    System.out.println("6. View All Users (Admin)");
                    System.out.println("7. Manage User Role (Admin)");
                    System.out.println("8. Delete User (Admin)");
                }

                System.out.println("0. Logout");
                System.out.print("\nSelect an option: ");

                int choice = getIntInput();

                switch (choice) {
                    case 1:
                        viewProfile();
                        break;
                    case 2:
                        updateProfile();
                        break;
                    case 3:
                        changePassword();
                        break;
                    case 4:
                        updateProfilePhoto();
                        break;
                    case 5:
                        deleteMyAccount();
                        break;
                    case 6:
                        if ("admin".equals(currentUser.getRole())) {
                            viewAllUsers();
                        } else {
                            System.out.println("Invalid option.");
                        }
                        break;
                    case 7:
                        if ("admin".equals(currentUser.getRole())) {
                            manageUserRole();
                        } else {
                            System.out.println("Invalid option.");
                        }
                        break;
                    case 8:
                        if ("admin".equals(currentUser.getRole())) {
                            deleteUser();
                        } else {
                            System.out.println("Invalid option.");
                        }
                        break;
                    case 0:
                        logout();
                        break;
                    default:
                        System.out.println("Invalid option. Please try again.");
                }
            }
        }
    }

    /**
     * Registration form
     */
    private void showRegistrationForm() {
        System.out.println("\n===== USER REGISTRATION =====");

        System.out.print("First Name: ");
        String firstname = scanner.nextLine().trim();

        System.out.print("Last Name: ");
        String lastname = scanner.nextLine().trim();

        System.out.print("Email: ");
        String email = scanner.nextLine().trim();

        System.out.print("Password (min 8 characters): ");
        String password = scanner.nextLine();

        System.out.print("Confirm Password: ");
        String confirmPassword = scanner.nextLine();

        User user = userController.registerUser(firstname, lastname, email, password, confirmPassword);

        if (user != null) {
            System.out.println("\n✓ Registration successful!");
            System.out.println("You can now login with your credentials.");
        } else {
            System.out.println("\n✗ Registration failed. Please try again.");
        }
    }

    /**
     * Login form
     */
    private void showLoginForm() {
        System.out.println("\n===== USER LOGIN =====");

        System.out.print("Email: ");
        String email = scanner.nextLine().trim();

        System.out.print("Password: ");
        String password = scanner.nextLine();

        User user = userController.loginUser(email, password);

        if (user != null) {
            currentUser = user;
            System.out.println("\n✓ Login successful!");
            System.out.println("Welcome, " + currentUser.getFirstname() + "!");
        } else {
            System.out.println("\n✗ Login failed. Invalid credentials.");
        }
    }

    /**
     * View current user profile
     */
    private void viewProfile() {
        System.out.println("\n===== MY PROFILE =====");
        userController.displayUserInfo(currentUser);
    }

    /**
     * Update profile information
     */
    private void updateProfile() {
        System.out.println("\n===== UPDATE PROFILE =====");
        System.out.println("Leave blank to keep current value");

        System.out.print("First Name [" + currentUser.getFirstname() + "]: ");
        String firstname = scanner.nextLine().trim();
        if (firstname.isEmpty()) firstname = currentUser.getFirstname();

        System.out.print("Last Name [" + currentUser.getLastname() + "]: ");
        String lastname = scanner.nextLine().trim();
        if (lastname.isEmpty()) lastname = currentUser.getLastname();

        System.out.print("Address [" + (currentUser.getAddress() != null ? currentUser.getAddress() : "") + "]: ");
        String address = scanner.nextLine().trim();
        if (address.isEmpty()) address = currentUser.getAddress();

        System.out.print("Location [" + (currentUser.getLocation() != null ? currentUser.getLocation() : "") + "]: ");
        String location = scanner.nextLine().trim();
        if (location.isEmpty()) location = currentUser.getLocation();

        System.out.print("Phone Number [" + (currentUser.getPhoneNumber() != null ? currentUser.getPhoneNumber() : "") + "]: ");
        String phone = scanner.nextLine().trim();
        if (phone.isEmpty()) phone = currentUser.getPhoneNumber();

        if (userController.updateUserProfile(currentUser, firstname, lastname, address, location, phone)) {
            System.out.println("\n✓ Profile updated successfully!");
            // Refresh current user data
            currentUser = userController.getUserById(currentUser.getId());
        } else {
            System.out.println("\n✗ Failed to update profile.");
        }
    }

    /**
     * Change password
     */
    private void changePassword() {
        System.out.println("\n===== CHANGE PASSWORD =====");

        System.out.print("Current Password: ");
        String currentPassword = scanner.nextLine();

        System.out.print("New Password (min 8 characters): ");
        String newPassword = scanner.nextLine();

        System.out.print("Confirm New Password: ");
        String confirmPassword = scanner.nextLine();

        if (userController.updateUserPassword(currentUser, currentPassword, newPassword, confirmPassword)) {
            System.out.println("\n✓ Password changed successfully!");
        } else {
            System.out.println("\n✗ Failed to change password.");
        }
    }

    /**
     * Update profile photo
     */
    private void updateProfilePhoto() {
        System.out.println("\n===== UPDATE PROFILE PHOTO =====");

        System.out.print("Enter photo path/URL: ");
        String photoPath = scanner.nextLine().trim();

        if (userController.updateProfilePhoto(currentUser, photoPath)) {
            System.out.println("\n✓ Profile photo updated successfully!");
            currentUser = userController.getUserById(currentUser.getId());
        } else {
            System.out.println("\n✗ Failed to update profile photo.");
        }
    }

    /**
     * View all users (Admin only)
     */
    private void viewAllUsers() {
        System.out.println("\n===== ALL USERS =====");
        List<User> users = userController.getAllUsers();

        if (users.isEmpty()) {
            System.out.println("No users found.");
        } else {
            for (User user : users) {
                System.out.println("\nID: " + user.getId());
                System.out.println("Name: " + user.getFirstname() + " " + user.getLastname());
                System.out.println("Email: " + user.getEmail());
                System.out.println("Role: " + user.getRole());
                System.out.println("Phone: " + (user.getPhoneNumber() != null ? user.getPhoneNumber() : "N/A"));
                System.out.println("---");
            }
        }
    }

    /**
     * Manage user role (Admin only)
     */
    private void manageUserRole() {
        System.out.println("\n===== MANAGE USER ROLE =====");

        System.out.print("Enter user ID: ");
        int userId = getIntInput();

        User user = userController.getUserById(userId);
        if (user == null) {
            System.out.println("User not found.");
            return;
        }

        System.out.println("Current role: " + user.getRole());
        System.out.print("Enter new role (user/admin/therapist/etc.): ");
        String newRole = scanner.nextLine().trim();

        if (userController.updateUserRole(user, newRole)) {
            System.out.println("\n✓ User role updated successfully!");
        } else {
            System.out.println("\n✗ Failed to update user role.");
        }
    }

    /**
     * Delete user (Admin only)
     */
    private void deleteUser() {
        System.out.println("\n===== DELETE USER =====");

        System.out.print("Enter user ID to delete: ");
        int userId = getIntInput();

        if (userId == currentUser.getId()) {
            System.out.println("You cannot delete your own account from here.");
            return;
        }

        User user = userController.getUserById(userId);
        if (user == null) {
            System.out.println("User not found.");
            return;
        }

        System.out.println("Are you sure you want to delete user: " + user.getFirstname() + " " + user.getLastname() + "?");
        System.out.print("Type 'yes' to confirm: ");
        String confirm = scanner.nextLine().trim();

        if ("yes".equalsIgnoreCase(confirm)) {
            if (userController.deleteUser(userId)) {
                System.out.println("\n✓ User deleted successfully!");
            } else {
                System.out.println("\n✗ Failed to delete user.");
            }
        } else {
            System.out.println("Deletion cancelled.");
        }
    }

    /**
     * Delete my account
     */
    private void deleteMyAccount() {
        System.out.println("\n===== DELETE MY ACCOUNT =====");
        System.out.println("⚠️  WARNING: This action cannot be undone!");
        System.out.println("Your account and all associated data will be permanently deleted.");

        System.out.print("\nAre you sure you want to delete your account? Type 'DELETE' to confirm: ");
        String confirm = scanner.nextLine().trim();

        if ("DELETE".equals(confirm)) {
            System.out.print("\nEnter your password to confirm: ");
            String password = scanner.nextLine();

            // Verify password
            if (!currentUser.getPassword().equals(password)) {
                System.out.println("\n✗ Incorrect password. Account deletion cancelled.");
                return;
            }

            int userId = currentUser.getId();
            String userName = currentUser.getFirstname() + " " + currentUser.getLastname();

            if (userController.deleteUser(userId)) {
                System.out.println("\n✓ Your account has been deleted successfully.");
                System.out.println("Goodbye, " + userName + ". We're sorry to see you go.");
                currentUser = null; // Logout
            } else {
                System.out.println("\n✗ Failed to delete account. Please try again or contact support.");
            }
        } else {
            System.out.println("\n✓ Account deletion cancelled. Your account is safe.");
        }
    }

    /**
     * Logout
     */
    private void logout() {
        currentUser = null;
        System.out.println("\n✓ Logged out successfully!");
    }

    /**
     * Helper method to get integer input with error handling
     */
    private int getIntInput() {
        while (true) {
            try {
                String input = scanner.nextLine().trim();
                return Integer.parseInt(input);
            } catch (NumberFormatException e) {
                System.out.print("Invalid input. Please enter a number: ");
            }
        }
    }

    /**
     * Main method to run the application
     */
    public static void main(String[] args) {
        UserView view = new UserView();
        view.showMainMenu();
    }
}