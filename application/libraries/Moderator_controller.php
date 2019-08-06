<?php

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 25-Jan-18
 * Time: 2:30 PM
 */
class Moderator_Controller extends MY_Base_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->module(
            'Template',
            'login'
        );
        $this->data['moderator']['site_name'] = 'StopShop 360';
    }

    protected function check_moderator_authentication($url = NULL)
    {
        if (!$this->login->is_moderator_logged_in()) {
            // echo "Authentication Failed";
            if(isset($url) && !empty($url))
            {
                redirect($url);
            }
            redirect('login/admin');
        }

    }
}