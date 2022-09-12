<?php
declare(strict_types=1);

namespace core;

class Config {

    //input str "templates/id
    public static function get($path): string {
        $source = require_once('config.php');
        $path = explode('/', $path);
        foreach ($path as $el) {
            $source = $source[$el];
        }
        return $source; // news
    }
}