<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends MY_Base_Controller
{

    public $response;
    /**
     * Login constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->module([
            'merchants/user/merchants'
        ]);
        $this->load->model('login_m','loginM');
        $this->moduleName = 'categories';


        $this->data['admin']['pageHeader'] = '';
        $this->data['admin']['pageDescription'] = '';
        $this->data['admin']['head']['pageLevelPlugins']['css'] = ['datatable', 'bs-fileinput', 'ladda'];
        $this->data['admin']['foot']['pageLevelPlugins']['js'] = ['datatable', 'jq-validation', 'bs-fileinput', 'ladda', 'ui-buttons'];
    }



    public function admin($param = NULL)
    {
        if ($this->input->method() == 'post') {
            $this->authenticate_admin();
        } else {
            if ($this->is_admin_logged_in()) {
                redirect('admin/index'); /*If user is already login no login page*/
            } else {
                $this->template->get_admin_login_template($this->data);
            }
        }
    }

    public function authenticate_admin()
    {
        $rules = $this->Login_m->rules;
        $this->form_validation->set_rules($rules);
        if ($this->form_validation->run() == TRUE) {
            if ($result = $this->Login_m->login("admin")) {
                // Login User
                redirect('admin/index');
            } else {
                $this->data['authentication_message'] = 'Invalid Email or Password';
                $this->template->get_admin_login_template($this->data);
            }
        } else {
            $this->template->get_admin_login_template($this->data);
        }
    }

    public function is_admin_logged_in()
    {
        if ($this->Login_m->is_logged_in() && $this->Login_m->is_admin()) {
            /* Admin is logged in*/
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

    public function logout()
    {
        $this->session->sess_destroy();
    }

    public function admin_logout()
    {
        $this->logout();
        $this->template->get_admin_login_template($this->data);
    }

    public function user($param = NULL)
    {
        if ($this->input->method() == 'post') {
            $this->authenticate_admin();
        } else {
            if ($this->is_admin_logged_in()) {
                redirect('admin/dashboard'); /*If user is already login no login page*/
            } else {
                $this->template->get_user_login_template($this->data);
            }
        }
    }

    public function validateFields(){
        $loginRules = $this->merchants->userDetailsM->rules['login_rules'];
        $this->form_validation->set_rules($loginRules);
        return $this->form_validation->run();
    }

    public function authenticate_user()
    {
        /*        echo "authenticate_user";*/
        // echo "<pre>";
        // print_r($this->input->post()); exit;


        if($this->validateFields())
        {
            $this->merchants->userDetailsM->userDetailFields['email'] = $this->input->post('login_email');
            $this->merchants->userDetailsM->userDetailFields['password'] = $this->input->post('login_password');

            if ($user = $this->merchants->userDetailsM->checkLoginCredentials()) {
                //print_r($user); die;

                if ($user[0]['account_status'] == 'verified') {
                    $sessionData = [
                        'user_login' => [
                            'id' => $user[0]['id'],
                            'firstname' => $user[0]['first_name'],
                            'lastname' => $user[0]['last_name'],
                            'type' => $user[0]['type'],
                            'email' => $user[0]['email'],
                            'sess_logged_in'=>0,
                            'profile_image' => $user[0]['profile_picture'],
                            'is_company' => $user[0]['is_company'],
                            'is_admin' => $user[0]['is_admin'],
                            'user_of_company' => $user[0]['user_of_company'],
                        ]

                    ];
                    $this->session->unset_userdata('user_login');
                    $this->session->set_userdata($sessionData);

                    log_message('Info', json_encode(['user_login_successful' => $sessionData]));

                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'loginSuccessful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "User Login";
                }
                else {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "nonVerified";
                    $this->response['title'] = "Failed";
                    $this->response['message'] =
                        "Your account isn't verified, Check your mail to verify you account, or click <a href='#' id='resend_account_verification_email'>here</a> to resend verification email.";
                    log_message('Error', json_encode(['user_login_failed' => $this->merchants->userDetailsM->userDetailFields]));
                }
            }
            else {
                $this->response['status'] = FALSE;
                $this->response['type'] = "loginFailed";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Invalid email or password";

                log_message('Error', json_encode(['user_login_failed' => $this->merchants->userDetailsM->userDetailFields]));
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

    public function web_login()
    {
        $data['user'] = array();

        // Check if user is logged in
        if ($this->facebook->is_authenticated())
        {
            // User logged in, get user details
            $user = $this->facebook->request('GET', '/me?fields=id,first_name,last_name,email');
            if (!isset($user['error'])) {
                $data['user'] = $user;
            }

            //print_r($user); exit();
            $chk = $this->merchants->userDetailsM->checkFacebookregisteration($user['id']);
            //print_r($chk);exit();
            if ($chk == 0 ) {
                //echo "in"; exit();

                $res = $this->merchants->userDetailsM->insertFacebooklogin($user);
                //print_r($res); exit();
                if (!empty($res)) {

                    //echo "in"; exit();

                    $sessionData = [
                        'user_login' => [
                            'id' => $res,
                            'firstname' => $user['first_name'],
                            'lastname' => $user['last_name'],
                            'type' => '',
                            'email' => $user['email'],
                            'sess_logged_in' =>0,
                            'profile_image' => $user[0]['profile_picture'],
                            'fb_logged_in' =>1,

                        ] ];

                    $this->session->unset_userdata('user_login');
                    $this->session->set_userdata($sessionData);
                    redirect('profile');
                    log_message('Info', json_encode(['user_login_successful' => $sessionData]));

                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'loginSuccessful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "User Login";


                }
                else{
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "loginFailed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Something Went Wrong";
                }
            }
            else{
                $sessionData = [
                    'user_login' => [
                        'id' => $chk[0]['id'],
                        'firstname' => $user['first_name'],
                        'lastname' => $user['last_name'],
                        'type' => '',
                        'email' => $user['email'],
                        'profile_image' => $chk[0]['profile_picture'],
                        'slug' => $chk[0]['slug'],
                        'sess_logged_in' =>0,
                        'fb_logged_in' =>1,
                    ] ];

                $this->session->unset_userdata('user_login');
                $this->session->set_userdata($sessionData);
                //print_r($sessionData); exit();
                //redirect('profile/edit');
                log_message('Info', json_encode(['user_login_successful' => $sessionData]));

                $this->response['status'] = TRUE;
                $this->response['type'] = 'loginSuccessful';
                $this->response['title'] = "Successful";
                $this->response['message'] = "User Login";

            }
        }

        redirect(base_url()); //profile/edit


        //print_r($user);
        //exit();
        // display view
        //$this->load->view('examples/web', $data);
    }
    public function web_login_logout()
    {
        //$this->facebook->destroy_session();
        $this->session->unset_userdata('user_login');
        redirect(base_url(),'refresh');
        //redirect('example/web_login', redirect);
    }

    public function google_login()
    {
        $user = $this->google->validate();
        if (!empty($user)) {
            //exit();
            $chk = $this->merchants->userDetailsM->checkGoogleregisteration($user['id']);
            //print_r($chk);exit();
            if ($chk == 0) {
                $res = $this->merchants->userDetailsM->insertGooglelogin($user);
                /*print_r($user);
                print_r($res); exit();*/
                if (!empty($res)) {

                    $sessionData = [
                        'user_login' => [
                            'id' => $res,
                            'firstname' => $user['name'],
                            'lastname' => '',
                            'type' => '',
                            'email' => $user['email'],
                            'sess_logged_in' => 1,
                            'fb_logged_in' =>0,
                        ]];

                    $this->session->unset_userdata('user_login');
                    $this->session->set_userdata($sessionData);
                    redirect('profile');
                    log_message('Info', json_encode(['user_login_successful' => $sessionData]));

                    $this->response['status'] = TRUE;
                    $this->response['type'] = 'loginSuccessful';
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "User Login";

                    //redirect('profile/edit');

                } else {
                    $this->response['status'] = FALSE;
                    $this->response['type'] = "loginFailed";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "Something Went Wrong";
                }
            }else{
                $sessionData = [
                    'user_login' => [
                        'id' => $chk[0]['id'],
                        'firstname' => $user['name'],
                        'lastname' => '',
                        'type' => '',
                        'email' => $user['email'],
                        'sess_logged_in' => 1,
                        'profile_image' => $chk[0]['profile_picture'],
                        'slug' => $chk[0]['slug'],
                        'fb_logged_in' =>0,
                    ]];

                $this->session->unset_userdata('user_login');
                $this->session->set_userdata($sessionData);

                log_message('Info', json_encode(['user_login_successful' => $sessionData]));

                $this->response['status'] = TRUE;
                $this->response['type'] = 'loginSuccessful';
                $this->response['title'] = "Successful";
                $this->response['message'] = "User Login";
                //redirect('profile/edit');
            }
        }
        redirect(base_url()); //profile/edit


        //$this->session->set_userdata($session_data);

    }
    public function Google_logout($value='')
    {
        session_destroy();
        unset($_SESSION['access_token']);
        $session_data=array(
            'sess_logged_in'=>0);
        $this->session->set_userdata($session_data);
        redirect(base_url());
    }

    public function is_user_logged_in()
    {
        if ($this->Login_m->is_logged_in() && $this->Login_m->is_user()) {
            /* Admin is logged in*/
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

    public function user_logout()
    {
        $this->logout();
    }

    public function moderator($param = NULL){
        /*print_r($_SESSION); die;*/
        if ($this->input->method() == 'post') {
            $this->authenticate_moderator();
        } else {
            if ($this->is_moderator_logged_in()) {
                redirect('moderator/index'); /*If moderator is already login no login page*/
            } else {
                $this->template->get_moderator_login_template($this->data);
            }
        }
    }

    public function authenticate_moderator()
    {
        $rules = $this->Login_m->rules;
        $this->form_validation->set_rules($rules);

        if ($this->form_validation->run() == TRUE) {
            if ($result = $this->Login_m->login("moderator")) {
                // Login moderator
                redirect('moderator/index');
            } else {
                $this->data['authentication_message'] = 'Invalid Email or Password';
                $this->template->get_moderator_login_template($this->data);
            }
        } else {
            $this->template->get_moderator_login_template($this->data);
        }
    }

    public function is_moderator_logged_in()
    {
        if ($this->Login_m->is_logged_in() && $this->Login_m->is_moderator()) {
            /* Admin is logged in*/
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

}