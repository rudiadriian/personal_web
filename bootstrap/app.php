<?php

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

// PENTING: Pindahkan jalur bootstrap cache ke /tmp agar Laravel bisa menulis manifest
if (isset($_SERVER['VERCEL_URL'])) {
    $app->useStoragePath('/tmp/storage');

    // Paksa Laravel menganggap folder bootstrap berada di /tmp
    $app->bind('path.bootstrap', function () {
        return '/tmp/bootstrap';
    });
}

$app->singleton(
    Illuminate\Contracts\Http\Kernel::class,
    App\Http\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Console\Kernel::class,
    App\Console\Kernel::class
);

$app->singleton(
    Illuminate\Contracts\Debug\ExceptionHandler::class,
    App\Exceptions\Handler::class
);

return $app;
