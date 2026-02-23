package tn.esprit.projet.models;

import java.sql.Timestamp;
import java.util.Objects;

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
    private String role; // etudiant, enseignant, psychologue, coach_vie, administrateur
    private Timestamp createdAt;
    private String status;

    public User() {}

    public User(int id, String profilePhoto, String firstname, String lastname, String email,
                String password, String address, String location, String phoneNumber,
                String role, Timestamp createdAt, String status) {
        this.id = id;
        this.profilePhoto = profilePhoto;
        this.firstname = firstname;
        this.lastname = lastname;
        this.email = email;
        this.password = password;
        this.address = address;
        this.location = location;
        this.phoneNumber = phoneNumber;
        this.role = role;
        this.createdAt = createdAt;
        this.status = status;
    }

    // Getters and Setters
    public int getId() { return id; }
    public void setId(int id) { this.id = id; }

    public String getProfilePhoto() { return profilePhoto; }
    public void setProfilePhoto(String profilePhoto) { this.profilePhoto = profilePhoto; }

    public String getFirstname() { return firstname; }
    public void setFirstname(String firstname) { this.firstname = firstname; }

    public String getLastname() { return lastname; }
    public void setLastname(String lastname) { this.lastname = lastname; }

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

    @Override
    public String toString() {
        return "User{" +
                "id=" + id +
                ", profilePhoto='" + profilePhoto + '\'' +
                ", firstname='" + firstname + '\'' +
                ", lastname='" + lastname + '\'' +
                ", email='" + email + '\'' +
                ", password='" + password + '\'' +
                ", address='" + address + '\'' +
                ", location='" + location + '\'' +
                ", phoneNumber='" + phoneNumber + '\'' +
                ", role='" + role + '\'' +
                ", createdAt=" + createdAt +
                ", status='" + status + '\'' +
                '}';
    }

    @Override
    public boolean equals(Object o) {
        if (!(o instanceof User user)) return false;
        return id == user.id &&
                Objects.equals(profilePhoto, user.profilePhoto) &&
                Objects.equals(firstname, user.firstname) &&
                Objects.equals(lastname, user.lastname) &&
                Objects.equals(email, user.email) &&
                Objects.equals(password, user.password) &&
                Objects.equals(address, user.address) &&
                Objects.equals(location, user.location) &&
                Objects.equals(phoneNumber, user.phoneNumber) &&
                Objects.equals(role, user.role) &&
                Objects.equals(createdAt, user.createdAt) &&
                Objects.equals(status, user.status);
    }

    @Override
    public int hashCode() {
        return Objects.hash(id, profilePhoto, firstname, lastname, email, password,
                address, location, phoneNumber, role, createdAt, status);
    }
}