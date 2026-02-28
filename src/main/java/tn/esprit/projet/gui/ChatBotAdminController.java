package tn.esprit.projet.gui;

import javafx.beans.property.SimpleStringProperty;
import javafx.collections.FXCollections;
import javafx.collections.ObservableList;
import javafx.fxml.FXML;
import javafx.fxml.Initializable;
import javafx.scene.control.*;
import javafx.scene.control.cell.PropertyValueFactory;
import javafx.stage.FileChooser;
import tn.esprit.projet.models.ChatBotMessage;
import tn.esprit.projet.services.ChatBotService;
import tn.esprit.projet.utils.MyBDConnexion;

import java.io.File;
import java.io.FileWriter;
import java.io.PrintWriter;
import java.net.URL;
import java.sql.*;
import java.time.format.DateTimeFormatter;
import java.util.List;
import java.util.ResourceBundle;

public class ChatBotAdminController implements Initializable {

    @FXML private ComboBox<String> cmbPatients;
    @FXML private Label lblNbMessages;

    @FXML private TableView<ChatBotMessage> tableConversations;
    @FXML private TableColumn<ChatBotMessage, String> colDate;
    @FXML private TableColumn<ChatBotMessage, String> colMessagePatient;
    @FXML private TableColumn<ChatBotMessage, String> colReponseBot;

    private ChatBotService chatBotService;
    private Connection cnx;

    private int idPatientSelectionne = 0;
    private String nomPatientSelectionne = "";
    private ObservableList<ChatBotMessage> listeMessages = FXCollections.observableArrayList();

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        try {
            System.out.println("🚀 Initialisation du ChatBotAdminController...");

            // Initialiser les services
            chatBotService = new ChatBotService();
            cnx = MyBDConnexion.getInstance().getCnx();

            // Configurer l'interface
            configurerTableau();
            chargerListePatients();

            System.out.println("✅ Interface ChatBot Admin initialisée avec succès");

        } catch (Exception e) {
            System.err.println("❌ Erreur initialisation: " + e.getMessage());
            e.printStackTrace();
            showAlert("Erreur", "Impossible d'initialiser: " + e.getMessage(),
                    Alert.AlertType.ERROR);
        }
    }

    private void configurerTableau() {
        try {
            if (colDate != null) {
                colDate.setCellValueFactory(cellData ->
                        new SimpleStringProperty(
                                cellData.getValue().getdate_envoi() != null
                                        ? cellData.getValue().getdate_envoi().toLocalDateTime()
                                        .format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm"))
                                        : "—"
                        )
                );
            }

            if (colMessagePatient != null) {
                colMessagePatient.setCellValueFactory(new PropertyValueFactory<>("message_utilisateur"));
                colMessagePatient.setCellFactory(tc -> createWrappedCell(350));
            }

            if (colReponseBot != null) {
                colReponseBot.setCellValueFactory(new PropertyValueFactory<>("reponse_chatbot"));
                colReponseBot.setCellFactory(tc -> createWrappedCell(380));
            }

            tableConversations.setItems(listeMessages);
            System.out.println("✅ Tableau configuré");
        } catch (Exception e) {
            System.err.println("❌ Erreur config tableau: " + e.getMessage());
        }
    }

    private TableCell<ChatBotMessage, String> createWrappedCell(double maxWidth) {
        return new TableCell<>() {
            private final Label label = new Label();
            {
                label.setWrapText(true);
                label.setMaxWidth(maxWidth);
                label.setStyle("-fx-padding: 5; -fx-font-size: 12px;");
            }

            @Override
            protected void updateItem(String item, boolean empty) {
                super.updateItem(item, empty);
                if (empty || item == null) {
                    setGraphic(null);
                } else {
                    label.setText(item);
                    setGraphic(label);
                }
            }
        };
    }

    private void chargerListePatients() {
        try {
            String query = "SELECT id, firstname, lastname, role FROM users WHERE role = 'etudiant' OR role = 'enseignant' ORDER BY firstname";
            Statement stmt = cnx.createStatement();
            ResultSet rs = stmt.executeQuery(query);

            cmbPatients.getItems().clear();

            while (rs.next()) {
                int id = rs.getInt("id");
                String nom = rs.getString("lastname");
                String prenom = rs.getString("firstname");
                String role = rs.getString("role");
                cmbPatients.getItems().add(id + " - " + prenom + " " + nom + " (" + role + ")");
            }

            System.out.println("✅ " + cmbPatients.getItems().size() + " patients chargés depuis la table users");

        } catch (SQLException e) {
            System.err.println("❌ Erreur SQL: " + e.getMessage());
            e.printStackTrace();

            // Données de test en cas d'erreur
            cmbPatients.getItems().addAll(
                    "1 - Sirine Amri (etudiant)",
                    "2 - Jean Dupont (psychologue)",
                    "3 - Alice Martin (enseignant)"
            );
        }
    }

    @FXML
    public void chargerConversations() {
        String selection = cmbPatients.getValue();
        if (selection == null || selection.isEmpty()) {
            showAlert("Attention", "Veuillez sélectionner un patient", Alert.AlertType.WARNING);
            return;
        }

        try {
            String[] parts = selection.split(" - ");
            idPatientSelectionne = Integer.parseInt(parts[0]);
            nomPatientSelectionne = parts[1].split(" \\(")[0]; // Enlever le rôle

            List<ChatBotMessage> messages = chatBotService.getHistorique(idPatientSelectionne);

            listeMessages.clear();
            if (messages != null && !messages.isEmpty()) {
                listeMessages.addAll(messages);
            }

            tableConversations.setItems(listeMessages);
            tableConversations.refresh();

            lblNbMessages.setText(listeMessages.size() + " message(s)");

            System.out.println("✅ Conversations chargées pour patient " + idPatientSelectionne + " - " + nomPatientSelectionne);

        } catch (Exception e) {
            System.err.println("❌ Erreur: " + e.getMessage());
            showAlert("Erreur", "Impossible de charger les conversations: " + e.getMessage(),
                    Alert.AlertType.ERROR);
        }
    }

    @FXML
    public void telechargerConversation() {
        if (listeMessages.isEmpty()) {
            showAlert("Attention", "Aucune conversation à télécharger", Alert.AlertType.WARNING);
            return;
        }

        if (idPatientSelectionne == 0) {
            showAlert("Attention", "Veuillez d'abord sélectionner un patient", Alert.AlertType.WARNING);
            return;
        }

        // Créer un FileChooser
        FileChooser fileChooser = new FileChooser();
        fileChooser.setTitle("Télécharger la conversation");

        // Nom de fichier par défaut
        String fileName = "conversation_" + nomPatientSelectionne.replace(" ", "_") + "_" +
                java.time.LocalDate.now() + ".txt";
        fileChooser.setInitialFileName(fileName);

        // Filtre pour les fichiers texte
        FileChooser.ExtensionFilter extFilter =
                new FileChooser.ExtensionFilter("Fichiers texte (*.txt)", "*.txt");
        fileChooser.getExtensionFilters().add(extFilter);

        // Afficher la boîte de dialogue de sauvegarde
        File file = fileChooser.showSaveDialog(null);

        if (file != null) {
            try {
                sauvegarderConversation(file);
            } catch (Exception e) {
                showAlert("Erreur", "Impossible de sauvegarder le fichier: " + e.getMessage(),
                        Alert.AlertType.ERROR);
            }
        }
    }

    private void sauvegarderConversation(File file) throws Exception {
        try (PrintWriter writer = new PrintWriter(new FileWriter(file))) {
            // En-tête
            writer.println("==========================================");
            writer.println("   CONVERSATION AVEC " + nomPatientSelectionne.toUpperCase());
            writer.println("   Date: " + java.time.LocalDate.now());
            writer.println("   Nombre de messages: " + listeMessages.size());
            writer.println("==========================================");
            writer.println();

            // Messages
            int numero = 1;
            for (ChatBotMessage msg : listeMessages) {
                writer.println("[" + numero + "] " +
                        msg.getdate_envoi().toLocalDateTime()
                                .format(DateTimeFormatter.ofPattern("dd/MM/yyyy HH:mm:ss")));
                writer.println("👤 Patient: " + msg.getmessage_utilisateur());
                writer.println("🤖 ChatBot: " + msg.getreponse_chatbot());
                writer.println("------------------------------------------");
                writer.println();
                numero++;
            }

            writer.println("==========================================");
            writer.println("   FIN DE LA CONVERSATION");
            writer.println("==========================================");
        }

        showAlert("Succès", "✅ Conversation téléchargée avec succès !\nFichier: " + file.getName(),
                Alert.AlertType.INFORMATION);
    }

    private void showAlert(String title, String message, Alert.AlertType type) {
        Alert alert = new Alert(type);
        alert.setTitle(title);
        alert.setHeaderText(null);
        alert.setContentText(message);
        alert.showAndWait();
    }
}