<?php
declare(strict_types=1);

namespace src\core;

use src\libs\Singleton;

class Page {
    use Singleton;

    public array $pageContainer = [];
    private const JS_MACROS = "#MOCK_JS#";
    private const CSS_MACROS = "#MOCK_CSS#";
    private const STR_MACROS = "#MOCK_STR#";

    private function __construct() {
    }

    //unique
    public function addJs(string $src) {
        $this->pageContainer[self::JS_MACROS][] = "<script src ='{$src}'></script>";
        $this->pageContainer[self::JS_MACROS] = array_unique($this->pageContainer[self::JS_MACROS]);
    }

    //unique
    public function addCss(string $link) {
        $this->pageContainer[self::CSS_MACROS][] = "<link rel='stylesheet' href='{$link}'>";
        $this->pageContainer[self::CSS_MACROS] = array_unique($this->pageContainer[self::CSS_MACROS]);
    }

    //array(1) { ["#MOCK_STR#"]=> array(1) { [0]=> string(3) "byr" } }
    //not unique просто стринг для вывода в head титла для браузера
    public function addString(string $str) {
        $this->pageContainer[self::STR_MACROS][] = $str;
    }

//array(1) { ["PROPERTY"]=> array(1) { ["id"]=> string(3) "byr" } }
//Array([PROPERTY] => array([title] => История изменений))
    public function setProperty(string $id, string $value) {
        $this->pageContainer["PROPERTY"][$id] = $value;
    }

    //по ключу титл например я должен получить стринг(неточно)
    public function getProperty(string $id) {
        return $this->pageContainer["PROPERTY"][$id]??'';
    }

    public function showProperty(string $id) {
        echo $this->pageContainer["PROPERTY"][$id] ?? '';
    }

    //сесли есть такой ключ то запиши его го вэлью в качестве строки по этому ключу
    public function getAllReplace(): array {
        $swapArr = [];
        if (array_key_exists(self::JS_MACROS, $this->pageContainer)) {
            $swapArr[self::JS_MACROS] = implode("\n", $this->pageContainer[self::JS_MACROS]);
        }
        if (array_key_exists(self::CSS_MACROS, $this->pageContainer)) {
            $swapArr[self::CSS_MACROS] = implode("\n", $this->pageContainer[self::CSS_MACROS]);
        }
        if (array_key_exists(self::STR_MACROS, $this->pageContainer)) {
            $swapArr[self::STR_MACROS] = implode("\n", $this->pageContainer[self::STR_MACROS]);
        }
        if (array_key_exists("PROPERTY", $this->pageContainer)) {
            $swapArr["PROPERTY"] = $this->pageContainer["PROPERTY"];
        }
        return $swapArr;
    }

    //важно выводить только тот макрос из 3 который есть, те или все 3 или 2 1 0
    //метод выводит из массива макрос а геталлреплей подменяет этот макрос методом рендер
    //на значения из массива
    public static function showHead() {
        echo self::JS_MACROS . "<br>";
        echo self::CSS_MACROS . "<br>";
        echo self::STR_MACROS . "<br>";
    }

}


