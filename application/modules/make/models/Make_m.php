<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 2:48 PM
 */

class Make_m extends MY_Model
{


    /**
     * Make_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('make');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        /*$this->has_many['models'] = array(
            'foreign_model' => 'orders_m',
            'foreign_table' => 'model',
            'foreign_key' => 'make_id',
            'local_key' => 'id'
        );*/
    }
}