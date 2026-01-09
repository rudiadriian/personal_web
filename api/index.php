<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. Setup folder sementara yang writable
$cachePath = '/tmp/bootstrap/cache';
$storagePath = '/tmp/storage';

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

// 2. Paksa Laravel mengabaikan manifest lama dari laptop
putenv("LARAVEL_PACKAGE_MANIFEST=$cachePath/packages.php");
putenv("LARAVEL_SERVICES_CACHE=$cachePath/services.php");

require __DIR__ . '/../vendor/autoload.php';

$app = require_once __DIR__ . '/../bootstrap/app.php';

// 3. Set jalur storage ke /tmp
$app->useStoragePath($storagePath);

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
