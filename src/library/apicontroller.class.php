<?php

class ApiController
{
    protected $_controllerName;
    protected $_action;
    protected $_queryString;

    function __construct($controllerName, $action, $queryString)
    {
        global $inflect;

        $this->_controllerName = $controllerName;
        $this->_action = $action;
        $this->_queryString = $queryString;

        $modelClassName = ucfirst($inflect->singularize($controllerName));
        $this->$modelClassName = new $modelClassName;

        header("Content-Type: application/json; charset=UTF-8");
    }

    protected function beforeAction()
    {
    }

    protected function afterAction()
    {
    }

    function execute()
    {
        $this->beforeAction();

        $result = call_user_func_array(array($this, $this->_action), $this->_queryString);
        if ($result) {
            echo json_encode($result);
        } else {
            echo "{}";
        }

        $this->afterAction();
    }
}
