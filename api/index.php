<?php

$tmpPath = '/tmp/bootstrap/cache';

if (!is_dir($tmpPath)) {
    mkdir($tmpPath, 0777, true);
}

putenv("LARAVEL_PACKAGE_MANIFEST=$tmpPath/packages.php");
putenv("LARAVEL_SERVICES_CACHE=$tmpPath/services.php");

require __DIR__ . '/../public/index.php';
