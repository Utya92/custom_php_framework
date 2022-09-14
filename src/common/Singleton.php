<?php
declare(strict_types=1);

namespace src\common;


trait Singleton {
    private static $instance;

    public static function getInstance(): self {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}