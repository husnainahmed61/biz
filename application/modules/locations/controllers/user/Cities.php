<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 05-Jul-18
 * Time: 11:36 PM
 */
class Cities extends User_Controller
{
    private $response = [];
    private $moduleName ;

    /**
     * Cities constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'cities';
        $this->modulePath = "$this->moduleName/$this->userName";

        /*$this->load->module([
            'account/user/account',

        ]);*/

        $this->load->model('cities_m', 'citiesM', TRUE);



        /*$this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['jq-smartwizard'];

        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
        $this->setupNav();*/
    }

    public function getById($id)
    {
        return $this->citiesM->get(array('id' => $id));
    }
}