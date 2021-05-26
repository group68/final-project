<?php

class ProductsController extends VanillaController
{
    function beforeAction()
    {
    }

    function view($id = null)
    {
        $this->Product->id = $id;
        $this->Product->showHasOne();
        $this->Product->showHMABTM();
        $product = $this->Product->search();

        $this->set_template_variable('product', $product);
    }


    function afterAction()
    {
    }
}
