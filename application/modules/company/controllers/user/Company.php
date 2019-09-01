<?php

/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:27 AM
 */
class Company extends User_Controller
{
    public $response;

    function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->load->model('Company_m', 'companyModel', TRUE);
        $this->load->model('Alert_attributes_m', 'alertsAttributeModel', TRUE);

        $this->moduleName = 'company';
        $this->modulePath = "$this->moduleName/$this->userName";


        $this->loggedInUser = $this->get_logged_in_user(); //UZair
        $this->data['user']['head']['pageLevelPlugins']['css'] = ['bs-select'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['bs-select','pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

        $this->alertData = ['type' => "", 'user_id' => "", 'category1_id'  => "", 'category2_id'  => "", 'category3_id'  => "", 'title' => "",];

        $this->sort_private = [
            [
                'text' => 'Name (A - Z)',
                'colName' => 'a.name',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Name (Z - A)',
                'colName' => 'a.name',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Latest to Oldest',
                'colName' => 'a.created_at',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Oldest to Latest',
                'colName' => 'a.created_at',
                'direction' => 'ASC'
            ]
        ];
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

    }

    // public function index()
    // {
    //     if ($this->check_user_authentication('', 'home')) {
    //         $this->data['user']['pageHeader'] = 'Alerts';

    //         $this->data['user']['sort_private'] = $this->sort_private;
    //         $this->data['user']['content_view'] = "$this->modulePath/show_v";

    //         $this->setupNav();
    //         $this->setupHeader1();
    //         $this->template->setup_private_template($this->data['user']);
    //     }
    // }

    public function index()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/dashboard_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function basic_settings()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $userDetails  = $this->merchants->userDetailsM->getUserWithDetails(
                "first_name,last_name,slug,profile_picture,type,phone,country_id,state_id,city_id,business_name,business_description,tax_number,registered_address,website_url,RFQ_expiry,currency_id,legal_address",
                ['u.id'=>$user['id'],'u.is_company'=>1]);
            $this->data['user']['userDetails'] = $userDetails[0];
            $this->data['user']['countries']= $this->countries->countriesM->get_all(['is_active' => 1]);
            $this->data['user']['states']= $this->states->statesM->get_all(['country_id' => $userDetails[0]['country_id'], 'is_active' => 1]);
            $this->data['user']['cities']= $this->cities->citiesM->get_all(['state_id' => $userDetails[0]['state_id'], 'is_active' => 1 ]);
            /*Uzair work starts*/
            $this->profiles->getProfileData();

            if (!empty($auction_id) /*&& !empty($auctioneer_id) && !empty($user_id)*/) {
                //$this->data['user']['auction']
                $res = $this->usersM->getAuctionDetail($auction_id,$this->loggedInUser['id']);
                if (isset($res) && !empty($res)) {
                    $this->data['user']['auction'] = $res;
                }
                //print_r($res);
                //exit();
            }
            $userId = $this->loggedInUser['id'];
            $user = $this->merchants->getTokenById($userId);
            $token = $user['email_token'];
            $this->data['user']['token'] = $token;

            //$this->getAuctions();
            /*Uzair work ends*/

            // echo "<pre>";
            // print_r($this->data['user']['auction']); die;
            $this->data['user']['currencies'] = $this->auctions->auctionsModel->getCurrencies();
            $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();


            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/basic_settings_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function tax_Settings()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);
            $this->data['user']['all_taxes']= $this->companyModel->get_all_taxes($user['user_of_company']);
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/tax_setting_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function add_tax()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //get tax id for edit
            $tax_id = $this->input->get('tax');
            if (isset($tax_id) && !empty($tax_id)) {
                 $this->data['user']['single_tax']=$result = $this->companyModel->get_tax($tax_id);
             } 
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_tax_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function storeTax()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $id = $this->input->post("id");
            if (isset($id) && !empty($id) ){
               $res = $this->companyModel->upadteTax($_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Tax updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Tax Updation Failed";
                }
            }
            else{
                $res = $this->companyModel->storeTax($user,$_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Tax Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Tax Adding Failed";
                }
            }
           
            echo json_encode($this->response);
        }
    }
    public function delete_tax()
    {
        $tax_id = $this->input->get('tax');
        $res = $this->companyModel->deleteTax($tax_id);
            if ($res === TRUE) {
                $this->response['status'] = TRUE;
                $this->response['type'] = 'Successful';
                $this->response['title'] = "Successful";
                $this->response['message'] = "Tax Deleted Successfully";
            }
            else{
                $this->response['status'] = FALSE;
                $this->response['type'] = "Failed";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Tax Deletion Failed";
            }
        echo json_encode($this->response);
    }

    public function location_managment()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/location_managment_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function add_warehouse()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_warehouse_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function store_warehouse($value='')
    {
        
    }
    public function add_inventory()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();


            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_inventory_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function inventory_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['all_items'] = $this->db->select("*")->from("ssx_dummy_items")->get()->result_array();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/inventory_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function add_supplier()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_supplier_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function supplier_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $this->data['user']['all_suppliers'] = $this->db->select("*")->from("ssx_dummy_supplier")->get()->result_array();
           
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/supplier_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function add_user()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $user_id = $this->input->get("user");
            if (isset($user_id) && !empty($user_id)) {
                $this->data['user']['user_data'] = $this->companyModel->getUserData($user_id);
            }

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_user_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function storeUser($value='')
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $id = $this->input->post("id");
            if (isset($id) && !empty($id)) {
                 $res = $this->companyModel->updateUser($_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "User Updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "User Updation Failed";
                }
             }
             else{
                $res = $this->companyModel->storeUser($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "User Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "User Adding Failed";
                }
             } 
            echo json_encode($this->response);
            
        }
    }
    public function user_managment()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);
            $this->data['user']['all_users'] = $this->companyModel->getAllUsers($user);
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/user_managment_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function updateUserRole()
    {
        $user_id = $this->input->get('user_id');
        $roles = $this->input->get("roles");
        // print_r(explode(",",$roles));
        // exit();
        $res = $this->companyModel->updateUserRole($user_id,$roles);
            if ($res === TRUE) {
                $this->response['status'] = TRUE;
                $this->response['type'] = 'Successful';
                $this->response['title'] = "Successful";
                $this->response['message'] = "User Roles Updated Successfully";
            }
            else{
                $this->response['status'] = FALSE;
                $this->response['type'] = "Failed";
                $this->response['title'] = "Failed";
                $this->response['message'] = "User Roles Updation Failed";
            }
        echo json_encode($this->response);
    }
    public function create_pr()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/create_pr_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function pr_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/pr_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function rfq_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/rfq_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function rfq_log()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/rfq_log_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function po_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['all_suppliers'] =  $this->db->select("*")->from("ssx_dummy_supplier")->get()->result_array();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/po_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function reports()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/reports_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    
}