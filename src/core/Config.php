<?php
declare(strict_types=1);

namespace src\core;

class Config {

    public static function get($path): string {
        $source = require_once('src/Config.php');
        $path = explode('/', $path);
        foreach ($path as $el) {
            $source = $source[$el];
        }
        return $source; // news
    }
}