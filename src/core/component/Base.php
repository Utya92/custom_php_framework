<?php

namespace src\core\component;

abstract class Base {

//массив с результатом работы комопнента
    public array $result;

//строковый id компонента
    public string $id;

    //входящие параметры компонента
    public array $params;

// экземпляр класса шаблона компонента
    public $template;

//путь к файловой структуре компонента  !!!!!!!!!!!!!!!!!!!!!!!!!!!!!
    public $__path;


//заполнение свойств. Объявление шаблона
    public function __construct($id, $template) {
        $this->template = new Template($id, $this->__path, $template);
    }


    //должен быть оверврайт
    //массив с результатом работы комопнента
    //result arr
    //входящие параметры компонента
    //params
    //что будет делать в оверайде
    abstract protected function executeComponent();
}


//Template Base как связанны,?
//придется создать кастом класс экстендящий Base(где создать?)
//каждый компонент в теории может иметь класс экстендящий Base
// - > создать в Base класс -> реализовать абстракцию в пекедже id компонента