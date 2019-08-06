<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/30/2018
 * Time: 10:41 PM
 */
class Images_m extends MY_Model
{

    private $response;

    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('auction_details');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;


    }

    public function setupDatatable($draw, $sort, $search, $start, $limit)
    {
        $columns = [
            'id',
            'name',
            'slug',
            'created_at',
        ];


        $datatable = [];
        $datatable['recordsTotal'] = $this->countData();
        $datatable['data'] = $this->getData($columns, $draw, $sort, $search, $start, $limit);
        $datatable['recordsFiltered'] = $this->countFilterData($columns, $draw, $sort, $search, $start, $limit);

        return $datatable ;

    }

    private function getData($columns, $draw, $sort, $search, $start, $limit)
    {

        //print_r($sort);
        $orderBy[] = $columns[$sort[0]['column']];
        $orderBy[] = $sort[0]['dir'];


        /*Getting Actual Data*/

        $this->db->select($columns);
        $this->db->from($this->table);

        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);

        $this->db->order_by($orderBy[0], $orderBy[1]);

        $this->db->limit($limit, $start);


        $sqlSmt = $this->db->get();

//        $lastQuery= $this->db->last_query();
//        print_r($lastQuery);

        return $sqlSmt->result_array();

        print_r($data);
        die;

    }

    private function countFilterData($columns, $draw, $sort, $search, $start, $limit)
    {
        /*Counting rows before limiting */
        $this->db->select($columns);
        $this->db->from($this->table);

        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);


        $sqlSmt = $this->db->get();

//        $lastQuery= $this->db->last_query();
//        print_r($lastQuery);
        $count = $sqlSmt->result_array();
        return count($count);

    }

    public function countData()
    {
        $this->db->select("COUNT(id) as num");
        $this->db->from($this->table);

        $sqlSmt = $this->db->get();

        // echo $this->db->last_query(); die;

        $data = $sqlSmt->result_array();

        return $data[0]['num'];

        print_r($data[0]['num']);
        die;
    }

    public function getAll($columns = NULL , $where = NULL ,$whereParams = NULL ){

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
}