<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/26/2018
 * Time: 1:40 AM
 */
class Company_m extends MY_Model
{

    public $rules;

    public $alertFields = [];
    public $tblAttrValues;

    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('alerts');
        $this->tblAttrValues = $this->db->dbprefix('attribute_values');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;



        $this->rules = [
            'insert' =>[
                [
                    'field' => 'category_3',
                    'label' => 'Category3',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'trim|required'
                ],
            ]
        ];

        $this->alertFields = [
            'type'   => "",
            'user_id'       => "",
            'category1_id'  => "",
            'category2_id'  => "",
            'category3_id'  => "",
            'title'          => "",
        ];
    }
    public function storeTax($userInfo='',$data='')
    {
        $data = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'name' => $data['name'],
            'tax_percentage' => $data['tax'],

        );
         return $this->db->insert('ssx_company_tax', $data);

    }
    public function get_all_taxes($company_id='')
    {
        return $this->db->select("*")->from("ssx_company_tax")->where("company_id",$company_id)->get()->result_array();
    }
    public function get_tax($tax_id='')
    {
        return $this->db->select("*")->from("ssx_company_tax")->where("id",$tax_id)->get()->result_array();
    }
    public function upadteTax($post='')
    {
        $data = array(
        'name' => $post['name'],
        'tax_percentage' => $post['tax']
        );

        $this->db->where('id', $post['id']);
        return $this->db->update('ssx_company_tax', $data);
    }
    public function deleteTax($id='')
    {
        $this->db->where('id', $id);
        return $this->db->delete('ssx_company_tax');
    }
    public function storeUser($userInfo='',$data='')
    {
        $checkUserr = $this->db->select("*")->from("ssx_user_details")->where("email",$data['email'])->get()->num_rows();
        if($checkUserr >= 1){
            return FALSE;
        }
        else{
            $pass = $this->randomPassword();
        $data1 = array(
            'user_of_company' => $userInfo['user_of_company'],
            'is_company' => 1,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'phone' => $data['number'],

        );
        $this->db->insert('ssx_users', $data1);

        $insert_id = $this->db->insert_id();

        $data2 = array(
            'user_id' => $insert_id,
            'email' => $data['Email'],
            'password_en' => $this->my_encrypt->encode($pass),
            'account_status' => 'verified',
        );
        $this->db->insert('ssx_user_details', $data2);
        $data3 = array(
            'user_id' => $insert_id,
            'company_id' => $userInfo['user_of_company'], 
        );
        $this->db->insert('ssx_user_roles', $data3);

        $company_name = $this->db->select("first_name,last_name")->from('ssx_users')->where('id',$userInfo['user_of_company'])->get()->result_array();
                // the message
                $msg = 'Dear '.$data['first_name'].' '.$data['last_name'].',
    
                    '.$company_name[0]['first_name'].' '.$company_name[0]['last_name'].' has added you as its offical User on Vayzn - Procurement Web Based Platform.
                    Please refer following credentials to login and start automating your purchasing process with Vayzn
                    
                    Email: '.$data['Email'].'
                    Password: '.$pass.'
                    Login Here : https://biz.vayzn.com/home/login
                    
                    Regards,
                    Vayzn - Help Desk';
                
                
                $headers = 'From: <no-reply@vayzn.com>' . "\r\n";
                $headers .= 'MIME-Version: 1.0';
                $headers .= 'Content-type: text/html; charset=iso-8859-1';
    
                // use wordwrap() if lines are longer than 70 characters
                //$msg = wordwrap($msg,70);
    
                // send email
                //return TRUE;
                if(@mail($data['Email'],"Invitation As Userr",$msg,$headers))
                    {
                      return TRUE;
                    }else{
                      return FAlSE;
                    }
        }
        
    }
    public function checkUser($data='')
    {
        return $this->db->select("*")->from("ssx_user_details")->where("email",$data['Email'])->get()->num_rows();
    }
    public function getAllUsers($userInfo='')
    {
        return $this->db->select("ssxur.*,ssxu.first_name")->from("ssx_user_roles ssxur")->join("ssx_users ssxu","ssxur.user_id = ssxu.id","Left")->where("ssxur.company_id",$userInfo['user_of_company'])->get()->result_array();
    }
    public function updateUserRole($user_id='',$roles='')
    {
        $data = array(
        'dashboard' => 0,
        'company_settings' => 0,
        'add_items' => 0,
        'add_supplier' => 0,
        'create_pr' => 0,
        'pr_approval' => 0,
        'rfq_approval' => 0,
        'po_approval' => 0,
        'reports' => 0,
        'notifications' => 0
        );

        $this->db->where('user_id', $user_id);
        $this->db->update('ssx_user_roles', $data);

        $roles_selected = explode(",", $roles);
        foreach ($roles_selected as $key => $value) {
            //echo $value;
            $data = array(
            $value => 1,
            );

            $this->db->where('user_id', $user_id);
            $res = $this->db->update('ssx_user_roles', $data);
        }
        return $res;      
    }
    public function getUserData($user_id='')
    {
        return $this->db->select("ssxu.*,ssxud.email")->from("ssx_users ssxu")->join("ssx_user_details ssxud","ssxu.id=ssxud.user_id","Left")->where("ssxu.id",$user_id)->get()->result_array();
    }
    public function updateUser($post='')
    {
        $data = array(
        'first_name' => $post['first_name'],
        'last_name' => $post['last_name'],
        'phone' => $post['number']
        );

        $this->db->where('id', $post['id']);
        return $this->db->update('ssx_users', $data);
    }
    public function storeWarehouse($userInfo='',$data='')
    {
        $data = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'name' => $data['name'],
            'address' => $data['address'],

        );
         return $this->db->insert('ssx_company_locations', $data);

    }
    public function get_all_warehouses($company_id='')
    {
        return $this->db->select("*")->from("ssx_company_locations")->where("company_id",$company_id)->get()->result_array();
    }
    public function get_warehouse($warehouse_id='')
    {
        return $this->db->select("*")->from("ssx_company_locations")->where("id",$warehouse_id)->get()->result_array();
    }
    public function upadteWarehouse($post='')
    {
        $data = array(
        'name' => $post['name'],
        'address' => $post['address']
        );

        $this->db->where('id', $post['id']);
        return $this->db->update('ssx_company_locations', $data);
    }
    public function storeInventory($userInfo='',$data='')
    {
        $where = ['id' => $data['category_3']];
        $category3 = $this->categories3->cat3Model->getAll('*',$where);
        $category1_id = $category3[0]['category1_id'];
        $category2_id = $category3[0]['category2_id'];
        $category3_id = $category3[0]['id'];

        $data = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'item_name' => $data['title'],
            'item_number' => $data['item_number'],
            'item_desc' => $data['description'],
            'qty_unit' => $data['quantity_unit'],
            'cat1_id' => $category1_id,
            'cat2_id' => $category2_id,
            'cat3_id' => $category3_id,

        );
         return $this->db->insert('ssx_company_items', $data);

    }
    public function get_all_inventory($company_id='')
    {
        return $this->db->select("ssxci.*,ssxc3.name as cat_name")->from("ssx_company_items ssxci")->join("ssx_categories3 ssxc3","ssxc3.id=ssxci.cat3_id","Left" )->where("ssxci.company_id",$company_id)->get()->result_array();
    }
    public function get_item($item_id='')
    {
        return $this->db->select("*")->from("ssx_company_items")->where("id",$item_id)->get()->result_array();
    }
    public function updateInventory($post='')
    {
            $where = ['id' => $post['category_3']];
            $category3 = $this->categories3->cat3Model->getAll('*',$where);
            $category1_id = $category3[0]['category1_id'];
            $category2_id = $category3[0]['category2_id'];
            $category3_id = $category3[0]['id'];

        $data = array(
            'item_name' => $post['title'],
            'item_number' => $post['item_number'],
            'item_desc' => $post['description'],
            'qty_unit' => $post['quantity_unit'],
            'cat1_id' => $category1_id,
            'cat2_id' => $category2_id,
            'cat3_id' => $category3_id,
        );

        $this->db->where('id', $post['id']);
        return $this->db->update('ssx_company_items', $data);
    }
    public function storeSupplier($userInfo='',$data='')
    {
        $checkSupplier = $this->db->select("*")->from("ssx_user_details")->where("email",$data['email'])->get()->result_array();
            $where = ['id' => $data['category_3']];

            $category3 = $this->categories3->cat3Model->getAll('*',$where);
            $category1_id = $category3[0]['category1_id'];
            $category2_id = $category3[0]['category2_id'];
            $category3_id = $category3[0]['id'];

        if (isset($checkSupplier[0]) && !empty($checkSupplier[0])) {
            $checkFollowingTable = $this->db->select("*")->from("ssx_followers")->where("follower_id",$checkSupplier[0]['user_id'])->where("following_id",$userInfo['user_of_company'])->get()->num_rows();
            if ($checkFollowingTable >= 1) {
                return FAlSE;
            }
            else
            {
                $data3 = array(
                    'follower_id' => $checkSupplier[0]['user_id'],
                    'following_id' => $userInfo['user_of_company'],
                    'cat1_id' => $category1_id,
                    'cat2_id' => $category2_id,
                    'cat3_id' => $category3_id,
                );
                $this->db->insert('ssx_followers', $data3);
                
                $company_name = $this->db->select("first_name,last_name")->from('ssx_users')->where('id',$userInfo['user_of_company'])->get()->result_array();
                // the message
                $msg = 'Dear '.$data['first_name'].' '.$data['last_name'].' - '.$data['company_name'].',
    
                    '.$company_name[0]['first_name'].' '.$company_name[0]['last_name'].' has added you as its offical supplier on Vayzn - Procurement Web Based Platform.
                    Please refer following credentials to login and resume selling your products via Vayzn
                    
                    Login Here : https://www.vayzn.com
                    
                    Regards,
                    Vayzn - Help Desk';
                
                
                $headers = 'From: <no-reply@vayzn.com>' . "\r\n";
                $headers .= 'MIME-Version: 1.0';
                $headers .= 'Content-type: text/html; charset=iso-8859-1';
    
                // use wordwrap() if lines are longer than 70 characters
                //$msg = wordwrap($msg,70);
    
                // send email
                //return TRUE;
                if(@mail($data['email'],"Invitation As Supplier",$msg,$headers))
                    {
                      return TRUE;
                    }else{
                      return FAlSE;
                    }
            }
                
        }
        else{
            
            $remove_space = $data['first_name'].'-'.$data['last_name'].'-'.rand(1,1000);
            $remove_space = str_replace(' ', '-', $remove_space);

            $pass = $this->randomPassword();

            $data1 = array(
                'supplier_of_company' => $userInfo['user_of_company'],
                'is_supplier' => 1,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'supplier_company' => $data['company_name'],
                'supplier_address' => $data['address'],
                'country_id' => $data['country_id'],
                'state_id' => $data['state_id'],
                'city_id' => $data['city_id'],
                'slug' => $remove_space,
                'type' => "business",

            );
            $this->db->insert('ssx_users', $data1);

            $insert_id = $this->db->insert_id();

            $data2 = array(
                'user_id' => $insert_id,
                'email' => $data['email'],
                'password_en' => $this->my_encrypt->encode($pass),
                'account_status' => 'verified',
            );
            $this->db->insert('ssx_user_details', $data2);

            $data3 = array(
                'follower_id' => $insert_id,
                'following_id' => $userInfo['user_of_company'],
                'cat1_id' => $category1_id,
                'cat2_id' => $category2_id,
                'cat3_id' => $category3_id,
            );
            $this->db->insert('ssx_followers', $data3);
            
            $company_name = $this->db->select("first_name,last_name")->from('ssx_users')->where('id',$userInfo['user_of_company'])->get()->result_array();
            // the message
            $msg = 'Dear '.$data['first_name'].' '.$data['last_name'].' - '.$data['company_name'].',

                '.$company_name[0]['first_name'].' '.$company_name[0]['last_name'].' has added you as its offical supplier on Vayzn - Procurement Web Based Platform.
                Please refer following credentials to login and resume selling your products via Vayzn
                
                Email: '.$data['email'].'
                Password:'.$pass.'
                Login Here : https://www.vayzn.com
                
                Regards,
                Vayzn - Help Desk';
            
            
            $headers = 'From: <no-reply@vayzn.com>' . "\r\n";
            $headers .= 'MIME-Version: 1.0';
            $headers .= 'Content-type: text/html; charset=iso-8859-1';

            // use wordwrap() if lines are longer than 70 characters
            //$msg = wordwrap($msg,70);

            // send email
            //return TRUE;
            if(@mail($data['email'],"Invitation As Supplier",$msg,$headers))
                {
                  return TRUE;
                }else{
                  return FAlSE;
                }
        }

        
    }
    public function updateSupplier($post='')
    {
            $where = ['id' => $post['category_3']];

            $category3 = $this->categories3->cat3Model->getAll('*',$where);
            $category1_id = $category3[0]['category1_id'];
            $category2_id = $category3[0]['category2_id'];
            $category3_id = $category3[0]['id'];

        $data = array(
            'first_name' => $post['first_name'],
            'last_name' => $post['last_name'],
            'phone' => $post['phone'],
            'supplier_cat1' => $category1_id,
            'supplier_cat2' => $category2_id,
            'supplier_cat3' => $category3_id,
            'supplier_company' => $post['company_name'],
            'supplier_address' => $post['address'],
            'country_id' => $post['country_id'],
            'state_id' => $post['state_id'],
            'city_id' => $post['city_id'],
        );

        $this->db->where('id', $post['id']);
        return $this->db->update('ssx_users', $data);
    }
    public function getAllSuppliers($company_id='')
    {
        return $this->db->select("ssxu.*,ssxud.email,ssxc3.name as cat3name")->from("ssx_users ssxu")->join("ssx_user_details ssxud","ssxu.id=ssxud.user_id","Left")->join("ssx_followers ssxf","ssxf.follower_id=ssxu.id AND ssxf.following_id=".$company_id,"Left")->join("ssx_categories3 ssxc3","ssxf.cat3_id=ssxc3.id","Left")->where("ssxu.supplier_of_company",$company_id)->get()->result_array();
    }
    public function get_supplier($supplier_id='')
    {
        return $this->db->select("ssxu.*,ssxud.email")->from("ssx_users ssxu")->join("ssx_user_details ssxud","ssxu.id=ssxud.user_id","Left")->where("ssxu.id",$supplier_id)->get()->result_array();
    }
    public function storePr($userInfo='',$data='')
    {
        $data = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'item_id' => $data['items_list'],
            'name' => $data['item_name'],
            'description' => $data['item_description'],
            'item_condition' => $data['item_condition'],
            'quantity_unit' => $data['quantity_unit'],
            'quantity' => $data['item_quantity'],

        );
        return $this->db->insert('ssx_company_pr', $data);
    }
    public function getAllPr($company_id='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$company_id)->where("ssxcp.status ",NULL)->or_where("ssxcp.status",0)->get()->result_array();
        
    }
    public function updatePrStatus($get='')
    {
        $data = array(
            'status' => 1,
            'item_condition' => $get['condition'],
            'quantity_unit' => $get['qty_unit'],
            'quantity' => $get['qty'],
        );

        $this->db->where('id', $get['pr_id']);
        return $this->db->update('ssx_company_pr', $data);
    }
    public function updatePrStatusdisApprovePr($get='')
    {
        $data = array(
            'status' => 0,
        );

        $this->db->where('id', $get['pr_id']);
        return $this->db->update('ssx_company_pr', $data);
    }
    public function getAllRfq($company_id='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$company_id)->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved",0)->get()->result_array();
    }
    public function get_rfq_suppliers($company_id='',$item_id='')
    {
        return $this->db->select("ssxci.*,ssxu.first_name,,ssxu.id as supplier_id")->from("ssx_company_items ssxci")->join("ssx_followers ssxf","ssxci.cat3_id = ssxf.cat3_id","Left")->join("ssx_users ssxu","ssxu.id = ssxf.follower_id","Left")->where("ssxci.id",$item_id)->get()->result_array();
    }
    public function approved_rfq($company_id='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number,ssxc3.name as cat3name,ssxa.bid_count,ssxa.favourite_count,ssxc.name as currency_name,ssxcr.rfq_id,(SELECT MIN(ssx_bids.amount) FROM ssx_bids WHERE ssx_bids.auction_id = ssxa.id) AS lowest_bid")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->join("ssx_categories3 ssxc3","ssxc3.id= ssxci.cat3_id","Left")->join("ssx_company_rfqs ssxcr","ssxcr.pr_id = ssxcp.id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxa.currency","Left")->where("ssxcp.company_id",$company_id)->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved",1)->get()->result_array();
    }
    public function storeSuggestedSuppliers($userInfo='',$data='')
    {
        foreach ($data['supplier_id'] as $key => $value) {
           $data2 = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['user_of_company'],
            'pr_id' => $data['pr_id'],
            'supplier_id' => $value, 
            );
            $res = $this->db->insert('ssx_rfq_suppliers', $data2);
        }
        return $res;
    }
    public function updateSuggestedSuppliers($userInfo='',$data='')
    {
        $this->db->where("pr_id",$data['pr_id'])->delete("ssx_rfq_suppliers");
        foreach ($data['supplier_id'] as $key => $value) {
           $data2 = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['user_of_company'],
            'pr_id' => $data['pr_id'],
            'supplier_id' => $value, 
            );
            $res = $this->db->insert('ssx_rfq_suppliers', $data2);
        }
        return $res;
    }
    public function storeItemSpec($userInfo='',$data='')
    {
        $dataArray = [];
       
        $i=0;
        foreach ($data['criteria'] as $key => $value) {
            if (isset($value) && !empty($value)) {
                 $data2 = array(
                'company_id' => $userInfo['user_of_company'],
                'user_id' => $userInfo['user_of_company'],
                'pr_id' => $data['pr_id'],
                'criteria' => $value, 
                'measurement' => $data['measurement'][$key], 
                );
                array_push($dataArray, $data2);                
            }
            $i++; 
        }
        return $this->db->insert_batch('ssx_rfq_specfications', $dataArray);
         //print_r($dataArray);
        // $res;
    }
    public function updateItemSpec($userInfo='',$data='')
    {
        $this->db->where("pr_id",$data['pr_id'])->delete("ssx_rfq_specfications");
        $dataArray = [];
       
        $i=0;
        foreach ($data['criteria'] as $key => $value) {
            if (isset($value) && !empty($value)) {
                 $data2 = array(
                'company_id' => $userInfo['user_of_company'],
                'user_id' => $userInfo['user_of_company'],
                'pr_id' => $data['pr_id'],
                'criteria' => $value, 
                'measurement' => $data['measurement'][$key], 
                );
                array_push($dataArray, $data2);                
            }
            $i++; 
        }
        return $this->db->insert_batch('ssx_rfq_specfications', $dataArray);
         //print_r($dataArray);
        // $res;
    }
    public function storerfqEmail($userInfo='',$data='')
    {
        $data2 = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'pr_id' => $data['pr_id'],
            'email_body' => $data['email_body'],
        );
        return $this->db->insert('ssx_rfq_email', $data2);
    }
    public function updaterfqEmail($userInfo='',$data='')
    {
        $this->db->where("pr_id",$data['pr_id'])->delete("ssx_rfq_email");
        $data2 = array(
            'company_id' => $userInfo['user_of_company'],
            'user_id' => $userInfo['id'],
            'pr_id' => $data['pr_id'],
            'email_body' => $data['email_body'],
        );
        return $this->db->insert('ssx_rfq_email', $data2);
    }
    public function getPrDetails($pr_id='')
    {
        return $this->db->select("ssxcp.*,ssxci.cat1_id,ssxci.cat2_id,ssxci.cat3_id")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxci.id=ssxcp.item_id","Left")->where("ssxcp.id",$pr_id)->get()->result_array();
    }
    public function all_pos($company_id='')
    {
        return $this->db->select("ssxb.*,ssxa.name as item_name,ssxu.first_name,ssxa.qty_unit,ssxa.qty,ssxu.last_name,ssxu.id as supplier_id,ssxc.name as cur,ssxap.status as rfq_status")->from("ssx_bids ssxb")->join("ssx_company_rfqs ssxcr","ssxcr.rfq_id = ssxb.auction_id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxb.currency","Left")->join("ssx_approved_po ssxap","ssxap.rfq_id = ssxb.auction_id","Left")->where("ssxb.status","accepted")->where("ssxcr.company_id",$company_id)->get()->result_array();
    }
    public function approvePO($data='',$user='')
    {
        $array = array(
            'company_id' => $user['user_of_company'],
            'user_id' => $user['id'],
            'supplier_id' => $data['supplier_id'],
            'status' => 1,
            'rfq_id' => $data['rfq_id'],
            'warehouse' => $data['warehouse_id'],
            'delivery_date' => $data['date'],
            'shipment_details' => $data['shipment'], 
        );
        return $this->db->insert("ssx_approved_po",$array);
    }
    public function disapprovePO($data='',$user='')
    {
        $array = array(
            'company_id' => $user['user_of_company'],
            'user_id' => $user['id'],
            'supplier_id' => $data['supplier_id'],
            'status' => 0,
            'rfq_id' => $data['rfq_id'],
            'warehouse' => $data['warehouse_id'],
            'delivery_date' => $data['date'],
            'shipment_details' => $data['shipment'], 
        );
        return $this->db->insert("ssx_approved_po",$array);
    }
    public function get_pending_pr($user='',$data='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",NULL)->where("ssxcp.created_at >=",$data['date_from'])->where("ssxcp.created_at <=",$data['date_to'])->get()->result_array();
    }
    public function get_approved_pr($user='',$data='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved ",0)->where("ssxcp.created_at >=",$data['date_from'])->where("ssxcp.created_at <=",$data['date_to'])->get()->result_array();
    }
    public function get_active_rfq($user='',$data='')
    {
        return $this->db->select("ssxcp.*,ssxci.item_name,ssxci.item_number,ssxc3.name as cat3name,ssxa.bid_count,ssxa.favourite_count,ssxa.expires_at,ssxc.name as currency_name,ssxcr.rfq_id,(SELECT MIN(ssx_bids.amount) FROM ssx_bids WHERE ssx_bids.auction_id = ssxa.id) AS lowest_bid")->from("ssx_company_pr ssxcp")->join("ssx_company_items ssxci","ssxcp.item_id = ssxci.id","Left")->join("ssx_categories3 ssxc3","ssxc3.id= ssxci.cat3_id","Left")->join("ssx_company_rfqs ssxcr","ssxcr.pr_id = ssxcp.id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxa.currency","Left")->where("ssxcp.company_id",$user['user_of_company'])->where("ssxcp.status ",1)->where("ssxcp.is_rfq_approved",1)->where("ssxa.created_at >=",$data['date_from'])->where("ssxa.created_at <=",$data['date_to'])->get()->result_array();
    }
    public function get_pending_po($user='',$data='')
    {
        return $this->db->select("ssxb.*,ssxa.name as item_name,ssxu.first_name,ssxa.qty_unit,ssxa.qty,ssxu.last_name,ssxu.id as supplier_id,ssxc.name as cur,ssxap.status as rfq_status")->from("ssx_bids ssxb")->join("ssx_company_rfqs ssxcr","ssxcr.rfq_id = ssxb.auction_id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxb.currency","Left")->join("ssx_approved_po ssxap","ssxap.rfq_id = ssxb.auction_id","Left")->where("ssxb.status","accepted")->where("ssxcr.company_id",$user['user_of_company'])->where("ssxb.updated_at >=",$data['date_from'])->where("ssxb.updated_at <=",$data['date_to'])->get()->result_array();
    }
    public function get_approved_po($user='',$data='')
    {
        return $this->db->select("ssxb.*,ssxa.name as item_name,ssxu.first_name,ssxa.qty_unit,ssxa.qty,ssxu.last_name,ssxu.id as supplier_id,ssxc.name as cur,ssxap.status as rfq_status,ssxcl.name as warehouse,ssxap.delivery_date,ssxap.shipment_details")->from("ssx_bids ssxb")->join("ssx_company_rfqs ssxcr","ssxcr.rfq_id = ssxb.auction_id","Left")->join("ssx_auctions ssxa","ssxa.id = ssxcr.rfq_id","Left")->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left")->join("ssx_currencies ssxc","ssxc.id = ssxb.currency","Left")->join("ssx_approved_po ssxap","ssxap.rfq_id = ssxb.auction_id","Left")->join("ssx_company_locations ssxcl","ssxcl.id = ssxap.warehouse","Left")->where("ssxb.status","accepted")->where("ssxcr.company_id",$user['user_of_company'])->where("ssxb.updated_at >=",$data['date_from'])->where("ssxb.updated_at <=",$data['date_to'])->where("ssxap.status",1)->get()->result_array();
    }
    public function getcompanysettings($company_id='')
    {
        return $this->db->select("ssxu.*,ssxc.name as currency")->from("ssx_users ssxu")->join("ssx_currencies ssxc","ssxu.currency_id = ssxc.id","Left")->where("ssxu.user_of_company",$company_id)->where("is_admin",1)->get()->result_array();
    }
    public function randomPassword()
    {
        $alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
        $pass = array(); //remember to declare $pass as an array
        $alphaLength = strlen($alphabet) - 1; //put the length -1 in cache
        for ($i = 0; $i < 8; $i++) {
            $n = rand(0, $alphaLength);
            $pass[] = $alphabet[$n];
        }
        return implode($pass); //turn the array into a string
    }
    public function getAllItems($company_id='')
    {
        return $this->db->select("*")->from("ssx_company_items")->where("company_id",$company_id)->get()->result_array();    
    }

}