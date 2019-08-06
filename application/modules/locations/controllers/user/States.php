<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 05-Jul-18
 * Time: 12:34 AM
 */
class States extends User_Controller
{
    private $response = [];
    private $moduleName ;

    /**
     * States constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'states';
        $this->modulePath = "$this->moduleName/$this->userName";

        $this->load->model('states_m', 'statesM', TRUE);

    }

    public function getById($id)
    {
        return $this->statesM->get(array('id' => $id));
    }
}