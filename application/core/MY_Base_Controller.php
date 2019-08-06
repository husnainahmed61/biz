<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 17-Jul-17
 * Time: 12:13 PM */

class MY_Base_Controller extends MX_Controller
{
    public $data = array('admin', 'user', 'moderator');

    /**     * Base_Controller constructor.     */
    function __construct()
    {        // $this->output->enable_profiler(TRUE);
        parent::__construct();
        $this->data['errors'] = array();
        $this->data['site_name'] = config_item('site_name');
        $this->load->library('my_encrypt');
    }
} 