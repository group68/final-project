<?php

class VanillaController
{
    protected $_controllerName;
    protected $_action;
    protected $_template;
    protected $_queryString;

    public $doNotRenderHeader;
    public $render;

    function __construct($controllerName, $action, $queryString)
    {
        global $inflect;

        $this->_controllerName = $controllerName;
        $this->_action = $action;
        $this->_queryString = $queryString;

        $modelClassName = ucfirst($inflect->singularize($controllerName));
        $this->doNotRenderHeader = false;
        $this->render = true;
        $this->$modelClassName = new $modelClassName;
        $this->_template = new Template($controllerName, $action);
    }

    function set_template_variable($name, $value)
    {
        $this->_template->set($name, $value);
    }

    function renderView()
    {
        if ($this->render) {
            $this->_template->render($this->doNotRenderHeader);
        }
    }

    function renderError()
    {
        $this->_template->renderError($this->doNotRenderHeader);
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

        if (call_user_func_array(array($this, $this->_action), $this->_queryString)) {
            $this->renderView();
        } else {
            $this->renderError();
        }

        $this->afterAction();
    }
}
