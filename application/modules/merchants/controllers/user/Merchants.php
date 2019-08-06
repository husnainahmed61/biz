<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 12-May-18
 * Time: 11:51 AM
 */
class Merchants extends User_Controller
{
    private $response = [];
    private $moduleName ;
    private $slugConfig ;
    private $loggedInUser;

    /**
     * Account constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->moduleName = 'merchants';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Merchants';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        $this->load->model('Users_m', 'usersM', TRUE);
        $this->load->model('User_details_m', 'userDetailsM', TRUE);

        $this->slugConfig = array(
            'table' => $this->cat1Model->table,
            'id' => 'id',
            'field' => 'slug',
            'title' => 'name',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->slug->set_config($this->slugConfig);
        $this->loggedInUser = $this->get_logged_in_user(); 

        /*$this->data['user']['head']['pageLevelPlugins']['css'] =   ['jq-file-upload','bs-select'];*/
        $this->data['user']['foot']['pageLevelPlugins']['js'] =    ['bs-select', 'pagination'];
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
    }


    public function index()
    {
        //$this->show($slug);
    }

    public function show($slug = NULL)
    {
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $user = $this->getBySlug($slug);
        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);

        $buyingAuctions = $this->auctions->getByUserIdandType($user['id'],'buy');
        $sellingAuctions = $this->auctions->getByUserIdandType($user['id'],'sell');

        $buyingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'buy');
        $sellingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'sell');

        $Visitor = $this->get_logged_in_user();
        $checkFollowing = $this->checkFollowing($Visitor['id'],$user['id']);

        // echo "<pre>";
        // print_r($buyingAuctionswithCat3); exit();

        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $this->data['user']['userData'] =   $user;
        $this->data['user']['country']  =   $country;
        $this->data['user']['state']    =   $state;
        $this->data['user']['city']     =   $city;

        $this->data['user']['buyingAuctions']       =   $buyingAuctionswithCat3;
        $this->data['user']['sellingAuctions']      =   $sellingAuctionswithCat3;
        $this->data['user']['following']      =   $checkFollowing;
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['content_view']      =   "$this->modulePath/public_profile_v";


         // echo "<pre>";
         // print_r($this->data['user']); exit();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function checkFollowing($Visitor_id='',$user_id='')
    {
        $checkFollowing = $this->usersM->checkFollowing($Visitor_id,$user_id);
        return $checkFollowing;
    }

    public function buying_posts($slug = NULL)
    {
        //print_r($slug); exit;
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $user = $this->getBySlug($slug);
        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);

        //$buyingAuctions = $this->auctions->getByUserIdandType($user['id'],'buy');
        //$sellingAuctions = $this->auctions->getByUserIdandType($user['id'],'sell');

        $buyingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'buy');
        //$sellingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'sell');

        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['sort_private'] = $this->sort_private;

        $this->data['user']['pageLimit'] = $this->pageLimit;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        // echo "<pre>";
        // print_r($buyingAuctionswithCat3); exit();
        $Visitor = $this->get_logged_in_user();
        $checkFollowing = $this->checkFollowing($Visitor['id'],$user['id']);
        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $this->data['user']['userData'] =   $user;
        $this->data['user']['country']  =   $country;
        $this->data['user']['state']    =   $state;
        $this->data['user']['city']     =   $city;
        $this->data['user']['following']      =   $checkFollowing;
        $this->data['user']['buyingAuctions']       =   $buyingAuctionswithCat3;
        //$this->data['user']['sellingAuctions']      =   $sellingAuctionswithCat3;
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['content_view']      =   "$this->modulePath/public_profile_v";


        // echo "<pre>";
        // print_r($this->data['user']); exit();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }

    public function selling_posts($slug = NULL)
    {
        //print_r($slug); exit;
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $user = $this->getBySlug($slug);
        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);

        //$buyingAuctions = $this->auctions->getByUserIdandType($user['id'],'buy');
        //$sellingAuctions = $this->auctions->getByUserIdandType($user['id'],'sell');

        $buyingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'buy');
        //$sellingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'sell');

        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['sort_private'] = $this->sort_private;

        $this->data['user']['pageLimit'] = $this->pageLimit;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        // echo "<pre>";
        // print_r($buyingAuctionswithCat3); exit();
        $Visitor = $this->get_logged_in_user();
        $checkFollowing = $this->checkFollowing($Visitor['id'],$user['id']);
        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $this->data['user']['userData'] =   $user;
        $this->data['user']['country']  =   $country;
        $this->data['user']['state']    =   $state;
        $this->data['user']['city']     =   $city;
        $this->data['user']['following']      =   $checkFollowing;
        $this->data['user']['buyingAuctions']       =   $buyingAuctionswithCat3;
        //$this->data['user']['sellingAuctions']      =   $sellingAuctionswithCat3;
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['content_view']      =   "$this->modulePath/public_profile_v";


        // echo "<pre>";
        // print_r($this->data['user']); exit();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function followers($slug = NULL)
    {
        //print_r($slug); exit;
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $user = $this->getBySlug($slug);
        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);

        //$buyingAuctions = $this->auctions->getByUserIdandType($user['id'],'buy');
        //$sellingAuctions = $this->auctions->getByUserIdandType($user['id'],'sell');
        $Visitor = $this->get_logged_in_user();
        $checkFollowing = $this->checkFollowing($Visitor['id'],$user['id']);
        $getFollowers = $this->getFollowers($user['id']);
        $getVisitorFollowing = $this->getVisitorFollowing($Visitor['id']);
        $buyingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'buy');
        //$sellingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'sell');

        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['sort_private'] = $this->sort_private;

        $this->data['user']['pageLimit'] = $this->pageLimit;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        

        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $this->data['user']['userData'] =   $user;
        $this->data['user']['country']  =   $country;
        $this->data['user']['state']    =   $state;
        $this->data['user']['city']     =   $city;
        $this->data['user']['following']      =   $checkFollowing;
        $this->data['user']['followers_list']      =   $getFollowers;
        $this->data['user']['buyingAuctions']       =   $buyingAuctionswithCat3;
        //$this->data['user']['sellingAuctions']      =   $sellingAuctionswithCat3;
        //getfollowing result of visitor id
        $this->data['user']['getVisitorfollowing']      =   $getVisitorFollowing;
        $this->data['user']['content_view']      =   "$this->modulePath/public_profile_v";
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();

        // echo "<pre>";
        // print_r($this->data['user']); exit();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function getFollowers($user_id)
    {
        $getFollowers = $this->usersM->getFollowersOfId($user_id);
        return $getFollowers;
    }
    public function getVisitorFollowing($VisitorId='')
    {
        $getVisitorfollowing = $this->usersM->getVisitorfollowing($VisitorId);
        return $getVisitorfollowing;
    }
    public function following($slug = NULL)
    {
        //print_r($slug); exit;
        $this->data['user']['currentDate'] = $this->serverDateTime;

        $user = $this->getBySlug($slug);
        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);
        $Visitor = $this->get_logged_in_user();
        $checkFollowing = $this->checkFollowing($Visitor['id'],$user['id']);
        //$buyingAuctions = $this->auctions->getByUserIdandType($user['id'],'buy');
        //$sellingAuctions = $this->auctions->getByUserIdandType($user['id'],'sell');
        $getVisitorFollowing = $this->getVisitorFollowing($Visitor['id']);
        $buyingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'buy');
        //$sellingAuctionswithCat3 = $this->auctions->getByUserIdandTypeWithCat3($user['id'],'sell');
        $getFollowings = $this->getFollowing($user['id']);
        $this->data['user']['sort'] = $this->sort;
        $this->data['user']['sort_private'] = $this->sort_private;

        $this->data['user']['pageLimit'] = $this->pageLimit;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        // echo "<pre>";
        // print_r($buyingAuctionswithCat3); exit();

        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $this->data['user']['userData'] =   $user;
        $this->data['user']['country']  =   $country;
        $this->data['user']['state']    =   $state;
        $this->data['user']['city']     =   $city;
        $this->data['user']['following']      =   $checkFollowing;
        $this->data['user']['following_list']      =   $getFollowings;
        $this->data['user']['getVisitorfollowing']      =   $getVisitorFollowing;
        $this->data['user']['buyingAuctions']       =   $buyingAuctionswithCat3;
        //$this->data['user']['sellingAuctions']      =   $sellingAuctionswithCat3;

        $this->data['user']['content_view']      =   "$this->modulePath/public_profile_v";
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();

        // echo "<pre>";
        // print_r($this->data['user']); exit();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function getFollowing($user_id)
    {
        $getFollowing = $this->usersM->getFollowingOfId($user_id);
        return $getFollowing;
    }

    public function getById($id)
    {
        return $this->usersM->get(array('id' => $id));
    }

    public function getBySlug($slug)
    {
        return $this->usersM->get(array('slug' => $slug));
    }

    public function getByUserId($userId)
    {
        return $this->userDetailsM->get(array('user_id' => $userId));
    }

    public function logout()
    {
        $this->logout_user();
        redirect($this->input->get('return_url'));
    }

    /*UZair Work starts*/
    public function emailCheck($email)
    {
        return $this->userDetailsM->get(array('email' => $email, 'account_status' => 'verified'));
    }

    public function chechkEmailToken($emailToken)
    {
        return $this->userDetailsM->get(array('email_token' => $emailToken, 'account_status' => 'verified'));
    }

    public function updatePassword($emailToken,$password)
    {
        return $this->userDetailsM->where(array('email_token' => $emailToken, 'account_status' => 'verified'))->update(array('password_en' => $this->my_encrypt->encode($password)));
    }

    public function getTokenById($id)
    {
        return $this->userDetailsM->get(array('user_id' => $id));
    }
    /*UZair Work ends*/

    public function login(){

        //printDataDie($this->data['user']);
        $this->setupHeader1();
        $this->setupNav();
        $this->data['user']['content_view'] = "$this->modulePath/login_v";
        //printDataDie($this->data);
        $this->template->setup_template($this->data['user']);
    }
    public function addSubscriber($value='')
    {
        //print_r($this->input->post());
        $email = $this->input->post('email');
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
              
                $this->response['status'] = FALSE;
                $this->response['type'] = "messageError";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Invalid email format";
                echo json_encode($this->response);
                exit();
            }
        $checkEmail = $this->usersM->checkEmail($email);
        if ($checkEmail === FALSE) {
           $insertEmail = $this->usersM->insertEmail($email);
           if ($insertEmail === TRUE) {
               $this->response['status'] = TRUE;
                $this->response['type'] = "messageSuccess";
                $this->response['title'] = "Success";
                $this->response['message'] = "Thanks For Subcribing Us.";
                echo json_encode($this->response);
                exit();
           }
           else{
            $this->response['status'] = FALSE;
            $this->response['type'] = "messageError";
            $this->response['title'] = "Failed";
            $this->response['message'] = "There Is An Error For Submitting the Email Address";
            echo json_encode($this->response);
            exit();
           }
        }
        else{
            $this->response['status'] = FALSE;
            $this->response['type'] = "messageInfo";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Email Address Already Submitted";
            echo json_encode($this->response);
            exit();
        }

            
    }

}