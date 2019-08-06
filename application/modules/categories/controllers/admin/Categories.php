<?php
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 28-Jan-18
 * Time: 6:40 PM
 */

class Categories extends Admin_Controller
{
    private $response = [];
    private $moduleName = 'categories';

    function __construct()
    {
        parent::__construct();
        $this->data['admin']['pageHeader'] = 'Categories';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/


        $this->load->model('Categories_1_m', 'catM', TRUE);

        $this->data['admin']['head']['pageLevelPlugins']['css'] =   ['datatable', 'bs-fileinput', 'bs-datepicker', 'ladda'];
        $this->data['admin']['foot']['pageLevelPlugins']['js'] =    ['datatable', 'jq-validation', 'moment', 'bs-datepicker', 'component-datetime', 'bs-fileinput', 'ladda', 'ui-buttons'];
        $this->data['admin']['page_js'] = "$this->moduleName/$this->userName/admin-js";

        $this->load->library('my_encrypt');

    }

    public function index()
    {
        //echo "Cate INdex";

        $this->show();
    }

    public function show() {

        $this->data['admin']['categories'] = $this->catM->fields('id','name','slug','created_at')->as_array()->get_all();

        $this->data['admin']['content_view'] = 'categories/admin/show_v';
        $this->template->get_admin_template($this->data['admin']);
    }


    public function getDatatable($table)
    {

        if ($table == "categories") {
            $this->getProductsDatatable();
        } else {
            echo json_encode(['result' => "Table Name Undefined"]);
        }

    }

    public function getProductsDatatable()
    {
        $this->response = [
            'draw' => NULL,
            'recordsTotal' => NULL,
            'recordsFiltered' => NULL,
            'data' => null,
            'error' => NULL
        ];

        $draw = $this->input->get('draw');
        $sort = $this->input->get('order');
        $start = $this->input->get('start');
        $limit = $this->input->get('length');
        $search = $this->input->get('search');



        $this->response['draw'] = $draw;

        $dataTable = $this->catM->setupDatatable($draw, $sort, $search, $start, $limit);

        $this->response['recordsTotal'] = $dataTable['recordsTotal'];

        $this->response['recordsFiltered'] = $dataTable['recordsFiltered'];

        $count = 1;
        foreach ($dataTable['data'] AS $key => $item) {
            /* For giving row an id of record PK */
            $dataTable['data'][$key]['index'] = $count ;
            $dataTable['data'][$key]['DT_RowId'] = $item['id'];
            $count ++;
        }
        $this->response['data'] = $dataTable['data'];


         /*echo "<pre>";
         print_r($dataTable['data']);
         die;*/

        echo json_encode($this->response);
    }








}