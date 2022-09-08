<?php
declare(strict_types=1);

namespace controller;

use core\Application;

class AppController {
    public function __construct() {
        $application = Application::getInstance();
        $application
            ->startBuffer()
            ->connectHeader()
            ->pager->showHead()
            ->getApplicationObject()
            ->application
            ->showProjectChanges()
            ->connectContent()
            ->connectFooter()
            ->pager->setProperty("mockTitle", "Utya-quack")
            ->setProperty("mockContent", "some ducks content")
            ->setProperty("mockFooter", "all rights reserved by the U.S. Duck Department")
            ->addString("utya-limon")
            ->addString("utya-grush")
            ->addString("utya-pirog")
            ->addJs("some js_script")
            ->addJs("some js_script")// тест уникальности
            ->addJs("next js_script")
            ->application->render();
    }
}
