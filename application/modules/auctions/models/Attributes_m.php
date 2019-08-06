<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 14-Jul-18
 * Time: 1:38 AM
 */
class Attributes_m extends MY_Model
{
    public $attributeFields;
    /**
     * Attributes_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('attributes');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        $this->has_many['attr_values'] = array(
            'foreign_model' => 'Attribute_values_m',
            'foreign_table' => $this->db->dbprefix('attribute_values'),
            'foreign_key' => 'attribute_id',
            'local_key' => 'id'
        );
    }

    public function getAll($columns = NULL , $where = NULL ,$whereParams = NULL ){

        /*echo "GETALL";*/
        if (empty($where) && empty($whereParams) ) {
            /*get all results*/
            return $posts = $this->fields($columns)->as_array()->where()->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {
            /*where + AND*/
            return $posts = $this->fields($columns)->as_array()->where($where,NULL)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*where IN*/
            return $posts = $this->fields($columns)->as_array()->where($where, $whereParams)->get_all();
        }
    }

    public function getByCategories($cat1,$cat2,$cat3){

        $this->attributeFields['category1_id'] = $cat1;
        $this->attributeFields['category2_id'] = $cat2;
        $this->attributeFields['category3_id'] = $cat3;

        $this->db->select('id,name,description,type');
        $this->db->from("$this->table as a");
        $this->db->where($this->attributeFields);

        return  $this->db->get()->result_array();
        //printDataDie($this->db->last_query());
    }

    public function getByCategory3($cat3){

        $this->attributeFields['category3_id'] = $cat3;

        $this->db->select('id,name,description,type');
        $this->db->from("$this->table as a");
        $this->db->where($this->attributeFields);

        return  $this->db->get()->result_array();
        //printDataDie($this->db->last_query());
    }

}