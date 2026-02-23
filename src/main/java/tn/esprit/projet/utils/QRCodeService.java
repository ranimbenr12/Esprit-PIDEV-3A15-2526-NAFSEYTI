package tn.esprit.projet.utils;

import com.google.zxing.BarcodeFormat;
import com.google.zxing.EncodeHintType;
import com.google.zxing.WriterException;
import com.google.zxing.common.BitMatrix;
import com.google.zxing.qrcode.QRCodeWriter;
import javafx.scene.image.Image;
import javafx.scene.image.PixelWriter;
import javafx.scene.image.WritableImage;
import javafx.scene.paint.Color;

import java.util.HashMap;
import java.util.Map;

public class QRCodeService {

    private static final int QR_CODE_SIZE = 300;

    /**
     * Generate Google Maps URL for a location
     */
    public static String generateGoogleMapsUrl(String location, String eventTitle) {
        // Encode the location for URL
        String encodedLocation = location.replace(" ", "+");
        return "https://www.google.com/maps/search/?api=1&query=" + encodedLocation;
    }

    /**
     * Generate QR Code as JavaFX Image
     */
    public static Image generateQRCode(String data) {
        try {
            QRCodeWriter qrCodeWriter = new QRCodeWriter();

            // Set encoding hints
            Map<EncodeHintType, Object> hints = new HashMap<>();
            hints.put(EncodeHintType.CHARACTER_SET, "UTF-8");
            hints.put(EncodeHintType.MARGIN, 1);

            BitMatrix bitMatrix = qrCodeWriter.encode(
                    data,
                    BarcodeFormat.QR_CODE,
                    QR_CODE_SIZE,
                    QR_CODE_SIZE,
                    hints
            );

            // Convert to JavaFX Image
            return convertToJavaFXImage(bitMatrix);

        } catch (WriterException e) {
            e.printStackTrace();
            // Return a placeholder image or null
            return null;
        }
    }

    /**
     * Convert ZXing BitMatrix to JavaFX Image
     */
    private static Image convertToJavaFXImage(BitMatrix bitMatrix) {
        int width = bitMatrix.getWidth();
        int height = bitMatrix.getHeight();

        WritableImage writableImage = new WritableImage(width, height);
        PixelWriter pixelWriter = writableImage.getPixelWriter();

        for (int y = 0; y < height; y++) {
            for (int x = 0; x < width; x++) {
                boolean isBlack = bitMatrix.get(x, y);
                if (isBlack) {
                    pixelWriter.setColor(x, y, Color.BLACK);
                } else {
                    pixelWriter.setColor(x, y, Color.WHITE);
                }
            }
        }

        return writableImage;
    }
}