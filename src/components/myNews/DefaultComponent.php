<?php

namespace src\components;

use src\core\component\base;

class DefaultComponent extends Base {

    public function __construct($id, $template, $params) {
        $this->params = $params;
        $this->__path = $_SERVER["DOCUMENT_ROOT"];
        parent::__construct($id, $template);
    }

    public function executeComponent() {
        $this->result['h1'] = $this->params['h1'];
        $this->template->render($this->result);
    }

}