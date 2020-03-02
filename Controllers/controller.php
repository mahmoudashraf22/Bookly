<?php

class Controller
{
    protected $controller;
    protected $action;
    protected $params;
    protected $data = [];


    public function setController($controller)
    {
        $this->controller = $controller;
    }
    public function setAction($action)
    {
        $this->action = $action;
    }
    public function setParams($params)
    {
        $this->params = $params;
    }

    public function view(){
        require_once ROOT.DS.'include/header.include.php';
        require_once ROOT.DS.'include'.DS.$this->controller.DS.$this->action.'.include.php';
        require_once ROOT.DS.'Template/header.php';
        require_once ROOT.DS.'Views'.DS.$this->controller.DS.$this->action.'.view.php';
        require_once ROOT.DS.'Template/footer.php';
    }

    public function notfound(){
        $this->controller = 'notfound';
        $this->view();
    }
}