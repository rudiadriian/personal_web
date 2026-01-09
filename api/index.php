<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Definisikan jalur folder sementara di Vercel
$cachePath = '/tmp/bootstrap/cache';
$storagePath = '/tmp/storage';

// 2. Buat folder jika belum ada
$paths = [
    $cachePath,
    $storagePath . '/framework/views',
    $storagePath . '/framework/cache',
    $storagePath . '/framework/sessions',
];

foreach ($paths as $path) {
    if (!is_dir($path)) {
        mkdir($path, 0777, true);
    }
}

// 3. FORCE: Jangan biarkan Laravel mencari file manifest di folder asli
// Ini akan memaksa Laravel membangun ulang daftar package tanpa Sail di Vercel
putenv("LARAVEL_PACKAGE_MANIFEST=$cachePath/packages.php");
putenv("LARAVEL_SERVICES_CACHE=$cachePath/services.php");

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// 4. Override jalur storage
$app->useStoragePath($storagePath);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
