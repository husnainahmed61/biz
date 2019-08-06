<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 28-Jan-18
 * Time: 6:40 PM
 */

class Categories2 extends User_Controller
{
    private $response = [];
    private $moduleName ;

    private $sort;
    private $pageLimit;

    private $slugConfig ;

    function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->load->model('Categories2_m', 'cat2Model', TRUE);


        $this->slugConfig = array(
            'table' => $this->cat2Model->table,
            'id' => 'id',
            'field' => 'slug',
            'title' => 'name',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->slug->set_config($this->slugConfig);

        $this->sort = [
            [
                'text' => 'Name (A - Z)',
                'colName' => 'ssxa.name',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Name (Z - A)',
                'colName' => 'ssxa.name',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Price (Low > High)',
                'colName' => 'ssxa.current_price',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Price (High > Low)',
                'colName' => 'ssxa.current_price',
                'direction' => 'DESC'
            ]
        ];

        $this->pageLimit = [
            [
                'text' => "20",
                'value' => 20
            ],
            [
                'text' => "40",
                'value' => 40
            ],
            [
                'text' => "60",
                'value' => 60
            ],
            [
                'text' => "80",
                'value' => 80
            ],
            [
                'text' => "100",
                'value' => 100
            ]
        ];

        $this->moduleName = 'categories';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Categories2';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        //$this->data['user']['head']['pageLevelPlugins']['css'] =   ['datatable', 'bs-fileinput', 'bs-datepicker', 'ladda'];
        //$this->data['user']['foot']['pageLevelPlugins']['js'] =    ['datatable', 'jq-validation', 'moment', 'bs-datepicker', 'component-datetime', 'bs-fileinput', 'ladda', 'ui-buttons'];
        $this->data['user']['head']['pageLevelPlugins']['css'] =   [];
        $this->data['user']['foot']['pageLevelPlugins']['js'] =    ['pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

    }

    public function index($id = NULL)
    {
        $this->show();
    }

    public function show($slug = NULL) {

        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['pageLimit'] = $this->pageLimit;
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';

        /*Reversing for getting other type of posts*/
        $postType = $currentMode == 'buy' ? 'sell' : 'buy';

        $this->data['user']['slug'] = $slug;

        $category2 = $this->getIdBySlug($slug);
        $category2ID = $category2['id'];
    //    print_r($category2ID);

  // echo "<br>";
        $category2Name = $this->getNameById($category2ID);
        $this->data['user']['head']['page_title'] = "Vayzn - ".$category2Name['name'];

      //  print_r($category2Name); 

        $this->data['user']['name'] = $category2Name['name'];
//echo "<br>";
        $category1ID = $this->getCategory1IdById($category2ID);
// print_r($category2Name);
// echo "<br>";
        $category1 = $this->categories1->getNameAndSlugById($category1ID['category1_id']);
//print_r($category2Name);// exit();
        $this->data['user']['category1Name'] = $category1['name'];
        $this->data['user']['category1Url'] = base_url($category1['slug'].'/category1');
        $this->data['user']['attributes'] = $this->setupFilters($category2ID);

//exit();
        /*print_r($category2ID);
        print_r($postType);*/
        $auctions = $this->auctions->getAuctionByCategory2Id($category2ID,$postType);
        $this->data['user']['totalRecords'] = count($auctions) ;
        $pagination = (count($auctions));
        //echo $pagination; dividing by 2 means page limit,will be 20 in future
        $pagination = ceil($pagination/2);
        //echo $pagination;
        //exit();
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        $this->data['user']['pagination'] = $pagination;
//        print_r($auctions); die;

        $this->data['user']['auctions'] = $auctions;
        $this->data['user']['postType'] = $currentMode;
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['content_view'] = "$this->modulePath/category2_show_v";
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
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

    public function getNavData(){
//        echo "<pre>Categories > create";

        $columns = ['id','name','slug'];
        return $this->model->getAll($columns);

    }

    public function getIdBySlug($slug)
    {
        $columns = ['id'];
        return $this->cat2Model->fields($columns)->get(array('slug' => $slug));
    }

    public function getNameById($id)
    {
        $columns = ['name'];
        return $this->cat2Model->fields($columns)->get(array('id' => $id));
    }

    public function getCategory1IdById($id)
    {
        $columns = ['category1_id'];
        return $this->cat2Model->fields($columns)->get(array('id' => $id));
    }

    public function getNameAndSlugById($id)
    {
        $columns = ['name','slug'];
        return $this->cat2Model->fields($columns)->get(array('id' => $id));
    }

    public function create(){
        $this->cat2Model->createSlug();
    }

    public function getByCategory1Id($id){

        $cats = $this->cat2Model->getAll(['id','name'],['category1_id'=>$id]);

        if($cats > 0){
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['categories2'] = $cats;
        }
        else{
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['categories2'] = NULL;
        }

        echo json_encode($this->response);

    }

    private function setupFilters($catId = NULL){
        if(empty($catId)){
           return FALSE;
        }

        // Getting All Auction of CatId
        $auctionIds = $this->auctions->auctionsModel->fields(['id'])->get_all(['category2_id'=> $catId]);
        //print_r($auctionIds);
        if(empty($auctionIds    )){
            return FALSE;
        }
        // Getting All Auction Attributes of Auctions
        $auctionAttributes = $this->auctions->auctionAttributeModel->fields(['attribute_id','value','type'])->where('auction_id', array_column($auctionIds,'id'))->get_all();
        if(empty($auctionAttributes    )){
            return FALSE;
        }//         echo "auctionAttributes: <br>"; print_r($auctionAttributes);
        // Getting Attributes by Attribute Id
        if (is_array($auctionAttributes)) {
        
        $attributes = $this->auctions->attributesModel->fields(['id','name','type'])->as_array()->where('id' ,array_column($auctionAttributes,'attribute_id'))->get_all();
        //echo "attributes: <br>"; print_r($attributes);

        foreach ($attributes AS $key => $item){
            if($item['type'] == 'text'){
                $attrId = $item['id'];
                foreach($auctionAttributes AS $key2 => $item2){
                    if($item2['attribute_id'] == $attrId && $item2['type'] == 'text'){
                        $attributes[$key]['attr_values'][$key2] = $item2;
                    }
                }
                $attributes[$key]['attr_values'] = array_values($attributes[$key]['attr_values']);
            }
            else if($item['type'] == 'select'){
                $attributes[$key]['attr_values'] = $this->auctions->attributesModel->attributeValuesModel->fields(['id','value','attribute_id'])->as_array()->where(['attribute_id'=>$item['id']])->get_all();
            }
        }
        return $attributes;
        
        }

        /*echo "attributes: <br>";
        print_r($attributes);*/
        //die;
    }

    public function getFilteredProducts()
    {
        $start_price_range = '';
        $end_price_range =  '';
        $slug = $this->input->get('slug');
        $category2 = $this->getIdBySlug($slug);
        $category2ID = $category2['id'];

        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $sort = $this->input->get('sort');
        $all = $this->input->get('all');
        $postType = $this->input->get('type');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $currency = $this->input->get('currency');
        $price_range = $this->input->get('price_range');

        if (!empty($price_range)) {
            $price_range = explode(",", $price_range);
            $start_price_range = $price_range[0];
            $end_price_range =  $price_range[1];
        }
        
        if ($currency != '') {
        $currency = explode(',', $currency);
        }

        $limit = [
            //             20 * 2 - 1
            'start' => $pageSize*($pageNumber-1),
            'offset' => $pageSize
        ];

        $ids = [];
        $values = [];

        if (!empty($all)) {
            $all = urldecode($all);
            $all = explode(',', $all);

            foreach ($all AS $key => $item) {
                if (is_numeric($item)) {
                    array_push($ids, $item);
                } else {
                    array_push($values, $item);
                }
            }
        }

        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';

        /*Reversing for getting other type of posts*/
        //$postType = $currentMode == 'buy' ? 'sell' : 'buy';

        $auctions = $this->cat2Model->getAuctionsByAttributes($currency,$ids, $values, $this->sort[$sort-1], $limit, $postType,$category2ID,$start_price_range,$end_price_range);
        $auctionCount = $this->cat2Model->countAuctionsByAttributes($currency,$ids, $values, $postType,$category2ID,$start_price_range,$end_price_range);
       /* echo "<pre>";
        print_r($auctionCount);
        die;*/

        if (!empty($auctions) && (is_array($auctions) && count($auctions) > 0)) {


            $this->data['user']['auctions'] = $auctions;
            $this->data['user']['content_view'] = "$this->modulePath/category1_show_v_filtered";

            $this->response['data'] = $auctions;
            $this->response['totalNumber'] = $auctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/category1_show_v_filtered", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
             $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
             $this->response['html'] = "<h4>No Auctions Found</h4>";
             echo json_encode($this->response);
             
        }
        //$this->template->setup_template($this->data['user']);
    }



}