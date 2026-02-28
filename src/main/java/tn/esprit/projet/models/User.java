package tn.esprit.projet.models;

import java.sql.Timestamp;

public class User {
    private int id;
    private String profilePhoto;
    private String firstname;
    private String lastname;
    private String email;
    private String password;
    private String address;
    private String location;
    private String phoneNumber;
    private String role;
    private Timestamp createdAt;
    private String status;

    // Constructeurs
    public User() {}

    public User(String firstname, String lastname, String email, String password, String role) {
        this.firstname = firstname;
        this.lastname = lastname;
        this.email = email;
        this.password = password;
        this.role = role;
        this.status = "actif";
    }

    // Getters et Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getProfilePhoto() { return profilePhoto; }
    public void setProfilePhoto(String profilePhoto) { this.profilePhoto = profilePhoto; }

    public String getFirstname() { return firstname; }
    public void setFirstname(String firstname) { this.firstname = firstname; }

    public String getLastname() { return lastname; }
    public void setLastname(String lastname) { this.lastname = lastname; }

    // ✅ MÉTHODE AJOUTÉE
    public String getFullName() {
        return firstname + " " + lastname;
    }

    public String getEmail() { return email; }
    public void setEmail(String email) { this.email = email; }

    public String getPassword() { return password; }
    public void setPassword(String password) { this.password = password; }

    public String getAddress() { return address; }
    public void setAddress(String address) { this.address = address; }

    public String getLocation() { return location; }
    public void setLocation(String location) { this.location = location; }

    public String getPhoneNumber() { return phoneNumber; }
    public void setPhoneNumber(String phoneNumber) { this.phoneNumber = phoneNumber; }

    public String getRole() { return role; }
    public void setRole(String role) { this.role = role; }

    public Timestamp getCreatedAt() { return createdAt; }
    public void setCreatedAt(Timestamp createdAt) { this.createdAt = createdAt; }

    public String getStatus() { return status; }
    public void setStatus(String status) { this.status = status; }

    public boolean isPsychologue() {
        return "psychologue".equals(role);
    }

    public boolean isEtudiant() {
        return "etudiant".equals(role) || "patient".equals(role);
    }

    public boolean isAdministrateur() {
        return "administrateur".equals(role);
    }
}