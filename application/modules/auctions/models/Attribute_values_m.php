<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 14-Jul-18
 * Time: 2:02 AM
 */
class Attribute_values_m extends MY_Model
{

    /**
     * Attributes_values_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('attribute_values');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;
    }


    public function getByAttributeId($attrId){
        return $this->fields(['id','value','attribute_id'])->get_all(['attribute_id'=>$attrId]);
    }




}