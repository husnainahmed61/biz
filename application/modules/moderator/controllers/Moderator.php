<?php

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 25-Jan-18
 * Time: 2:29 PM
 */
class Moderator extends Moderator_Controller
{

    /**
     * Moderator constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->module([
            'login',
            'orders',
            'products',
            'test',
            'invoices',
            'customers',

        ]);
        $this->check_moderator_authentication();
    }

    public function index()
    {

    }
}