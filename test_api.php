<?php
$apiKey = 'AIzaSyCbkDLkll7LuLqbe4ydV6LwCVPdP9nJ2LY';
$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . $apiKey;

// Désactiver la vérification SSL (temporairement)
$context = stream_context_create([
    'ssl' => [
        'verify_peer' => false,
        'verify_peer_name' => false,
    ]
]);

$response = file_get_contents($url, false, $context);
echo "Response: " . $response;