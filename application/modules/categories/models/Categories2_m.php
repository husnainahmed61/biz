<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 28-Jan-18
 * Time: 6:51 PM
 */
class Categories2_m extends MY_Model
{

    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('categories2');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        /*$this->has_many['makes'] = array(
            'foreign_model' => 'Sub1categories_m',
            'foreign_table' => 'sub1_categories',
            'foreign_key' => 'category_id',
            'local_key' => 'id'
        );*/
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

        return $datatable;

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

    public function getAuctionsByAttributes($currency ='', $ids = '', $values = '', $sort = NULL, $limit = NULL, $postType = '',$category2ID='',$start_price_range='',$end_price_range='')
    {
        $date_expire = date('Y-m-d H:i:s');
        if (/*$sort == 1 && $ids!='' && $values!='' */ TRUE) {
            if (!empty($category2ID)) {
                $this->db->select("ssxa.*,ssxc.name as cat_name,ssxc.slug as cat_slug,ssxu.first_name,ssxu.last_name,ssxu.profile_picture,ssxu.slug as user_slug");
                $this->db->from("ssx_auctions ssxa");
                $this->db->join("ssx_categories3 ssxc", "ssxa.category3_id=ssxc.id", "left");
                $this->db->join("ssx_users ssxu", "ssxu.id=ssxa.user_id", "left");
                
            }
            else{
                $this->db->select("ssxa.*");
                $this->db->from("ssx_auctions ssxa");                
            }

            
            if (!empty($ids) || !empty($values)) {
                $this->db->join("ssx_auction_attributes ssxaa", "ssxa.id=ssxaa.auction_id", "left");    
            }
            
            if (!empty($ids)) {
                $this->db->where_in("ssxaa.attribute_value_id", $ids);
            }

            if (!empty($values)) {
                $this->db->or_where_in("ssxaa.value", $values);
            }
            if (!empty($currency) && isset($currency)) {
                $this->db->where_in("ssxa.currency", $currency);
            }
            if ((isset($start_price_range)) && (isset($end_price_range) && !empty($end_price_range))) {
                $this->db->where('ssxa.amount >=', $start_price_range);
                $this->db->where('ssxa.amount <=', $end_price_range);
            }

            /*if ($postType == 'buy') {
                $this->db->where("ssxa.type", "sell");
            }
            else if ($postType == 'sell') {
                $this->db->where("ssxa.type", "buy");
            }*/
            $this->db->where("ssxa.ad_viewer","public");
            $this->db->where("ssxa.expires_at >=",$date_expire);
            $this->db->where("ssxa.type", $postType);
            $this->db->where("ssxa.category2_id",$category2ID );
            $this->db->where("ssxa.status",1);
            
            if (!empty($ids) || !empty($values)) {
                $this->db->group_by("ssxaa.auction_id");    
            }
            

            if (!empty($sort)) {
                $this->db->order_by($sort['colName'], $sort['direction']);
            } else {
                $this->db->order_by('ssxa.name', 'ASC');
            }
            if (!empty($limit)) {
                $this->db->limit($limit['offset'],$limit['start']);
            }
            $res = $this->db->get();
             //echo $this->db->last_query();
            return $res->result_array();
        }

    }


    public function countAuctionsByAttributes($currency = '',$ids = '', $values = '', $postType = '',$category2ID='',$start_price_range='',$end_price_range='')
    {
        $date_expire = date('Y-m-d H:i:s');
        if ($ids!='' && $values!='' &&   $postType!='' /*TRUE*/) {
            $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
            $this->db->from("ssx_auctions ssxa");
            
            if (!empty($ids) || !empty($values)) {
                $this->db->join("ssx_auction_attributes ssxaa", "ssxa.id=ssxaa.auction_id", "inner");    
            }
            
            if (!empty($ids)) {
                $this->db->where_in("ssxaa.attribute_value_id", $ids);
            }

            if (!empty($values)) {
                $this->db->or_where_in("ssxaa.value", $values);
            }
            if (!empty($currency) && isset($currency)) {
                $this->db->where_in("ssxa.currency", $currency);
            }
            if ((isset($start_price_range)) && (isset($end_price_range) && !empty($end_price_range))) {
                $this->db->where('ssxa.amount >=', $start_price_range);
                $this->db->where('ssxa.amount <=', $end_price_range);
            }
            $this->db->where("ssxa.expires_at >=",$date_expire);
            $this->db->where("ssxa.type", $postType);
            $this->db->where("ssxa.category2_id", $category2ID);

            $res = $this->db->get();
            //echo $this->db->last_query();
            return $res->result_array();
        }

    }
    
    public function getAuctionsWithOutAttributes($currency ='', $sort = NULL, $limit = NULL, $postType = '',$category2ID='')
    {
        if (/*$sort == 1 && $ids!='' && $values!='' */ TRUE) {
            $this->db->select("ssxa.*");
            $this->db->from("ssx_auctions ssxa");
            if (!empty($currency) && isset($currency)) {
                $this->db->where_in("ssxa.currency", $currency);
            }

            /*if ($postType == 'buy') {
                $this->db->where("ssxa.type", "sell");
            }
            else if ($postType == 'sell') {
                $this->db->where("ssxa.type", "buy");
            }*/

            $this->db->where("ssxa.type", $postType);
            $this->db->where("ssxa.category2_id",$category2ID );

            //$this->db->group_by("ssxaa.auction_id");

            if (!empty($sort)) {
                $this->db->order_by($sort['colName'], $sort['direction']);
            } else {
                $this->db->order_by('ssxa.name', 'ASC');
            }
            if (!empty($limit)) {
                $this->db->limit($limit['offset'],$limit['start']);
            }
            $res = $this->db->get();
             //echo $this->db->last_query();
            return $res->result_array();
        }

    }


    public function countAuctionsWithoutAttributes($currency = '', $postType = '',$category2ID='')
    {
        if ($postType!='' /*TRUE*/) {
            $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
            $this->db->from("ssx_auctions ssxa");
            if (!empty($currency) && isset($currency)) {
                $this->db->where_in("ssxa.currency", $currency);
            }
            $this->db->where("ssxa.type", $postType);
            $this->db->where("ssxa.category2_id", $category2ID);

            $res = $this->db->get();
            //echo $this->db->last_query();
            return $res->result_array();
        }

    }

    public function createSlug()
    {

        $data = [
            'name' => "Mobiles Phones",

        ];
        $id = 1;

        $data['slug'] = $this->slug->create_uri($data);
//        $this->db->insert($this->cat1Model->table,$data);
        $this->db->where('id', $id);
        $this->db->update($this->cat2Model->table, $data);
    }

    public function updateSlugs()
    {
        $this->setSlugConfig();
        $cats = $this->getAll();

        foreach ($cats AS $key => $item) {
            $item['slug'] = $this->slug->create_uri($item, $item['id']);
            $this->db->where('id', $item['id']);
            $this->db->update($this->table, $item);
        }
    }

    private function setSlugConfig()
    {
        $slugConfig = array(
            'table' => $this->table,
            'id' => 'id',
            'field' => 'slug',
            'title' => 'name',
            'replacement' => 'dash' // Either dash or underscore
        );
        $this->slug->set_config($slugConfig);
    }

    public function getAll($columns = NULL, $where = NULL, $whereParams = NULL)
    {

        if (empty($where) && empty($whereParams)) {
            /*get all results*/
            return  $categories = $this->fields($columns)->as_array()->where()->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {
            /*where + AND*/
            return $categories = $this->fields($columns)->as_array()->where($where, NULL)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*where IN*/
            return $categories = $this->fields($columns)->as_array()->where($where, $whereParams)->get_all();
        }
    }

    /*UZair Work starts */
    public function getAllByOrder($columns = NULL, $orderBy = NULL, $where = NULL, $whereParams = NULL)
    {

        if (empty($where) && empty($whereParams)) {
            /*get all results*/
            return  $categories = $this->fields($columns)->order_by($orderBy)->as_array()->where()->get_all();
        }

        if (!empty($where) && empty($whereParams) && is_array($where)) {
            /*where + AND*/
            return $categories = $this->fields($columns)->order_by($orderBy)->as_array()->where($where, NULL)->get_all();
        }

        if (!empty($where) && !empty($whereParams) && is_string($where) && is_array($whereParams)) {
            /*where IN*/
            return $categories = $this->fields($columns)->order_by($orderBy)->as_array()->where($where, $whereParams)->get_all();
        }
    }

    /* UZair work Ends */

}