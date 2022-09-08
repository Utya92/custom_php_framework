<?php
declare(strict_types=1);

namespace libs;


trait Singleton {
    static $instance = null;

    public static function getInstance(): self {
        if (static::$instance === null) {
            static::$instance = new static();
        }
        return self::$instance;
    }
}