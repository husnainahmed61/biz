<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 26-Apr-18
 * Time: 1:30 AM
 */
class Register extends User_Controller
{
    private $response = [];
    private $moduleName ;
    /**
     * Register constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'register';
        $this->modulePath = "$this->moduleName/$this->userName";

        $this->load->module([
            'merchants/user/merchants',
            'locations/user/countries',
            'locations/user/states',
            'locations/user/cities'

        ]);

        /*$this->load->model('countries', 'countriesM', TRUE);*/

        $this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard','bs-select'  ];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['jq-smartwizard' ,'bs-select'  ];

        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

    }

    public function index()
    {
        $this->show();
    }

    private function show()
    {
        /*$this->setCSRF();*/
        if(!$this->check_user_authentication()){
            /*if user is not logged in*/
            $this->data['user']['cookies'] = $this->input->cookie();
            $this->data['user']['content_view'] = "$this->modulePath/show_v";
            $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
            $this->setupHeader1('by_reg');
            $this->setupNav();
            $this->quick_menu();
            $this->template->setup_template($this->data['user']);
        }
        else{
            redirect('home');
        }
    }


    private function validateFields(){
        $userType = $this->input->post('user_type');
        if($userType == "business"){
            $this->merchants->usersM->rules['insert']['business_name']['rules']            = "trim|required";
            $this->merchants->usersM->rules['insert']['business_description']['rules']            = "trim|required";
           
            $this->merchants->usersM->rules['insert']['registered_address']['rules']           = "trim|required";
            //$this->merchants->usersM->rules['insert']['website_url']['rules']           = "trim|required";
        }
        $rules = $this->merchants->usersM->rules['insert'];
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    }

    public function store()
    {
        if ($this->validateFields() ) {

            $this->merchants->usersM->setFields();
            $username = $this->merchants->usersM->userFields['slug'];
            $slugData = $this->merchants->usersM->get(['slug' => $username]);

            $email = $this->merchants->usersM->userDetailFields['email'];
//            echo "<br>email: $email<br>";
            $emailData =  $this->merchants->userDetailsM->get(['email' => $email]);

//            var_dump($emailData);

            if(count($emailData['email']) < 1  ){
                if(count($slugData['slug']) < 1  )
                {
                    if($this->merchants->usersM->createAccount()){
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "Verification link is sent to your registered Email address";
                        //$this->response['email_status'] = $this->setupVerificationEmail();
                    }
                    else{
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "500";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Something went wrong";
                    }
                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['code'] = "500";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Username already exists";
                }
            }
            else{
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Email already has an account";
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


    public function setupVerificationEmail(){

        $fields = $this->merchants->usersM->getFields();
        $this->data['user'] = $fields;

        $message = $this->load->view($this->modulePath."/register_email_verification_v", $this->data['user'], TRUE);

        return $this->sendEmail($fields['userDetailFields']['email'],"Account Verification Email - Vayzn",$message);
    }

    public function sendEmail($recipient, $subject ,$message )
    {
        /* echo  "Mail<br><br>";*/
        $this->load->library('email');

        $this->email->from('no-reply@vayzn.com', 'Vayzn');
        $this->email->to($recipient);
        /*$this->email->cc('daniyalnasir.q@gmail.com');*/
        // $this->email->bcc('them@their-example.com');

        $this->email->subject($subject);
        $this->email->message($message);

        if ($this->email->send()) {
            return TRUE;
        }
        else {
            return FALSE;
        }
    }


    public function resendEmail()
    {
        $loginRules = $this->merchants->userDetailsM->rules['login_rules'];
        $this->form_validation->set_rules($loginRules);

        if ($this->form_validation->run()) {

            $this->merchants->userDetailsM->userDetailFields['email'] = $this->input->post('login_email');
            $this->merchants->userDetailsM->userDetailFields['password'] = $this->input->post('login_password');
            $user = $this->merchants->userDetailsM->checkLoginCredentials();

            if (!empty($user)) {
                $user = $user[0];
                $this->data['user']['userDetailFields'] = $user;
                $message = $this->load->view($this->modulePath . "/register_email_verification_v", $this->data['user'], TRUE);

                if ($this->sendEmail($user['email'], "Account Verification Email - Vayzn", $message)) {

                    $this->response['status'] = TRUE;
                    $this->response['type'] = "emailSuccessful";
                    $this->response['title'] = "Sent";
                    $this->response['message'] = "Account verification email sent";
                }
                else {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "emailFailed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Unable to send email";
                }
            }
            else {
                $this->response['status'] = FALSE;
                $this->response['type'] = "loginFailed";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Invalid email or password";
            }

        }
        else {
            $this->response['status'] = FALSE;
            $this->response['title'] = "Failed";
            $this->response['message'] = "Invalid input fields";
            $this->response['error_array'] = array_values($this->form_validation->error_array());
        }


        echo json_encode($this->response);
    }

    public function demoEmail(){
        /* echo  "Mail<br><br>";*/
        $this->load->library('email');

        $this->email->from('info@vayzn.com', 'Vayzn');
        $this->email->to('daniyal.nasir.q@gmail.com');
        /*$this->email->cc('daniyalnasir.q@gmail.com');*/
        // $this->email->bcc('them@their-example.com');

        $this->email->subject("TEST SUBJECT");
        $this->email->message("<h2>test Message</h2>");

        if ($this->email->send()) {
            echo "Email Sent";
        }
        else {
            echo "Email Fail";
        }
    }



    public function verifyEmail($token)
    {
        //echo "<pre>verifyEmail <br>";

        if(empty($token) || $this->check_user_authentication()){
            /*if no token or loggedin -> redirect to home*/
            redirect(base_url("home"));
        }

        $where = ['email_token' => $token, 'account_status' => NULL];
        $userDetails = $this->merchants->userDetailsM->getAll('*',$where);

        // print_r($userDetails);


        if(!empty($userDetails) && count($userDetails) == 1 ) {
            $affectedRows = $this->merchants->userDetailsM->verifyAccount($userDetails[0]['id']);

            if($affectedRows > 0){
//                echo "<br>account verified";
                $this->session->set_flashdata('account_verification', 'verified');
                redirect(base_url("sign-up/complete"));
            }
            else{
//                echo "<br> account not verified ";
                $this->session->set_flashdata('account_verification', 'not_verified');
                redirect(base_url("sign-up/complete"));
            }
        }else{
//            echo "<br>account not found";
            $this->session->set_flashdata('account_verification', 'account_not_found');
            redirect(base_url("sign-up/complete"));

        }
       //  print_r($userDetails);
    }

    public function complete(){

        if($this->check_user_authentication()){
            /*if user is logged in*/
            redirect(base_url("home"));
        }
        $accVer  = $this->session->flashdata('account_verification');
        if($accVer == 'verified'){
            $this->data['user']['title']    = "Done";
            $this->data['user']['message']  = "Your account has been verified.";
        }
        else if($accVer == 'not_verified'){
            $this->data['user']['title']    = "Sorry";
            $this->data['user']['message']  = "We couldn't verify your account";
        }
        else if ($accVer == 'account_not_found') {
            $this->data['user']['title'] = "Sorry";
            $this->data['user']['message'] = "We couldn't find your account";
        }


        $this->data['user']['content_view'] = "$this->modulePath/verification_status_v";

        $this->setupHeader1();
        $this->setupNav();
        $this->template->setup_template($this->data['user']);
    }
 
   public function getCountries()
    {
        $this->countries->countriesM->orderCol = 'name';
        $this->countries->countriesM->orderVal = 'ASC';

        $countries = $this->countries->countriesM->getAll(['id', 'name'], ['is_active' => '1'], '');

        /* echo "<pre>"; print_r($countries); die;*/


        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
        $this->response['countries'] = $countries;

        echo json_encode($this->response);
    }

    public function getStates($countryId){

        $this->states->statesM->orderCol = 'name';
        $this->states->statesM->orderVal = 'ASC';

        $states = $this->states->statesM->getAll(['id', 'name'], ['is_active' => '1','country_id'=> $countryId], '');

        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();

        $this->response['states'] = $states;

        echo json_encode($this->response);
    }

    public function getCities($cityId){

        $this->cities->citiesM->orderCol = 'name';
        $this->cities->citiesM->orderVal = 'ASC';

        $cities = $this->cities->citiesM->getAll(['id', 'name'], ['is_active' => '1','state_id'=> $cityId], '');

        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();

        $this->response['cities'] = $cities;

        echo json_encode($this->response);
    }

    public function getUsername(){
        $username = $this->input->get('username');

        $merchants = $this->merchants->usersM->get_all(['slug' => $username]);
        if(!empty($merchants) && count($merchants) > 0 ){

            $this->response['status'] = FALSE;
            $this->response['type'] = "usernameNotAvailable";
            $this->response['title'] = "Not Available";
            $this->response['message'] = "";
        }else{
            $this->response['status'] = TRUE;
            $this->response['type'] = "usernameAvailable";
            $this->response['title'] = "Available";
            $this->response['message'] = "";
        }
        echo json_encode($this->response);
    }

    /*Uzair Work Starts*/
    public function thankYou()
    {
        $this->data['user']['content_view'] = "$this->modulePath/thank_you_v";

        $this->setupHeader1();
        $this->setupNav();
        $this->template->setup_template($this->data['user']);
    }
    /*Uzair Work Ends*/
}