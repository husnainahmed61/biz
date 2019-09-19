<?php

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 24-Jun-18
 * Time: 3:02 AM
 */
class Users_m extends MY_Model
{
    /**
     * Userdetails_m constructor.
     */
    public $rules = [
        'insert' => [

            'user_type' => [
                'field' => 'user_type',
                'label' => 'User Type',
                'rules' => 'trim|required|in_list[individual,business]'
            ],

            'firstname' => [
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ],
            'lastname' => [
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ],
            'email' => [
                'field' => 'email',
                'label' => 'Email',
                'rules' => 'trim|required|valid_email'
            ],
            'username' => [
                'field' => 'username',
                'label' => 'Username',
                'rules' => 'trim|required'
            ],
            'phone' => [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ],
            'country_id' => [
                'field' => 'country_id',
                'label' => 'Country',
                'rules' => 'trim|required'
            ],
            'state_id' => [
                'field' => 'state_id',
                'label' => 'State',
                'rules' => 'trim|required'
            ],
            'city_id' => [
                'field' => 'city_id',
                'label' => 'City',
                'rules' => 'trim|required'
            ],

            'business_name' => [
                'field' => 'business_name',
                'label' => 'Business Name',
                'rules' => 'trim'
            ],

            'business_description' => [
                'field' => 'business_description',
                'label' => 'Business Description',
                'rules' => 'trim'
            ],

            'registered_address' => [
                'field' => 'registered_address',
                'label' => 'Registered Address',
                'rules' => 'trim'
            ],

            'website_url' => [
                'field' => 'website_url',
                'label' => 'Website URL',
                'rules' => 'trim'
            ],

            'password' => [
                'field' => 'password',
                'label' => 'Password',
                'rules' => 'trim|required|min_length[6]'
            ],

            'confirm_password' => [
                'field' => 'confirm_password',
                'label' => 'Confirm Password',
                'rules' => 'trim|required|min_length[6]|matches[password]',
            ],

        ],
        'update' => [
            'user_type' => [
                'field' => 'user_type',
                'label' => 'User Type',
                'rules' => 'trim|required|in_list[individual,business]'
            ],

            'firstname' => [
                'field' => 'firstname',
                'label' => 'First Name',
                'rules' => 'trim|required'
            ],
            'lastname' => [
                'field' => 'lastname',
                'label' => 'Last Name',
                'rules' => 'trim|required'
            ],
            'phone' => [
                'field' => 'phone',
                'label' => 'Phone',
                'rules' => 'trim|required'
            ],
            'country_id' => [
                'field' => 'country_id',
                'label' => 'Country',
                'rules' => 'trim|required'
            ],
            'state_id' => [
                'field' => 'state_id',
                'label' => 'State',
                'rules' => 'trim|required'
            ],
            'city_id' => [
                'field' => 'city_id',
                'label' => 'City',
                'rules' => 'trim|required'
            ],

            'business_name' => [
                'field' => 'business_name',
                'label' => 'Business Name',
                'rules' => 'trim'
            ],

            'business_description' => [
                'field' => 'business_description',
                'label' => 'Business Description',
                'rules' => 'trim'
            ],

            'tax_number' => [
                'field' => 'tax_number',
                'label' => 'Tax Number',
                'rules' => 'trim'
            ],

            'registered_address' => [
                'field' => 'registered_address',
                'label' => 'Registered Address',
                'rules' => 'trim'
            ],

            'website_url' => [
                'field' => 'website_url',
                'label' => 'Website URL',
                'rules' => 'trim'
            ],

            'facebook_link' => [
                'field' => 'facebook_link',
                'label' => 'Facebook Link',
                'rules' => 'trim'
            ],

            'twitter_link' => [
                'field' => 'twitter_link',
                'label' => 'Twitter Link',
                'rules' => 'trim'
            ],

            'google_link' => [
                'field' => 'google_link',
                'label' => 'Google Link',
                'rules' => 'trim'
            ],

            'RFQ_expiry' => [
                'field' => 'RFQ_expiry',
                'label' => 'RFQ expiry',
                'rules' => 'trim'
            ],

            'currency_id' => [
                'field' => 'currency_id',
                'label' => 'currency id',
                'rules' => 'trim'
            ],

            'legal_address' => [
                'field' => 'legal_address',
                'label' => 'legal address',
                'rules' => 'trim'
            ],
            'payment_detail' => [
                'field' => 'payment_detail',
                'label' => 'payment detail',
                'rules' => 'trim'
            ],


        ]
    ];

    public $userFields = [];

    public $userDetailFields = [];

    public function __construct()
    {
        parent::__construct();
        $this->load->library('My_encrypt');
        $this->table = $this->db->dbprefix('users');
        $this->table2 = $this->db->dbprefix('user_details');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        $this->has_one['user_details'] = array(
            'foreign_model' => 'User_details_m',
            'foreign_table' => $this->db->dbprefix('user_details'),
            'foreign_key' => 'user_id',
            'local_key' => 'id'
        );


        $this->has_many['bids'] = array(
            'foreign_model' => 'Bids_m',
            'foreign_table' => $this->db->dbprefix('bids'),
            'foreign_key' => 'user_id',
            'local_key' => 'id'
        );

    }

    public function setFields()
    {
        $userType = $this->input->post('user_type');
        if ($userType == 'individual') {
            $this->userFields['business_name'] = NULL;
            $this->userFields['business_description'] = NULL;
            $this->userFields['tax_number'] = NULL;
            $this->userFields['registered_address'] = NULL;
            $this->userFields['website_url'] = NULL;
        }
        else if ($userType == 'business') {
            $this->userFields['business_name'] = $this->input->post('business_name');
            $this->userFields['business_description'] = $this->input->post('business_description');
            
            $this->userFields['registered_address'] = $this->input->post('registered_address');
            $this->userFields['website_url'] = $this->input->post('website_url');
        }

        $this->userFields['first_name'] = $this->input->post('firstname');
        $this->userFields['last_name'] = $this->input->post('lastname');
        $this->userFields['type'] = $userType;
        $this->userFields['slug'] = $this->input->post('username');

        $this->userFields['phone'] = $this->input->post('phone');
        $this->userFields['country_id'] = $this->input->post('country_id');
        $this->userFields['state_id'] = $this->input->post('state_id');
        $this->userFields['city_id'] = $this->input->post('city_id');

        $this->userFields['facebook_link'] = $this->input->post('facebook_link');
        $this->userFields['twitter_link'] = $this->input->post('twitter_link');
        $this->userFields['google_link'] = $this->input->post('google_link');

        $this->userFields['RFQ_expiry'] = $this->input->post('rfq_expiry');
        $this->userFields['currency_id'] = $this->input->post('currency');
        $this->userFields['legal_address'] = $this->input->post('legal_address');
        
        $this->userDetailFields['email'] = $this->input->post('email');
        $this->userDetailFields['email_token'] = $this->my_encrypt->encode($this->input->post('email'));
        $this->userDetailFields['password_en'] = $this->my_encrypt->encode($this->input->post('password'));

        /* echo "<pre>";
         print_r($this->userFields);
     print_r($this->userDetailFields);*/

    }

    public function setUpdateFields()
    {
        $userType = $this->input->post('user_type');


        if ($userType == 'individual') {
            $this->userFields['business_name']= NULL ;
            $this->userFields['business_description']= NULL ;
            $this->userFields['tax_number'] = NULL ;
            $this->userFields['registered_address'] = NULL;
            $this->userFields['website_url'] = NULL;
        }
        else if ($userType == 'business') {
            $this->userFields['business_name'] = $this->input->post('business_name');
            $this->userFields['business_description'] = $this->input->post('business_description');
            $this->userFields['tax_number'] = $this->input->post('tax_number');
            $this->userFields['registered_address'] = $this->input->post('registered_address');
            $this->userFields['website_url'] = $this->input->post('website_url');
        }

        $this->userFields['first_name'] = $this->input->post('firstname');
        $this->userFields['last_name'] = $this->input->post('lastname');
        $this->userFields['type'] = $userType;
        
        $slug = $this->input->post('slug');
        if (empty($slug)) {
            $remove_space = $this->input->post('firstname').'-'.$this->input->post('lastname').'-'.rand(1,1000);
            $remove_space = str_replace(' ', '-', $remove_space);
            $this->userFields['slug'] = $remove_space;    
        }

        $this->userFields['phone'] = $this->input->post('phone');
        $this->userFields['country_id'] = $this->input->post('country_id');
        $this->userFields['state_id'] = $this->input->post('state_id');
        $this->userFields['city_id'] = $this->input->post('city_id');

        $this->userFields['facebook_link'] = $this->input->post('facebook_link');
        $this->userFields['twitter_link'] = $this->input->post('twitter_link');
        $this->userFields['google_link'] = $this->input->post('google_link');

        $this->userFields['RFQ_expiry'] = $this->input->post('rfq_expiry');
        $this->userFields['currency_id'] = $this->input->post('currency');
        $this->userFields['legal_address'] = $this->input->post('legal_address');
        $this->userFields['payment_detail'] = $this->input->post('payment_detail');

        /*$this->userDetailFields['email'] = $this->input->post('email');
        $this->userDetailFields['email_token'] = $this->my_encrypt->encode($this->input->post('email'));
        $this->userDetailFields['password_en'] = $this->my_encrypt->encode($this->input->post('password'));*/

     //     echo "<pre>";
     //     print_r($this->userFields);
     // print_r($this->userDetailFields);
     // exit();

    }

    public function getFields(){
        return ['userDetailFields' => $this->userDetailFields, 'userFields' => $this->userFields];
    }

    public function createAccount()
    {
        $this->db->trans_start();
        $this->db->insert($this->table, $this->userFields);
        $this->userDetailFields['user_id'] = $this->db->insert_id();
        $this->db->insert($this->table2, $this->userDetailFields);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    /**
     * @return bool
     */
    public function updateProfile($id)
    {
        $this->db->trans_start();
        $this->db->where(['id' => $id]);
        //$res = 
        $this->db->update($this->table,$this->userFields);
        //print_r($res); exit();
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function updateProfileDetail($id)
    {
        $this->db->trans_start();
        $this->db->where(['user_id' => $id]);
        //$res = 
        $this->db->update($this->table2,$this->userFields);
        //print_r($res); exit();
        $this->db->trans_complete();
        return $this->db->trans_status();
    }

    public function getAll($columns = NULL, $where = NULL, $whereParams = NULL)
    {
        if (empty($where) && empty($whereParams)) {
            /*get all results*/
            return $categories = $this->fields($columns)->as_array()->where()->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {
            /*where + AND*/
            return $categories = $this->fields($columns)->as_array()->where($where, NULL)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*where IN*/
            return $categories = $this->fields($columns)->as_array()->where($where, $whereParams)->get_all();
        }
        return FALSE;
    }
    public function getUserConvo($value='')
    {
        $auction_chats = [];
        $auction_convo = [];
        $this->db->trans_start();
        $this->db->distinct('ssxc.auction_id');
        $this->db->select("ssxc.auction_id");
        $this->db->from("ssx_conversations ssxc");
        //$this->db->join("ssx_users ssxu","ssxc.recieved_by_user=ssxu.id","Left");
        //$this->db->join("ssx_auctions ssxa","ssxc.auction_id = ssxa.id","Left");
        $this->db->where("recieved_by_user",$value);
        $this->db->or_where("sent_by_user",$value);
        // /$this->db->group_by("ssxc.auction_id");
        $res = $this->db->get();
        $this->db->trans_complete();
        //print_r($this->db->trans_status());
        //exit();
        $res = $res->result_array();
        foreach ($res as $key => $value) {
            $this->db->select("ssxc.*,(SELECT ssx_auctions.image_sm_1 FROM ssx_auctions WHERE ssx_auctions.id=ssxc.auction_id) AS auction_image");
            $this->db->from("ssx_conversations ssxc");
            $this->db->where("auction_id",$value['auction_id']);
            $convo = $this->db->get()->result_array();

            $auction_convo["name"] = $convo[0]['auction_name'];
            $auction_convo["slug"] = $convo[0]['auction_slug'];
            $auction_convo["image"] = $convo[0]['auction_image'];
            $auction_convo["auction_id"] = $convo[0]['auction_id'];
            $auction_convo["created_at"] = $convo[0]['created_at'];
            $auction_convo["result"] = $convo;

            array_push($auction_chats, $auction_convo);

            //$auction_chats[$value['auction_id']]

        }
        return $auction_chats;
    }
    public function getUserConvo_Company($value='')
    {
        $auction_chats = [];
        $auction_convo = [];
        $this->db->trans_start();
        $this->db->distinct('ssxc.auction_id');
        $this->db->select("ssxc.auction_id");
        $this->db->from("ssx_conversations ssxc");
        //$this->db->join("ssx_users ssxu","ssxc.recieved_by_user=ssxu.id","Left");
        //$this->db->join("ssx_auctions ssxa","ssxc.auction_id = ssxa.id","Left");
        $this->db->where("rec_company_id",$value);
        $this->db->or_where("sen_company_id ",$value);
        // /$this->db->group_by("ssxc.auction_id");
        $res = $this->db->get();
        $this->db->trans_complete();
        //print_r($this->db->trans_status());
        //exit();
        $res = $res->result_array();
        foreach ($res as $key => $value) {
            $this->db->select("ssxc.*,(SELECT ssx_auctions.image_sm_1 FROM ssx_auctions WHERE ssx_auctions.id=ssxc.auction_id) AS auction_image");
            $this->db->from("ssx_conversations ssxc");
            $this->db->where("auction_id",$value['auction_id']);
            $convo = $this->db->get()->result_array();

            $auction_convo["name"] = $convo[0]['auction_name'];
            $auction_convo["slug"] = $convo[0]['auction_slug'];
            $auction_convo["image"] = $convo[0]['auction_image'];
            $auction_convo["auction_id"] = $convo[0]['auction_id'];
            $auction_convo["created_at"] = $convo[0]['created_at'];
            $auction_convo["result"] = $convo;

            array_push($auction_chats, $auction_convo);

            //$auction_chats[$value['auction_id']]

        }
        return $auction_chats;
    }

    public function getMessagesById($value='')
    {
        $this->db->trans_start();
        $this->db->select("ssxm.*,ssxu.first_name,ssxu.last_name,ssxu.profile_picture");
        $this->db->from("ssx_messages ssxm");
        $this->db->join("ssx_users ssxu","ssxu.id=ssxm.sender_user_id","Left");
        $this->db->where("convo_id",$value);
        $res = $this->db->get();
        $this->db->trans_complete();
        return $res->result_array();
    }

    public function getsenderRecieverByConvoId($value='')
    {
        $this->db->trans_start();
        $this->db->select("ssxc.*,ssxu.profile_picture as sender_pic,ssxu_2.profile_picture as auctioneer_pic,ssxu.slug as sender_slug,ssxu_2.slug as auctioneer_slug");
        $this->db->from("ssx_conversations ssxc");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxc.sent_by_user","Left");
        $this->db->join("ssx_users ssxu_2","ssxu_2.id = ssxc.recieved_by_user" , "Left");

        $this->db->where("ssxc.id",$value);
        $res = $this->db->get();
        $this->db->trans_complete();
        $res = $res->result_array();

        // $this->db->trans_start();
        // $this->db->select("*");
        // $this->db->from("ssx_users");
        // $this->db->where("id",$res[0]['sent_by_user']);
        // $this->db->where("id",$res[0]['recieved_by_user']);
        // $image = $this->db->get();
        // $this->db->trans_complete();        

        //return $this->db->last_query();
        return $res;
        //return $image->result_array();
    }

    public function getAuctionDetail($auction_id='',$user_id ='')
    {
        if (!empty($auction_id)) {
            // $data = array(
            //     'auction_id' => $auction_id,
            //     '' );

            $this->db->trans_start();
            $this->db->select("*");
            $this->db->from("ssx_conversations");
            $this->db->where("auction_id",$auction_id);
            $this->db->where("sent_by_user",$user_id);
            $this->db->or_where("recieved_by_user",$user_id);
            $res = $this->db->get();
            $this->db->trans_complete();
            if ($res->num_rows() > 0) {
                return $res->result_array();
            }

            else{
                $this->db->trans_start();
                $this->db->select("ssxa.id as auction_id,ssxa.slug,ssxa.name,ssxu.first_name,ssxu.last_name,ssxu.id");
                $this->db->from("ssx_auctions ssxa");
                $this->db->join("ssx_users ssxu","ssxa.user_id = ssxu.id","Left");
                $this->db->where("ssxa.id",$auction_id);
                $res = $this->db->get();
                $this->db->trans_complete();
                return ($res->result_array());
            }


        }
    }
    public function addConvoId($auction_id='',$auctioneer_id='',$user_id='')
    {
        $res = $this->db->select("user_of_company")->from("ssx_users")->where("id",$auctioneer_id)->get()->result_array();
        $res2 = $this->db->select("user_of_company")->from("ssx_users")->where("id",$user_id)->get()->result_array();

        $data = array(
        'auction_id' => $auction_id,
        'recieved_by_user' => $auctioneer_id,
        'rec_company_id' => $res[0]['user_of_company'],
        'sent_by_user' => $user_id,
        'sen_company_id' => $res2[0]['user_of_company'],
        );

        $this->db->trans_start();
        $this->db->select("*");
        $this->db->from("ssx_conversations");
        $this->db->where($data);
        $res = $this->db->get();
        $this->db->trans_complete();

        if ($res->num_rows() < 1) {
            $this->db->trans_start();
            $this->db->insert('ssx_conversations', $data);
            $this->db->trans_complete();
            return $this->db->insert_id();    
        }
        else{
            $res = $res->result_array();
            $res = $res[0]['id'];
            return $res;
        } 
    }
    public function insertConvoAndMessage($auction_id='',$auctioneer_id='',$user_id='',$message='')
    {
        if (!empty($auction_id)) {
            $this->db->trans_start();
            $this->db->select("ssxa.*,ssxu.first_name,ssxu.last_name,ssxu.id as auctioneer_id,ssxu.user_of_company");
            $this->db->from("ssx_auctions ssxa");
            $this->db->join("ssx_users ssxu","ssxa.user_id = ssxu.id","Left");
            $this->db->where("ssxa.id",$auction_id);
            $this->db->trans_complete();            
            $res = $this->db->get();
        }
        if (!empty($user_id)) {
            $this->db->trans_start();
            $this->db->select("ssxu.first_name,ssxu.last_name,ssxu.id as user_id,ssxu.user_of_company");
            $this->db->from("ssx_users ssxu");
            $this->db->where("ssxu.id",$user_id);
            $this->db->trans_complete();            
            $res2 = $this->db->get();
        }
        $res2 = $res2->result_array();
        $res2 = $res2[0];

        // echo "<pre>";
        $res = $res->result_array();
        $res = $res[0];
        // print_r($res2);
        // exit();

        $data = array(
        'auction_id' => $auction_id,
        'recieved_by_user' => $auctioneer_id,
        'rec_company_id' => $res2['user_of_company'],
        'sent_by_user' => $user_id,
        'sen_company_id' => $res['user_of_company'],
        'auction_name' => $res['name'],
        'auction_slug' => $res['slug'],
        'auctioneer_name' => $res['first_name'].' '.$res['last_name'],
        'auctioneer_id' => $res['auctioneer_id'],
        'user_name' => $res2['first_name'].' '.$res2['last_name']
        );

            $this->db->trans_start();
            $this->db->insert('ssx_conversations', $data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();

            $data2 = array(
            'convo_id' => $insert_id, 
            'sender_user_id' => $user_id,
            'company_id' =>$res['user_of_company'],
            'message' => $message
            );
            //print_r($insert_id); exit();

            if (!empty($insert_id)) {
                $this->db->trans_start();
                $this->db->insert('ssx_messages', $data2);
                $insert_id2 = $this->db->insert_id();
                $this->db->trans_complete();
                if (!empty($insert_id2)) {
                    // $this->db->trans_start();
                    // $this->db->select("*");
                    // $this->db->from("ssx_messages");
                    // $this->db->where("convo_id",$insert_id);
                    // $res = $this->db->get();
                    // $this->db->trans_complete();
                    return $insert_id;
                }
            }
    }
    public function insertMessagebyConvo($convo_id='',$sender_id='',$message='',$type='')
    {
        $res2 = $this->db->select("user_of_company")->from("ssx_users")->where("id",$sender_id)->get()->result_array();
        $data = array(
            'convo_id' => $convo_id, 
            'sender_user_id' => $sender_id,
            'company_id' =>$res2[0]['user_of_company'],
            'message' => $message,
            'type' => $type
        );

            $this->db->trans_start();
            $this->db->insert('ssx_messages', $data);
            $insert_id2 = $this->db->insert_id();
            $this->db->trans_complete();

            if (!empty($insert_id2)) {
                    return $insert_id2;
                }
    }
    
    public function get_updated_user($user_id='')
    {
            $this->db->trans_start();
            $this->db->select('ssxu.*,ssxud.email');
            $this->db->from('ssx_users ssxu');
            $this->db->join('ssx_user_details ssxud','ssxu.id = ssxud.user_id','Left');
            $this->db->where('ssxu.id',$user_id);
            $res = $this->db->get();
            //$insert_id2 = $this->db->insert_id();
            $this->db->trans_complete();
            return $res->result_array();
    }
    public function Check_convo_entry($auction_id,$auctioneer_id,$user_id)
    {
        $where = array(
            'auction_id' => $auction_id,
            'sent_by_user' => $user_id,
            'recieved_by_user' => $auctioneer_id
        );
        $convo_id = $this->db->select('id')->from('ssx_conversations')->where($where)->get();

        $convo_id = $convo_id->result_array();

        // print_r($convo_id);
        // exit();

        if (isset($convo_id[0]['id']) && !empty($convo_id[0]['id'])) {
            return $convo_id[0]['id'];
        }
        else{
            return FALSE;
        }
    }
    public function addFollow($user_id='',$following_id='')
    {
        if (isset($user_id) && isset($following_id)) {
            $data = 
            array(
                'follower_id' => $user_id,
                'following_id' => $following_id
             );

            $res = $this->db->insert('ssx_followers',$data);

            if ($res === TRUE) {
                $user_slug = $this->db->select("slug,first_name")->from("ssx_users")->where("id",$user_id)->get()->result_array();

                $data = array(
                    'notification_type_id' => 4, 
                    'source_id' => $user_id,
                    'target_id' => $following_id,
                    'target_reference_userId' => $following_id,
                    'slug' => $user_slug[0]['slug'],
                    'UserName' => $user_slug[0]['first_name'],
                );  

                $this->db->insert('ssx_notifications', $data);
                return $res;     
            }
            else
            {
                return false;
            }

            
        }
    }
    public function UnFollow($user_id='',$following_id='')
    {
        if (isset($user_id) && isset($following_id)) {
            $data = 
            array(
                'follower_id' => $user_id,
                'following_id' => $following_id
             );

            $res = $this->db->where($data)->delete('ssx_followers');

            if ($res === TRUE) {
                return $res;     
            }
            else
            {
                return false;
            }

            
        }
    }
    public function checkFollowing($Visitor_id,$user_id)
    {
        $data = array(
            'follower_id' => $Visitor_id,
            'following_id' => $user_id);
        $res = $this->db->select('id')->from('ssx_followers')->where($data)->get()->result_array();
        return $res;
    }
    public function getFollowersOfId($user_id)
    {
        $this->db->select('ssxf.follower_id,ssxu.profile_picture,first_name,ssxu.last_name,ssxu.created_at,ssxc.name')->from('ssx_followers ssxf');
        $this->db->join('ssx_users ssxu','ssxu.id=ssxf.follower_id','Left');
        $this->db->join('ssx_countries ssxc','ssxc.id=ssxu.country_id','Left');
        $res = $this->db->where("ssxf.following_id",$user_id)->get()->result_array();
        return $res;
    }
    public function getFollowingOfId($user_id)
    {
        $this->db->select('ssxf.following_id,ssxu.profile_picture,first_name,ssxu.last_name,ssxu.created_at,ssxc.name')->from('ssx_followers ssxf');
        $this->db->join('ssx_users ssxu','ssxu.id=ssxf.following_id','Left');
        $this->db->join('ssx_countries ssxc','ssxc.id=ssxu.country_id','Left');
        $res = $this->db->where("ssxf.follower_id",$user_id)->get()->result_array();
        return $res;
    }
    public function getVisitorfollowing($VisitorId='')
    {
        $res = $this->db->select('following_id')->from('ssx_followers')->where('follower_id',$VisitorId)->get()->result_array();
        return $res;
    }
    public function checkEmail($email='')
    {
        $res = $this->db->select('id')->from('ssx_subscribers')->where('subscriber_email',$email)->get()->num_rows();
        if ($res >= 1) {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }

    public function insertEmail($email='')
    {
        $data = array(
            'subscriber_email' => $email, );
        
        $res = $this->db->insert('ssx_subscribers',$data);

        if ($res === TRUE) {
            return TRUE;
        }
        else{
            return FALSE;
        }
    }
    public function getAllNotificatons($logged_in_user='',$limit='')
    {
         $this->db->select("*")->from('ssx_notifications')->where('target_reference_userId',$logged_in_user);
            if (!empty($limit)) {
                $this->db->limit($limit['offset'],$limit['start']);
            }
         return $this->db->get()->result_array();   
    }
    public function countAllNotificatons($logged_in_user='')
    {
        $ret =  $this->db->select("*")->from('ssx_notifications')->where('target_reference_userId',$logged_in_user)->get();

        return $ret->num_rows();
    }
    public function CountUnreadNotificatons($logged_in_user='')
    {
        $ret =  $this->db->select("*")->from('ssx_notifications')->where('target_reference_userId',$logged_in_user)->where("is_read",0)->get();

        return $ret->num_rows();
    }
     public function updateNotiStstus($logged_in_user='')
    {
        $this->db->set('is_read', 1);
        $this->db->where('target_reference_userId',$logged_in_user);
        $this->db->update('ssx_notifications');
    }
    public function getAllConversations($logged_in_user='')
    {
        return $this->db->select("*")->from('ssx_conversations')->where('sent_by_user',$logged_in_user)->or_where('recieved_by_user',$logged_in_user)->get()->result_array();
    }
    public function getAllUserAlerts($logged_in_user='')
    {
        $userAlertscat3  = $this->db->select('category3_id,type')->from('ssx_alerts')->where('user_id',$logged_in_user)->get()->result_array();

        if (isset($userAlertscat3) && !empty($userAlertscat3)) {
            $cat3id = [];
            foreach ($userAlertscat3 as $key => $value) {
                $cat3id[$key] = $value['category3_id'];
            }
            
            $this->db->select("ssxa.*,ssxc3.name as cat_name,ssxc3.slug as cat_slug")->from('ssx_auctions ssxa');
            $this->db->join("ssx_categories3 ssxc3","ssxa.category3_id = ssxc3.id","Left");
            $this->db->where_in('ssxa.category3_id',$cat3id);
            //return  $this->db->get()->result_array();
            $res = $this->db->get();
            if (!is_bool($res)) {
                return $res->result_array();
            }
            else{
                return FALSE;
            }
        }
        
        //return FALSE;
    }
    public function get_user_roles_m($logged_in_user='')
    {
        return $this->db->select("*")->from("ssx_user_roles")->where("user_id",$logged_in_user)->get()->result_array();
    }
}