<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 04-Jul-18
 * Time: 2:00 AM
 */
class Countries_m extends MY_Model
{

    public $orderCol ;
    public $orderVal ;

    /**
     * Countries_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('countries');
        $this->primary_key = 'id';
        $this->return_as = 'array';
        $this->orderCol = 'id';
        $this->orderVal = 'ASC';
        $this->soft_deletes = TRUE;
    }

    public function getAll($columns = NULL ,$where = NULL ,$whereParams = NULL){


        if (empty($where) && empty($whereParams) ) {
            /*echo "get all results";*/
            return $posts = $this->fields($columns)->as_array()->where()->order_by($this->orderCol, $this->orderVal)->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {
            /*where + AND*/
            return $posts = $this->fields($columns)->as_array()->where($where,NULL)->order_by($this->orderCol, $this->orderVal)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*where IN*/
            return $posts = $this->fields($columns)->as_array()->where($where, $whereParams)->order_by($this->orderCol, $this->orderVal)->get_all();
        }
    }
}