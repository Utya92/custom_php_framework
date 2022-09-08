<?php
declare(strict_types=1);

namespace core;

use libs\Singleton;

class Page {
    use Singleton;

    public Application $application;

    public array $pageContainer;
    private const JS_MACROS = "#MOCK_JS#";
    private const CSS_MACROS = "#MOCK_CSS#";
    private const STR_MACROS = "#MOCK_STR#";


    /* я понимаю, что говнокод, но создание объекта класса Page
    в конструкторе бьёт ошибку на 7.4-8.0-8.1 версиях языка по переполнению памяти(что очень странно),
   но через метод всё хорошо работает,а выделять больше памяти через ini конфиг пхпшный такое себе решение */
    public function getApplicationObject(): Page {
        $this->application = Application::getInstance();
        return $this;
    }


    //unique
    public function addJs(string $src): Page {
        $this->pageContainer[self::JS_MACROS][] = "<script src='$src'></script>";
        $this->pageContainer[self::JS_MACROS] = array_unique($this->pageContainer[self::JS_MACROS]);
        return $this;
    }

    //unique
    public function addCss(string $link): Page {
        $this->pageContainer[self::CSS_MACROS][] = "<link rel='stylesheet' href='$link'>";
        $this->pageContainer[self::CSS_MACROS] = array_unique($this->pageContainer[self::CSS_MACROS]);
        return $this;
    }

    //not unique
    public function addString(string $str): Page {
        $this->pageContainer[self::STR_MACROS][] = $str;
        return $this;
    }

    public function setProperty(string $id, string $value): Page {
//        $id = "#MOCK_PROPERTY_" . strtoupper($id) . "#";
        $this->pageContainer["PROPERTY"][$id] = $value;
        return $this;
    }

    public function showProperty(string $id): Page {
//        $isExist = $this->pageContainer["property"]["#MOCK_PROPERTY_" . strtoupper($id) . "#"] ?? '';
        $isExist = $this->pageContainer["PROPERTY"]["$id"] ?? '';
        if ($isExist) {
            echo "$id" . "<br>";
        } else echo "such property doesn't exist";
        return $this;
    }

    public function showHead(): Page {
        echo self::JS_MACROS . "<br>";
        echo self::CSS_MACROS . "<br>";
        echo self::STR_MACROS . "<br>";
        return $this;
    }

    public function getAllReplace(): array {
        return $this->pageContainer;
    }






//    public array $jsArr = [];
//    public array $cssArr = [];
//    public array $stringsArr = [];
//    public array $propertyArr = []; // id tega i value   $page->setProperty("h2", "phones");$page->setProperty("h1", "computers")
//    public array $replaceArr = ["mockTitle","mockContent","mockFooter"];
//
//    public array $tests = [];
//
//    protected function __construct() {
//    }
//
//
//
//
////    public function isUnique(string $value): string {
////        foreach ($this->jsArr as $item) {
////            if ($item === $value) {
////              break;
////            }
////        }
////        return $value;
////    }
//
//    public function addJs(string $src): void {
//        $this->jsArr[] = " <script src='$src'></script>";
//        $this->jsArr = array_unique($this->jsArr);
//
//
//    }
//
//    public function addCss(string $link): void {
//        $this->cssArr[] = "<link rel='stylesheet' href='$link'>";
//        $this->cssArr = array_unique($this->jsArr);
//    }
//
//    public function addString(string $str): void {
//        $this->stringsArr[] = $str;
//    }
//
//    public function setProperty(string $id, mixed $value): void {
//        //unique
//        $this->propertyArr[$id] = $value;
//    }
//
//    public function getProperty(string $id): string { // ретурн вэлью
//        return $this->propertyArr["$id"];
//    }
//
//    public function showProperty(string $id): void {
//        // выводит макрос для будущей замены #FW_PAGE_PROPERTY_{$id}#  mockContent -> на элью из гет проперти
//
//
//    }
}






//Page::showProperty(string $id) // выводит макрос для будущей замены
//#FW_PAGE_PROPERY_{$id}#
//Page::getAllReplace() // получает массив макросов и значений для замены
//Page::showHead() // выводит 3 макроса замены CSS / STR / JS


