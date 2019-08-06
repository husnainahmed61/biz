<?php

/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 8/12/2018
 * Time: 6:19 PM
 */
class Passwords extends User_Controller
{
    private $response = [];
    private $moduleName;
    private $loggedInUser; // Uzair
    /**
     * Passwords constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->moduleName = 'merchants';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'Password';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        $this->loggedInUser = $this->get_logged_in_user(); //UZair

        $this->load->model('Users_m', 'usersM', TRUE);
        $this->load->model('User_details_m', 'userDetailsM', TRUE);

        $this->data['user']['head']['pageLevelPlugins']['css'] = ['jq-smartwizard', 'bs-select', 'jq-file-upload','jq-swipebox'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['jq-smartwizard', 'bs-select', 'jq-file-upload' ,
            'jq-elevateZoom','jq-ios-orientationchange-fix','jq-swipebox'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

    }

    public function index()
    {
        $this->template->setup_template($this->data['user']);
    }

    public function forget()
    {
        $this->data['user']['content_view'] = "$this->modulePath/forget_password_v";
        $this->setupHeader1();
        $this->setupNav();
        $this->template->setup_template($this->data['user']);
    }

    public function request()
    {
        //  exit();
        $email = $this->input->post('email');
        $userDetails = $this->merchants->userDetailsM->with_users()->get(['email'  => $email]);
        /*print_r($userDetails);
        die;*/
        if (!empty($userDetails) && (is_array($userDetails) && count($userDetails) > 0)) {
            if($this->setUpResetPasswordEmail($userDetails)){
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Check your email.";
            }
            else{
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Unable to send email";
            }
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Invalid Email";
        }

        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
        echo json_encode($this->response);
    }


    public function setUpResetPasswordEmail($userDetails)
    {
        $message = $this->load->view($this->modulePath."/reset_password_email_v",['userDetails' => $userDetails ], TRUE);
        var_dump($this->sendEmail($userDetails['email'],"Reset Password - Vayzn" ,$message)) ;
        die;
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

        if ($this->email->send(FALSE)) {
//            echo $this->email->print_debugger();
            return TRUE;
        }
        else {
//            echo $this->email->print_debugger();
            return FALSE;
        }
    }

    public function reset($token)
    {
        if(!$this->check_user_authentication('home', ''))
        {
            if($this->merchants->chechkEmailToken($token))
            {
                $this->data['user']['token'] = $token;
                $this->data['user']['content_view'] = "$this->modulePath/reset_password_v";
                $this->setupHeader1();
                $this->setupNav();
                $this->template->setup_template($this->data['user']);
            }
            else
            {
                $this->template->setup_template($this->data['user']);
            }
        }
    }

    public function change()
    {
        if ($this->check_user_authentication('', 'home')) {
            $userId = $this->loggedInUser['id'];
            $user = $this->merchants->getTokenById($userId);
            $token = $user['email_token'];
            $this->data['user']['token'] = $token;
            $this->data['user']['content_view'] = "$this->modulePath/change_password_v";
            $this->setupHeader1();
            $this->setupNav();
            $this->template->setup_template($this->data['user']);
        }
    }

    public function update()
    {
        //die;

        $token = $this->input->post('token');
        $currentPassword = $this->input->post('current_password');
        $password = $this->input->post('password');
        $confirmPassword = $this->input->post('confirm_password');

        // echo "<pre>";
        // //print_r($currentPassword);
        // print_r($this->input->post());
        // exit;

        if(isset($currentPassword) && !empty($currentPassword))
        {
            $userId = $this->loggedInUser['id'];
            $checkPassword = $this->checkOldPassword($userId, $currentPassword);

            if (!$checkPassword)
            {
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Old Password not match";
            }

            else
            {
                $this->matchPassword($token,$password,$confirmPassword);
            }
        }

       else
       {
           $this->matchPassword($token,$password,$confirmPassword);
       }

        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
        echo json_encode($this->response);
    }

    public function matchPassword($token,$password,$confirmPassword)
    {
        if($password === $confirmPassword)
        {
            if(strlen($password) >= 6)
            {
                if($this->merchants->updatePassword($token,$password))
                {
                    $this->response['status'] = TRUE;
                    $this->response['code'] = "100";
                    $this->response['title'] = "Successful";
                    $this->response['message'] = "Password has been updated.";
                }
            }

            else
            {
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Password at least 6 character";
            }
        }

        else
        {
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Password and Confirm Password  not match";
        }
    }

    public function checkOldPassword($userId, $currentPassword)
    {
        $result = NULL;

        $user = $this->merchants->getByUserId($userId);
        $userPassword = $this->my_encrypt->decode($user['password_en']);

        if($currentPassword == $userPassword)
        {
            $result = TRUE;
        }

        else
        {
            $result = FALSE;
        }

        return $result;
    }
}