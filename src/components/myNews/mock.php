<?php

namespace src\components\myNews;

use src\core\component\base;

class Def extends Base {

    public function __construct($id, $template, $params) {
        $this->params = $params;
        $this->__path = $_SERVER["DOCUMENT_ROOT"];
        parent::__construct($id, $template);
    }

    public function executeComponent() {
        $this->result  = $this->params ;
        $this->template->render($this->result);
    }

}