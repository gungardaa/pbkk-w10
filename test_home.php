<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

# Test home page
echo "Testing home page (GET /):\n";
try {
    $request = Illuminate\Http\Request::create('/', 'GET');
    $response = $kernel->handle($request);
    $content = $response->getContent();
    $status = $response->getStatusCode();
    
    echo 'Status: ' . $status . PHP_EOL;
    echo 'Content length: ' . strlen($content) . PHP_EOL;
    
    # Find and show error context
    if (strpos($content, 'Route [dashboard]') !== false) {
        $pos = strpos($content, 'Route [dashboard]');
        $start = max(0, $pos - 200);
        $end = min(strlen($content), $pos + 300);
        echo "\nContext around 'Route [dashboard]':\n";
        echo substr($content, $start, $end - $start) . "\n";
    }
    
    # Check what layout is being used
    if (strpos($content, 'adminlte') !== false) {
        echo "\n✓ AdminLTE CSS is included" . PHP_EOL;
    }
    if (strpos($content, 'Breeze') !== false) {
        echo "\n✗ Breeze content detected!" . PHP_EOL;
    }
    
} catch (Exception $e) {
    echo 'Exception: ' . get_class($e) . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}