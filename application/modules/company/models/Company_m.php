<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/26/2018
 * Time: 1:40 AM
 */
class Company_m extends MY_Model
{

    public $rules;

    public $alertFields = [];
    public $tblAttrValues;

    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('alerts');
        $this->tblAttrValues = $this->db->dbprefix('attribute_values');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;



        $this->rules = [
            'insert' =>[
                [
                    'field' => 'category_3',
                    'label' => 'Category3',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'title',
                    'label' => 'Title',
                    'rules' => 'trim|required'
                ],
            ]
        ];

        $this->alertFields = [
            'type'   => "",
            'user_id'       => "",
            'category1_id'  => "",
            'category2_id'  => "",
            'category3_id'  => "",
            'title'          => "",
        ];
    }

    public function getById($id){
        return $this->db->get_where($this->table,['id' => $id])->result_array();
    }

    public function getBy($where){
        return  $this->db->get_where($this->table,$where)->result_array();
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

        return FALSE;
    }

    public function addAlertWithAttributes($param){
        $alert = $param['alert'];
        $alertAttributes = $param['alertAttributes'];

        $this->db->trans_start();
        $this->db->insert($this->table, $alert);
        $alertId = $this->db->insert_id();
        if(!empty($alertAttributes)){
            foreach ($alertAttributes as $key => $auctionAttributeField) {
                $alertAttributes[$key]['alert_id'] = $alertId;
            }
            $this->db->insert_batch($this->db->dbprefix('alert_attributes'),$alertAttributes);
            // echo "<br><br>" . $this->db->last_query() . "<br><br>";
        }
        $this->db->trans_complete();
        $data = $this->get(["id"=> $alertId]);

        // print_r($data); exit();

        return $data;
    }

    public function getAlerts($type, $userId, $sort, $limit){

        $this->db->select("a.*,c3.name as cat_name,c3.slug as cat_slug");
        $this->db->from("ssx_alerts a");
        $this->db->join("ssx_categories3 c3", "c3.id= a.category3_id", "left");
        $this->db->where("a.type", $type);
        $this->db->where("a.user_id", $userId);

        if (!empty($sort)) {
            $this->db->order_by($sort['colName'], $sort['direction']);
        } else {
            $this->db->order_by('a.name', 'ASC');
        }

        if (!empty($limit)) {
            $this->db->limit($limit['offset'],$limit['start']);
        }
        $res = $this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
    }

    public function countAlerts($type, $userId){
        $this->db->select("COUNT(a.id) AS count");
        $this->db->from("ssx_alerts a");
//        $this->db->join("ssx_categories3 c3", "c3.id= a.category3_id", "left");
        $this->db->where("a.type", $type);
        $this->db->where("a.user_id", $userId);



        $res = $this->db->get();
        //echo $this->db->last_query();
        return $res->result_array();
    }


    public function updateAlert($update){
        return $this->update($update,'id');
    }
    public function getAuctionAlerts($sort,$currency,$postType,$limit,$logged_in_user)
    {
        $userAlertscat3  = $this->db->select('category3_id,type')->from('ssx_alerts')->where('user_id',$logged_in_user)->get()->result_array();

        $cat3id = [];
        foreach ($userAlertscat3 as $key => $value) {
            $cat3id[$key] = $value['category3_id'];
        }


        $this->db->select("ssxa.*,ssxu.profile_picture,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxc.name as cat3name,ssxc.slug as cat3slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_categories3 ssxc","ssxc.id = ssxa.category3_id","Left");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->where("ssxa.ad_viewer","public");
        $this->db->where_in('ssxa.category3_id',$cat3id);
        if (!empty($currency) && isset($currency)) {
            $this->db->where_in("ssxa.currency", $currency);
        }
        if (!empty($postType) && isset($postType) && $postType!='null') {
            $this->db->where("ssxa.type", $postType);
        }
        if (!empty($sort)) {
            $this->db->order_by($sort['colName'], $sort['direction']);
        } else {
            $this->db->order_by('ssxa.name', 'ASC');
        }
        if (!empty($limit)) {
            $this->db->limit($limit['offset'], $limit['start']);
        }
        

//        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function getAuctionAlertsCount($currency,$postType,$limit,$logged_in_user)
    {
        $userAlertscat3  = $this->db->select('category3_id,type')->from('ssx_alerts')->where('user_id',$logged_in_user)->get()->result_array();

        $cat3id = [];
        foreach ($userAlertscat3 as $key => $value) {
            $cat3id[$key] = $value['category3_id'];
        }

        $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
        $this->db->from("ssx_auctions ssxa");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->where_in('ssxa.category3_id',$cat3id);
        if (!empty($currency) && isset($currency)) {
            $this->db->where_in("ssxa.currency", $currency);
        }
        if (!empty($postType) && isset($postType) && $postType != 'null') {
            $this->db->where("ssxa.type", $postType);
        }
        

//        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }
    public function get_suppliers($value='')
    {
        $res = $this->db->select("*")->from("ssx_dummy_supplier")->get()->result_array();
        return $res;
    }
     public function get_items($value='')
    {
        $res = $this->db->select("*")->from("ssx_dummy_items")->get()->result_array();
        return $res;
    }

}