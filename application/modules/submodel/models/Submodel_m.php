<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 5:30 PM
 */

class Submodel_m extends MY_Model
{

    /**
     * Submodel_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('submodel');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        /*$this->has_one['models'] = array(
            'foreign_model' => 'model_m',
            'foreign_table' => 'ModelU',
            'foreign_key' => 'model_id',
            'local_key' => 'id'
        );*/
    }
}