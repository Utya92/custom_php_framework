<?php
declare(strict_types=1);

namespace core;

use libs\Singleton;

final class Application {
    use Singleton;

    private array $components;
    public Page $pager; // объект класса Page
    private string $template;//full news path

    private function __construct() {
        $this->pager = Page::getInstance();
        $this->template = TEMPLATE_PATH . Config::get('templates/id'); //путь до темплейтс//news - localhost/templates/news
    }

    public function startBuffer(): Application {
        ob_start();
        return $this;
    }

    //D:/OpenServer/OSPanel/domains/localhost/manao-framework-stage_2/fw/views/templates/header.php
    //D:/OpenServer/OSPanel/domains/localhost/templates/news/header.php
    public function connectHeader(): Application {
        require $this->template . '/header.php';
        return $this;
    }

    public function connectContent(): Application {
        require $this->template . '/content.php';
        return $this;
    }

    public function connectFooter(): Application {
        require $this->template . '/footer.php';
        return $this;
    }

    public function restartBuffer(): Application {
        ob_clean();
        return $this;
    }

    public function offBuffer(): Application {
        ob_end_clean();
        return $this;
    }

    public function showProjectChanges(): Application {
        require "projectChanges.php";
        return $this;
    }

    public function render(): Application {
        $bufferContent = ob_get_contents();
        $this->restartBuffer();
        $replaceArr = $this->pager->getAllReplace();
        $bufferReplace = str_replace(array_keys($replaceArr["PROPERTY"]), array_values($replaceArr["PROPERTY"]), $bufferContent);
        echo $bufferReplace;
        return $this;
    }
}








