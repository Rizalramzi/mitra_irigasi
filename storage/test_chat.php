<?php

require __DIR__ . '/../vendor/autoload.php';

// Bootstrap Laravel
$app = require_once __DIR__ . '/../bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

$request = Illuminate\Http\Request::create('/api/chat', 'POST', [
    'messages' => [
        [
            'sender' => 'user',
            'text' => 'Apa itu Arka Irrigations?'
        ]
    ]
]);

// Handle validation manually if needed, or pass directly to controller
echo "Invoking ChatController->send() directly for 'Arka Irrigations'...\n";
$start = microtime(true);
try {
    $controller = new App\Http\Controllers\ChatController();
    $response = $controller->send($request);
    $duration = microtime(true) - $start;

    $out = "Status: " . $response->getStatusCode() . "\n";
    $out .= "Duration: " . round($duration, 2) . "s\n";
    $out .= "Content:\n" . $response->getContent() . "\n";

    file_put_contents(__DIR__ . '/test_chat_out.txt', $out);
    echo "Successfully saved output to storage/test_chat_out.txt in " . round($duration, 2) . " seconds\n";
} catch (\Exception $e) {
    echo "Exception occurred: " . $e->getMessage() . "\n";
    echo $e->getTraceAsString() . "\n";
}
