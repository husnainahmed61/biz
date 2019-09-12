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

        $this->get_user_roles();
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
            
            $this->data['user']['all_warehouses'] = $this->companyModel->get_all_warehouses($user['user_of_company']);
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
            $warehouse_id = $this->input->get('warehouse');
            
            if (isset($warehouse_id) && !empty($warehouse_id)) {
                 $this->data['user']['single_warehouses'] = $this->companyModel->get_warehouse($warehouse_id);
             } 
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
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $id = $this->input->post("id");
            if (isset($id) && !empty($id) ){
               $res = $this->companyModel->upadteWarehouse($_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Location updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Location Updation Failed";
                }
            }
            else{
                $res = $this->companyModel->storeWarehouse($user,$_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Location Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Location Adding Failed";
                }
            }
           
            echo json_encode($this->response);
        }
    }
    public function add_inventory()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $item_id = $this->input->get('item');
            
            if (isset($item_id) && !empty($item_id)) {
                 $this->data['user']['single_item'] = $this->companyModel->get_item($item_id);
             } 

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_inventory_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function storeInventory()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $id = $this->input->post("id");
            if (isset($id) && !empty($id) ){
               $res = $this->companyModel->updateInventory($_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Item updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Item Updation Failed";
                }
            }
            else{
                $res = $this->companyModel->storeInventory($user,$_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Item Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Item Adding Failed";
                }
            }
           
            echo json_encode($this->response);
        }
    }
    public function inventory_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            
            $this->data['user']['all_items'] = $this->companyModel->get_all_inventory($user['user_of_company']);
            
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

            $supplier_id = $this->input->get('supplier');
            
            if (isset($supplier_id) && !empty($supplier_id)) {
                 $this->data['user']['single_supplier'] = $this->companyModel->get_supplier($supplier_id);
             }

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/add_supplier_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function storeSupplier($value='')
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $id = $this->input->post("id");
            if (isset($id) && !empty($id) ){
               $res = $this->companyModel->updateSupplier($_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Supplier updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Supplier Updation Failed";
                }
            }
            else{
                $res = $this->companyModel->storeSupplier($user,$_POST);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Supplier Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Supplier Adding Failed";
                }
            }
           
            echo json_encode($this->response);
        }
    }
    public function supplier_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $this->data['user']['all_suppliers'] = $this->companyModel->getAllSuppliers($user['user_of_company']);
           
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
                $checkUser = $this->companyModel->checkUser($_POST);
                if ($checkUser >= 1) {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Email Already in use";
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
    public function storePr()
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
                $res = $this->companyModel->storePr($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Pr Added Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Pr Adding Failed";
                }
             } 
            echo json_encode($this->response);
            
        }
    }
    public function pr_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['all_prs'] = $this->companyModel->getAllPr($user['user_of_company']);
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/pr_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function updatePrStatus()
    {
        if ($this->check_user_authentication('', 'home')) {
            $get = $this->input->get();
            //$roles = $this->input->get("roles");
            // print_r(explode(",",$roles));
            // exit();
            $res = $this->companyModel->updatePrStatus($get);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "PR Approved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Approve Failed";
                }
            echo json_encode($this->response);
        }
    }
    public function updatePrStatusdisApprovePr()
    {
        if ($this->check_user_authentication('', 'home')) {
            $get = $this->input->get();
            //$roles = $this->input->get("roles");
            // print_r(explode(",",$roles));
            // exit();
            $res = $this->companyModel->updatePrStatusdisApprovePr($get);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "PR DisApproved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "DisApprove Failed";
                }
            echo json_encode($this->response);
        }
    }


    public function rfq_list()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['company_settings'] = $this->companyModel->getcompanysettings($user['user_of_company']);
            $this->data['user']['all_rfq'] = $this->companyModel->getAllRfq($user['user_of_company']);
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/rfq_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function get_rfq_suppliers($value='')
    {
        $item = $this->input->get('item_id');
        $pr_id = $this->input->get('pr_id');
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['rfq_item_suppliers'] = $this->companyModel->get_rfq_suppliers($user['user_of_company'],$item);
            $this->data['user']['pr_id'] = $pr_id;
            $this->data['user']['pr_selected_suppliers'] = $this->db->select("supplier_id")->from("ssx_rfq_suppliers")->where("pr_id",$pr_id)->get()->result_array();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            //$this->data['user']['content_view'] = "$this->modulePath/get_suggested_supplier";
            //print_r($this->data['user']['rfq_item_suppliers']);
             //$this->setupNav();
             //$this->setupHeader1();
             //$this->template->setup_private_template($this->data['user']);
            echo $this->load->view("$this->modulePath/get_suggested_supplier", $this->data['user'], TRUE);
        }
    }
    public function storeSuggestedSuppliers()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->storeSuggestedSuppliers($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Supplier Saved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Supplier Saving Failed";
                }
            echo json_encode($this->response);    
        }
        
    }
    public function updateSuggestedSuppliers()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->updateSuggestedSuppliers($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Supplier Updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Supplier Updating Failed";
                }
            echo json_encode($this->response);    
        }
    }
    public function get_item_spec($value='')
    {
        $pr_id = $this->input->get('pr_id');
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['pr_id'] = $pr_id;
            $this->data['user']['pr_selected_spec'] = $this->db->select("*")->from("ssx_rfq_specfications")->where("pr_id",$pr_id)->get()->result_array();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            //$this->data['user']['content_view'] = "$this->modulePath/get_suggested_supplier";
            //print_r($this->data['user']['rfq_item_suppliers']);
             //$this->setupNav();
             //$this->setupHeader1();
             //$this->template->setup_private_template($this->data['user']);
            echo $this->load->view("$this->modulePath/item_spec_v", $this->data['user'], TRUE);
        }
    }
    public function storeItemSpec($value='')
    {
        // print_r($_POST);
        // exit();
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->storeItemSpec($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Item Specfications Saved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Item Specfications Saving Failed";
                }
            echo json_encode($this->response);    
        }
    }
    public function get_rfq_email($value='')
    {
        $pr_id = $this->input->get('pr_id');
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['pr_id'] = $pr_id;
            $this->data['user']['pr_selected_emailBody'] = $this->db->select("*")->from("ssx_rfq_email")->where("pr_id",$pr_id)->get()->result_array();

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            //$this->data['user']['content_view'] = "$this->modulePath/get_suggested_supplier";
            //print_r($this->data['user']['rfq_item_suppliers']);
             //$this->setupNav();
             //$this->setupHeader1();
             //$this->template->setup_private_template($this->data['user']);
            echo $this->load->view("$this->modulePath/email_modal_v", $this->data['user'], TRUE);
        }
    }
    public function updateItemSpec($value='')
    {
        // print_r($_POST);
        // exit();
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->updateItemSpec($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Item Specfications Updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Item Specfications Update Failed";
                }
            echo json_encode($this->response);    
        }
    }
    public function storerfqEmail($value='')
    {
        // print_r($_POST);
        // exit();
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->storerfqEmail($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Email Body Saved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "mail Body Saving Failed";
                }
            echo json_encode($this->response);    
        }
    }
    public function updaterfqEmail($value='')
    {
        // print_r($_POST);
        // exit();
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $res = $this->companyModel->updaterfqEmail($user,$_POST);
                if ($res == TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Email Body Updated Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "mail Body Update Failed";
                }
            echo json_encode($this->response);    
        }
    }
    public function storerfq($value='')
    {
         
        //  print_r($this->db->last_query());
        // print_r($sup_email);
        // exit;
        
        $newfilename = '';
        $newfilename2 = '';
        $user = $this->get_logged_in_user();
        $pr_id = $this->input->post('pr_id');
        $pr_Details = $this->companyModel->getPrDetails($pr_id);
        // print_r($this->serverDateTime);
        // exit;

        $lastId = $this->auctions->auctionsModel->fields('id')->order_by('id', 'DESC')->get();
        $lastId = $lastId['id'];
        $codeLetter = '';
        $startPoint = '000000';
        $endPoint = $lastId + 1;
        $startPointLength = strlen($startPoint);
        $endPointLength = strlen($endPoint);
        $code = '';
        for ($i = $endPointLength; $i < $startPointLength; $i++):
            $code .= '0';
        endfor;
        $code .= $endPoint;
        $code =  'B-' . $code;

            if(isset($_FILES["image0"]["name"]) && !empty($_FILES["image0"]["name"])){
            $temp = explode(".", $_FILES["image0"]["name"]);
            $newfilename = round(microtime(true)) . '.' . end($temp);

            //$absPath = $this->config->item('resources_abs_path');
            $absPath = $_SERVER['DOCUMENT_ROOT']."/../resources.vayzn.com/" . "images/auctions/";

            $target_dir = $absPath;
            $target_file = $target_dir . $newfilename;
            $uploadOk = 1;
            $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
            
           
                if (move_uploaded_file($_FILES["image0"]["tmp_name"], $target_file)) {
                    //echo "The file ". $newfilename ." has been uploaded.";
                    $newfilename = $newfilename;

                }
                else{
                    $newfilename = '';
                } 
            
            }
            if(isset($_FILES["file1"]["name"]) && !empty($_FILES["file1"]["name"])){
                $temp = explode(".", $_FILES["file1"]["name"]);
                $newfilename2 =  round(microtime(true)).'-'.round(microtime(true)) . '.' . end($temp);

                //$absPath = $this->config->item('resources_abs_path');
                $absPath = $_SERVER['DOCUMENT_ROOT']."/../resources.vayzn.com/" . "images/auctions/";

                $target_dir = $absPath;
                $target_file = $target_dir . $newfilename2;
                $uploadOk = 1;
                $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                
               
                    if (move_uploaded_file($_FILES["file1"]["tmp_name"], $target_file)) {
                        $newfilename2 = $newfilename2;

                    }
                    else{
                        $newfilename2 = '';
                    } 
                
                }
            $rfq_data = array(
            'type' => 'buy',
            'name' => $pr_Details[0]['name'],
            'slug' => $this->auctions->createPostSlug($pr_Details[0]['name']),
            'code' => $code,
            'description' => $pr_Details[0]['description'],
            'ad_viewer' => $this->input->post('optradio1'),
            'condition' => $pr_Details[0]['item_condition'],
            'display_image' => 1,
            'starts_at' => $this->serverDateTime,
            'expires_at' => $this->input->post('expiry_date'),
            'amount' => 0,
            'currency' => $this->input->post('currency'),
            'start_price' => 0,
            'end_price' => 0,
            'current_price' => 0,
            'bid_type' => "free",
            'qty_unit' => $pr_Details[0]['quantity_unit'],
            'qty' => $pr_Details[0]['quantity'],
            'bidder_type' => "all",
            'user_id' => $user['user_of_company'],
            'company_auction' => 1,
            'category1_id' => $pr_Details[0]['cat1_id'],
            'category2_id' => $pr_Details[0]['cat2_id'],
            'category3_id' => $pr_Details[0]['cat3_id'],
            'document_attached' => $newfilename2,
            'image_sm_1' => $newfilename,
        );

        $rfq_added = $this->db->insert("ssx_auctions",$rfq_data);
        $rfq_id = $this->db->insert_id();
        if (isset($rfq_id) && !empty($rfq_id)) {
            //updating specification table to approvesd
            $data1 = array(
            'rfq_id' => $rfq_id,
            );
            $this->db->where('pr_id', $this->input->post('pr_id'));
            $this->db->update('ssx_rfq_specfications', $data1);
            //updating pr id to approved rfq
            $data2 = array(
            'is_rfq_approved' => 1,
            );
            $this->db->where('id', $this->input->post('pr_id'));
            $this->db->update('ssx_company_pr', $data2);
            //adding company rfq record
            $data3 = array(
            'company_id' => $user['user_of_company'],
            'user_id' => $user['id'],
            'rfq_id' => $rfq_id,
            'pr_id' => $this->input->post('pr_id'),
            );
            $this->db->insert('ssx_company_rfqs', $data3);
            $data5 = array(
            'rfq_id' => $rfq_id,
            );
            $data4 = array(
            'rfq_id' => $rfq_id,
            );
            $this->db->where('pr_id', $this->input->post('pr_id'));
            $this->db->update('ssx_rfq_suppliers', $data4);
            $this->db->where('pr_id', $this->input->post('pr_id'));
            $this->db->update('ssx_rfq_email', $data4);
            //inserting data to followers and gettign data rfq suppliers
            if ($this->input->post('optradio1') == "followers") {
                $supliers = $this->db->select("supplier_id")->from("ssx_rfq_suppliers")->where("pr_id",$this->input->post('pr_id'))->get()->result_array();
                $email_body = $this->db->select("email_body")->from("ssx_rfq_email")->where("rfq_id",$rfq_id)->get()->result_array();
                foreach ($supliers as $key => $value) {
                    $data4 = array(
                        'auction_id' => $rfq_id,
                        'follower_id' => $value['supplier_id']
                    );
                    $this->db->insert("ssx_auction_for_followers",$data4);
                    
                    $company_name = $this->db->select("first_name,last_name")->from('ssx_users')->where('id',$user['user_of_company'])->get()->result_array();
                    $sup_email = $this->db->select("ssxu.*,ssxd.email")->from("ssx_users ssxu")->join("ssx_user_details ssxd","ssxd.user_id = ssxu.id","Left")->where("ssxu.id",$value['supplier_id'])->get()->result_array();
                    $rfqDetail = $this->db->select("name,slug")->from("ssx_auctions")->where("id",$rfq_id)->get()->result_array();
                    
                    $msg = 'Dear '.$sup_email[0]['first_name'].' '.$sup_email[0]['last_name'].' - '.$sup_email[0]['supplier_company'].',
        
                        '.$company_name[0]['first_name'].' '.$company_name[0]['last_name'].' has raised an RFQ for '.$rfqDetail[0]["name"].' on Vayzn - Procurement Web Based Platform.
                        Please click the following link to bid and fill technical details regarding this RFQ.
                        
                        Visit RFQ : https://www.vayzn.com/'.$rfqDetail[0]["slug"].'/auction
                        
                        Regards,
                        Vayzn - Help Desk';

                    //$to = $sup_email[0]['email']; //"husnainahmed61@gmail.com";
                    
                    $msg .= $email_body[0]['email_body'];
                    
                    $headers = 'From: <no-reply@vayzn.com>' . "\r\n";
                    $headers .= 'MIME-Version: 1.0';
                    $headers .= 'Content-type: text/html; charset=iso-8859-1';

                    mail($sup_email[0]['email'],"You Are Invited to bid",$msg,$headers);

                }
            }
            

        }
            if ( $rfq_added === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "RfQ Added Successfully";
                    
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "RFQ Adding Failed";
                   
                }
        echo json_encode($this->response);
    }

    public function rfq_log()
    {
        
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            $this->data['user']['approved_rfq'] = $this->companyModel->approved_rfq($user['user_of_company']);
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
            //$this->data['user']['approved_pos'] =  $this->companyModel->all_pos($user['user_of_company']);
            $this->data['user']['all_pos'] =  $this->companyModel->all_pos($user['user_of_company']);
            $this->data['user']['all_warehouses'] =  $this->companyModel->get_all_warehouses($user['user_of_company']);;

            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/po_list_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function approvePO($value='')
    {
        if ($this->check_user_authentication('', 'home')) {
            $get = $this->input->get();
            $user = $this->get_logged_in_user();
            //$roles = $this->input->get("roles");
            // print_r(explode(",",$roles));
            // exit();
            $res = $this->companyModel->approvePO($get,$user);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "PR Approved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Approve Failed";
                }
            echo json_encode($this->response);
        }
    }
    public function disapprovePO($value='')
    {
        if ($this->check_user_authentication('', 'home')) {
            $get = $this->input->get();
            $user = $this->get_logged_in_user();
            //$roles = $this->input->get("roles");
            // print_r(explode(",",$roles));
            // exit();
            $res = $this->companyModel->disapprovePO($get,$user);
                if ($res === TRUE) {
                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'Successful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "PR DisApproved Successfully";
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "Failed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "DisApprove Failed";
                }
            echo json_encode($this->response);
        }
    }
    public function reports()
    {
        if ($this->check_user_authentication('', 'home')) {
            $user = $this->get_logged_in_user();
            //print_r($_POST);
            //exit;
            $filter_type = $this->input->post("ss_filter");
            if(isset($_REQUEST['excel']) && !empty($_REQUEST['excel']) && $_REQUEST['excel'] == "generateXLS")
            {
                $fileName = 'data-'.time().'.xlsx';  
                // load excel library
                $this->load->library('excel');
                if ($filter_type == "pr_pending") {
                    $listInfo = $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",NULL)->where("ssxcp.created_at >=",$_POST['date_from'])->where("ssxcp.created_at <=",$_POST['date_to'])->get()->result();
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->setActiveSheetIndex(0);
                    // set Header
                    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
                    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Date');
                    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Item Number');
                    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Item Name');
                    $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Quantity');
                    $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Quantity Unit');
                    $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Condition');              
                    // set Row
                    $i = 1;
                    $rowCount = 2;
                    foreach ($listInfo as $list) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->created_at);
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->item_number);
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->item_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->quantity);
                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->quantity_unit);
                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->item_condition);
                        $rowCount++;
                        $i++;
                    }
                    $filename = "pr_pending". date("Y-m-d-H-i-s").".csv";
                    header('Content-Type: application/vnd.ms-excel'); 
                    header('Content-Disposition: attachment;filename="'.$filename.'"');
                    header('Cache-Control: max-age=0'); 
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
                    $objWriter->save('php://output');
                }
                if ($filter_type == "rfq_pending") {
                    $listInfo = $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved ",0)->where("ssxcp.created_at >=",$_POST['date_from'])->where("ssxcp.created_at <=",$_POST['date_to'])->get()->result();
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->setActiveSheetIndex(0);
                    // set Header
                    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
                    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Date');
                    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Item Number');
                    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Item Name');
                    $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Quantity');
                    $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Quantity Unit');
                    $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Condition');              
                    // set Row
                    $i = 1;
                    $rowCount = 2;
                    foreach ($listInfo as $list) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->created_at);
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->item_number);
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->item_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->quantity);
                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->quantity_unit);
                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->item_condition);
                        $rowCount++;
                        $i++;
                    }
                    $filename = "rfq_pending". date("Y-m-d-H-i-s").".csv";
                    header('Content-Type: application/vnd.ms-excel'); 
                    header('Content-Disposition: attachment;filename="'.$filename.'"');
                    header('Cache-Control: max-age=0'); 
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
                    $objWriter->save('php://output');
                }
                if ($filter_type == "rfq_active") {
                    $listInfo = $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number,ssxc3.name as cat3name,ssxa.bid_count,ssxa.favourite_count,ssxa.expires_at,ssxc.name as currency_name,ssxcr.rfq_id,(SELECT MIN(ssx_bids.amount) FROM ssx_bids WHERE ssx_bids.auction_id = ssxa.id) AS lowest_bid")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->join("ssx_categories3 ssxc3","ssxc3.id= ssxci.cat3_id","Left")->join("ssx_company_rfqs ssxcr","ssxcr.pr_id = ssxcp.id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxa.currency","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved",1)->where("ssxa.created_at >=",$_POST['date_from'])->where("ssxa.created_at <=",$_POST['date_to'])->get()->result();
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->setActiveSheetIndex(0);
                    // set Header
                    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
                    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Expiry Date');
                    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Ad Details');
                    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Total Bids');
                    $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Lowest Bid');
                    $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Status');             
                    // set Row
                    $i = 1;
                    $rowCount = 2;
                    foreach ($listInfo as $list) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->expires_at);
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->item_number);
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->bid_count);
                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->lowest_bid);
                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, ($list->status == 1) ? ucfirst('Active') : 'InActive');
                        $rowCount++;
                        $i++;
                    }
                    $filename = "rfq_active". date("Y-m-d-H-i-s").".csv";
                    header('Content-Type: application/vnd.ms-excel'); 
                    header('Content-Disposition: attachment;filename="'.$filename.'"');
                    header('Cache-Control: max-age=0'); 
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
                    $objWriter->save('php://output');
                }
                if ($filter_type == "po_pending") {
                    $listInfo = $this->db->select("ssxb.*,ssxa.name as item_name,ssxu.first_name,ssxa.qty_unit,ssxa.qty,ssxu.last_name,ssxu.id as supplier_id,ssxc.name as cur,ssxap.status as rfq_status")->from("ssx_bids ssxb")->join("ssx_company_rfqs ssxcr","ssxcr.rfq_id = ssxb.auction_id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxb.currency","Left")->join("ssx_approved_po ssxap","ssxap.rfq_id = ssxb.auction_id","Left")->where("ssxb.status","accepted")->where("ssxcr.company_id",$user['user_of_company'])->where("ssxb.updated_at >=",$_POST['date_from'])->where("ssxb.updated_at <=",$_POST['date_to'])->get()->result();
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->setActiveSheetIndex(0);
                    // set Header
                    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
                    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Item Title');
                    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Selected Suppliers');
                    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Bid Amount');
                    // set Row
                    $i = 1;
                    $rowCount = 2;
                    foreach ($listInfo as $list) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->item_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->first_name.' '.$list->last_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->cur.' '.$list->qty.' '.$list->qty_unit);
                        $rowCount++;
                        $i++;
                    }
                    $filename = "po_pending". date("Y-m-d-H-i-s").".csv";
                    header('Content-Type: application/vnd.ms-excel'); 
                    header('Content-Disposition: attachment;filename="'.$filename.'"');
                    header('Cache-Control: max-age=0'); 
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
                    $objWriter->save('php://output');
                }
                if ($filter_type == "po_approved") {
                    $listInfo = $this->db->select("ssxb.*,ssxa.name as item_name,ssxu.first_name,ssxa.qty_unit,ssxa.qty,ssxu.last_name,ssxu.id as supplier_id,ssxc.name as cur,ssxap.status as rfq_status,ssxcl.name as warehouse,ssxap.delivery_date,ssxap.shipment_details")->from("ssx_bids ssxb")->join("ssx_company_rfqs ssxcr","ssxcr.rfq_id = ssxb.auction_id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxb.currency","Left")->join("ssx_approved_po ssxap","ssxap.rfq_id = ssxb.auction_id","Left")->join("ssx_company_locations ssxcl","ssxcl.id = ssxap.warehouse","Left")->where("ssxb.status","accepted")->where("ssxcr.company_id",$user['user_of_company'])->where("ssxb.updated_at >=",$_POST['date_from'])->where("ssxb.updated_at <=",$_POST['date_to'])->where("ssxap.status",1)->get()->result();
                    $objPHPExcel = new PHPExcel();
                    $objPHPExcel->setActiveSheetIndex(0);
                    // set Header
                    $objPHPExcel->getActiveSheet()->SetCellValue('A1', '#');
                    $objPHPExcel->getActiveSheet()->SetCellValue('B1', 'Item Title');
                    $objPHPExcel->getActiveSheet()->SetCellValue('C1', 'Selected Suppliers');
                    $objPHPExcel->getActiveSheet()->SetCellValue('D1', 'Bid Amount');
                    $objPHPExcel->getActiveSheet()->SetCellValue('E1', 'Warehouse');
                    $objPHPExcel->getActiveSheet()->SetCellValue('F1', 'Delivery Date');
                    $objPHPExcel->getActiveSheet()->SetCellValue('G1', 'Shipment Details');
                    // set Row
                    $i = 1;
                    $rowCount = 2;
                    foreach ($listInfo as $list) {
                        $objPHPExcel->getActiveSheet()->SetCellValue('A' . $rowCount, $i);
                        $objPHPExcel->getActiveSheet()->SetCellValue('B' . $rowCount, $list->item_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('C' . $rowCount, $list->first_name.' '.$list->last_name);
                        $objPHPExcel->getActiveSheet()->SetCellValue('D' . $rowCount, $list->cur.' '.$list->qty.' '.$list->qty_unit);
                        $objPHPExcel->getActiveSheet()->SetCellValue('E' . $rowCount, $list->warehouse);
                        $objPHPExcel->getActiveSheet()->SetCellValue('F' . $rowCount, $list->delivery_date);
                        $objPHPExcel->getActiveSheet()->SetCellValue('G' . $rowCount, $list->shipment_details);
                        $rowCount++;
                        $i++;
                    }
                    $filename = "po_approved". date("Y-m-d-H-i-s").".csv";
                    header('Content-Type: application/vnd.ms-excel'); 
                    header('Content-Disposition: attachment;filename="'.$filename.'"');
                    header('Cache-Control: max-age=0'); 
                    $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'CSV');  
                    $objWriter->save('php://output');
                }
                
            }
            else{
                if (isset($filter_type) && !empty($filter_type)) {
                if ($filter_type == 'pr_pending'){
                    $this->data['user']['pending_pr'] = $this->companyModel->get_pending_pr($user,$_POST);
                    $this->data['user']['content_view'] = "$this->modulePath/pr_pending_report";    
                }
                if ($filter_type == 'rfq_pending'){
                    $this->data['user']['pending_rfq'] = $this->companyModel->get_approved_pr($user,$_POST);
                    $this->data['user']['content_view'] = "$this->modulePath/rfq_pending_report";    
                }
                if ($filter_type == 'rfq_active'){
                    $this->data['user']['active_rfq'] = $this->companyModel->get_active_rfq($user,$_POST);
                    $this->data['user']['content_view'] = "$this->modulePath/rfq_active_report";    
                }
                if ($filter_type == 'po_pending'){
                    $this->data['user']['pending_po'] = $this->companyModel->get_pending_po($user,$_POST);
                    $this->data['user']['content_view'] = "$this->modulePath/po_pending_report";    
                }
                if ($filter_type == 'po_approved'){
                    $this->data['user']['approved_po'] = $this->companyModel->get_approved_po($user,$_POST);
                    $this->data['user']['content_view'] = "$this->modulePath/po_approved_report";    
                }
            }
            else{
                $this->data['user']['content_view'] = "$this->modulePath/reports_v";
            }
            
            $this->data['user']['post'] = $_POST;
            
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
            }
            
        }
    }
    public function generateXls() {
        $user = $this->get_logged_in_user();
        $date_from = $this->input->get('date_from');
        $date_to = $this->input->get('date_to');
        $filter_type = $this->input->get('filter_type');
        // create file name
        
        
        

 
    }
    public function getAllItems($value='')
    {
        $user = $this->get_logged_in_user();
        $Items = $this->companyModel->getAllItems($user['user_of_company']);
        if(!empty($Items)){
            $this->response['status'] = TRUE;
            $this->response['data'] = $Items;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Categories Retrieved";
        }else{
            $this->response['status'] = TRUE;
            $this->response['data'] = $Items;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Categories Not Retrieved";
        }

        echo json_encode($this->response);
    }

    
}