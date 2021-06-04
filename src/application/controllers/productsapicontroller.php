<?php

class ProductsApiController extends ApiController
{
    function search()
    {
        if (!isset($this->_requestData['q'])) {
            return false;
        }

        return [1, 2, 3, $this->_requestData['q']];
    }
}
