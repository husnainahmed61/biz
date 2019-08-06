<?php

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 5:27 PM
 */

class Cart extends MY_Base_Controller
{

    /**
     * Cart constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->module([
            'dresscategories',
            'standarddesigns'
        ]);
    }

    public function index()
    {
        echo "Cart";
    }
}
