<?php

use Illuminate\Http\Request;

define('LARAVEL_START', microtime(true));

// 1. TAMBAHKAN KODE INI DI ATAS: Paksa folder cache ke /tmp
if (isset($_SERVER['VERCEL_URL'])) {
    $cachePath = '/tmp/bootstrap/cache';
    if (!is_dir($cachePath)) {
        mkdir($cachePath, 0777, true);
    }
    // Set environment variable agar Laravel tahu lokasi manifest
    putenv("LARAVEL_PACKAGE_MANIFEST=$cachePath/packages.php");
    putenv("LARAVEL_SERVICES_CACHE=$cachePath/services.php");
}

if (file_exists(__DIR__.'/../storage/framework/maintenance.php')) {
    require __DIR__.'/../storage/framework/maintenance.php';
}

require __DIR__.'/../vendor/autoload.php';

$app = require_once __DIR__.'/../bootstrap/app.php';

// 2. TAMBAHKAN KODE INI: Override manual storage path
if (isset($_SERVER['VERCEL_URL'])) {
    $app->useStoragePath('/tmp/storage');
}

$kernel = $app->make(Illuminate\Contracts\Http\Kernel::class);

$response = $kernel->handle(
    $request = Request::capture()
)->send();

$kernel->terminate($request, $response);
