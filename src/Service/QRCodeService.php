<?php

namespace App\Service;

/**
 * QR Code generation service — PHP equivalent of the Java ZXing-based QRCodeService.
 *
 * Uses the free qrserver.com API (same approach as ZXing: encode data → get image).
 * Falls back to a GD-generated placeholder if the API is unreachable.
 */
class QRCodeService
{
    private const QR_CODE_SIZE = 300;

    /**
     * Generate Google Maps URL for a location.
     * Mirrors: QRCodeService.generateGoogleMapsUrl(location, eventTitle)
     */
    public static function generateGoogleMapsUrl(string $location, string $eventTitle = ''): string
    {
        return 'https://www.google.com/maps/search/?api=1&query=' . urlencode($location);
    }

    /**
     * Generate QR Code as base64-encoded PNG string.
     * Mirrors: QRCodeService.generateQRCode(data) → JavaFX Image
     *
     * Uses qrserver.com API which internally uses the same QR encoding
     * as ZXing (ISO 18004 standard), with UTF-8 charset and margin=1.
     *
     * @return string  data:image/png;base64,... ready for <img src="...">
     */
    public static function generateQRCode(string $data): string
    {
        $url = sprintf(
            'https://api.qrserver.com/v1/create-qr-code/?size=%dx%d&charset-source=UTF-8&margin=4&data=%s',
            self::QR_CODE_SIZE,
            self::QR_CODE_SIZE,
            urlencode($data)
        );

        $ch = curl_init($url);
        curl_setopt_array($ch, [
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_TIMEOUT        => 8,
            CURLOPT_SSL_VERIFYPEER => false,
        ]);
        $imageData = curl_exec($ch);
        $httpCode  = curl_getinfo($ch, CURLINFO_HTTP_CODE);
        curl_close($ch);

        if ($httpCode === 200 && $imageData) {
            return 'data:image/png;base64,' . base64_encode($imageData);
        }

        // Fallback: generate a minimal QR-like placeholder using GD
        // (mirrors the BitMatrix → WritableImage conversion in Java)
        return self::generatePlaceholderWithGD($data);
    }

    /**
     * GD-based placeholder — mirrors convertToJavaFXImage(BitMatrix).
     * Draws a simple black-on-white grid pattern as a visual fallback.
     */
    private static function generatePlaceholderWithGD(string $data): string
    {
        $size = self::QR_CODE_SIZE;
        $img  = imagecreatetruecolor($size, $size);

        $white = imagecolorallocate($img, 255, 255, 255);
        $black = imagecolorallocate($img, 0, 0, 0);
        $green = imagecolorallocate($img, 40, 89, 33);

        // White background (mirrors Color.WHITE pixels)
        imagefill($img, 0, 0, $white);

        // Draw a simple border pattern (mirrors the QR finder patterns)
        $border = 20;
        imagerectangle($img, $border, $border, $size - $border, $size - $border, $black);
        imagerectangle($img, $border + 5, $border + 5, $size - $border - 5, $size - $border - 5, $black);

        // Center message
        $text = 'QR indisponible';
        $tw   = imagefontwidth(4) * strlen($text);
        imagestring($img, 4, (int)(($size - $tw) / 2), (int)($size / 2) - 8, $text, $green);

        $sub  = 'Vérifiez la connexion';
        $sw   = imagefontwidth(2) * strlen($sub);
        imagestring($img, 2, (int)(($size - $sw) / 2), (int)($size / 2) + 10, $sub, $black);

        ob_start();
        imagepng($img);
        $png = ob_get_clean();
        imagedestroy($img);

        return 'data:image/png;base64,' . base64_encode($png);
    }
}
