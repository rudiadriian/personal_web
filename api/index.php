<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Definisikan jalur bootstrap yang writable ke /tmp
$cachePath = '/tmp/bootstrap/cache';

// 2. Buat folder secara manual di memori sementara Vercel
if (!is_dir($cachePath)) {
    mkdir($cachePath, 0777, true);
}

// 3. Buat file manifest kosong agar Laravel tidak mencoba menulis ke folder Read-Only
// Ini trik supaya Laravel merasa file sudah "ada" dan bisa dipakai
touch($cachePath . '/packages.php');
touch($cachePath . '/services.php');

// 4. Load Autoloader
require __DIR__ . '/../vendor/autoload.php';

// 5. Load App
$app = require_once __DIR__ . '/../bootstrap/app.php';

// 6. PAKSA Laravel untuk melihat folder /tmp sebagai folder bootstrap-nya
$app->bind('path.bootstrap', function () {
    return '/tmp/bootstrap';
});

// 7. Alihkan juga storage ke /tmp
$app->useStoragePath('/tmp/storage');

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
