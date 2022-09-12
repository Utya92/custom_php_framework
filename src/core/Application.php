<?php
declare(strict_types=1);

namespace src\core;

use src\core\type\Request;
use src\core\type\Server;
use src\libs\Singleton;


final class Application {
    use Singleton;

    private array $__components = [];
    public Page $pager; // объект класса Page
    private string $template;//full news path
    private Request $request;
    private Server $server;


    private function __construct() {
        $this->pager = Page::getInstance();
        $this->template = TEMPLATE_PATH . Config::get('views/id'); //путь до темплейтс//news - localhost/templates/news
        $this->request = new Request();
        $this->server = new Server();
    }


    /*
* $component - неймспейс:id подключаемого компонента
* $template - id шаблона подключаемого компонента
* $params - массив входящих параметров
* метод подключает компонент, инициализирует его по указанным параметрам.
* Основная задача, понять какой класс подключать и не подключить его
повторно
  */
    public function includeComponent(string $component, string $template, array $params) {
        require_once $_SERVER["DOCUMENT_ROOT"] . "/FW/src/components/$component/DefaultComponent.php";
        $idName = $component; // myNews
        if (!isset($this->__components[$component])) {
            //с помощью рефлексии получаем все классы в массив
            $allClasses = get_declared_classes();
            //узнать предка
            foreach ($allClasses as $class) {
                if (is_subclass_of($class, BASE_CLASS_PATH)) {
                    $this->__components[$component] = $class;
                    break;
                }
            }
        }
        //получаем алиас класса компонента
        $class = $this->__components[$component];
        // по алиасу создаём класс и запихиваем в его конструктор параметры
        $createComponent = (new $class($idName, $template, $params));
        $createComponent->executeComponent();
    }

    public function getRequest(): Request {
        return $this->request;
    }

    public function getServer(): Server {
        return $this->server;
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
        if ($this->checkProperty()) {
            $temp = array_pop($swapArr);
            $buff = str_replace(array_keys($temp), array_values($temp), $buff);
        }
        $buff = str_replace(array_keys($swapArr), array_values($swapArr), $buff);

        echo $buff;
    }
}








