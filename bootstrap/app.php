<?php

$app = new Illuminate\Foundation\Application(
    $_ENV['APP_BASE_PATH'] ?? dirname(__DIR__)
);

/*
| Konfigurasi Khusus Vercel
| Kita alihkan folder storage dan cache ke /tmp agar tidak Error 500
*/
if (isset($_SERVER['VERCEL_URL'])) {
    // Gunakan folder /tmp untuk storage (sessions, views, cache)
    $app->useStoragePath('/tmp/storage');

    // Paksa folder bootstrap cache ke /tmp agar bisa ditulis (Writable)
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
