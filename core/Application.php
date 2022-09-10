<?php
declare(strict_types=1);

namespace core;

use libs\Singleton;

final class Application {
    use Singleton;

    private array $components = [];
    public Page $pager; // объект класса Page
    private string $template;//full news path

    private function __construct() {
        $this->pager = Page::getInstance();
        $this->template = TEMPLATE_PATH . Config::get('templates/id'); //путь до темплейтс//news - localhost/templates/news
    }

    public function startBuffer() {
        ob_start();
    }

    public function restartBuffer() {
        ob_clean();
    }

    public function closeBuffer() {
        ob_end_clean();
    }

    public function header() {
        $this->startBuffer();
        require $this->template . '/header.php';
    }

    public function footer() {
        require $this->template . '/footer.php';
        $this->render();

    }

    public function checkProperty(): bool {
        if (array_key_exists('PROPERTY', $this->pager->getAllReplace())) {
            return true;
        }
        return false;
    }


    public function render() {
        $buff = ob_get_contents();
        ob_clean();
        $swapArr = $this->pager->getAllReplace();
        $replaceArr = null;
        if ($this->checkProperty()) {
            $temp = array_pop($swapArr);
            $replaceArr = str_replace(array_keys($temp), array_values($temp), $buff);
        }
            $replaceArr = str_replace(array_keys($swapArr), array_values($swapArr), $replaceArr);

        echo $replaceArr;
    }
}








