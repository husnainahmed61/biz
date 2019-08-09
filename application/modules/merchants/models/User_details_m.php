<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 24-Jun-18
 * Time: 1:57 AM
 */
class User_details_m extends MY_Model
{
    public $rules = [
        'login_rules' => [
            'email' => [
                'field' => 'login_email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            'password' => [
                'field' => 'login_password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]'
            ]
        ],
    ];
    private $response;

    public $userDetailFields;

    /**
     * User_details_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('user_details');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        $this->has_one['users'] = array(
            'foreign_model' => 'Users_m',
            'foreign_table' => $this->db->dbprefix('users'),
            'foreign_key' => 'id',
            'local_key' => 'user_id'
        );

        $this->load->library('My_encrypt');
    }

    public function getAll($columns = NULL, $where = NULL, $whereParams = NULL)
    {
        if (empty($where) && empty($whereParams)) {

            /*echo "get all results";*/
            return $categories = $this->fields($columns)->as_array()->where()->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {

            //echo "where + AND";

            return $categories = $this->fields($columns)->as_array()->where($where)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*echo "where IN";*/
            return $categories = $this->fields($columns)->as_array()->where($where, $whereParams)->get_all();
        }
        return FALSE;
    }

    public function verifyAccount($id)
    {
        $updateData = ['account_status' => 'verified'];
        return $this->where('id', $id)->update($updateData);
    }

    public function getUserWithDetails($columns = "*",$where){

        $this->db->select($columns);
        $this->db->from("$this->table as ud");
        $this->db->join('users as u', "ud.user_id = u.id", 'inner');
        $this->db->where($where);
        //$this->db->where("is_company","1");

        return $this->db->get()->result_array();
    }


    public function checkLoginCredentials()
    {
        $userData = $this->getUserWithDetails(
            "u.id,profile_picture,first_name,last_name,type,slug,email,password_en,account_status,email_token"
            ,['email' => $this->userDetailFields['email']]);

        /*Matching Password after decoding*/
        /*echo $this->my_encrypt->decode($userData[0]['password_en'])." == ".$loginInput['password'];*/
        if (!empty($userData) AND count($userData) == 1
            AND $this->my_encrypt->decode($userData[0]['password_en']) == $this->userDetailFields['password']
        ) {
            return $userData;
        }
        else {

            return FALSE;
        }
        /*return FALSE;*/
    }

    public function getUserWithDetals($col){
        $this->db->select("u.id,first_name,last_name,type,email,password_en,account_status,email_token");
        $this->db->from("$this->table as ud");
        $this->db->join('users as u', "ud.user_id = u.id", 'inner');
        $this->db->where($where);
        return $this->db->get()->result_array();
    }

    public function insertFacebooklogin($user)
    {
        //print_r($user); exit();
        $data = array(
        'first_name' => $user['first_name'],
        'last_name' => $user['last_name']
        );

        $this->db->insert('ssx_users', $data);
        $id = $this->db->insert_id();
        //print_r($id); exit();
        if (!empty($id)) {

            $data2 = array(
            'email' => $user['email'],
            'fb_id' => $user['id'],
            'user_id' => $id
            );

            $res = $this->db->insert('ssx_user_details', $data2);
           // print_r($res); exit();
            if ($res == 1) {
                return $id;
            }
            else{
                return 0;
            }
        }
    }

    public function insertGooglelogin($user)
    {
        //print_r($user); exit();
        $data = array(
        'first_name' => $user['name'],
        );

        $this->db->insert('ssx_users', $data);
        $id = $this->db->insert_id();
        //print_r($id); exit();
        if (!empty($id)) {

            $data2 = array(
            'email' => $user['email'],
            'google_id' => $user['id'],
            'user_id' => $id
            );

            $res = $this->db->insert('ssx_user_details', $data2);
           // print_r($res); exit();
            if ($res == 1) {
                return $id;
            }
            else{
                return 0;
            }
        }
    }
    public function checkFacebookregisteration($id)
    {
        //print_r($id); exit();
        $this->db->select('user_id');
        $this->db->from('ssx_user_details');
        $this->db->where('fb_id',$id);
        $res = $this->db->get();
        // echo "<pre>";
        // print_r($res->result_array()); exit();
            if ($res->num_rows() > 0) {
                $res = $res->result_array();
                
                $res = $this->db->select('*')->from('ssx_users')->where('id',$res[0]['user_id'])->get();    
                
                return $res->result_array();
            }
            else{
                return 0;
            }
    }

    public function checkGoogleregisteration($id)
    {
        //print_r($id); exit();
        $this->db->select('user_id');
        $this->db->from('ssx_user_details');
        $this->db->where('google_id',$id);
        $res = $this->db->get();
        //echo "<pre>";
        //print_r($res->num_rows()); exit();
            if ($res->num_rows() > 0) {
                
                $res = $res->result_array();
                
                $res = $this->db->select('*')->from('ssx_users')->where('id',$res[0]['user_id'])->get();
                
                return $res->result_array();
            }
            else{
                return 0;
            }
    }

    public function getPaidUsers(){
        $this->db->select("*");
        $this->db->from("$this->table as ud");
        $this->db->join('users as u', "ud.user_id = u.id", 'inner');
        $this->db->where(['paid_rank !=' => NULL ]);
        $this->db->order_by('paid_rank','ASC');
        return $this->db->get()->result_array();
    }
    public function getCityIdByName($location='')
    {
        $result = $this->db->select("id")->from("ssx_cities")->like("name",$location)->get()->result_array();
        if (isset($result[0]['id'])) {
            return $result[0]['id'];
        }
        else{
            return false;
        }
    }

    public function getTotalProducts($value='')
    {
        $res = $this->db->select('*')->from('ssx_auctions')->get();
        return $res->num_rows();
    }
    public function getIndividualMembers($value='')
    {
        $res = $this->db->select('*')->from('ssx_users')->where('type','individual')->get();
        return $res->num_rows();
    }
    public function getBusinessMembers($value='')
    {
        $res = $this->db->select('*')->from('ssx_users')->where('type','business')->get();
        return $res->num_rows();
    }

} //class end