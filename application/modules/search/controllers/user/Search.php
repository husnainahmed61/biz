<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 10/8/2018
 * Time: 9:02 PM
 */
class Search extends User_Controller
{
    private $response = [];
    private $moduleName ;

    private $slugConfig ;

    private $imageFiles;

    private $auctionData;

    private $loggedInUser; // Uzair

    public $modulePath;

    function __construct()
    {
        parent::__construct();

        $this->moduleName = 'search';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Search';

        $this->loggedInUser = $this->get_logged_in_user();
        $this->data['user']['foot']['pageLevelPlugins']['js'] =    ['pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
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
    }

    public function index()
    {
        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
        $auctionType = $currentMode == 'buy' ? 'sell' : 'buy';


        //$name = $this->input->get('search');
        $name = $this->input->post('search');

        $columns = '*';

        $where = array(
            'type' => $auctionType
        );

        $like = array(
            'ssxa.name' => $name
        );


        //$auctions = $this->auctions->getSearchResult($columns,$where,$like);

        $this->data['user']['searchTerm'] = $name;
        //$this->data['user']['auctions'] = $auctions;

        $this->data['user']['content_view'] = "$this->modulePath/show_v";
        // echo "<pre>";
        // print_r($this->data['user']);
        // exit();
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();

        $this->template->setup_template($this->data['user']);
    }

    public function autoComplete($search)
    {
        $this->response['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $search = $this->input->get('q');

        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
        $auctionType = $currentMode == 'buy' ? 'sell' : 'buy';

        $columns = 'name';

        $where = array(
            'type' => $auctionType
        );

        $like = array(
            'ssxa.name' => $search
        );
        $category = [];
        $this->response['results'] = $this->auctions->getSearchResultautoComplete($columns,$where,$like);
        $this->response['search_text'] = $search;
        // foreach ($auctionSearchRes as $key => $value) {
        //     //array_push($category, $value['category_name']);
        //     //array_push($category["id"], $value['category_id']);
        //     $category["name"][$value["category_name"]] = $value["category_id"];


        //     // $category["id"] = $value['category_id'];
        // }
        // echo "<pre>";
        // print_r($category); exit();


  
    //echo $this->response;
        echo json_encode($this->response);
    }

    public function getFilteredProducts()
    {

        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        $this->data['user']['currentDate'] = $this->serverDateTime;


        $sort = $this->input->get('sort');
        $postType = $this->input->get('type');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $currency = $this->input->get('currency');
        $search = $this->input->get('search');


        if ($currency != '') {
        $currency = explode(',', $currency);
        }

        $limit = [
            //             20 * 2 - 1
            'start' => $pageSize*($pageNumber-1),
            'offset' => $pageSize
        ];


        $currentMode = $this->getBaseMode();
        //print_r($currentMode); exit();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
    
        $auctions = $this->auctions->getSearchResult($this->sort[$sort-1],$currency,$postType,$search,$limit);

        $auctionCount = $this->auctions->getCountSearchResult($currency,$postType,$search,$limit);
        // echo "<pre>";
        // print_r($auctions);
        // echo "<pre>";
        // print_r($auctionCount);
        // die;

        if (!empty($auctions) && (is_array($auctions) && count($auctions) > 0)) {


            $this->data['user']['auctions'] = $auctions;
            $this->data['user']['content_view'] = "$this->modulePath/show_v_filtered";

            $this->response['data'] = $auctions;
            $this->response['totalNumber'] = $auctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/show_v_filtered", $this->data['user'], TRUE);
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
             

            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }

}