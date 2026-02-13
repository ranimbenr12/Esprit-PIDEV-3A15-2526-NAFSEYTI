package TestPsychologique.controllers;

import TestPsychologique.dao.Testdao;
import TestPsychologique.dao.Questiondao;
import javafx.fxml.FXML;
import javafx.fxml.FXMLLoader;
import javafx.fxml.Initializable;
import javafx.scene.Parent;
import javafx.scene.Scene;
import javafx.scene.control.Button;
import javafx.scene.control.Label;
import javafx.scene.layout.StackPane;
import javafx.stage.Stage;

import java.net.URL;
import java.util.ResourceBundle;

public class DashboardController implements Initializable {

    @FXML private StackPane contentArea;
    @FXML private Label lblTotalTests, lblTotalQuestions;

    @FXML private Button btnDashboard, btnUsers, btnAppointments, btnContent;
    @FXML private Button btnTests, btnQuestions, btnEvents, btnTracking, btnFeedback;

    private Testdao testdao = new Testdao();
    private Questiondao questiondao = new Questiondao();

    @Override
    public void initialize(URL location, ResourceBundle resources) {
        loadStatistics();
        setActiveButton(btnDashboard);
    }

    private void loadStatistics() {
        try {
            int totalTests = testdao.getAllTests().size();
            int totalQuestions = questiondao.getAllQuestions().size();

            lblTotalTests.setText(String.valueOf(totalTests));
            lblTotalQuestions.setText(String.valueOf(totalQuestions));
        } catch (Exception e) {
            lblTotalTests.setText("0");
            lblTotalQuestions.setText("0");
            e.printStackTrace();
        }
    }

    @FXML
    private void handleTestsClick() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/TestView.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) contentArea.getScene().getWindow();
            Scene scene = new Scene(root, 1200, 700);
            stage.setScene(scene);
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleQuestionsClick() {
        try {
            FXMLLoader loader = new FXMLLoader(getClass().getResource("/TestPsychologique/views/QuestionView.fxml"));
            Parent root = loader.load();

            Stage stage = (Stage) contentArea.getScene().getWindow();
            Scene scene = new Scene(root, 1200, 700);
            stage.setScene(scene);
            stage.show();

        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    @FXML
    private void handleDashboardClick() {
        // Reload dashboard to refresh statistics
        loadStatistics();
        setActiveButton(btnDashboard);
    }

    private void setActiveButton(Button activeBtn) {
        // Reset all buttons
        Button[] allButtons = {btnDashboard, btnUsers, btnAppointments, btnContent,
                btnTests, btnQuestions, btnEvents, btnTracking, btnFeedback};

        for (Button btn : allButtons) {
            btn.setStyle("-fx-background-color: transparent; " +
                    "-fx-text-fill: #69685c; " +
                    "-fx-font-size: 14px; " +
                    "-fx-alignment: CENTER_LEFT; " +
                    "-fx-padding: 15 20; " +
                    "-fx-background-radius: 5; " +
                    "-fx-cursor: hand;");
        }

        // Set active button style
        activeBtn.setStyle("-fx-background-color: #374535; " +
                "-fx-text-fill: white; " +
                "-fx-font-size: 14px; " +
                "-fx-font-weight: bold; " +
                "-fx-alignment: CENTER_LEFT; " +
                "-fx-padding: 15 20; " +
                "-fx-background-radius: 5; " +
                "-fx-cursor: hand;");
    }
}
