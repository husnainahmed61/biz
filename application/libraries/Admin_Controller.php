<?php

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 10-Oct-17
 * Time: 4:24 PM
 */

class Admin_Controller extends MY_Base_Controller
{
    protected $userName = 'admin';

    function __construct()
    {
        parent::__construct();
        $this->load->module(
            'Template',
            'login'
        );
        $this->data['admin']['site_name'] = 'Saver - Admin';
    }

    protected function check_admin_authentication($url = NULL)
    {
        if (!$this->login->is_admin_logged_in()) {
            // echo "Authentication Failed";
            if(isset($url) && !empty($url))
            {
                redirect($url);
            }
            redirect('login/admin');
        }

    }
}