<?php

namespace src\core\component;

use src\core\Page;

class Template {
    //путь к файловой структуре шаблона
    public string $__path;
    //url к файловой структуре шаблона
    public string $__relativePath;
    //строковый id компонента
    public string $id;

//base componentID template.php(что в нем должно быть?)
    public function __construct(string $id, string $path, string $template) {
        $this->id = $id;
        $this->__relativePath = "$path/src/components/$id/templates/$template/";
        $this->__path = "src/components/$id/templates/$template/";
    }

    /*
    * должен подключать файл шаблона
    * + стили и js
    * $page - страница подключения в шаблоне
    */
    public function render(array $result, string $page = "template") {
        $pager = Page::getInstance();
        //добавление в макросс жс/цсс скриптов
        if (file_exists($this->__path) . "script.js") {
            $pager->addJs($this->__path . "script.js");
        }
        if (file_exists($this->__path) . "style.css") {
            $pager->addCss($this->__path . "style.css");
        }
        //если страница существует - подключаем(по дефолту template.php)
        if (file_exists($this->__path) . $page . '.php') {
            include($this->__path . $page . '.php');
        }
    }
}