<?php
require __DIR__.'/vendor/autoload.php';
$app = require __DIR__.'/bootstrap/app.php';
$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);
$kernel->bootstrap();

# Test dashboard route
echo "Testing dashboard route (GET /dashboard):\n";
try {
    $request = Illuminate\Http\Request::create('/dashboard', 'GET');
    $response = $kernel->handle($request);
    $content = $response->getContent();
    $status = $response->getStatusCode();
    
    echo 'Status: ' . $status . PHP_EOL;
    echo 'Content length: ' . strlen($content) . PHP_EOL;
    echo 'First 200 chars: ' . substr($content, 0, 200) . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception: ' . get_class($e) . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}

echo "\n";

# Test admin dashboard route
echo "Testing admin dashboard route (GET /admin/dashboard):\n";
try {
    $request = Illuminate\Http\Request::create('/admin/dashboard', 'GET');
    $response = $kernel->handle($request);
    $content = $response->getContent();
    $status = $response->getStatusCode();
    
    echo 'Status: ' . $status . PHP_EOL;
    echo 'Content length: ' . strlen($content) . PHP_EOL;
    echo 'First 200 chars: ' . substr($content, 0, 200) . PHP_EOL;
} catch (Exception $e) {
    echo 'Exception: ' . get_class($e) . PHP_EOL;
    echo 'Message: ' . $e->getMessage() . PHP_EOL;
}