<?php

/**
 * Bootstrap for Recaptcha classes.
 */

$paths = [
    __DIR__ . '/../vendor/autoload.php',
    __DIR__ . '/../../../autoload.php',
];

foreach ($paths as $path) {
    if (file_exists($path)) {
        require_once $path;

        return;
    }
}

throw new Exception('Composer autoloader could not be found. Install dependencies with `composer install` and try again.');