<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 03-Jan-18
 * Time: 2:52 PM
 */

class Products extends User_Controller
{
    private $response = [];
    private $moduleName ;
    private $modulePath ;


    function __construct()
    {
        parent::__construct();
        $this->moduleName = 'products';
        $this->modulePath = "$this->moduleName/$this->userName";


        $this->data['user']['pageHeader'] = 'Products';

        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/
        $this->data['user']['head']['pageLevelPlugins']['css'] =   ['jq-swipebox'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] =    ['jq-zoom','jq-swipebox'];
        $this->data['user']['page_js'] = 'products/user/user-js';
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";


        $this->load->library('my_encrypt');
    }

    public function index()
    {

        //echo"A";
        $this->data['user']['content_view'] = "$this->modulePath/show_v";
        $this->setupHeader1();
        $this->setupNav();
        $this->template->setup_template($this->data['user']);
    }

   public function quickview($id = NULL){
        $this->load->view("$this->modulePath/quick_v");
   }
}

