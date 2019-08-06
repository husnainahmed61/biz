<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 04-Jul-18
 * Time: 1:57 AM
 */
class Countries extends User_Controller
{

    private $response = [];
    private $moduleName ;

    /**
     * Countries constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'countries';
        $this->modulePath = "$this->moduleName/$this->userName";

        /*$this->load->module([
            'account/user/account',

        ]);*/

        $this->load->model('countries_m', 'countriesM', TRUE);



        /*$this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['jq-smartwizard'];

        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
        $this->setupNav();*/
    }

    public function getById($id)
    {
        return $this->countriesM->get(array('id' => $id));
    }
}