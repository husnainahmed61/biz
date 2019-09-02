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

        // the message
        $msg = "Hello,\n you are Invited As User email = ".$data['Email']." password = ".$pass;

        // use wordwrap() if lines are longer than 70 characters
        $msg = wordwrap($msg,70);

        // send email
        
        if(@mail($data['Email'],"Added As User",$msg))
            {
              return TRUE;
            }else{
              return FAlSE;
            }
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
                );
                $this->db->insert('ssx_followers', $data3);
                

                // the message
                $msg = "Hello,\n you are Invited As Supplier from a company";

                // use wordwrap() if lines are longer than 70 characters
                $msg = wordwrap($msg,70);

                // send email
                return TRUE;
                if(@mail($data['Email'],"Added As User",$msg))
                    {
                      return TRUE;
                    }else{
                      return FAlSE;
                    }
            }
                
        }
        else{
            $where = ['id' => $data['category_3']];

            $category3 = $this->categories3->cat3Model->getAll('*',$where);
            $category1_id = $category3[0]['category1_id'];
            $category2_id = $category3[0]['category2_id'];
            $category3_id = $category3[0]['id'];

            $pass = $this->randomPassword();

            $data1 = array(
                'supplier_of_company' => $userInfo['user_of_company'],
                'is_supplier' => 1,
                'first_name' => $data['first_name'],
                'last_name' => $data['last_name'],
                'phone' => $data['phone'],
                'supplier_cat1' => $category1_id,
                'supplier_cat2' => $category2_id,
                'supplier_cat3' => $category3_id,
                'supplier_company' => $data['company_name'],
                'supplier_address' => $data['address'],
                'country_id' => $data['country_id'],
                'state_id' => $data['state_id'],
                'city_id' => $data['city_id'],

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
            );
            $this->db->insert('ssx_followers', $data3);
            

            // the message
            $msg = "Hello,\n you are Invited As Supplier To Bid\n email = ".$data['email']." password = ".$pass;

            // use wordwrap() if lines are longer than 70 characters
            $msg = wordwrap($msg,70);

            // send email
            return TRUE;
            if(@mail($data['Email'],"Added As User",$msg))
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
        return $this->db->select("ssxu.*,ssxud.email,ssxc3.name as cat3name")->from("ssx_users ssxu")->join("ssx_user_details ssxud","ssxu.id=ssxud.user_id","Left")->join("ssx_categories3 ssxc3","ssxu.supplier_cat3=ssxc3.id","Left")->where("ssxu.supplier_of_company",$company_id)->get()->result_array();
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