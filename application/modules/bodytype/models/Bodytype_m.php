<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 7:12 PM
 */

class BodyType_m extends MY_Model
{
    /**
     * BodyType_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('body_type');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;
    }
}

