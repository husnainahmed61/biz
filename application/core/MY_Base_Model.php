<?php

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 18-Jul-17
 * Time: 8:06 PM
 */
class MY_Base_Model extends CI_Model
{
    protected $tableName = '';
    protected $primaryKey = 'id';
    protected $primaryFilter = 'intval';
    protected $orderBy = '';
    protected $rules = array();
    protected $timestamps = FALSE;


    /**
     * MY_Base_Model constructor.
     */

    public function __construct()
    {
        parent::__construct();
    }

    public function get($id = NULL, $single = FALSE)
    {

        if ($id != NULL) {
            $filter = $this->primaryFilter;
            $id = $filter($id);

            $this->db->where($this->primaryKey, $id);
            $method = 'row';
        } else if ($single == TRUE) {
            $method = 'row';
        } else {
            $method = 'result';
        }
        return $this->db->get($this->tableName)->$method();
    }

    public function getBy($where, $single = FALSE)
    {
        $this->db->where($where);
        return $this->get(NULL, $single);
    }

    public function save($data,$id = NULL)
    {
        /*Insert*/
        if($this->timestamps == TRUE){
            $now = date('Y-m-d H:i:s');
            $id || $data['date_created'] = $now;
            $data['date_modified'] = $now ;
        }

        if($id === NULL){
            !isset($data[$this->primaryKey]) || $data[$this->primaryKey] = NULL;
            $this->db->set($data);
            $this->db->insert($this->tableName);
            $id = $this->db->insert_id();
        }
        else {
            $filter = $this->primaryFilter;
            $id = $filter($id);
            $this->db->set($data);
            $this->db->where($this->primaryKey,$id);
            $this->db->update($this->tableName);
        }
        return $id;
        /*Update*/
    }

    public function delete($id)
    {
        $filter = $this->primaryFilter;
        $id = $filter($id);

        if(!$id) {return FALSE;}
        $this->db->where($this->primaryKey,$id);
        $this->db->limit(1);
        $this->db->delete($this->tableName);

        $this->output->enable_profiler(TRUE);
    }
}