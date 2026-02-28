package tn.esprit.projet.utils;

import tn.esprit.projet.models.User;

public class SessionManager {
    private static SessionManager instance;
    private User currentUser;

    private SessionManager() {}

    public static SessionManager getInstance() {
        if (instance == null) {
            instance = new SessionManager();
        }
        return instance;
    }

    public void setCurrentUser(User user) {
        this.currentUser = user;
        System.out.println("✅ Utilisateur connecté: " + (user != null ? user.getEmail() : "null"));
    }

    public User getCurrentUser() {
        return currentUser;
    }

    public boolean isLoggedIn() {
        return currentUser != null;
    }

    public boolean isPsychologue() {
        return currentUser != null && "psychologue".equals(currentUser.getRole());
    }

    public boolean isEtudiant() {
        return currentUser != null && "etudiant".equals(currentUser.getRole());
    }

    public void logout() {
        currentUser = null;
        System.out.println("✅ Utilisateur déconnecté");
    }
}