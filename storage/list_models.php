<?php

require __DIR__ . '/../vendor/autoload.php';

// Dynamically load the .env file to get the exact configuration
$envPath = __DIR__ . '/../.env';
if (file_exists($envPath)) {
    $lines = file($envPath, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    foreach ($lines as $line) {
        if (strpos(trim($line), '#') === 0) continue;
        list($name, $value) = explode('=', $line, 2);
        $name = trim($name);
        $value = trim($value);
        if (preg_match('/^"(.*)"$/', $value, $matches)) {
            $value = $matches[1];
        }
        $_ENV[$name] = $value;
    }
}

$apiKey = $_ENV['GEMINI_API_KEY'] ?? '';

if (empty($apiKey)) {
    file_put_contents(__DIR__ . '/models_response.json', json_encode(['error' => 'API Key Empty']));
    exit(1);
}

$url = "https://generativelanguage.googleapis.com/v1beta/models?key=" . rawurlencode($apiKey);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, ['Content-Type: application/json']);
$response = curl_exec($ch);
$httpCode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
curl_close($ch);

$result = [
    'http_code' => $httpCode,
    'response' => json_decode($response, true) ?? $response
];

file_put_contents(__DIR__ . '/models_response.json', json_encode($result, JSON_PRETTY_PRINT));
echo "Done. Saved to models_response.json with HTTP Code $httpCode\n";
