<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 08-Apr-18
 * Time: 8:06 PM
 */
class Myposts extends User_Controller
{
    private $response = [];
    private $moduleName ;

    /**
     * Myposts constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'myposts';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Create Buying Post';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/
        /*$this->load->model('Categories_m', 'catM', TRUE);*/

        $this->data['user']['head']['pageLevelPlugins']['css'] =   ['jq-file-upload','bs-select','jq-smartwizard'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] =    ['jq-file-upload','bs-select','jq-smartwizard'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
    }

    public function index()
    {
        $this->show();
    }

    private function show()
    {
        $this->data['user']['content_view'] = "$this->modulePath/show_v";
        $this->setupHeader1();
        $this->setupNav();
        $this->template->setup_template($this->data['user']);
    }

    public function quickview($id)
    {
        //echo "Quick View = $this->modulePath/quick_v"; die;
        $this->load->view("$this->modulePath/quick_v");
    }


    public function create(){

        $this->setupForm();
        $this->template->setup_template($this->data['user']);
    }

    public function setupForm(){
        $baseMode = $this->getBaseMode();
        if ($baseMode == 'buy') {
            $this->data['user']['pageHeader'] = 'Create Buying Post';
            $this->data['user']['content_view'] = "$this->modulePath/buy_create_v";
        }
        else if ($baseMode == 'sell') {
            $this->data['user']['pageHeader'] = 'Create Selling Post';
            $this->data['user']['content_view'] = "$this->modulePath/sell_create_v";
        }

        /*print_r($this->data['user']); die;*/
    }

    public function store(){
        echo "<pre>";
        print_r($_GET);
        print_r($_POST);
        print_r($_FILES);
    }

    public function detail($id = NULL)
    {
        echo "detail";
    }

    public function bids($id = NULL)
    {
        echo "My Auctions > bids";
    }
}