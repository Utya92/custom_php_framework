<?php
declare(strict_types=1);

namespace src\libs;


trait Singleton {
    private static $instance;

    public static function getInstance(): self {
        if (!isset(self::$instance)) {
            self::$instance = new static();
        }

        return self::$instance;
    }
}