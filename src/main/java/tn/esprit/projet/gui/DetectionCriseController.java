package tn.esprit.projet.gui;

import org.springframework.http.HttpStatus;
import org.springframework.http.ResponseEntity;
import org.springframework.web.bind.annotation.*;
import tn.esprit.projet.models.DetectionCriseRequest;
import tn.esprit.projet.models.DetectionCriseResponse;
import tn.esprit.projet.services.DetectionCriseService;

@RestController
@RequestMapping("/api/detecter-crise")
@CrossOrigin(origins = "*")
public class DetectionCriseController {

    private final DetectionCriseService detectionCriseService;

    public DetectionCriseController(DetectionCriseService detectionCriseService) {
        this.detectionCriseService = detectionCriseService;
    }

    @PostMapping
    public ResponseEntity<DetectionCriseResponse> detecterCrise(@RequestBody DetectionCriseRequest request) {
        try {
            if (request.getMessage() == null || request.getMessage().trim().isEmpty()) {
                return ResponseEntity.badRequest().build();
            }

            DetectionCriseResponse response = detectionCriseService.detecterCrise(request);
            return ResponseEntity.ok(response);

        } catch (Exception e) {
            e.printStackTrace();
            return ResponseEntity.status(HttpStatus.INTERNAL_SERVER_ERROR).build();
        }
    }

    @GetMapping("/health")
    public ResponseEntity<String> health() {
        return ResponseEntity.ok("✅ API de détection de crise opérationnelle");
    }
}