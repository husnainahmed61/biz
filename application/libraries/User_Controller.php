<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 10-Oct-17
 * Time: 4:24 PM
 */
class User_Controller extends MY_Base_Controller
{
    protected $userName;
    protected $serverDateTime;

    function __construct()
    {
        parent::__construct();
        $this->userName = 'user';

        $this->serverDateTime = date('Y-m-d H:i:s');
        $this->benchmark->mark('User_Controller > loadModule_start');

        $this->load->module(['templates/user/template', 'categories/user/categories1', 'categories/user/categories2', 'categories/user/categories3', 'account/user/account','merchants/user/merchants']);

        $this->load->model('Categories1_m', 'cat1Model', TRUE);
        $this->load->model('Categories2_m', 'cat2Model', TRUE);
        $this->load->model('Categories3_m', 'cat3Model', TRUE);
        $this->load->model('Users_m', 'Users_m', TRUE);

        $this->data['user']['site_name'] = 'Vayzn';
        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');

        if (!$this->checkBaseMode()) {
            /*IF Cookie is not set*/
            $this->setBaseMode('buy');
        }
        $this->data['user']['head']['metaTitle'] = "Vayzn";
        $this->data['user']['head']['baseMode'] = $this->getBaseMode();
        $this->data['user']['header']['baseMode'] = $this->getBaseMode();

        $this->data['user']['header']['return_url'] = 'return_url=' . current_url() . '?' . $_SERVER['QUERY_STRING'];
        $this->benchmark->mark('User_Controller > loadModule_end');
    }

    protected function checkBaseMode()
    {
        $baseMode = $this->input->cookie('base_mode');
        if (!empty($baseMode)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    protected function setBaseMode($mode)
    {
        $cookie = ['name' => 'base_mode', 'value' => $mode];
        $this->input->set_cookie($cookie);
    }

    protected function getBaseMode()
    {
        return $this->input->cookie('base_mode');
    }

    protected function setupNav()
    {
        $this->benchmark->mark('setupNav_start');

        $this->data['user']['header']['navbar'] = [];
        $categories1 = $this->categories1->cat1Model->getAll(['id', 'name', 'slug', 'icon']);

        /*echo "<pre>categories1 = <br><br>";
        print_r($categories1);*/


        $nav = "";

        // echo "========== Foreach test new-feature PR-2 <br>";
        foreach ($categories1 AS $key1 => $category1) {

            $categories1[$key1]['categories2'] = NULL;
            $categories2 = $this->categories2->cat2Model->getAllByOrder(['id', 'name', 'slug', 'category1_id'], ['display_order' => 'ASC'], ['category1_id' => $category1['id']]);

            /*echo "Key1 = $key1";
            print_r($categories1[$key1]['categories2']);*/

            if (is_array($categories2)) {
                $categories1[$key1]['categories2'] = $categories2;
                foreach ($categories2 AS $key2 => $category2) {
                    $categories1[$key1]['categories2'][$key2]['categories3'] = NULL;

                    $categories3 = $this->categories3->cat3Model->getAll(['id', 'name', 'slug', 'category1_id', 'category2_id'], ['category2_id' => $category2['id']]);

                    $categories1[$key1]['categories2'][$key2]['categories3'] = $categories3;

                }

            }
        }
        $this->data['user']['header']['navbar'] = $categories1;
        $this->benchmark->mark('setupNav_end');
    }
    protected function quick_menu($value='')
    {

        $quick_menu_cat = $this->categories1->cat1Model->quickMenu();
        foreach ($quick_menu_cat as $key => $value) {
            $quick_menu_cat[$key]["quick_cat_sub"] = NULL;
            $quickMenuSubCat = $this->categories1->cat1Model->quickMenuSubCat($value['id']);
            if (is_array($quickMenuSubCat)) {
                $quick_menu_cat[$key]["quick_cat_sub"] = $quickMenuSubCat;
            }
        }
        
        $this->data['user']['header']['quick_menu'] = $quick_menu_cat;
    }
    protected function header_notification($value='')
    {
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $alerts = '';
        $noti = '';
        $convo = '';
        $noti_count = '';
        $logged_in_user = $this->session->userdata('user_login');
        if (isset($logged_in_user) && !empty($logged_in_user)) {
            //$logged_in_user = "logged in";

            $noti = $this->merchants->Users_m->getAllNotificatons($logged_in_user['id']);
            $convo = $this->merchants->Users_m->getAllConversations($logged_in_user['id']);
            $noti_count = $this->merchants->Users_m->CountUnreadNotificatons($logged_in_user['id']);
            $alerts = $this->merchants->Users_m->getAllUserAlerts($logged_in_user['id']);

        }
        else
        {
            $logged_in_user = '';
            $noti = '';
            $convo = '';
            $noti_count = '';
            $alerts = '';
        }
        // echo "<pre>";
        // print_r($alerts);
        // exit();
        $this->data['user']['header']['alerts'] = $alerts;
        $this->data['user']['header']['notifications'] = $noti;
        $this->data['user']['header']['conversations'] = $convo;
        $this->data['user']['header']['noti_count'] = $noti_count;
    }

    protected function setupHeader1($by = "")
    {
        if ($this->is_user_logged_in('calledby: setupHeader1 by_module: ' . $by)) {
            $this->data['user']['header']['user_login'] = $this->session->userdata('user_login');
        }
    }

    private function is_user_logged_in($p = NULL)
    {
        /*echo "<pre>$p";       print_r($this->session->userdata('user_login'));*/

        return (bool)!empty($this->session->userdata('user_login'));
    }
    protected function get_user_roles($p = NULL)
    {
        $logged_in_user = $this->session->userdata('user_login');
        if ($logged_in_user['is_admin'] == 1) {
           $user_roles = "is_admin";
        }
        else{
            $user_roles = $this->merchants->Users_m->get_user_roles_m($logged_in_user['id']);
        }
        $this->data['user']['header']['user_roles'] = $user_roles;
        return $user_roles;
    }

    protected function check_user_authentication($successUrl = NULL, $failureUrl = NULL)
    {
        /*  echo "check_user_authentication = ";
          die;*/
        if (!$this->is_user_logged_in()) {
            /*echo "Authentication Failed";*/
            /*echo $failureUrl;*/
            if (isset($failureUrl) && !empty($failureUrl)) {
                redirect($failureUrl);
            }
            return FALSE;
        } else {
            if (isset($successUrl) && !empty($successUrl)) {
                redirect($successUrl);
            }
            return TRUE;
        }
    }

    protected function logout_user()
    {
        $this->session->unset_userdata('user_login');
    }

    protected function getCSRF()
    {
        $csrf[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
        //print_r($csrf);
        return $csrf;
    }

    protected function get_logged_in_user()
    {
        return !empty($this->session->userdata('user_login')) ? $this->session->userdata('user_login') : FALSE;
    }

    private function check_user_type($userType = "")
    {
        if (!empty($userType)) {
            if ($this->session->userdata('user_login')['user_login']['type'] == $userType) {
                return (bool)TRUE;
            }
        }
        return (bool)FALSE;
    }

    protected function set_showStatusMessage($type,$title,$message,$timer = 4000){
        // $type: messageSuccess , messageError , messageInfo
        return "showstatusMessage('" . $type . "','" . $title . "', '" . $message . "', $timer);";
    }

    protected function get_user_agent(){
        $this->load->library('user_agent');

        if ($this->agent->is_browser())
        {
            $agent = $this->agent->browser().' '.$this->agent->version();
        }
        elseif ($this->agent->is_robot())
        {
            $agent = $this->agent->robot();
        }
        elseif ($this->agent->is_mobile())
        {
            $agent = $this->agent->mobile();
        }
        else
        {
            $agent = 'Unidentified User Agent';
        }

        echo $agent;

        echo $this->agent->platform();
    }
}