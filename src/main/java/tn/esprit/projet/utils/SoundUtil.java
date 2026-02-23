package tn.esprit.projet.utils;

public class SoundUtil {

    private static boolean soundEnabled = true;

    public static void playNotificationSound() {
        if (soundEnabled) {
            System.out.println("🔔 Notification sound would play here");
            // In a real implementation with JavaFX Media, you'd play an actual sound
        }
    }

    public static void playClickSound() {
        if (soundEnabled) {
            System.out.println("👆 Click sound would play here");
            // In a real implementation with JavaFX Media, you'd play an actual sound
        }
    }

    public static void toggleSound() {
        soundEnabled = !soundEnabled;
        System.out.println("Sound " + (soundEnabled ? "enabled" : "disabled"));
    }

    public static boolean isSoundEnabled() {
        return soundEnabled;
    }
}