<?php

class Bootstrap
{
    protected $controller = 'index';
    protected $action     = 'default';
    protected $params     = array();

    public function __construct(){
        $this->_parseUrl();
    }
    public function getController()
    {
        return $this->controller;
    }
    public function getAction()
    {
        return $this->action;
    }

    private function _parseUrl(){
        $url = explode('/', trim(parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH), '/'), 4);
        if(isset($url[0]) && $url[0] != ''){
            $this->controller = $url[0];
        }
        if(isset($url[1]) && $url[1] != ''){
            $this->action = $url[1];
        }
        if(isset($url[2]) && $url[2] != ''){
            $this->params = explode('/', $url[2]);
        }
    }

    public function dispatch(){
        $controller_class_name = ucfirst($this->controller) . 'Controller';
        $action_name = $this->action;

        if(!class_exists($controller_class_name)){
            $controller_class_name = 'NotFoundController';
            $this->controller = 'notfound';
        }
        $controller = new $controller_class_name();
        if(!method_exists($controller, $action_name)){
            $this->action = $action_name = 'notfound';
        }

        $controller->setController($this->controller);
        
        $controller->setAction($this->action);
        $controller->setParams($this->params);
        $controller->$action_name();
    }
}