<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 03-Jan-18
 * Time: 4:10 PM
 */

class Orders_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('orders');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        /*$this->has_one['makes'] = array(
            'foreign_model' => 'Make_m',
            'foreign_table' => 'make',
            'foreign_key' => 'id',
            'local_key' => 'make_id'
        );*/
    }


    public function addOrder($customerId){

        $data['customer_id'] = !empty($customerId) ? $customerId : NULL ;
        $data['created_at'] =  date('Y-m-d H:i:s');
        if ( ! in_array(NULL, $data) ) {
            if($this->insert($data) )
            {
                return $this->db->insert_id();
            }
        }
        return FALSE;
    }

}