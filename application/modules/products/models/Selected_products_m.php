<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 03-Jan-18
 * Time: 4:10 PM
 */

class Selected_products_m extends MY_Model
{
    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('selected_products');
        $this->primary_key = 'id';

        $this->soft_deletes = TRUE;
        /*$this->has_one['makes'] = array(
            'foreign_model' => 'Make_m',
            'foreign_table' => 'make',
            'foreign_key' => 'id',
            'local_key' => 'make_id'
        );*/
    }

    public function addSelectedProducts($customerId, $orderId)
    {
        $product_id = !empty($this->input->post('product_id')) ? $this->input->post('product_id') : NULL;
        $data['created_at'] = date('Y-m-d H:i:s');

        if ($customerId !== NULL && $orderId !== NULL) {

            foreach ($product_id AS $item) {
                // print_r($item);
                $data['product_id'] = $item;
                $data['customer_id'] = $customerId;
                $data['order_id'] = $orderId;

                $this->insert($data);
            }
            return TRUE;
        }
    }


    public function getSelectedProducts($draw, $sort, $search, $start, $limit, $customFilters)
    {

        $columns = [
            $this->table . '.id',
            $this->table . '.order_id',
            $this->table . '.created_at',
            'product.part_number',
            'product.year',
            'product.make',
            'product.model',
            'product.submodel',
            'product.body_type',
            'customers.first_name',
            'customers.last_name',
            'customers.email',
            'customers.phone',
        ];

        $orderBy[] = $columns[$sort[0]['column']];
        $orderBy[] = $sort[0]['dir'];

        $selectedOn = !empty($customFilters['selected_on']) ? $customFilters['selected_on'] : "";

        $from = $selectedOn['from'];
        $to = $selectedOn['to'];


        /*print_r($selectedOn);
        die;*/


        /*Counting rows before limiting */
        $this->db->select($columns);
        $this->db->from($this->table);
        $this->db->join('product', 'product.id = ' . $this->table . '.product_id', 'inner');
        $this->db->join('customers', 'customers.id = ' . $this->table . '.customer_id', 'inner');

        /*Where Clause*/
        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);

        $this->db->or_like($columns[4], $search['value']);
        $this->db->or_like($columns[5], $search['value']);
        $this->db->or_like($columns[6], $search['value']);
        $this->db->or_like($columns[7], $search['value']);
        $this->db->or_like($columns[8], $search['value']);
        $this->db->or_like($columns[9], $search['value']);
        $this->db->or_like($columns[10], $search['value']);
        $this->db->or_like($columns[11], $search['value']);

        if (!empty($from) && !empty($to)) {
            $this->db->where("DATE_FORMAT(" . $this->table . ".created_at, '%Y-%m-%d')
                            BETWEEN DATE_FORMAT(STR_TO_DATE('$from','%m/%d/%Y'), '%Y-%m-%d')        
                            AND DATE_FORMAT(STR_TO_DATE('$to','%m/%d/%Y'), '%Y-%m-%d')");
        }

        if (!empty($customFilters['model'])) {
            $this->db->like($columns[6], $customFilters['model']);
        }

        if (!empty($customFilters['submodel'])) {
            $this->db->like($columns[6], $customFilters['submodel']);

        }


        $sqlSmt = $this->db->get();
        $count = $sqlSmt->result_array();
        $data['count'] = count($count);


        /*Getting Actual Data*/
        $this->db->select($columns);
        $this->db->from($this->table);
        $this->db->join('product', 'product.id = ' . $this->table . '.product_id', 'inner');
        $this->db->join('customers', 'customers.id = ' . $this->table . '.customer_id', 'inner');

        /*Where Clause*/
        $this->db->or_group_start();
        $this->db->or_like($columns[0], $search['value']);
        $this->db->or_like($columns[1], $search['value']);
        $this->db->or_like($columns[2], $search['value']);
        $this->db->or_like($columns[3], $search['value']);
        $this->db->or_like($columns[4], $search['value']);
        $this->db->or_like($columns[5], $search['value']);
        $this->db->or_like($columns[6], $search['value']);
        $this->db->or_like($columns[7], $search['value']);
        $this->db->or_like($columns[8], $search['value']);
        $this->db->or_like($columns[9], $search['value']);
        $this->db->or_like($columns[10], $search['value']);
        $this->db->or_like($columns[11], $search['value']);
        $this->db->group_end();

        if (!empty($from) && !empty($to)) {
            $this->db->where("DATE_FORMAT(" . $this->table . ".created_at, '%Y-%m-%d')
                            BETWEEN DATE_FORMAT(STR_TO_DATE('$from','%m/%d/%Y'), '%Y-%m-%d')        
                            AND DATE_FORMAT(STR_TO_DATE('$to','%m/%d/%Y'), '%Y-%m-%d')");
        }

        if (!empty($customFilters['model'])) {
            $this->db->like($columns[6], $customFilters['model']);
        }

        if (!empty($customFilters['submodel'])) {
            $this->db->like($columns[7], $customFilters['submodel']);

        }


        //$this->db->where($this->table . '.created_at <', $selectedOn['to']);

        $this->db->order_by($orderBy[0], $orderBy[1]);

        $this->db->limit($limit, $start);

        $sqlSmt = $this->db->get();

        /*echo $this->db->last_query();
        die;*/
        $data['data'] = $sqlSmt->result_array();
        return $data;
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