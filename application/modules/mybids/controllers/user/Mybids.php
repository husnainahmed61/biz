<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 21-Apr-18
 * Time: 1:16 AM
 */
class Mybids extends User_Controller
{
    private $response = [];
    private $moduleName ;

    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'mybids';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Categories2';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        //$this->load->model('Categories_m', 'catM', TRUE);

        //$this->data['user']['head']['pageLevelPlugins']['css'] =   ['datatable', 'bs-fileinput', 'bs-datepicker', 'ladda'];
        //$this->data['user']['foot']['pageLevelPlugins']['js'] =    ['datatable', 'jq-validation', 'moment', 'bs-datepicker', 'component-datetime', 'bs-fileinput', 'ladda', 'ui-buttons'];
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
}