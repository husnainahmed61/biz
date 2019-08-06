<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 10:35 PM
 */

class Products_m extends MY_Model
{
    /**
     * Products_m constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('product');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;

        $this->has_one['makes'] = array(
            'foreign_model' => 'Make_m',
            'foreign_table' => 'make',
            'foreign_key' => 'id',
            'local_key' => 'make_id'
        );
    }

    public function getUniqueYear()
    {
        $this->db->select('DISTINCT(year)');
        $this->db->from($this->table);
        $this->db->order_by("year", "desc");
        $sqlStmt = $this->db->get();

        return $sqlStmt->result_array();
    }

    public function get_makes($where)
    {
        $this->db->select('DISTINCT(make) AS name ,make_id AS id');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("make", "asc");
        $sqlStmt = $this->db->get();
        return $sqlStmt->result_array();

        /*$this->db->select('*');
        $this->db->distinct('Category_Id');
        $this->db->from('business_mapping');
        $this->db->join('business_profile_details', 'business_profile_details.Business_Id = business_mapping.Business_Id');
        $this->db->join('category_master', 'category_master.Category_Id = business_mapping.Category_Id');
        $query = $this->db->get();
        return $query->result();*/
    }

    public function get_models($where)
    {
        $this->db->select('DISTINCT(model) AS name ,model_id as id');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("model", "asc");
        $sqlStmt = $this->db->get();

        // echo $this->db->last_query();
        return $sqlStmt->result_array();
    }

    public function get_submodels($where)
    {
        $this->db->select('DISTINCT(submodel) AS name ,submodel_id as id');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("submodel", "asc");
        $sqlStmt = $this->db->get();

        //echo $this->db->last_query();
        return $sqlStmt->result_array();
    }

    public function get_body_types($where)
    {
        $this->db->select('DISTINCT(body_type) AS name ,body_type_id as id');
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("body_type", "asc");
        $sqlStmt = $this->db->get();

        // echo $this->db->last_query();

        return $sqlStmt->result_array();
    }

    public function submodel_exists($where)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->where(['submodel_id !=' => NULL]);
        $this->db->group_by("submodel_id");
        $sqlStmt = $this->db->get();
        // echo $this->db->last_query(); die;
        $data = $sqlStmt->result_array();

        if (!empty($data)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function get_min_model($where)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("body_type_id", "ASC");
        $this->db->limit(1);
        $sqlStmt = $this->db->get();
        $data = $sqlStmt->result_array();

        //print_r($data); die;

        if (!empty($data)) {
            // echo "if";
            $bodyTypeId = $data[0]['body_type_id'];
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where($where);
            $this->db->where(['body_type_id' => $bodyTypeId]);
            $sqlStmt = $this->db->get();
            $bodyType = $sqlStmt->result_array();

            // print_r($bodyType); die;
            return $bodyType;
        }

        // print_r($data); die;


    }

    public function get_min_submodel($where)
    {
        //print_r($where);
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where($where);
        $this->db->order_by("submodel", "ASC");
        $this->db->limit(1);
        $sqlStmt = $this->db->get();
        $data = $sqlStmt->result_array();

        if (!empty($data)) {
            // echo "if";
            $submodelId = $data[0]['submodel_id'];
            $this->db->select("*");
            $this->db->from($this->table);
            $this->db->where($where);
            $this->db->where(['submodel_id' => $submodelId]);
            $sqlStmt = $this->db->get();
            $submodels = $sqlStmt->result_array();
            return $submodels;

            //print_r($submodels);   die;


        } else {
            //echo "Else";
            return FALSE;
        }
    }

    public function getProducts($draw, $sort, $search, $start, $limit)
    {
        $columns = [
            'make', 'model', 'submodel', 'body_type','id'
        ];

        //print_r($sort);
        $orderBy[] = $columns[$sort[0]['column']];
        $orderBy[] = $sort[0]['dir'];

        /*Counting rows before limiting */
        $this->db->select($columns);
        $this->db->from($this->table);

        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);
        $this->db->or_like($columns[4], $search['value']);

        $sqlSmt = $this->db->get();
        $count = $sqlSmt->result_array();
        $data['count'] = count($count);


        /*Getting Actual Data*/

        $this->db->select($columns);
        $this->db->from($this->table);

        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);
        $this->db->or_like($columns[4], $search['value']);

        $this->db->order_by($orderBy[0], $orderBy[1]);

        $this->db->limit($limit,$start);


        $sqlSmt = $this->db->get();

//        $lastQuery= $this->db->last_query();
//        print_r($lastQuery);

        $data['data'] = $sqlSmt->result_array();


        return $data;

        print_r($data);
        die;

    }

    public function getNumProducts()
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


}