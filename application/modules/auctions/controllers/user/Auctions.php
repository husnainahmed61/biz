<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/26/2018
 * Time: 1:39 AM
 */
class Auctions extends User_Controller
{
    public $modulePath;
    private $response = [];
    private $moduleName;
    private $slugConfig;
    private $imageFiles;
    private $auctionData; // Uzair
    private $loggedInUser;

    function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        $this->load->model('Auctions_m', 'auctionsModel', TRUE);
        $this->load->model('Auction_details_m', 'auctionDetailsModel', TRUE);
        $this->load->model('Attributes_m', 'attributesModel', TRUE);
        $this->load->model('Attribute_values_m', 'attributeValuesModel', TRUE);
        $this->load->model('Auction_attributes_m', 'auctionAttributeModel', TRUE);
        $this->load->model('Images_m', 'im', TRUE);
        $this->load->model('Users_m', 'usersM', TRUE);

        $this->slugConfig = array('table' => $this->auctionsModel->table, 'id' => 'id', 'field' => 'slug', 'title' => 'name', 'replacement' => 'dash' // Either dash or underscore
        );
        $this->slug->set_config($this->slugConfig);

        $this->moduleName = 'auctions';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Auctions';

        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        $this->loggedInUser = $this->get_logged_in_user(); //UZair
        $this->data['user']['head']['pageLevelPlugins']['css'] = [];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

        $this->auctionData = ['slug' => "", 'name' => "", 'description' => "", 'condition' => "", 'image_sm_1' => "", 'image_sm_2' => "", 'image_sm_3' => "", 'image_sm_4' => "", 'image_sm_5' => "", 'display_image' => "", 'starts_at' => "", 'expires_at' => "", 'amount' => "", 'currency' => "", 'start_price' => "", 'end_price' => "", 'current_price' => "", 'bid_type' => "", 'qty_unit' => "", 'qty' => "", 'bidder_type' => "", 'category1_id' => "", 'category2_id' => "", 'category3_id' => "", 'bid_count' => "", 'user_id' => "",];

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
                'colName' => 'ssxa.amount',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Price (High > Low)',
                'colName' => 'ssxa.amount',
                'direction' => 'DESC'
            ]
        ];

        $this->sort_private = [
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
                'colName' => 'ssxa.amount',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Price (High > Low)',
                'colName' => 'ssxa.amount',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Latest to Oldest',
                'colName' => 'ssxa.created_at',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Oldest to Latest',
                'colName' => 'ssxa.created_at',
                'direction' => 'ASC'
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

        $this->load->library('My_encrypt');
        //$this->load->library('email');
    }

    public function index()
    {
        
        //echo "string"; exit();
        /* Uzair works starts*/
        if ($this->check_user_authentication('', 'home')) {
            $userId = $this->loggedInUser['id'];

            $this->data['user']['sort'] = $this->sort;
            $this->data['user']['sort_private'] = $this->sort_private;

            $this->data['user']['pageLimit'] = $this->pageLimit;

            $this->data['user']['currencies'] = $this->auctionsModel->getCurrencies();
            $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
            //echo "<pre>"; print_r($this->data['user']); exit();
            $this->data['user']['content_view'] = "$this->modulePath/private_auctions_v";

            //printDataDie($this->data['user']);

            $this->setupNav();
            $this->setupHeader1();
            $this->header_notification();
            $this->quick_menu();
            $this->template->setup_private_template($this->data['user']);
        }
        /* Uzair works Ends*/
    }

    /* Uzair works starts*/

    public function auction($slug = NULL)
    { 

        if ($this->check_user_authentication('', 'home')) {
            $this->data['user']['currentDate'] = $this->serverDateTime;

            $post = $this->auctionsModel->fields(['id'])->get(array('slug' => $slug));

            $postId = $post['id'];

            //print_r($post);
//            exit('auction');

            $this->renderDetails($postId);
           // print_r(($postId)); exit();
            //$this->getAuctionTitle($pos);
            //echo "<pre>";
            //print_r($this->data['user']['post']['name']);
            $this->data['user']['auction_name'] = $this->data['user']['post']['name'];
            //echo "<pre>";
            //print_r($this->data['user']);
            //exit();

            //exit();

            if (!$this->hasOwnAuction($postId)){
                redirect($slug . '/auction/');
            }
            $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
            $this->data['user']['content_view'] = "$this->modulePath/private_auction_v";
            // echo "<pre>";
            // print_r($this->data['user']);
            // exit();


            $this->setupHeader1();
            $this->setupNav();
            $this->header_notification();
            $this->quick_menu();
            $this->template->setup_template($this->data['user']);
        }
    }

    /**
     * @param $id
     */
    public function renderDetails($id)
    {
        $auction = $this->auctionsModel->get(array('id' => $id));
        $auctionDetail = $this->auctionDetailsModel->get(array('auction_id' => $id));

        //print_r($auctionDetail);

        $resourceUrl = $this->config->item('base_resources_url');
        $fbShare['url'] = base_url("auction/".$auction['slug']);
        $fbShare['type'] = 'website';
        $fbShare['title'] = $auction['name'];
        $fbShare['description'] = $auction['description'];
        $fbShare['image'] = $resourceUrl."images/auctions/".$auctionDetail['image_md_1'];
        //print_r($fbShare); die;
        $this->data['user']['head']['fbShare'] = $fbShare;

        $this->data['user']['post'] = $auction;
        $postImages = $this->getImagesByPostID($id);
        $this->data['user']['images'] = $postImages;

        $this->data['user']['startAt'] = explode(' ', $auction['starts_at']);
        $this->data['user']['expiresAt'] = explode(' ', $auction['expires_at']);

        $this->data['user']['type'] = $type = $auction['type'];
        $this->data['user']['bidType'] = $bidType = $auction['bid_type'];
        $this->data['user']['amount'] = $amount = $auction['amount'];
        $this->data['user']['currentPrice'] = $currentPrice = $auction['current_price'];
        $this->data['user']['currency'] = $currency = $auction['currency'];

        $bidsArray = $this->bids->getAllByAuctionId($id);

        if (isset($bidsArray) && !empty($bidsArray)) {
            $bids = $this->getBids($bidsArray);

            $this->data['user']['bids'] = $bids;
        }
    }

    public function getImagesByPostID($id)
    {
        return $this->im->get(array('auction_id' => $id));
    }

    public function getBids($bids)
    {
        return $this->bids->getDetailsByAuctionId($bids);
    }

    public function hasOwnAuction($auctionId)
    {
        return $this->auctionsModel->fields('id')->get(array('id' => $auctionId, 'user_id' => $this->loggedInUser['id']));
    }

    public function getIdBySlug($slug)
    {
        $columns = ['id'];
        return $this->auctionsModel->fields($columns)->get(array('slug' => $slug));
    }

    /* Uzair works Ends*/

    public function getDetailsById($id)
    {
        return $this->auctionsModel->get(array('id' => $id));
    }

    public function quickview($id = NULL)
    {
        $recentBids = $this->bids->getRecentByAuctionId($id);
        $data['bids'] = $this->getBids($recentBids);
        $data['currentDate'] = $this->serverDateTime;
        $this->load->view("$this->modulePath/quick_v", $data);
    }

    public function biddetail($id = NULL)
    {
        $bidsDetail = $this->bids->getById($id);
        $description = $bidsDetail['description'];
        $expireAt = $submissionDate = date('d-M-y H:i', strtotime($bidsDetail['expires_at']));

        $data['currentDate'] = $this->serverDateTime;
        $data['description'] = $description;
        $data['expireAt'] = $expireAt;
//        printDataDie("$this->modulePath/detail_v");

        $this->load->view("$this->modulePath/detail_v", $data);
    }

    public function action($id)
    {
        header('Content-Type: application/json');
        $status = $this->input->post('status');

        if ($this->bids->updateStatus($id, $status)) {
            $this->setUpBidAcceptEmail($id, $status);
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Bid " . ucfirst($status);


        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Something went wrong";
        }
        //echo "i m called";
        //header('Content-type: application/json');
        //$this->response['csrf'] = $this->getCSRF();
        echo json_encode($this->response);
    }

    public function setUpBidAcceptEmail($bidId, $status)
    {
        $bid = $this->bids->getById($bidId);


        $auction = $this->auctionsModel->get(array('id' => $bid['auction_id']));
        $auctioneer = $this->merchants->getById($auction['user_id']);
        $auctioneerDetail = $this->merchants->getByUserId($auctioneer['id']);

        $bidder = $this->merchants->getById($bid['user_id']);
        $bidderDetail = $this->merchants->getByUserId($bidder['id']);

        $auctionUrl = base_url() . $auction['slug'] . '/auction';

        $this->data['user']['bidderName'] = $bidder['first_name'] . ' ' . $bidder['last_name'];
        $this->data['user']['auctioneer'] = $auctioneer;
        $this->data['user']['auctioneerDetail'] = $auctioneerDetail;
        $this->data['user']['auctionUrl'] = $auctionUrl;

        $view = 'bid_' . $status . '_email_v';

        $message = $this->load->view($this->modulePath . "/$view", $this->data['user'], TRUE);

        $subject = 'Bid ' . ucfirst($status) . ' - Vayzn';

        return $this->register->sendEmail($bidderDetail['email'], $subject, $message);
    }

    public function show($slug = NULL)
    {
        $array = array();
        $this->data['user']['bidderType'] = $this->getBaseMode();
        $post = $this->auctionsModel->fields(['id','user_id'])->get(array('slug' => $slug));


        $postId = $post['id'];
        $user_id = $post['user_id'];

        //         echo "<pre>";
        // print_r($post);
        // exit();

        /* Uzair works starts*/

        if ($this->hasOwnAuction($postId)){
            $this->data['user']['hasOwnAuction'] = 1;
            //redirect('auction/' . $slug);
        }
        else{
            $this->data['user']['hasOwnAuction'] = 0;
        }




        if ($result = $this->alreadyBidden($postId)):
            $this->data['user']['bidAmount'] = $result['amount'];
            $this->data['user']['bidExpiresAt'] = date('Y-m-d\TH:i:s', strtotime($result['expires_at']));
            $this->data['user']['bidDescription'] = $result['description'];
            $this->data['user']['readonly'] = 'readonly';
            $this->data['user']['disabled'] = 'disabled';
        endif;

        /* Uzair works ends*/

        $this->getBreadcrumb($postId);

        $this->getAuction($postId); // Modify by Uzair

        $this->data['user']['auctionReview']= [];

        $this->data['user']['auctionId'] = $this->my_encrypt->encode($postId);
        /*hasnain work for getting review and rating*/
        $auctionReview = $this->auctionsModel->getReviews($postId);
        foreach ($auctionReview as $key => $value) {
            $auctionReview[$key]['comments'] = $this->auctionsModel->getReviewComments($postId);
        }
        /*hasnain works end*/
        /*hasnain - get auctioneer details*/
        $this->data['user']['auctioneerDetail'] = $this->auctionsModel->auctioneerDetail($user_id);
        /*end hasnain -*/
        /*get user an othe auction*/
        $another_user_post = $this->auctionsModel->getAnExtraAuction($user_id,$postId);
        /*end get another auction*/

        $another_post = $another_user_post;
        if(isset($another_post) && !empty($another_post))
        {
            $this->data['user']['another_user_post'] = $another_post[array_rand($another_post)];    
        }
        
        
        $auction = $this->auctionsModel->get(array('id' => $postId));
        $auctionDetail = $this->auctionDetailsModel->get(array('auction_id' => $postId));

        $resourceUrl = $this->config->item('base_resources_url');
        $fbShare['url'] = base_url($auction['slug']."/auction");
        $fbShare['type'] = 'website';
        $fbShare['title'] = $auction['name'];
        $fbShare['description'] = $auction['description'];
        $fbShare['image'] = $resourceUrl."images/auctions/".$auctionDetail['image_md_1'];
        //print_r($fbShare); die;
        $this->data['user']['head']['fbShare'] = $fbShare;
        $this->data['user']['auction_name'] = $this->data['user']['post']['name'];
        $this->data['user']['auctionReview']= $auctionReview;
        

        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['content_view'] = "$this->modulePath/show_v";

           // echo "<pre>";
           // print_r($this->data['user']);
           // exit();
        
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }

    public function alreadyBidden($auctionId)
    {
        $columns = ['amount', 'description', 'expires_at'];
        return $this->bids->getBiddenAuction($auctionId, $columns);
    }

    public function getBreadcrumb($postId)
    {
        $breadCrumbs = [];
        $category1_2_3ID = $this->getCategory1_2_3IdById($postId);

        $category1 = $this->categories1->getNameAndSlugById($category1_2_3ID['category1_id']);
        $category2 = $this->categories2->getNameAndSlugById($category1_2_3ID['category2_id']);
        $category3 = $this->categories3->getNameAndSlugById($category1_2_3ID['category3_id']);

        $breadCrumbs[0]['title'] = $category1['name'];
        $breadCrumbs[0]['link'] = base_url($category1['slug'] . '/category1');

        $breadCrumbs[1]['title'] = $category2['name'];
        $breadCrumbs[1]['link'] = base_url($category2['slug'] . '/category1');

        $breadCrumbs[2]['title'] = $category3['name'];
        $breadCrumbs[2]['link'] = base_url($category3['slug'] . '/category1');

        $this->data['user']['breadCrumbs'] = $breadCrumbs;
    }

    public function getCategory1_2_3IdById($id)
    {
        $columns = ['category1_id', 'category2_id', 'category3_id'];
        return $this->auctionsModel->fields($columns)->get(array('id' => $id));
    }

    public function getAuction($postId)
    {
        $currentDate = $this->serverDateTime; // uzair
        $postDetail = $this->auctionsModel->get(array('id' => $postId));

        $this->data['user']['post'] = $postDetail;
        $postImages = $this->getImagesByPostID($postId);
        $this->data['user']['images'] = $postImages;

        $this->data['user']['startAt'] = explode(' ', $postDetail['starts_at']);
        $this->data['user']['expiresAt'] = explode(' ', $postDetail['expires_at']);

        $type = $postDetail['type'];
        $bidType = $postDetail['bid_type'];
        $amount = $postDetail['amount'];
        $currentPrice = $postDetail['current_price'];
        $currency = $postDetail['currency'];

        $this->data['user']['type'] = $type;
        $this->data['user']['bidType'] = $bidType;
        $this->data['user']['amount'] = $amount;
        $this->data['user']['currentPrice'] = $currentPrice;
        $this->data['user']['currency'] = $currency;

        if ($currentDate > $postDetail['expires_at']):
            redirect(base_url());
        endif;
    }

    public function create()
    {
        if ($this->check_user_authentication()) {
            $this->setupCreateForm();

        } else {
            // echo "Not logged in";
            $this->session->set_flashdata('please_login', true);
            redirect('home');
        }
    }

    public function setupCreateForm()
    {
        $baseMode = $this->getBaseMode();
        $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
        $loggedInUser = $this->get_logged_in_user();
        $checkAllData = $this->auctionsModel->checkAllData($loggedInUser['id']);
        if(isset($checkAllData[0]['phone']) && isset($checkAllData[0]['last_name']) && isset($checkAllData[0]['type']) && isset($checkAllData[0]['country_id']) && isset($checkAllData[0]['state_id']) && isset($checkAllData[0]['city_id']) &&
        !empty($checkAllData[0]['phone']) && !empty($checkAllData[0]['last_name']) && !empty($checkAllData[0]['type']) && !empty($checkAllData[0]['country_id']) && !empty($checkAllData[0]['state_id']) && !empty($checkAllData[0]['city_id'])){
            $this->data['user']['dataChecked'] = 1;
        }
        else{
            $this->data['user']['dataChecked'] = 0;
        }

        // print_r($this->data['user']['checkAllData']);
        // die;
        $currencies = $this->auctionsModel->getCurrencies();

        $this->data['user']['content_view'] = "$this->modulePath/create_auction_v";

        $this->data['user']['currencies'] = $currencies;
        $this->data['user']['user_followers'] = $this->usersM->getFollowersOfId($loggedInUser['id']);;
        $this->data['user']['head']['pageLevelPlugins']['css'] = ['bs-select'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['bs-select'];
        $this->data['user']['page_js'] = "$this->modulePath/create_custom-js";


        //$this->setupNav();
        $this->setupHeader1();
        $this->template->setup_private_template($this->data['user']);
        // echo "<pre>"; print_r($this->data['user']); die;
    }

    public function edit($slug)
    {
        if ($this->check_user_authentication('', 'home')) {
            $resourceUrl = $this->config->item('base_resources_url');
            $param2 = $slug;
            $auction = $this->auctions->getAuctionDetails($param2);

            $this->data['user']['auction'] = $auction[0];

            $checkBids = $this->auctionsModel->CheckBids($auction[0]['id']);
            // print_r($checkBids);
             // echo "<pre>";
             //  print_r($auction);
             //  exit();
            if ($checkBids >= 1) {
                echo "you can not edit this Auction";
                exit();
            }
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            // echo "Logged in";
            $this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard', 'bs-select', 'jq-file-upload'];
            $this->data['user']['foot']['pageLevelPlugins']['js'] = ['jq-smartwizard', 'bs-select', 'jq-file-upload'];
            //$param2 = "test-title-19";
            

            $this->data['user']['categories1'] = $this->categories1->cat1Model->getAll("id,name");
            $this->data['user']['categories2'] = $this->categories2->cat2Model->getAll("id,name");
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll("id,name");

            // echo "<pre>"; print_r($this->data['user']['categories3']); die;


            $auctionAttributes = $this->auctions->getAuctionAttributes(['auction_id' => $auction[0]['id']]);
            $this->data['user']['auctionAttributes'] = $this->parseAuctionAttributes($auctionAttributes);

            $this->data['user']['attributes'] = $this->auctions->getAttributesWithValues($auction[0]['category1_id'], $auction[0]['category2_id'], $auction[0]['category3_id']);

            $this->data['user']['currencies'] = $this->auctionsModel->getCurrencies();;

            //  echo "<pre> " . $auction[0]['id'];
            //  print_r($auction);
            //  print_r($this->data['user']['attributes']);
            //  echo "i m auction attr";
            //  print_r($this->data['user']['auctionAttributes']);
            // die;
            $attributesForm = $this->load->view("$this->modulePath/auction-attributes-filled", $this->data['user'], TRUE);



            //$this->setupEditForm();
            $this->data['user']['resourceUrl'] = $resourceUrl;
            $this->data['user']['attributesForm'] = $attributesForm;
            $this->data['user']['content_view'] = "$this->modulePath/edit_auction_v";

            $this->data['user']['page_js'] = "$this->modulePath/create_custom-js";

            //  echo "<pre>";
            // print_r($this->data['user']);
            // exit();

            $this->template->setup_private_template($this->data['user']);

            // $this->setupNav();
            // $this->setupHeader1();
            // $this->template->setup_template($this->data['user']);
        } else {
            // echo "Not logged in";
        }
    }

    public function parseAuctionAttributes($attr)
    {
        $parsed = [];
        if (isset($attr) && !empty($attr)) {
        
        foreach ($attr AS $key => $item) {
            $parsed[$item['attribute_id']] = $item;
            /*echo "<pre>"; print_r( $parsed);
            foreach ($item['attribute_values'] as $key2 => $attribute_value) {

                $parsed[$item['attribute_id']]['attribute_values'][$attribute_value['id']] = $attribute_value;

            }*/
        }
        return $parsed;
        }
    }

    public function setupEditForm()
    {
        $baseMode = $this->getBaseMode();
        if ($baseMode == 'buy') {
            $this->data['user']['pageHeader'] = 'Edit Buying Post';
            $this->data['user']['content_view'] = "$this->modulePath/edit_buy_auction_v";
        } else if ($baseMode == 'sell') {
            $this->data['user']['pageHeader'] = 'Edit Selling Post';
            $this->data['user']['content_view'] = "$this->modulePath/edit_sell_auction_v";
        }
    }

    public function getAuctionAttributesForm()
    {
        if (!empty($this->input->get('category_3'))) {
            $where = ['id' => $this->input->get('category_3')];
            $category3 = $this->categories3->cat3Model->getAll('*',$where);

            $data['attributes'] = $this->getAttributesWithValues(
                $category3[0]['category1_id'],
                $category3[0]['category2_id'],
                $category3[0]['id']
            );

            if (!empty($data['attributes'])) {
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "User Login";
                $this->response['html'] = $this->load->view("$this->modulePath/auction-attributes", $data, TRUE);
            } else {
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Unsuccessful";
                $this->response['message'] = "Can't get auction attributes";
            }
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "400";
            $this->response['title'] = "Invalid";
            $this->response['message'] = "Invalid inputs";
        }

        echo json_encode($this->response);
    }

    public function getAlertAttributesForm()
    {
        $category3 = $this->categories3->getById($this->input->get('category_3'));
        //printData($category3);
        $data['attributes'] = $this->getAttributesWithValues($category3['category1_id'], $category3['category2_id'], $this->input->get('category_3'));

        if (!empty($data['attributes'])) {
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "User Login";
            $this->response['html'] = $this->load->view("$this->modulePath/auction-attributes", $data, TRUE);
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Unsuccessful";
            $this->response['message'] = "Can't get auction attributes";
        }

        echo json_encode($this->response);
    }

    public function getAttributesWithValues($cat1, $cat2, $cat3)
    {
        $attrs = $this->auctions->attributesModel->getByCategories($cat1, $cat2, $cat3);
//        printDataDie($attrs);

        foreach ($attrs AS $key => $item) {
            if ($item['type'] == 'select') {
                $attrValues = $this->attributeValuesModel->getByAttributeId($item['id']);
                $attrs[$key]['attribute_values'] = !empty($attrValues) ? $attrValues : NULL;
            } else {
                $attrs[$key]['attribute_values'] = NULL;
            }
        }

        return $attrs;
//        echo "<pre>" ; print_r($attrs);
    }

    public function storeAuction()
    {
        // echo "<pre>";
        // print_r($_POST);
        // echo "i am files";
        // print_r($_FILES);
        // exit();
        $id = $this->input->post('ad_id');

        if (isset($id) && !empty($id)) {
            $response = $this->auctionsModel->deleteAuctionById($id);  
            if ($response != TRUE) {
                    //print_r($deleteAuction);
//                echo "done";
                    redirect('auctions');
                }  
        }

//        $hardParam = ['attribute_1' => "1", 'attribute_2' => "test attr 2 value", 'category_1' => 1, 'category_2' => 1, 'category_3' => 1, 'title' => "Test Title", 'description' => "Test description", 'condition' => "new", 'quantity_unit' => "kg", 'quantity' => "5", 'post_currency' => "usd", 'base_price' => "100", 'bidder_type' => "all", 'starts_at' => "2018-07-15", 'expires_at' => "2018-07-20", 'bid_method' => "free", 'minimum' => "", 'maximum' => ""];

        //  $_POST = empty($_POST) ? $hardParam : $_POST;

//        $fileParam = ['files' => ['name' => ['0' => "Screenshot (1).png", '1' => "Screenshot (2).png"],
//
//            'type' => ['0' => "image/png", '1' => "image/png"],
//
//            'tmp_name' => ['0' => "D:\\xampp\\tmp\phpBBA4.tmp", '1' => "D:\\xampp\\tmp\phpBBB4.tmp"],
//
//            'error' => ['0' => 0, '1' => 0,],
//
//            'size' => ['0' => 121681, '1' => 140571],]];


        if ($this->validateAuctionFields()) {
            $addResult = $this->addAuction();
// echo "<pre>";
//             print_r($addResult); exit();

            if (isset($addResult['id']) /*TRUE*/) {
                if ($this->input->post('ad_viewer') == "followers") {
                    $this->setFollowersAuction($addResult['id']);
                }
                $this->response['slug'] = $addResult['slug'];
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['Message_type'] = "messageSuccess";
                $this->response['message'] = "Auction Created";
            } else if (!empty($addResult['error'])) {
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Failed";
                $this->response['Message_type'] = "messageError";
                $this->response['message'] = $addResult['error'];
            } else {
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['Message_type'] = "messageError";
                $this->response['message'] = "Something went wrong";
            }
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "400";
            $this->response['title'] = "Failed";
            $this->response['Message_type'] = "messageError";
            $this->response['message'] = "Invalid input fields";
            $this->response['error_array'] = array_values($this->form_validation->error_array());
        }
        // print_r($rules);
        // header('Content-type: application/json');
        if (isset($id) && !empty($id)) {

            $responseMessage = "showstatusMessage('" . $this->response['Message_type'] . "','" . $this->response['title'] . "', '" . $this->response['message'] . "', 4000);";
            $this->response['csrf'] = $this->getCSRF();
            $this->session->set_flashdata('message_name', $responseMessage);
            redirect('auctions');
        } else {
            $responseMessage = "showstatusMessage('" . $this->response['Message_type'] . "','" . $this->response['title'] . "', '" . $this->response['message'] . "', 4000);";
            $this->response['csrf'] = $this->getCSRF();
            $this->session->set_flashdata('message_name', $responseMessage);
            redirect('auction/create');
        }

        // echo json_encode($this->response);
    }
    public function setFollowersAuction($auction_id='')
    {
        
        $subject = "Ad from Following User";
        
        $headers = "MIME-Version: 1.0" . "\r\n";
        $headers .= "Content-type: text/html; charset=iso-8859-1" . "\r\n";
        $headers .= "From: Vayzn <no-reply@vayzn.com>" . "\r\n" .
        "Reply-To: no-reply@vayzn.com" . "\r\n" .
        "X-Mailer: PHP/" . phpversion();


         $auctionInfo = $this->auctionsModel->getAuctionInfo($auction_id);
        $auctioneerInfo = $this->auctionsModel->getAuctioneerUserInfo($auctionInfo[0]['user_id']);
        
        $followers_list = $this->input->post('followers_list');
        $this->auctionsModel->insertAuctionForFollowers($auction_id,$followers_list);
        
         foreach ($followers_list as $key => $value) {
            $userInfo = $this->auctionsModel->getAuctioneerUserInfo($value);

            if (!empty($userInfo[0]['first_name']) && !empty($userInfo[0]['email']) && !empty($auctionInfo[0]['slug'])) {
               //$to = $userInfo[0]['email'];
            // $message = "Dear ".$userInfo[0]['first_name']." ".$userInfo[0]['last_name'].",\r\n";
            // $message .= $auctioneerInfo[0]['first_name']." ".$auctioneerInfo[0]['last_name']." has posted an ".$auctionInfo[0]['type']." Ad, please click the link below and bid on the Ad and close a potential business transaction\r\n";
            // $message .= base_url().''.$auctionInfo[0]['slug']."/auction\r\n";
            // $message .= "Regards,\r\n";
            // $message .= "Vayzn";
            
            $data['user_name'] = $userInfo[0]['first_name'].' '.$userInfo[0]['last_name'];
            $data['auctioneer_name'] = $auctioneerInfo[0]['first_name']." ".$auctioneerInfo[0]['last_name'];
            $data['auctioneer_name_slug'] = $auctioneerInfo[0]['slug'];
            $data['auction_type'] = $auctionInfo[0]['type'];
            $data['auction_slug'] = $auctionInfo[0]['slug'];
            
            $message = $this->load->view($this->modulePath."/follower_auction_mail_v",['Details' => $data ], TRUE);
            
            $to =  $userInfo[0]['email'];
           
            mail($to,$subject,$message,$headers);
            
            
            }

        }
    }

    private function validateAuctionFields()
    {
        $this->form_validation->set_rules($this->getAuctionRules());
        return $this->form_validation->run();
    }

    public function getAuctionRules()
    {
        return $this->auctionsModel->rules['insert'];
    }

    public function addAuction()
    {
        $this->setAuctionFields();
        $this->setAuctionAttributes();


        /*echo ("<br><br>At addAuction ");*/
        $uploadData = $this->uploadAuctionImages();
        /*echo ("<br><br>auctionDetailFields ");
        print_r($this->auctionsModel->auctionDetailFields);
        echo ("<br><br>uploadData ");
        print_r($uploadData); die;*/

        foreach ($uploadData AS $key => $item) {
            if (!empty($item['error'])) {
                return $uploadData;
            }
        }
        /*print_r($this->auctionsModel->auctionFields);
        print_r($this->auctionsModel->auctionDetailFields);*/

        return $this->auctionsModel->insertAuction();
    }

    private function setAuctionFields()
    {
        $loggedInUser = $this->get_logged_in_user();
        $auctionFields = $this->auctionsModel->auctionFields;
        //$auctionDetailFields =  $this->auctionsModel->auctionDetailFields;
        /*UZair Work Starts*/
        $lastAuction = $this->getLastId();
        $lastId = $lastAuction['id'];
        $codeLetter = '';
        //ad_type
        if ($this->input->post('ad_type') == 'sa') {
            $codeLetter = 'S';
        } else {
            $codeLetter = 'B';
        }

        $startPoint = '000000';
        $endPoint = $lastId + 1;

        $startPointLength = strlen($startPoint);
        $endPointLength = strlen($endPoint);

        $code = '';

        for ($i = $endPointLength; $i < $startPointLength; $i++):
            $code .= '0';
        endfor;

        $code .= $endPoint;

        $auctionFields['code'] = $codeLetter . '-' . $code;
        /*UZair Work Ends*/

        $where = ['id' => $this->input->post('category_3')];
        $category3 = $this->categories3->cat3Model->getAll('*',$where);
        $auctionFields['category1_id'] = $category3[0]['category1_id'];
        $auctionFields['category2_id'] = $category3[0]['category2_id'];
        $auctionFields['category3_id'] = $category3[0]['id'];

        if ($this->input->post('ad_type') == 'sa') {
            $auctionFields['type'] = 'sell';
        } else {
            $auctionFields['type'] = 'buy';
        }
        
        $auctionFields['slug'] = $this->createPostSlug($this->input->post('title'));
        $auctionFields['name'] = $this->input->post('title');
        $auctionFields['description'] = $this->input->post('description');
        $auctionFields['condition'] = $this->input->post('condition');

        $auctionFields['display_image'] = 1;

        $auctionFields['starts_at'] = $this->input->post('starts_at');
        $auctionFields['expires_at'] = $this->input->post('expires_at');
        $auctionFields['amount'] = $this->input->post('base_price');
        $auctionFields['currency'] = $this->input->post('post_currency');

        $auctionFields['bid_type'] = $this->input->post('bid_method');
        if ($auctionFields['bid_type'] == "free") {
            $auctionFields['current_price'] = $auctionFields['amount'];
        }
        if ($auctionFields['bid_type'] == "range") {
            $auctionFields['start_price'] = $this->input->post('minimum');
            $auctionFields['end_price'] = $this->input->post('maximum');
            $auctionFields['current_price'] = $auctionFields['amount'];
        } else if ($auctionFields['bid_type'] == "incremental" && $auctionFields['type'] == "sell") {
            $auctionFields['current_price'] = $auctionFields['amount'];
            // $fields['current_price'] = $this->input->post('');
        }

        $auctionFields['qty_unit'] = $this->input->post('quantity_unit');
        $auctionFields['qty'] = $this->input->post('quantity');
        $auctionFields['bidder_type'] = $this->input->post('bidder_type');
        $auctionFields['warranty_case'] = $this->input->post('warranty_case');
        $userCityId = $this->auctionsModel->getUserCityId($loggedInUser['id']);
        $auctionFields['user_city_id'] = $userCityId[0]['city_id'];
        $auctionFields['ad_viewer'] = $this->input->post('ad_viewer');

        // $fields['bid_count'] = $this->input->post('');
        
        // print_r($loggedInUser); die;
        $auctionFields['user_id'] = $loggedInUser['id'];

        $this->auctionsModel->auctionFields = $auctionFields;
    }

    
    /*UZair Work starts */

    public function getLastId()
    {
        return $this->auctionsModel->fields('id')->order_by('id', 'DESC')->get();
    }

    public function createPostSlug($title)
    {
        $this->slugConfig = array('table' => $this->auctionsModel->table, 'id' => 'id', 'field' => 'slug', 'title' => 'name', 'replacement' => 'dash' // Either dash or underscore
        );
        $this->slug->set_config($this->slugConfig);
        return $this->slug->create_uri($title);
    }

    /*UZair Work Ends */

    private function setAuctionAttributes()
    {
        $auctionAttrFields = [];

        $attributes = $this->attributesModel->getByCategories($this->auctionsModel->auctionFields['category1_id'],
            $this->auctionsModel->auctionFields['category2_id'], $this->auctionsModel->auctionFields['category3_id']);
        /*echo "<pre>auctionAttrFields: <br><br>";
        print_r($attributes);*/

        foreach ($attributes AS $key => $item) {
            if (!empty($this->input->post('attribute_' . $item['id']))) {
                $auctionAttrFields[$key]['attribute_id'] = $item['id'];
                $auctionAttrFields[$key]['name'] = $item['name'];
                $auctionAttrFields[$key]['type'] = $item['type'];

                if ($item['type'] == "select") {
                    $attrValueId = $this->input->post('attribute_' . $item['id']);
                    $auctionAttrFields[$key]['attribute_id'] = $item['id'];

                    $attributeValue = $this->attributeValuesModel->get($attrValueId);

                    $auctionAttrFields[$key]['attribute_value_id'] = $attributeValue['id'];
                    $auctionAttrFields[$key]['value'] = $attributeValue['value'];

                } else if ($item['type'] == "text") {
                    $auctionAttrFields[$key]['attribute_value_id'] = "";
                    $auctionAttrFields[$key]['value'] = $this->input->post('attribute_' . $item['id']);
                }
            } else {
//                echo "item[id] is empty<br>";
            }
        }/*Loop End*/
        $this->auctionsModel->auctionAttributeFields = $auctionAttrFields;
        /* echo "<pre>auctionAttrFields: <br><br>";
         print_r($auctionAttrFields);
         echo "<pre>auctionAttrFields_2: <br><br>";
         print_r($this->auctionsModel->auctionAttributeFields);*/
    }

    private function uploadAuctionImages()
    {

//         echo "<br><br>uploadAuctionImages: <br><br>";
        $absPath = $this->config->item('resources_abs_path');
//        echo "<br><br>absPath: $absPath<br><br>";
        $absPath = $absPath . "images/auctions/";


        $this->load->library('upload');

        $this->load->helper('image_helper');
        $this->load->helper('upload_helper');
        $this->setupFiles();

        $imagesData = [];
        foreach ($this->imageFiles AS $key => $item) {

            /*echo"<pre>item: $key";
            print_r($item);*/

            /*Making Filnames*/
            $ext = getFileExtension($item['name']);
            $uniqueFilename = getUniqueFileName($absPath, $this->auctionsModel->auctionFields['slug'], $ext);
            $uFileName = [];
            $uFileName['user'] = $uniqueFilename . "." . $ext;
            $uFileName['lg'] = $uniqueFilename . "-lg" . "." . $ext;
            $uFileName['md'] = $uniqueFilename . "-md" . "." . $ext;
            $uFileName['sm'] = $uniqueFilename . "-sm" . "." . $ext;

            /* echo"<br><br><pre>uFileName: $key";
             print_r($uFileName);*/

            /*Uploading Actual Size Image*/
            $config['upload_path'] = $absPath;
            $config['file_name'] = $uFileName['user'];
            $config['allowed_types'] = 'jpg|gif|png|jpeg|JPG|PNG|webp';
            $config['file_ext_tolower'] = TRUE;
            $config['max_size'] = '10000000';
            $config['overwrite'] = FALSE;
            $this->upload->initialize($config);

            $_FILES['auction_image'] = $item;

            if ($this->upload->do_upload("auction_image")) {
                $imagesData[$key]['user'] = $this->upload->data();


                $srcImagePath = $absPath . $uFileName['user'];

                /* UPloading Large Image*/
                $desImagePath = $absPath . $uFileName['lg'];
                if ($this->resizeImage($srcImagePath, $desImagePath, 1400, 1400, 100)) {
                    $this->auctionsModel->auctionDetailFields['image_lg_' . ($key + 1)] = $uFileName['lg'];

                } else {
                    $imagesData[$key]['lg']['error'] = "Failed to resize and upload lg.";
                    break;
                }


                /* UPloading Medium Image*/
                if ($item['size'] > 10000) {
                    /*greater than 100 KB */

                    $desImagePath = $absPath . $uFileName['md'];
                    if ($this->resizeImage($srcImagePath, $desImagePath, 400, 400, 100)) {
                        $this->auctionsModel->auctionDetailFields['image_md_' . ($key + 1)] = $uFileName['md'];
                    } else {
                        $imagesData[$key]['md']['error'] = "Failed to resize and upload md.";
                        break;
                    }
                }
                else{

                }

                /* UPloading Small Image*/
                if ($item['size'] > 10000) {
                    /*greater than 10 KB */

                    $desImagePath = $absPath . $uFileName['sm'];
                    if ($this->resizeImage($srcImagePath, $desImagePath, 200, 200, 70)) {
                        $this->auctionsModel->auctionFields['image_sm_' . ($key + 1)] = $uFileName['sm'];
                    } else {
                        $imagesData[$key]['sm']['error'] = "Failed to resize and upload sm Image no." . ($key + 1);
                        break;
                    }
                }

                /*Removing Orginal Image*/
//                echo "<br><br>".$absPath . $uFileName['user'];
                unlink($absPath . $uFileName['user']);

            } else {
                $imagesData[$key]['error'] = $this->upload->display_errors();
                break;
            }
        }/*Loop End*/


        return $imagesData;
    }

    private function setupFiles()
    {

        /*This method is just reformatting the array structure of files*/
        $this->imageFiles = [];
        // for ($i = 0; $i < count($_FILES['files']['name']); $i++) {
        //     $this->imageFiles[$i]['name'] = $_FILES['files']['name'][$i];
        //     $this->imageFiles[$i]['type'] = $_FILES['files']['type'][$i];
        //     $this->imageFiles[$i]['tmp_name'] = $_FILES['files']['tmp_name'][$i];
        //     $this->imageFiles[$i]['error'] = $_FILES['files']['error'][$i];
        //     $this->imageFiles[$i]['size'] = $_FILES['files']['size'][$i];
        // }
        for ($i = 0; $i < count($_FILES); $i++) {
            if (isset($_FILES['image'.''.$i]['name']) && !empty($_FILES['image'.''.$i]['name'])) {
                $this->imageFiles[$i]['name'] = $_FILES['image'.''.$i]['name'];
                $this->imageFiles[$i]['type'] = $_FILES['image'.''.$i]['type'];
                $this->imageFiles[$i]['tmp_name'] = $_FILES['image'.''.$i]['tmp_name'];
                $this->imageFiles[$i]['error'] = $_FILES['image'.''.$i]['error'];
                $this->imageFiles[$i]['size'] = $_FILES['image'.''.$i]['size'];
            }
            // if (isset($_FILES['image2']['name']) && !empty($_FILES['image2']['name'])) {
            //     $this->imageFiles[$i]['name'] = $_FILES['image2']['name'];
            //     $this->imageFiles[$i]['type'] = $_FILES['image2']['type'];
            //     $this->imageFiles[$i]['tmp_name'] = $_FILES['image2']['tmp_name'];
            //     $this->imageFiles[$i]['error'] = $_FILES['image2']['error'];
            //     $this->imageFiles[$i]['size'] = $_FILES['image2']['size'];
            // }
            // if (isset($_FILES['image3']['name']) && !empty($_FILES['image3']['name'])) {
            //     $this->imageFiles[$i]['name'] = $_FILES['image3']['name'];
            //     $this->imageFiles[$i]['type'] = $_FILES['image3']['type'];
            //     $this->imageFiles[$i]['tmp_name'] = $_FILES['image3']['tmp_name'];
            //     $this->imageFiles[$i]['error'] = $_FILES['image3']['error'];
            //     $this->imageFiles[$i]['size'] = $_FILES['image3']['size'];
            // }
            // if (isset($_FILES['image4']['name']) && !empty($_FILES['image4']['name'])) {
            //     $this->imageFiles[$i]['name'] = $_FILES['image4']['name'];
            //     $this->imageFiles[$i]['type'] = $_FILES['image4']['type'];
            //     $this->imageFiles[$i]['tmp_name'] = $_FILES['image4']['tmp_name'];
            //     $this->imageFiles[$i]['error'] = $_FILES['image4']['error'];
            //     $this->imageFiles[$i]['size'] = $_FILES['image4']['size'];
            // }
            // if (isset($_FILES['image5']['name']) && !empty($_FILES['image5']['name'])) {
            //     $this->imageFiles[$i]['name'] = $_FILES['image5']['name'];
            //     $this->imageFiles[$i]['type'] = $_FILES['image5']['type'];
            //     $this->imageFiles[$i]['tmp_name'] = $_FILES['image5']['tmp_name'];
            //     $this->imageFiles[$i]['error'] = $_FILES['image5']['error'];
            //     $this->imageFiles[$i]['size'] = $_FILES['image5']['size'];
            // }
            
        }

        // return $files;
        // echo "<pre>";
        // print_r($this->imageFiles);
        // exit();
    }

    private function resizeImage($srcPath, $desPath, $width = 200, $height = 200, $quality = 100)
    {

        /*echo "<br><br>resizeImage";
        echo "<br><br>srcPath : $srcPath";
        echo "<br><br>desPath : $desPath";*/
        $this->load->library('image_lib');

        $config['image_library'] = 'gd2';
        $config['source_image'] = $srcPath;
        $config['new_image'] = $desPath;
        $config['quality'] = "$quality%";
        $config['maintain_ratio'] = TRUE;
        $config['width'] = $width;
        $config['height'] = $height;

        $this->image_lib->clear();
        $this->image_lib->initialize($config);
        $result = $this->image_lib->resize();
        return $result;
    }

    public function getById($id)
    {
        return $this->auctionsModel->get_all(array('id' => $id));
    }

    public function getAuctionByCategory1Id($category1ID, $postType)
    {
        return $this->auctionsModel->get_all(array('category1_id' => $category1ID, 'type' => $postType));

    }

    public function getAuctionByCategory2Id($category2ID, $postType)
    {
        return $this->auctionsModel->get_all(array('category2_id' => $category2ID, 'type' => $postType));
    }

    public function getAuctionByCategory3Id($category3ID, $postType)
    {
        return $this->auctionsModel->get_all(array('category3_id' => $category3ID, 'type' => $postType));
    }

    public function hasRange($id)
    {
        $columns = ['start_price'];
        $result = $this->auctionsModel->fields($columns)->get(array('id' => $id, 'bid_type' => 'range'));

        if ($result['start_price'] !== NULL) {
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

    public function getRange($id)
    {
        $columns = ['start_price', 'end_price'];
        return $this->auctionsModel->fields($columns)->get(array('id' => $id));
    }

    public function getByUserId($userId)
    {
        return $this->auctionsModel->get_all(array('user_id' => $userId));
    }

    public function getByUserIdandType($userId,$type)
    {
        return $this->auctionsModel->get_all(array('user_id' => $userId, 'type' => $type));
    }

    public function getByUserIdandTypeWithCat3($userId,$type)
    {
        return $this->auctionsModel->withcat3($userId,$type);
    }

    public function getByIdandType($id, $type)
    {
        return $this->auctionsModel->get_all(array('id' => $id, 'type' => $type));
    }

    public function countByTypeWithExpireValid($type)
    {
        return $this->auctionsModel->countByType($type);
    }
     public function countByTypeWithExpireValidAndType($mode,$type)
    {
        return $this->auctionsModel->countByTypeAndMode($mode,$type);
    }
     public function countByTypeWithExpireValidAndTypeFollowing($mode,$type,$UserFollowing)
    {
        return $this->auctionsModel->countByTypeAndModeFollowing($mode,$type,$UserFollowing);
    }


    /*UZair work starts*/

    public function getAuctionFields()
    {
        return $this->auctionsModel->auctionFields;
    }

    public function getAuctionDetails($slug)
    {
        //echo "Module=Auction , Method=getAuctionDetails";
        return $auctions = $this->auctionsModel->getAuctionAndDetailsBySlug($slug);
        /*echo"<pre>";
        print_r($auctions);*/
    }

    public function getAuctionAttributes($where)
    {
        return $this->auctionAttributeModel->get_all($where);
    }

    public function incrementBidCounter($id)
    {
        $auction = $this->auctionsModel->get(array('id' => $id));
        $bidCount = $auction['bid_count'] + 1;
        $array = array('bid_count' => $bidCount);
        $this->update($id, $array);
    }

    public function update($whereArray, $valuesArray)
    {
        return $this->auctionsModel->where($whereArray)->update($valuesArray);
    }

    public function decrementBidCounter($id)
    {
        $auction = $this->auctionsModel->get(array('id' => $id));

        $bidCount = $auction['bid_count'] - 1;

        $whereArray = array('id' => $id);

        $valuesArray = array('bid_count' => $bidCount);

        $this->update($whereArray, $valuesArray);
    }

    public function getSearchResult($sort,$currency,$postType,$search,$limit)
    {
        return $this->auctionsModel->get_search_results($sort,$currency,$postType,$search,$limit);
    }
    public function getCountSearchResult($currency,$postType,$search)
    {
        return $this->auctionsModel->get_count_search_results($currency,$postType,$search);
    }
    public function getSearchResultautoComplete($columns,$where,$like)
    {
        return $this->auctionsModel->get_search_results_autoComplete($columns,$where,$like);
    }

    public function getLimitedByType($mode, $start, $end, $type)
    {
        $user = $this->get_logged_in_user();

        return $this->auctionsModel->getLimitedByType($mode, $start, $end, $type,$user['id']);
    }
    public function getLimitedByTypeCityId($mode, $start, $end, $type,$city_id)
    {
        //$user = $this->get_logged_in_user();

        return $this->auctionsModel->getLimitedByTypeCity($mode, $start, $end, $type,$city_id);
    }
    public function getLimitedByTypeFollwing($mode, $start, $end, $type,$UserFollowing)
    {
        //$user = $this->get_logged_in_user();

        return $this->auctionsModel->getLimitedByTypeFollwing($mode, $start, $end, $type, $UserFollowing);
    }

    public function getLastTenByType($type)
    {
        return $this->auctionsModel->countByType($type);
    }

    public function getByType($type)
    {
        return $this->auctionsModel->where(array('type' => $type))->as_array()->get_all();
    }

    /*UZair work end*/
    /*hasnain work for rating and review*/
    public function addRatingReview()
    {
        $this->form_validation->set_rules('description', 'Description', 'required|strip_tags');
        $this->form_validation->set_rules('rating', 'Rating', 'required|strip_tags');
        $this->form_validation->set_rules('auction_id', 'Auction Id', 'required|strip_tags');
        $this->form_validation->set_rules('user_id', 'User Id', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            /*how to return from here?*/
            return false;
            /*return to previous page*/
        } else {
            $name = '';//$this->input->post('name', TRUE);
            $description = $this->input->post('description', TRUE);
            $rating = $this->input->post('rating', TRUE);
            $auction_id = $this->input->post('auction_id', TRUE);
            $user_id = $this->input->post('user_id', TRUE);

            $res = $this->auctionsModel->ratingReview($name, $description, $rating, $auction_id, $user_id);
        }
    }
    public function addReviewReply()
    {
        $this->form_validation->set_rules('description', 'Description', 'required|strip_tags');
        $this->form_validation->set_rules('review_id', 'Review Id', 'required|strip_tags');
        $this->form_validation->set_rules('auction_id', 'Auction Id', 'required|strip_tags');
        $this->form_validation->set_rules('user_id', 'User Id', 'required|strip_tags');

        if ($this->form_validation->run() == FALSE) {
            /*how to return from here?*/
            return false;
            /*return to previous page*/
        } else {
            $name = '';//$this->input->post('name', TRUE);
            $description = $this->input->post('description', TRUE);
            $review_id = $this->input->post('review_id', TRUE);
            $auction_id = $this->input->post('auction_id', TRUE);
            $user_id = $this->input->post('user_id', TRUE);

            $res = $this->auctionsModel->ReviewReply($description, $review_id, $auction_id, $user_id);
        }
    }

    private function createSlug($name)
    {
        return $this->slug->create_uri($name);

    }
    public function getFilteredPrivateProducts()
    {

        $currency = $this->input->get('currency');
        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');


        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];

        $userId = $this->loggedInUser['id'];
        // print_r($sort);
        // exit();
        //multiply pageno with 2 and
        // 2 is temprory limit and will be 20 in future
        /*if (!empty($limit)) {
            //setting offset for limit
            $limit = ($limit-1)*2;
            //$limit = $limit*2;
        }*/
        // $buyType = 'buy';
        // $sellType = 'sell';


        $Auctions = $this->auctionsModel->getAuctionsByAttributes($type, $userId, $this->sort_private[$sort - 1], $limit,$currency);

        $AuctionCount = $this->auctionsModel->countAuctionsByUserId($userId, $type,$currency);
//  print_r($AuctionCount);
//  echo "<pre>";
//  print_r($Auctions);
//  exit();

        if (!empty($Auctions) && is_array($Auctions) && count($Auctions) > 0) {


            $this->data['user']['buyingAuctions'] = $Auctions;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/user_auctions_filtered";

            $this->response['data'] = $Auctions;
            $this->response['totalNumber'] = $AuctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Received";
            $this->response['html'] = $this->load->view("$this->modulePath/user_auctions_filtered", $this->data['user'], TRUE);
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
    public function getFilteredProductsBuy()
    {
        $currency = $this->input->get('currency');
        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');
        $userId = $this->input->get('user_id');


        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];

        //$userId = $this->loggedInUser['id'];
        // print_r($sort);
        // exit();
        //multiply pageno with 2 and
        // 2 is temprory limit and will be 20 in future
        /*if (!empty($limit)) {
            //setting offset for limit
            $limit = ($limit-1)*2;
            //$limit = $limit*2;
        }*/
        // $buyType = 'buy';
        // $sellType = 'sell';


        $Auctions = $this->auctionsModel->getAuctionsByAttributes($type, $userId, $this->sort_private[$sort - 1], $limit,$currency);

        $AuctionCount = $this->auctionsModel->countAuctionsByUserId($userId, $type,$currency);
 

        if (!empty($Auctions) && is_array($Auctions) && count($Auctions) > 0) {


            $this->data['user']['buyingAuctions'] = $Auctions;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/user_buy_auctions_filtered";

            $this->response['data'] = $Auctions;
            $this->response['totalNumber'] = $AuctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/user_buy_auctions_filtered", $this->data['user'], TRUE);
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

    public function getFilteredProductsSell()
    {
        $currency = $this->input->get('currency');
        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');
        $userId = $this->input->get('user_id');


        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];

        //$userId = $this->loggedInUser['id'];
        //print_r($limit);
        //multiply pageno with 2 and
        // 2 is temprory limit and will be 20 in future
        /*if (!empty($limit)) {
            //setting offset for limit
            $limit = ($limit-1)*2;
            //$limit = $limit*2;
        }*/
        $buyType = 'buy';
        $sellType = 'sell';


        $sellingAuctions = $this->auctionsModel->getAuctionsByAttributes($sellType, $userId, $this->sort_private[$sort - 1], $limit,$currency);

        $sellingAuctionCount = $this->auctionsModel->countAuctionsByUserId($userId, $sellType,$currency);
        // echo "<pre>";
        // print_r($sellingAuctions);
        // die;

        if (!empty($sellingAuctions) && is_array($sellingAuctions) && count($sellingAuctions) > 0) {


            $this->data['user']['sellingAuctions'] = $sellingAuctions;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/user_sell_auctions_filtered";

            $this->response['data'] = $sellingAuctions;
            $this->response['totalNumber'] = $sellingAuctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/user_sell_auctions_filtered", $this->data['user'], TRUE);
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
    public function deleteAuction($id = NULL)
    {

        $acceptedBids = $this->bids->bm->get_all(['auction_id' => $id , 'status' => 'accept']);
        //print_r($acceptedBids); die;

        if (empty($acceptedBids)) {
            $acceptedBids = $this->bids->bm->get_all(['auction_id' => $id, 'status' => 'accept']);
            //print_r($acceptedBids); die;

            if (empty($acceptedBids)) {
                $deleteAuction = $this->auctionsModel->deleteAuctionById($id);
                if ($deleteAuction == TRUE) {
                    //print_r($deleteAuction);
//                echo "done";
                    redirect('auctions');
                } else {
                    redirect('auctions');
                }
            } else {
                $this->session->set_flashdata('msgType', 'info');
                $this->session->set_flashdata('msg', 'FAILED! Auction has an accepted Bid.');
                redirect('auctions');
            }
        }
        //$this->load->view("$this->modulePath/detail_v", $data);
    }

    public function inactive ($id){
        echo "<pre>INACTIVE ".$this->data['user']['header']['return_url'];

        $user = $this->get_logged_in_user();

        $auction = $this->auctionsModel->get_all(['id' => $id , 'user_id' => $user['id']]);

        $msgType = "";
        $msg = "";
        if(!empty($auction)){
            if($this->auctionsModel->update(['status' => 0],['id' => $id])){
                $msgType = "info";
                $msg = "SUCCESSFUL! Auction In Active";
            }else{
                $msgType = "info";
                $msg = "FAILED! Auction Active";
            }
            $this->session->set_flashdata('msgType', $msgType);
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url('auction/'.$auction[0]['slug']));
        }
    }

    public function active ($id){
        echo "<pre>INACTIVE ".$this->data['user']['header']['return_url'];

        $user = $this->get_logged_in_user();

        $auction = $this->auctionsModel->get_all(['id' => $id , 'user_id' => $user['id']]);

        $msgType = "";
        $msg = "";
        if(!empty($auction)){
            if($this->auctionsModel->update(['status' => 1],['id' => $id])){
                $msgType = "info";
                $msg = "SUCCESSFUL! Auction Active";
            }else{
                $msgType = "info";
                $msg = "FAILED! Auction In Active";
            }
            $this->session->set_flashdata('msgType', $msgType);
            $this->session->set_flashdata('msg', $msg);
            redirect(base_url('auction/'.$auction[0]['slug']));
        }
    }

    public function getAllCurrency()
    {
        $currency = $this->auctionsModel->getCurrencies();  
        return $currency;      
    }
    public function Add_favourites($value)
    {

        $user = $this->get_logged_in_user();
        //print_r($user);

        if (!empty($value)) {
            $auction_id = $value;

            if (isset($user) && !empty($user)) {

                $check_already_added = $this->auctionsModel->addFavorite_check($user['id'], $auction_id);

                if ($check_already_added >= 1) {
                    $this->response['data'] = "Faild";
                    $this->response['status'] = FALSE;
                    $this->response['code'] = "404";
                    $this->response['title'] = "Faild";
                    $this->response['message'] = "You Have Already Added This Auction In Favourite List";

                    echo json_encode($this->response);
                    return;
                }




                $res = $this->auctionsModel->addFavorite($user['id'], $auction_id);

                if ($res === TRUE) {
                    //echo "inserted";
                    $this->response['data'] = "Added";
                    $this->response['status'] = TRUE;
                    $this->response['code'] = "100";
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Added To Favourite";

                    echo json_encode($this->response);

                } else {
                    $this->response['data'] = "Failed";
                    $this->response['status'] = FALSE;
                    $this->response['code'] = "404";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Failed to add";

                    echo json_encode($this->response);
                }
            } else {
                $this->response['data'] = "Failed";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "You have to login First";

                echo json_encode($this->response);
            }

        } else {
            return;
        }


    }
    public function deleteUserAuction($auction_id='')
    {
        $auction_id = $this->input->get("auction_id");

        if (isset($auction_id) && !empty($auction_id)) {

            //check for user is correct

            //checking if there are no bids
            $res = $this->auctionsModel->CheckBids($auction_id);

            if ($res == 0) {
                //deleting the auctiom
                $re = $this->auctionsModel->DeleteUserAuction($auction_id);

                if ($re === TRUE) {
                    $this->response['Type'] = "messageSuccess";
                    $this->response['status'] = TRUE;
                    $this->response['code'] = "404";
                    $this->response['title'] = "Success";
                    $this->response['message'] = "Auction Deleted Successfully";

                    echo json_encode($this->response);
                    exit();
                }
                else{
                    $this->response['Type'] = "messageError";
                    $this->response['status'] = FALSE;
                    $this->response['code'] = "404";
                    $this->response['title'] = "Success";
                    $this->response['message'] = "Faild To Delete The Auction";

                    echo json_encode($this->response);
                    exit();
                }
            }
            else{
                $this->response['Type'] = "messageError";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "You Can Not Delete The Auction,There Are Some Bids On That";

                echo json_encode($this->response);
            }
            
            
        }
        else{
                $this->response['Type'] = "messageError";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Some Error Occured During Deletion";

                echo json_encode($this->response);

        }
    }
    public function getUserFollowing($user_id='')
    {
        return $this->auctionsModel->getUserFollowing($user_id);
    }
    public function my_favourites($value='')
    {
        $this->data['user']['sort'] = $this->sort;
        
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $this->data['user']['currentDate'] = $this->serverDateTime;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
        $auctionType = $currentMode == 'buy' ? 'sell' : 'buy';



        //$auctions = $this->auctions->getSearchResult($columns,$where,$like);

      
        //$this->data['user']['auctions'] = $auctions;

        $this->data['user']['content_view'] = "$this->modulePath/my_favourites_v";
        // echo "<pre>";
        // print_r($this->data['user']);
        // exit();
        // $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
        //     $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
        //     $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function getMyFavouriteProducts($value='')
    {
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        $this->data['user']['currentDate'] = $this->serverDateTime;


        $sort = $this->input->get('sort');
        $postType = $this->input->get('type');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $currency = $this->input->get('currency');
       


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
    
        $auctions = $this->auctionsModel->myfavouriteAuctions($this->sort[$sort-1],$currency,$postType,$limit,$this->loggedInUser['id']);

        $auctionCount = $this->auctionsModel->myfavouriteAuctionsCount($currency,$postType,$limit,$this->loggedInUser['id']);
        // echo "<pre>";
        // print_r($auctions);
        // echo "<pre>";
        // print_r($auctionCount);
        // die;

        if (!empty($auctions) && (is_array($auctions) && count($auctions) > 0)) {
            $this->data['user']['auctions'] = $auctions;
            $this->data['user']['content_view'] = "$this->modulePath/my_favourites_v_filtered";

            $this->response['data'] = $auctions;
            $this->response['totalNumber'] = $auctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/my_favourites_v_filtered", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
             $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
             $this->response['html'] = "<h4>No Auctions Alert Found</h4>";
             echo json_encode($this->response);
             

            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }
}