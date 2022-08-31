<?php
declare(strict_types=1);

namespace FW\Core;
require $_SERVER['DOCUMENT_ROOT'] . '/FW/Static/Singleton.php';

use FW\Static\Singleton;



final class Application {
    use Singleton;
    public static ?Application $instance = null;
    private $__components = [];
    private $pager = null; // будет объект класса
    private $template = null;//будет объект класса

    protected function __construct() {
    }



}