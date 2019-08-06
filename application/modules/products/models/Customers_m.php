<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 03-Jan-18
 * Time: 4:12 PM
 */

class Customers_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('customers');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        /*$this->has_one['makes'] = array(
            'foreign_model' => 'Make_m',
            'foreign_table' => 'make',
            'foreign_key' => 'id',
            'local_key' => 'make_id'
        );*/
    }


    public function addCustomer()
    {
        $memberData['Email_controller']      = !empty($this->input->post('Email_controller')) ? $this->input->post('Email_controller') : NULL;
        $memberData['first_name'] = !empty($this->input->post('first_name')) ? $this->input->post('first_name') : NULL;
        $memberData['last_name']  = !empty($this->input->post('last_name')) ? $this->input->post('last_name') : NULL;
        $memberData['phone']      = !empty($this->input->post('phone')) ? $this->input->post('phone') : NULL;

        if ( ! in_array(NULL, $memberData) ) {
           // echo " all good";
            $memberData['created_at'] = date('Y-m-d H:i:s');
            if($this->insert($memberData) ){
                return $this->db->insert_id();
            }
        }
        return FALSE ;
    }

}