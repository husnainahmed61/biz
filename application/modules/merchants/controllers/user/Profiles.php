<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 11-Jul-18
 * Time: 11:26 PM
 */
class Profiles extends User_Controller
{
    private $response = [];
    private $moduleName;
    private $loggedInUser; // Uzair
    private $imageFiles; // UZair
    /**
     * Profiles constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->moduleName = 'merchants';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Profile';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        $this->loggedInUser = $this->get_logged_in_user(); //UZair

        $this->load->model('Users_m', 'usersM', TRUE);
        $this->load->model('User_details_m', 'userDetailsM', TRUE);

        // $this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard', 'bs-select', 'jq-file-upload','jq-swipebox'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['pagination'];
        //, 'jq-file-upload' ,'jq-elevateZoom','jq-ios-orientationchange-fix'
         $this->data['user']['page_js'] = "$this->modulePath/custom-js";

    }

    public function index()
    {
        //echo "string111";
       //$auction_id = $this->input->get('chat'); //$this->uri->segment(2);
        $auction_id = $this->uri->segment(3);
        //$user_id = $this->uri->segment(4);
        //parse_str($_SERVER['QUERY_STRING'], $_GET); 
        //print_r($this->input->get($auction_id['chat']));
        //print_r($auctioneer_id);
        //exit();

        if ($this->check_user_authentication('', 'home'))
        {
            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $userDetails  = $this->userDetailsM->getUserWithDetails(
                "first_name,last_name,slug,type,phone,country_id,state_id,city_id,business_name,business_description,tax_number,registered_address,website_url,facebook_link,twitter_link,google_link,",
                ['u.id'=>$user['id']]);
            $this->data['user']['userDetails'] = $userDetails[0];
            $this->data['user']['countries']= $this->countries->countriesM->get_all(['is_active' => 1]);
            $this->data['user']['states']= $this->states->statesM->get_all(['country_id' => $userDetails[0]['country_id'], 'is_active' => 1]);
            $this->data['user']['cities']= $this->cities->citiesM->get_all(['state_id' => $userDetails[0]['state_id'], 'is_active' => 1 ]);
            /*Uzair work starts*/
            $this->getProfileData();

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
            $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
            $this->data['user']['content_view'] = "$this->modulePath/private_profile_v";
            // $this->setupHeader1();
            // $this->setupNav();
            $this->template->setup_private_template($this->data['user']);
            //$this->load->view("$this->modulePath/private_profile_v");
        }
    }


    public function detail($id = NULL)
    {
        echo "detail";
    }

    public function bids($id = NULL)
    {
        echo "My Auctions > bids";
    }

    public function edit(){
        /*echo "edit";*/
        if ($this->check_user_authentication('', 'home')) {

            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $userDetails  = $this->userDetailsM->getUserWithDetails(
                "first_name,last_name,slug,type,phone,country_id,state_id,city_id,business_name,business_description,tax_number,registered_address," ,
                ['u.id'=>$user['id']]);
            $this->data['user']['userDetails'] = $userDetails[0];
            $this->data['user']['countries']= $this->countries->countriesM->get_all(['is_active' => 1]);
            $this->data['user']['states']= $this->states->statesM->get_all(['country_id' => $userDetails[0]['country_id'], 'is_active' => 1]);
            $this->data['user']['cities']= $this->cities->citiesM->get_all(['state_id' => $userDetails[0]['state_id'], 'is_active' => 1 ]);

             //echo "<pre>";
             //print_r($this->data['user']);
             //die;
            $this->data['user']['content_view'] = "$this->modulePath/edit_profile_v";
            $this->setupNav();
            $this->setupHeader1();
            $this->header_notification();
            $this->quick_menu();
            $this->template->setup_template($this->data['user']);
        }
    }

    private function validateFields(){
        $userType = $this->input->post('user_type');
        //echo $userType; die;
        if($userType == "business"){
            $this->usersM->rules['update']['business_name']['rules']            = "trim|required";
            $this->usersM->rules['update']['business_description']['rules']            = "trim|required";
            $this->usersM->rules['update']['tax_number']['rules']           = "trim|required";
            $this->usersM->rules['update']['registered_address']['rules']           = "trim|required";
            $this->usersM->rules['update']['website_url']['rules']           = "trim|required";
        }
        $rules = $this->usersM->rules['update'];

//        print_r($rules);
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }

    public function update(){
          // echo "<pre>";
          // print_r($this->input->post());
          // exit;
        if (1/*$this->validateFields()*/) {
            $this->usersM->setUpdateFields();
            $user = $this->get_logged_in_user();
            
             //print_r($user);
            // exit();
            if($this->usersM->updateProfile($user['id'])){
                $user = $this->usersM->get_updated_user($user['id']);
                //print_r($user);
                $updatedData = array(
                    'id' => $user[0]['id'],
                    'firstname' => $user[0]['first_name'],
                    'lastname' => $user[0]['last_name'],
                    'type' => $user[0]['type'],
                    'email' => $user[0]['email'],
                    'sess_logged_in' =>0,
                    'slug' => $user[0]['slug'],
                    'profile_image' => $user[0]['profile_picture']);
                    
                //echo "<br>";
            // exit(); //unset_userdata
            // $this->session->sess_destroy();    
            $this->session->set_userdata('user_login', $updatedData);
                
                //print_r($this->session->userdata("user_login"));
                //exit;
                
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Profile Updated";

                // $this->setupVerificationEmail();
            }
            else{
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Something went wrong";
            }
        }
        else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "400";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Invalid input fields";
            $this->response['error_array'] = array_values($this->form_validation->error_array());
        }
        $this->response['csrf'] = $this->getCSRF();
        echo json_encode($this->response);
    }


    /*Uzair Work starts*/
    public function getProfileData()
    {
        $user       = $this->merchants->getById($this->loggedInUser['id']);
        $userDetail = $this->merchants->getByUserId($this->loggedInUser['id']);

        $country    = $this->countries->getById($user['country_id']);
        $state      = $this->states->getById($user['state_id']);
        $city       = $this->cities->getById($user['city_id']);

        /*hasnain work for chat*/
        $conversations = $this->usersM->getUserConvo($this->loggedInUser['id']);
        //echo "<pre>";
        //print_r($conversations); exit();
        /*end hasnain work*/
        $this->data['user']['userConvo'] = $conversations;
        $this->data['user']['userData'] = $user;
        $this->data['user']['userDetail'] = $userDetail;
        $this->data['user']['country'] = $country;
        $this->data['user']['state'] = $state;
        $this->data['user']['city'] = $city;
    }

        public function uploadProfilePicture()
    {
        $user = $this->get_logged_in_user();
        print_r($this->input->post('image'));
        $data = $this->input->post('image');

        $image_array_1 = explode(";", $data);

        $image_array_2 = explode(",", $image_array_1[1]);

        $data = base64_decode($image_array_2[1]);
        //exit();
        $absPath = $this->config->item('resources_abs_path');
        $absPath = $absPath . "users/profile_picture/";

        $this->load->library('upload');
        $this->load->helper('image_helper');
        $this->load->helper('upload_helper');

        // $this->imageFiles = [];

        // $this->imageFiles['name'] = $_FILES['profile_picture']['name'];
        // $this->imageFiles['type'] = $_FILES['profile_picture']['type'];
        // $this->imageFiles['tmp_name'] = $_FILES['profile_picture']['tmp_name'];
        // $this->imageFiles['error'] = $_FILES['profile_picture']['error'];
        // $this->imageFiles['size'] = $_FILES['profile_picture']['size'];

        $ext = 'png'; //getFileExtension($this->imageFiles['name'])

            $temp_file_path = tempnam(sys_get_temp_dir(), 'androidtempimage'); // might not work on some systems, specify your temp path if system temp dir is not writeable
             file_put_contents($temp_file_path, $data);
             $image_info = getimagesize($temp_file_path); 

         $_FILES['userfile'] = array(
             'name' => uniqid().'.'.preg_replace('!\w+/!', '', $image_info['mime']),
             'tmp_name' => $temp_file_path,
             'size'  => filesize($temp_file_path),
             'error' => UPLOAD_ERR_OK,
             'type'  => $image_info['mime'],
         );

        $user       = $this->merchants->getById($this->loggedInUser['id']);
        $pictureMiddleName = $user['slug'].'-'.time();

        $uniqueFilename = getUniqueFileName($absPath, $pictureMiddleName, $ext);

        $uFileName = [];
        $uFileName['user'] = $uniqueFilename . "." . $ext;


        $config['upload_path'] = $absPath;
        $config['file_name'] = $uFileName['user'];
        $config['allowed_types'] = 'gif|jpg|png';
        $config['file_ext_tolower'] = TRUE;
        $config['max_size'] = '10000000';
        $config['overwrite'] = FALSE;
        $this->upload->initialize($config);

        // echo "<pre>";
        // print_r($config); exit();

        if ($this->upload->do_upload('userfile', true))
        {
            $updateArray = array(
                'profile_picture' => $uFileName['user']
            );

            $this->updateProfilePicture($this->loggedInUser['id'],$updateArray);
            
            $user = $this->usersM->get_updated_user($user['id']);
                //print_r($user);
                $updatedData = array(
                    'id' => $user[0]['id'],
                    'firstname' => $user[0]['first_name'],
                    'lastname' => $user[0]['last_name'],
                    'type' => $user[0]['type'],
                    'email' => $user[0]['email'],
                    'sess_logged_in' =>0,
                    'slug' => $user[0]['slug'],
                    'profile_image' => $user[0]['profile_picture']);
                    
                //echo "<br>";
            // exit(); //unset_userdata
            // $this->session->sess_destroy();    
            $this->session->set_userdata('user_login', $updatedData);

            echo "done";
            //redirect('profile');
        }
        else
        {
            echo "not done"; exit();
        }
    }


    public function updateProfilePicture($id,$updateArray)
    {
        $this->usersM->where('id',$id)->update($updateArray);
    }

    /*Uzair Work ends*/
    /*hasnain work for chat */
    public function getMessagesByConvoId($value='')
    {
        if (!empty($value)) {
            $convo_id = $value;
        }
        else{
            $convo_id = $this->input->get("convo_id");
            }
        if (!empty($convo_id)) {
            $res = $this->usersM->getMessagesById($convo_id);
            $sender_reciever = $this->usersM->getsenderRecieverByConvoId($convo_id);
            //$res = $this->loggedInUser['id'];
            if (!empty($value)) {
                return $res;
            }
            else{
                $this->data['user']['base_resources_url_user_attach'] = $this->config->item('base_resources_url') . "users/message_attach/";
                 $this->data['user']['base_resources_url_userImage'] = $this->config->item('base_resources_url') . "users/profile_picture/";
                $this->data['user']['messages'] = $res;
                $this->data['user']['sender_reciever'] = $sender_reciever;
                $this->data['user']['content_view'] = "$this->modulePath/show_messages";

                $this->response['data'] = $res;
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Messages Recieved";
                $this->response['html'] = $this->load->view("$this->modulePath/show_messages", $this->data['user'], TRUE);
                echo json_encode($this->response);
                //echo json_encode($res);    
            }
            
        }
        else{
            return;
        }
    }
    public function getMessagesByConvoId_WW($value='')
    {
        $this->data['user']['base_resources_url_userImage'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        if (!empty($value)) {
            $convo_id = $value;
        }
        $convo_id = $this->input->get('convo_id');
        if (!empty($convo_id)) {
            $res = $this->usersM->getMessagesById($convo_id);
            $sender_reciever = $this->usersM->getsenderRecieverByConvoId($convo_id);
            //$res = $this->loggedInUser['id'];
            //return $res;
                 $this->data['user']['messages'] = $res;
                 $this->data['user']['sender_reciever'] = $sender_reciever;
                 //$this->data['user']['content_view'] = "$this->modulePath/show_messages";
                 $this->data['user']['base_resources_url_user_attach'] = $this->config->item('base_resources_url') . "users/message_attach/";

                // $this->response['data'] = $res;
                // $this->response['status'] = TRUE;
                // $this->response['code'] = "100";
                // $this->response['title'] = "Successful";
                // $this->response['message'] = "Messages Recieved";
                //$this->response['html'] = 
                 //echo json_encode($this->response);
                //echo json_encode($res); 
                echo $this->load->view("$this->modulePath/show_messages", $this->data['user'], TRUE);

            
        }
        else{
            return;
        }
    }

    public function addConvoId($value='')
    {
        //echo "add convo";
        $auction_id = $this->input->get('auction_id');
        $auctioneer_id = $this->input->get('auctioneer_id');
        $user_id = $this->input->get('user_id');

        if (!empty($auction_id) && !empty($auctioneer_id) && !empty($user_id)) {
            $res = $this->usersM->addConvoId($auction_id,$auctioneer_id,$user_id);
            echo json_encode($res);   
        }
    }
    public function getUserConvo()
    {
        return $this->usersM->getUserConvo($this->loggedInUser['id']);

        //$res = $this->usersM->getUserConvo($this->loggedInUser['id']);
        //echo json_encode($res);
    }
    public function insertConvoAndMessage($value='')
    {
        $user = $this->get_logged_in_user();
        $auction_id = $this->input->get("auction_id");
        $auctioneer_id = $this->input->get("auctioneer_id");
        $message = $this->input->get("message");
        $user_id = $user['id'];
        
        $message = $this->test_input($message);
        
        if (empty($user_id) || !isset($user_id)) {
                $this->response['status'] = FALSE;
                $this->response['type'] = "messageError";
                $this->response['title'] = "Failed";
                $this->response['message'] = "You Have To Login First";
                echo json_encode($this->response);
                exit();
        }

        if (!empty($auction_id) && !empty($auctioneer_id) && !empty($user_id) && !empty($message)) {
            //check if convo is added already and get convo id
            $convo_id = $this->usersM->Check_convo_entry($auction_id,$auctioneer_id,$user_id);
            
            if (isset($convo_id) && !empty($convo_id)) {
                $res = $this->usersM->insertMessagebyConvo($convo_id,$user_id,$message);
                if(is_int($res)){
                    $this->response['status'] = TRUE;
                    $this->response['type'] = "messageSuccess";
                    $this->response['title'] = "Success";
                    $this->response['message'] = "Message Sent Successfully";
                    echo json_encode($this->response);
                    exit();
                }
                else
                {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "messageError";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "There Is An Issue In Sending Message Right Now";
                    echo json_encode($this->response);
                    exit();
                }
            }
            else{
                $res = $this->usersM->insertConvoAndMessage($auction_id,$auctioneer_id,$user_id,$message);

                if(is_int($res)){
                    $this->response['status'] = TRUE;
                    $this->response['type'] = "messageSuccess";
                    $this->response['title'] = "Success";
                    $this->response['message'] = "Message Sent Successfully";
                    echo json_encode($this->response);
                    exit();
                }
                else
                {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "messageError";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "There Is An Issue In Sending Message Right Now";
                    echo json_encode($this->response);
                    exit();
                }
            }
        }
    }
    public function test_input($data)
    {
          $data = trim($data);
          $data = stripslashes($data);
          $data = htmlspecialchars($data);
          return $data;
    }
    public function insertMessagebyConvo($value='')
    {
        $convo_id = $this->input->get("convo_id");
        //$auctioneer_id = $this->input->get("auctioneer_id");
        $sender_id = $this->loggedInUser['id'];
        $message = $this->input->get("message");
        $message = json_decode(($message));
        $message = $this->test_input($message);
        $type = $this->input->get("type");



        //$res = $this->getMessagesByConvoId($convo_id);
        //$res = json_decode($res);
        //print_r($res); exit();
        // if ($auctioneer_id == ($this->loggedInUser['id'])) {
        //     $sender_id = $this->loggedInUser['id'];
        //     $reciever_id = $res[0]['sender_user_id'];
        // }
        // else {
        //     $sender_id = $this->loggedInUser['id'];
        //     $reciever_id = $auctioneer_id;   
        // }

        $res = $this->usersM->insertMessagebyConvo($convo_id,$sender_id,$message,$type);
            echo json_encode($res);

        //print_r($res); exit();




    }
    public function Inbox()
    {
        if ($this->check_user_authentication('', 'home'))
        {
            $this->data['user']['base_resources_url_auction'] = $this->config->item('base_resources_url') . "images/auctions/";
            $user = $this->get_logged_in_user(); //$user['id']; user id can get

            $this->data['user']['conversations'] = $this->getUserConvo();
            $this->data['user']['content_view'] = "$this->modulePath/inbox";
            // $this->setupHeader1();
            // $this->setupNav();
            // echo "<pre>";
            // print_r($this->data['user']['conversations']);
            // exit();
            $this->template->setup_private_template($this->data['user']);
        }
    }
    public function web_worker($value='')
    {
       if ($this->check_user_authentication('', 'home')) {

            $user = $this->get_logged_in_user();
            //echo "<pre>"; print_r($user);

            $data['convo_id']= $value;
            $this->load->view("$this->modulePath/web_worker_js",$data);

        }
    }
    public function follow($value='')
    {
        $user = $this->get_logged_in_user();
        //print_r($user);


        if (!empty($value)) {
            $following_id = $value;

            if (isset($user) && !empty($user)) {
                //user can not follow himself
                if ($user['id'] == $following_id) {
                    $this->response['data'] = "Failed";
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "404";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "You Can Not Follow Yourself";

                        echo json_encode($this->response);
                        exit();
                }

                // $check_already_added = $this->auctionsModel->addFavorite_check($user['id'], $auction_id);

                // if ($check_already_added >= 1) {
                //     $this->response['data'] = "failed";
                //     $this->response['status'] = FALSE;
                //     $this->response['code'] = "404";
                //     $this->response['title'] = "Faild";
                //     $this->response['message'] = "You Have Already Added This Auction In Favourite List";

                //     echo json_encode($this->response);
                //     return;
                // }

                $res = $this->usersM->addFollow($user['id'], $following_id);

                if ($res === TRUE) {
                      //echo "inserted";
                        $this->response['data'] = "Followed";
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['following_id'] = $following_id;
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "Following Successfully";

                        echo json_encode($this->response);
                        
                  } 
                  else
                  {
                        $this->response['data'] = "Failed";
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "404";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Failed to Follow";

                        echo json_encode($this->response);
                  } 
            }
            else{
                $this->response['data'] = "Failed";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "You have to logn First";

                echo json_encode($this->response);
            }
            
        }
        else
        {
            return;
        }
    }

    public function unfollow($value='')
    {
        $user = $this->get_logged_in_user();
        //print_r($user);


        if (!empty($value)) {
            $following_id = $value;

            if (isset($user) && !empty($user)) {
               
                $res = $this->usersM->UnFollow($user['id'], $following_id);

                if ($res === TRUE) {
                      //echo "inserted";
                        $this->response['data'] = "UnFollowed";
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['following_id'] = $following_id;
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "UnFollowed Successfully";

                        echo json_encode($this->response);
                        
                  } 
                  else
                  {
                        $this->response['data'] = "Failed";
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "404";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Failed to UnFollow";

                        echo json_encode($this->response);
                  } 
            }
            else{
                $this->response['data'] = "Failed";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "You have to login First";

                echo json_encode($this->response);
            }
            
        }
        else
        {
            return;
        }
    }
    public function Notifications($value='')
    {
        if ($this->check_user_authentication('', 'home'))
        {
            $user = $this->get_logged_in_user(); //$user['id']; user id can get

            //$this->data['user']['conversations'] = $this->getUserConvo();
            $this->data['user']['content_view'] = "$this->modulePath/notification_v";
            // $this->setupHeader1();
            // $this->setupNav();
            // echo "<pre>";
            // print_r($this->data['user']['conversations']);
            // exit();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    public function getNotifications($value='')
    {
        $user = $this->get_logged_in_user();
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');

        $limit = [
            //             20 * 2 - 1
            'start' => $pageSize*($pageNumber-1),
            'offset' => $pageSize
        ];
           
        $Notifications = $this->usersM->getAllNotificatons($user['id'],$limit);
        $NotificationsCount = $this->usersM->countAllNotificatons($user['id']);
        $updateNotiStstus = $this->usersM->updateNotiStstus($user['id']);
        // echo "<pre>";
        // print_r($Notifications);
        // echo "<pre>";
        // print_r($NotificationsCount);
        // die;

        if (!empty($Notifications) && (is_array($Notifications) && count($Notifications) > 0)) {


            $this->data['user']['Notifications'] = $Notifications;
            $this->data['user']['content_view'] = "$this->modulePath/noti_v_filtered";

            $this->response['data'] = $Notifications;
            $this->response['totalNumber'] = $NotificationsCount;
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Notifications Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/noti_v_filtered", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
             $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
             $this->response['html'] = "<h4>No Notifications Found</h4>";
             echo json_encode($this->response);
             

            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }
    public function message_attach($value='')
    {

        // $user = $this->get_logged_in_user();
        
        // //exit();
        // $absPath = $this->config->item('resources_abs_path');
        // $absPath = $absPath . "users/message_attach/";

        // $this->load->library('upload');
        // $this->load->helper('image_helper');
        // $this->load->helper('upload_helper');

       

        // $ext = 'png'; //getFileExtension($this->imageFiles['name'])

        //     $temp_file_path = tempnam(sys_get_temp_dir(), 'androidtempimage'); // might not work on some systems, specify your temp path if system temp dir is not writeable
        //      file_put_contents($temp_file_path, $_FILES["files"]["name"]);
        //      $image_info = getimagesize($_FILES["files"]["tmp_name"]); 

        //     // print_r($image_info);
        //     //  exit(); 

        //  $_FILES['files'] = array(
        //      'name' => uniqid().'.'.preg_replace('!\w+/!', '', $image_info['mime']),
        //      'tmp_name' => $temp_file_path,
        //      'size'  => filesize($temp_file_path),
        //      'error' => UPLOAD_ERR_OK,
        //      'type'  => $image_info['mime'],
        //  );

        // $user       = $this->merchants->getById($this->loggedInUser['id']);
        // $pictureMiddleName = $user['slug'].'-'.time();

        // $uniqueFilename = getUniqueFileName($absPath, $pictureMiddleName, $ext);

        // $uFileName = [];
        // $uFileName['user'] = $uniqueFilename . "." . $ext;


        // $config['upload_path'] = $absPath;
        // $config['file_name'] = $uFileName['user'];
        // $config['allowed_types'] = 'gif|jpg|png';
        // $config['file_ext_tolower'] = TRUE;
        // $config['max_size'] = '10000000';
        // $config['overwrite'] = FALSE;
        // $this->upload->initialize($config);

        // // echo "<pre>";
        // // print_r($config); exit();

        // if ($this->upload->do_upload('files', true))
        // {
            

        //     echo "done";
            
        // }
        // else
        // {
        //     echo "not done"; 
        // }

        //custom code
        $absPath = $this->config->item('resources_abs_path');
        $absPath = $absPath . "users/message_attach/";


        $target_dir = $absPath;
        $fileWithoutDir = time() .'-'. basename($_FILES["files"]["name"]);
        $file = $target_dir . $fileWithoutDir;
        $target_file = $file;
        $uploadOk = 1;
        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        // Check if image file is a actual image or fake image
        
            $check = getimagesize($_FILES["files"]["tmp_name"]);
            if($check !== false) {
                //echo "File is an image - " . $check["mime"] . ".";
                $uploadOk = 1;
            } else {
                //echo "File is not an image.";
                $uploadOk = 0;
            }
        if (move_uploaded_file($_FILES["files"]["tmp_name"], $target_file)) {
            //echo "The file ". $file . " has been uploaded.";
        } else {
            //echo "Sorry, there was an error uploading your file.";
        }

        $this->response['fileName'] = $fileWithoutDir;
        
        echo json_encode($this->response);
        
    }
    
    /*end hasnain work*/
}