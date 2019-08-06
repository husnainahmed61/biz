<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 3:02 PM
 */

class Model_m extends MY_Model
{
    /**
     * Model_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('model');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        /*$this->has_one['make'] = array(
            'foreign_model' => 'make_m',
            'foreign_table' => 'MakeU',
            'foreign_key' => 'make_id',
            'local_key' => 'id'
        );*/
    }
}