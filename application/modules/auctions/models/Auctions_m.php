<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 6/26/2018
 * Time: 1:40 AM
 */
class Auctions_m extends MY_Model
{

    public $rules;

    public $auctionFields = [];

    public $auctionDetailFields = [];
    public $auctionAttributeFields = [];

    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('auctions');
        $this->table2 = $this->db->dbprefix('auction_details');
        $this->table3 = $this->db->dbprefix('auction_attributes');
        $this->table4 = $this->db->dbprefix('categories1');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        /*Uzair Work Starts*/

        $this->has_many['bids'] = array(
            'foreign_model' => 'Bids_m',
            'foreign_table' => $this->db->dbprefix('bids'),
            'foreign_key' => 'auction_id',
            'local_key' => 'id'
        );

        /*Uzair Work Ends*/

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
                [
                    'field' => 'description',
                    'label' => 'Description',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'condition',
                    'label' => 'Condition',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'quantity_unit',
                    'label' => 'Quantity Unit',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'quantity',
                    'label' => 'Quantity',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'post_currency',
                    'label' => 'Post Currency',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'bidder_type',
                    'label' => 'Bidder Type',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'warranty_case',
                    'label' => 'warranty case',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'starts_at',
                    'label' => 'Start Date',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'expires_at',
                    'label' => 'Expire Date',
                    'rules' => 'trim|required'
                ],
                [
                    'field' => 'bid_method',
                    'label' => 'Bid Method',
                    'rules' => 'trim|required'
                ],
            ]
        ];

        $this->auctionFields = [
            'slug'          => "",
            'name'          => "",
            'description'   => "",
            'condition'     => "",
            'image_sm_1'     => "",
            'image_sm_2'     => "",
            'image_sm_3'     => "",
            'image_sm_4'     => "",
            'image_sm_5'    => "",
            'display_image' => "",
            'starts_at'     => "",
            'expires_at'    => "",
            'amount'        => "",
            'currency'      => "",
            'start_price'   => "",
            'end_price'     => "",
            'current_price' => "",
            'bid_type'      => "",
            'qty_unit'      => "",
            'qty'           => "",
            'bidder_type'   => "",
            'warranty_case'   => "",
            'category1_id'  => "",
            'category2_id'  => "",
            'category3_id'  => "",
            'bid_count'     => "",
            'user_id'       => "",
            'user_city_id'  => "",
            'ad_viewer'     => "",
        ];

        $this->auctionDetailFields = [
            'image_lg_1' => "",
            'image_lg_2' => "",
            'image_lg_3' => "",
            'image_lg_4' => "",
            'image_lg_5' => "",
            'image_md_1' => "",
            'image_md_2' => "",
            'image_md_3' => "",
            'image_md_4' => "",
            'image_md_5' => "",
            'auction_id' => 0
        ];

        $this->auctionAttributeFields = [
            'name' => "",
            'value' => "",
            'auction_id' => "",
            'attribute_id' => "",
            'attribute_value_id' => "",
        ];

        $this->has_one['auction_details'] = array(
            'foreign_model' => 'Auctions_m',
            'foreign_table' => $this->db->dbprefix('auction_details'),
            'foreign_key' => 'auction_id',
            'local_key' => 'id'
        );
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

    public function withcat3($userId = NULL ,$type=NULL ){


        if (!empty($userId) && !empty($type)) {
            /*where + AND*/
                $this->db->select("auction.*,cat.name as cat_name,cat.slug as cat_slug");
                $this->db->from("ssx_auctions auction");
                $this->db->join("ssx_categories3 cat","auction.category3_id = cat.id","Left");
                $this->db->where("auction.user_id",$userId);
                $this->db->where("auction.type",$type);
                $this->db->where("auction.ad_viewer","public");
                $this->db->where("auction.deleted_at",NULL);
                $posts = $this->db->get();                



            return $posts->result_array();
        }

        return FALSE;
    }

    public function insertAuction(){
        /*echo ("start: insertAuction");
        echo ("$this->table:<br>");
        print_r($this->auctionFields);

        echo ("$this->table2:<br>");
        print_r($this->auctionDetailFields);*/


        if(!empty($this->auctionFields) && !empty($this->auctionDetailFields)){
            $this->db->trans_start();

            $this->db->insert($this->table, $this->auctionFields);
            $insert_id = $this->db->insert_id();
            //echo "<br><br>" . $this->db->last_query() . "<br><br>";

            $this->auctionDetailFields['auction_id'] = $insert_id;
            $this->db->insert($this->table2, $this->auctionDetailFields);
            //echo "<br><br>" . $this->db->last_query() . "<br><br>";

            if(!empty($this->auctionAttributeFields)){
                foreach ($this->auctionAttributeFields as $key => $auctionAttributeField) {
                    $this->auctionAttributeFields[$key]['auction_id'] = $this->auctionDetailFields['auction_id'];
                }
                $this->db->insert_batch($this->table3,$this->auctionAttributeFields);
                // echo "<br><br>" . $this->db->last_query() . "<br><br>";
            }
            $this->db->trans_complete();

            $data = $this->get(["id"=> $insert_id]);

            // print_r($data); exit();

            return $data;
        }

        return FALSE;
    }

    public function getAuctionAndDetailsBySlug($slug){
        $this->db->select('ssx_auctions.*,ad.id AS ad_id,ssxc1.name AS cat1_name,ssxc2.name AS cat2_name,ssxc3.name AS cat3_name'); //
        $this->db->from($this->table);
        $this->db->join("$this->table2 AS ad", "ad.auction_id = $this->table.id");
        $this->db->join("$this->table4 AS ssxc1","ssxc1.id = $this->table.category1_id");
        $this->db->join("ssx_categories2 AS ssxc2","ssxc2.id = $this->table.category2_id");
        $this->db->join("ssx_categories3 AS ssxc3","ssxc3.id = $this->table.category3_id");
        $this->db->where(["$this->table.slug" => $slug]);
        $sqlStmt = $this->db->get();
        //return $this->db->last_query();
        return $sqlStmt->result_array();

    }

    /*UZair Work Starts*/
    public function where_like($columns,$where,$like)
    {
        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }
    public function get_search_results($sort,$currency,$postType,$search,$limit)
    {
        $this->db->select("ssxa.*,ssxu.profile_picture,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxc.name as cat3name,ssxc.slug as cat3slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_categories3 ssxc","ssxc.id = ssxa.category3_id","Left");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->where("ssxa.ad_viewer","public");
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
        
        $this->db->like('ssxa.name',$search);

//        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }

    public function get_count_search_results($currency,$postType,$search)
    {
        $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
        $this->db->from("ssx_auctions ssxa");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        if (!empty($currency) && isset($currency)) {
            $this->db->where_in("ssxa.currency", $currency);
        }
        if (!empty($postType) && isset($postType) && $postType != 'null') {
            $this->db->where("ssxa.type", $postType);
        }
        
        $this->db->like('ssxa.name',$search);

//        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }
    public function get_search_results_autoComplete($columns,$where,$like)
    {
        $this->db->select("ssxa.*,ssxc3.name as category_name,ssxc3.id as category_id,ssxc3.slug as cat_slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_categories3 ssxc3","ssxc3.id = ssxa.category3_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.ad_viewer","public");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->like($like);

//        $this->db->select($columns)->from('ssx_auctions')->or_like($like)->where($where);
        $query =  $this->db->get();

        return $query->result_array();
    }
    public function getLimitedByType($type, $start, $end, $case,$userId)
    {
        if (isset($userId) && !empty($userId)) {

                $city_id = $this->getUserCityId($userId);
            }
            else{
                $city_id= '';
            }

        //return $this->db->query("SELECT * FROM ssx_auctions WHERE expires_at >= CURDATE() AND type ='$type' AND deleted_at IS NULL ORDER BY id DESC LIMIT $start,$end" )->result_array();
        $this->db->select("ssxa.*,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxu.profile_picture,ssxc3.name as cat3name,ssxc3.slug as cat3slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->join("ssx_categories3 ssxc3","ssxc3.id = ssxa.category3_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.type",$type);
        $this->db->where("ssxa.ad_viewer","public");
        $this->db->where("ssxa.deleted_at",NULL);
        //nearest
        if ($case == "nearest") {
            if (isset($city_id[0]['city_id']) && !empty($city_id[0]['city_id'])) {
                $this->db->where("ssxa.user_city_id",$city_id[0]['city_id']);
            }
            
        }
        if ($case == "recent") {
            $this->db->order_by('ssxa.id', 'DESC');
        }
        if ($case == "trending") {
            $this->db->order_by('ssxa.favourite_count', 'DESC');
        }
        
        
        $this->db->limit($end,$start);


        $check = $this->db->get();
//        echo "<pre>";
//        print_r($this->db->last_query());
//        echo '<br><br>';
//        exit();

        return $check->result_array();
    }
    public function getLimitedByTypeCity($type, $start, $end, $case,$city_id)
    {

        //return $this->db->query("SELECT * FROM ssx_auctions WHERE expires_at >= CURDATE() AND type ='$type' AND deleted_at IS NULL ORDER BY id DESC LIMIT $start,$end" )->result_array();
        $this->db->select("ssxa.*,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxu.profile_picture,ssxc3.name as cat3name,ssxc3.slug as cat3slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->join("ssx_categories3 ssxc3","ssxc3.id = ssxa.category3_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.type",$type);
        $this->db->where("ssxa.ad_viewer","public");
        $this->db->where("ssxa.deleted_at",NULL);
        //nearest
      
        if ($case == "nearest") {
                $this->db->where("ssxa.user_city_id",$city_id);            
        }
        if ($case == "recent") {
            $this->db->order_by('ssxa.id', 'DESC');
        }
        if ($case == "trending") {
            $this->db->order_by('ssxa.favourite_count', 'DESC');
        }
        
        
        $this->db->limit($end,$start);


        $check = $this->db->get();
//        echo "<pre>";
//        print_r($this->db->last_query());
//        echo '<br><br>';
//        exit();

        return $check->result_array();
    }
    
    public function getLimitedByTypeFollwing($type, $start, $end, $case,$UserFollowing)
    {

        //return $this->db->query("SELECT * FROM ssx_auctions WHERE expires_at >= CURDATE() AND type ='$type' AND deleted_at IS NULL ORDER BY id DESC LIMIT $start,$end" )->result_array();
        $this->db->select("ssxa.*,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxu.profile_picture,ssxc3.name as cat3name,ssxc3.slug as cat3slug,
            (SELECT ssx_auction_for_followers.follower_id FROM ssx_auction_for_followers WHERE ssx_auction_for_followers.auction_id = ssxa.id AND ssx_auction_for_followers.follower_id =".$UserFollowing." )AS Followers_List");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->join("ssx_categories3 ssxc3","ssxc3.id = ssxa.category3_id","Left");
        if ($case == "following") {
            //$this->db->select("ssxaff.follower_id")->from("ssx_auction_for_followers ssxaff")->where("ssxaff.auction_id","ssxa.id")->get()->
            //$this->db->join("ssx_auction_for_followers ssxaff","ssxaff.auction_id = ssxa.id","Left");
            //$this->db->group_by("ssxaff.auction_id");
                //$this->db->where_in('ssxa.user_id', $UserFollowing);  
                $this->db->order_by('ssxa.id', 'DESC');         
        }
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.type",$type);
        $this->db->where("ssxa.deleted_at",NULL);
        //nearest
        
        if ($case == "nearest") {
                $this->db->where("ssxa.user_city_id",$city_id);   
                $this->db->order_by('ssxa.id', 'DESC');         
        }
        if ($case == "recent") {
            $this->db->order_by('ssxa.id', 'DESC');
        }
        if ($case == "trending") {
            $this->db->order_by('ssxa.favourite_count', 'DESC');
        }
        
        
        $this->db->limit($end,$start);


        $check = $this->db->get();
       // echo "<pre>";
       // print_r($this->db->last_query());
       // echo '<br><br>';
       // exit();

        return $check->result_array();
    }

    public function countByType($type)
    {
        return $this->db->query("SELECT id  FROM ssx_auctions 
WHERE expires_at >= CURDATE() AND type ='$type' AND deleted_at IS NULL")->num_rows();
    }
    public function countByTypeAndMode($mode,$type)
    {
        if (isset($userId) && !empty($userId)) {

                $city_id = $this->getUserCityId($userId);
            }
            else{
                $city_id= '';
            }
        $this->db->select("id")->from("ssx_auctions")->where("expires_at >= CURDATE()");
        $this->db->where("type",$mode);
        $this->db->where("deleted_at",NULL);
        if ($type == "following") {
                $this->db->where_in('user_id', $UserFollowing);  
                         
        }
        if ($type == "nearest") {
                $this->db->where("user_city_id",$city_id);   
                         
        }
        if ($type == "recent") {
            $this->db->order_by('id', 'DESC');
        }
        if ($type == "trending") {
            $this->db->order_by('favourite_count', 'DESC');
        }
        return $this->db->get()->num_rows();
              
     
    }
    public function countByTypeAndModeFollowing($mode,$type,$UserFollowing)
    {
        if (isset($userId) && !empty($userId)) {

                $city_id = $this->getUserCityId($userId);
            }
            else{
                $city_id= '';
            }
        $this->db->select("id")->from("ssx_auctions")->where("expires_at >= CURDATE()");
        $this->db->where("type",$mode);
        $this->db->where("deleted_at",NULL);
        if ($type == "following") {
                $this->db->where_in('user_id', $UserFollowing);  
                         
        }
        if ($type == "nearest") {
                $this->db->where("user_city_id",$city_id);   
                         
        }
        if ($type == "recent") {
            $this->db->order_by('id', 'DESC');
        }
        if ($type == "trending") {
            $this->db->order_by('favourite_count', 'DESC');
        }
        return $this->db->get()->num_rows();
              
     
    }
    /*UZair Work Ends*/
    /*hasnain work for rating*/
    public function ratingReview($name,$description,$rating,$auction_id,$user_id)
    {
        //print_r($data);exit();
        $where = array(
            'user_id' => $user_id,
            'auction_id' => $auction_id
        );

        $this->db->select("id");
        $this->db->from("ssx_auction_reviews");
        $this->db->where($where);
        $check = $this->db->get();

        if($check->num_rows() >= 1)
        {
            $user['type'] = 'messageError';
            $user['title'] = 'Failed';
            $user['message'] = 'You already have rated this auction';

            echo json_encode($user);
        }
        else
        {
            $ins = array('name' => $name, 'rating' => $rating, 'description' => $description, 'user_id' => $user_id, 'auction_id' => $auction_id);
            $res = $this->db->insert('ssx_auction_reviews', $ins);
            $id = $this->db->insert_id();
            if (!empty($id)) {

                $this->db->set('rating_count', 'rating_count+1', FALSE);
                $this->db->where('id', $auction_id);
                $this->db->update('ssx_auctions');

                $countReview = $this->countReviews($auction_id);
                if (!empty($countReview)) {
                    $totalReviews = $countReview[0]['COUNT(id)'];
                    $totalRating = $countReview[0]['SUM(rating)'];
                    if (empty($totalReviereview_formws) && empty($totalRating)) {

                        $formula = 0;
                    } else {
                        $formula = $totalRating / $totalReviews;
                    }

                    //$totalRating
                    $formula = ceil($formula);
                    $this->db->set('average_rating', $formula);
                    $this->db->where('id', $auction_id);
                    $this->db->update('ssx_auctions');

                    $auction_slug = $this->db->select("slug,user_id,name")->from("ssx_auctions")->where("id",$auction_id)->get()->result_array();
                    $userName = $this->db->select("first_name")->from("ssx_users")->where("id",$user_id)->get()->result_array();

                    $data = array(
                        'notification_type_id' => 2, 
                        'source_id' => $user_id,
                        'target_id' => $auction_id,
                        'target_reference_userId' => $auction_slug[0]['user_id'],
                        'slug' => $auction_slug[0]['slug'],
                        'name' => $auction_slug[0]['name'],
                        'UserName' => $userName[0]['first_name'],
                    );  

                    $this->db->insert('ssx_notifications', $data);

                }

                $user['type'] = 'messageSuccess';
                $user['title'] = 'Success';
                $user['message'] = 'Your Review And Rating Added Successfully';

                echo json_encode($user);
                //echo 1;
            } else {
                $user['type'] = 'messageError';
                $user['title'] = 'Error';
                $user['message'] = 'Failed to Add Rating And Review';
                echo json_encode($user);
                //echo 0;
            }
        }
    }
    public function ReviewReply($description, $review_id, $auction_id, $user_id)
    {
        
        $ins = array( 
            'review_id' => $review_id, 
            'comment' => $description, 
            'user_id' => $user_id, 
            'auction_id' => $auction_id);

        $res = $this->db->insert('ssx_auction_reviews_reply', $ins);
        $id = $this->db->insert_id();
        if (!empty($id)) {

            $user['type'] = 'messageSuccess';
            $user['title'] = 'Success';
            $user['message'] = 'Your Reply To Comment Added Successfully';

            echo json_encode($user);
            //echo 1;
        } else {
            $user['type'] = 'messageError';
            $user['title'] = 'Error';
            $user['message'] = 'Failed to Reply the Comment';
            echo json_encode($user);
            //echo 0;
        }
        
    }


    public function getReviews($postid)
    {
        // print_r($postid);
        // exit();
        $this->db->select("ssxar.*,ssxu.first_name,ssxu.last_name");
        $this->db->from("ssx_auction_reviews ssxar");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxar.user_id","Left");
        $this->db->where("ssxar.auction_id",$postid);
        $res = $this->db->get();
        return $res->result_array();
        // print_r($res->result_array());
        // exit();
    }
    public function getReviewComments($postid)
    {
        // print_r($postid);
        // exit();
        $this->db->select("ssxarr.*,ssxu.first_name,ssxu.last_name");
        $this->db->from("ssx_auction_reviews_reply ssxarr");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxarr.user_id","Left");
        $this->db->where("ssxarr.auction_id",$postid);
        $res = $this->db->get();
        return $res->result_array();
        // print_r($res->result_array());
        // exit();
    }

    public function countReviews($postid)
    {
        // print_r($postid);
        // exit();
        $this->db->select("COUNT(id),SUM(rating)");
        $this->db->from("ssx_auction_reviews");
        $this->db->where("auction_id",$postid);
        $res = $this->db->get();
        return $res->result_array();
        //  print_r($res->result_array());
        // exit();
    }
    public function getAuctionsByAttributes($type='',$userId='',$sort = NULL, $limit = NULL,$currency = NULL)
    {

        // echo "<pre>";
        // print_r($type);
        // print_r($sort);
        // print_r($limit);
        // print_r($userId);
        // print_r($currency);
        // exit();
        if (/*$sort == 1 && $ids!='' && $values!='' */ TRUE) {
            if (isset($type) && !empty($type) && $type == 'sell') {
                $this->db->select("ssxa.*,ssxc3.name as cat_name,ssxc3.slug as cat_slug, IF(COUNT(b.id) > 0 , 1 , 0) AS has_bids");
                $this->db->from("ssx_auctions ssxa");
                $this->db->join("ssx_categories3 ssxc3", "ssxc3.id=ssxa.category3_id", "left");
                $this->db->join("ssx_bids b", "b.`auction_id`= ssxa.`id`", "left");
                $this->db->where("ssxa.type", $type);
            }
            if (isset($type) && !empty($type) && $type == 'buy') {
                $this->db->select("ssxa.*,ssxc3.name as cat_name,ssxc3.slug as cat_slug,
                (SELECT MIN(ssx_bids.amount) FROM ssx_bids WHERE ssx_bids.auction_id = ssxa.id) AS lowest_bid, 
                IF(COUNT(b.id) > 0 , 1 , 0) AS has_bids");
                $this->db->from("ssx_auctions ssxa");
                $this->db->join("ssx_categories3 ssxc3", "ssxc3.id=ssxa.category3_id", "left");
                $this->db->join("ssx_bids b", "b.`auction_id`= ssxa.`id`", "left");
                $this->db->where("ssxa.type", $type);
            }
            // if (!empty($ids)) {
            //     $this->db->where_in("ssxaa.attribute_value_id", $ids);
            // }

            // if (!empty($values)) {
            //     $this->db->or_where_in("ssxaa.value", $values);
            // }
            
            if (isset($currency) && !empty($currency)) {
                $this->db->where("ssxa.currency", $currency);
            }
            
            $this->db->where("ssxa.deleted_at", NULL);
            // if ($type == 'buy') {
            //     $this->db->where("ssxa.type", $type);
            //  }
            // else if ($type == 'sell') {
            //    $this->db->where("ssxa.type", $type);
            // }

            //$this->db->where("ssxa.type", $postType);
            //$this->db->where("ssxa.category1_id",$category1ID );
            $this->db->where("ssxa.user_id",$userId);

            $this->db->group_by("ssxa.id");

            if (!empty($sort)) {
                $this->db->order_by($sort['colName'], $sort['direction']);
            } else {
                $this->db->order_by('ssxa.name', 'ASC');
            }
            if (!empty($limit)) {
                $this->db->limit($limit['offset'],$limit['start']);
            }
            $res = $this->db->get();
//             echo $this->db->last_query();
            return $res->result_array();
        }

    }

    public function countAuctionsByUserId($userId = '',$buyType = '',$currency='')
    {
        if ($userId!='') {
            $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
            $this->db->from("ssx_auctions ssxa");

            $this->db->where("ssxa.user_id", $userId);
            $this->db->where("ssxa.type",$buyType);
            if (isset($currency) && !empty($currency)) {
                $this->db->where("ssxa.currency",$currency);    
            }
            
            $this->db->where("ssxa.deleted_at",NULL);
            //$this->db->where("ssxa.category1_id", $category1ID);

            $res = $this->db->get();
            //echo $this->db->last_query();
            return $res->result_array();
        }

    }

    public function check_user_fileds($userID)
    {
        if ($userID !='') {
            $this->db->select("*");
            $this->db->from("ssx_users");
            $this->db->where("id",$userID);
            $res = $this->db->get();

            return $res->result_array();
        }
    }
    public function auctioneerDetail($user_id)
    {
        if ($user_id !='') {
            $this->db->select("ssxu.*,countries.name as country_name,cities.name as city_name");
            $this->db->from("ssx_users ssxu");
            $this->db->join("ssx_countries countries","ssxu.country_id = countries.id","left");
            $this->db->join("ssx_cities cities","ssxu.city_id = cities.id","left");
            $this->db->where("ssxu.id",$user_id);
            $res = $this->db->get();

            return $res->result_array();
        }
    }
    public function deleteAuctionById($id='')
    {
        if (!empty($id)) {
            $data = array(
                    'deleted_at' => date("Y-m-d H:i:s")
            );
            $this->db->trans_start();

            $this->db->where('id', $id);
            $res = $this->db->update($this->table, $data);
            //echo "first";
            //print_r($this->db->last_query());

            $this->db->where('auction_id', $id);
            $this->db->update($this->table2, $data);
            //echo "<br>"; echo "second"; print_r($this->db->last_query());
            $this->db->where('auction_id', $id);
            $this->db->update($this->table3, $data);
            //echo "<br>"; echo "third"; print_r($this->db->last_query());

            $this->db->trans_complete();
            //print_r($res);
            return $res;
        }
    }
    
    public function checkAllData($userID='')
    {
     if(!empty($userID)){
            $this->db->select("*");
            $this->db->from("ssx_users");
            $this->db->where("id",$userID);
            $res = $this->db->get();

            return $res->result_array();
     }   
    }


    public function getCurrencies()
    {
            $this->db->select("*");
            $this->db->from("ssx_currencies");
            $res = $this->db->get();

            return $res->result_array();
    }
    public function getAnExtraAuction($user_id='', $postId='')
    {
        $postType = '';
        if ($postId !='') {
            $this->db->select("ssxa.type");
            $this->db->from("ssx_auctions ssxa");
            $this->db->where("ssxa.user_id",$user_id);
            $this->db->where("ssxa.id",$postId);
            $this->db->limit(1);
            $res = $this->db->get();

            $postType = $res->result_array();

            // print_r($postType);
            // exit();
        }

        if ($user_id !='') {
            $this->db->select("ssxa.*,ssxc.name as cat_name,ssxc.slug as cat_slug");
            $this->db->from("ssx_auctions ssxa");
            $this->db->join("ssx_categories3 ssxc","ssxc.id = ssxa.category3_id","Left");
            $this->db->where("ssxa.user_id",$user_id);
            $this->db->where("ssxa.id !=",$postId);
            $this->db->where("ssxa.type",$postType[0]['type']);

            $res = $this->db->get();
            return $res->result_array();
        }
    }

    public function addFavorite($user_id='',$auction_id='')
    {
        $data = 
        array(
            'auction_id' => $auction_id,
            'user_id' => $user_id
         );

        $res = $this->db->insert('ssx_auction_favourites',$data);

        if ($res === TRUE) {

            $this->db->where('id', $auction_id);
            $this->db->set('favourite_count', 'favourite_count+1', FALSE);
            $this->db->update('ssx_auctions'); 

            $auction_slug = $this->db->select("slug,user_id,name")->from("ssx_auctions")->where("id",$auction_id)->get()->result_array();
            $userName = $this->db->select("first_name,slug")->from("ssx_users")->where("id",$user_id)->get()->result_array();
            $data = array(
                'notification_type_id' => 1, 
                'source_id' => $user_id,
                'target_id' => $auction_id,
                'target_reference_userId' => $auction_slug[0]['user_id'],
                'slug' => $auction_slug[0]['slug'],
                'name' => $auction_slug[0]['name'],
                'UserName' => $userName[0]['first_name'],
                'source_slug' => $userName[0]['slug']
            );  

            $this->db->insert('ssx_notifications', $data);         
        }

        return $res;

    }

    public function addFavorite_check($user_id='',$auction_id='')
    {
        $data = 
        array(
            'auction_id' => $auction_id,
            'user_id' => $user_id
         );

        $this->db->select("*");
        $this->db->from("ssx_auction_favourites");
        $this->db->where($data);
        $rs = $this->db->get();

        return $rs->num_rows();

    }
    public function CheckBids($auction_id='')
    {
        $data = 
        array(
            'id' => $auction_id
         );

        $this->db->select("bid_count");
        $this->db->from("ssx_auctions");
        $this->db->where($data);
        $rs = $this->db->get()->result_array();

        return $rs[0]['bid_count'];
    }
    public function DeleteUserAuction($auction_id='')
    {
        $this->db->set('deleted_at', 'NOW()', FALSE);
        $this->db->where('id', $auction_id);
        $re = $this->db->update('ssx_auctions');

        return $re;
    }
    public function getUserCityId($loggedInUser='')
    {
        if (isset($loggedInUser) && !empty($loggedInUser)) {
            return $this->db->select("city_id")->from("ssx_users")->where("id", $loggedInUser)->get()->result_array();
        } else {
            return FALSE;
        }
    }
    public function getUserFollowing($user_id='')
    {
        return $this->db->select("following_id")->from("ssx_followers")->where("follower_id",$user_id)->get()->result_array();
    }

    public function insertAuctionForFollowers($auction_id,$followers_list)
    {
       
        foreach ($followers_list as $key => $value) {
            $data = array(
                'auction_id' => $auction_id, 
                'follower_id' =>$value
            );
            $this->db->insert('ssx_auction_for_followers',$data);
        }
    }
    public function getAuctionInfo($value='')
    {
        return $this->db->select("slug,type,user_id")->from("ssx_auctions")->where("id",$value)->get()->result_array();
    }
    public function getAuctioneerUserInfo($value='')
    {
        $this->db->select("ssxu.first_name,ssxu.last_name,ssxu.slug,ssxud.email")->from("ssx_users ssxu");
        $this->db->join("ssx_user_details ssxud","ssxu.id = ssxud.user_id","Left");
        $this->db->where("ssxu.id",$value);
        return $this->db->get()->result_array();
    }
    public function myfavouriteAuctions($sort,$currency,$postType,$limit,$logged_in_user)
    {
        $fav_auctions  = $this->db->select('auction_id')->from('ssx_auction_favourites')->where('user_id',$logged_in_user)->get()->result_array();

        $fav_id = [];
        foreach ($fav_auctions as $key => $value) {
            $fav_id[$key] = $value['auction_id'];
        }


        $this->db->select("ssxa.*,ssxu.profile_picture,ssxu.first_name,ssxu.last_name,ssxu.slug as user_slug,ssxc.name as cat3name,ssxc.slug as cat3slug");
        $this->db->from("ssx_auctions ssxa");
        $this->db->join("ssx_categories3 ssxc","ssxc.id = ssxa.category3_id","Left");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxa.user_id","Left");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->where("ssxa.ad_viewer","public");
        $this->db->where_in('ssxa.id',$fav_id);
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
    public function myfavouriteAuctionsCount($currency,$postType,$limit,$logged_in_user)
    {
        $fav_auctions  = $this->db->select('auction_id')->from('ssx_auction_favourites')->where('user_id',$logged_in_user)->get()->result_array();

        $fav_id = [];
        foreach ($fav_auctions as $key => $value) {
            $fav_id[$key] = $value['auction_id'];
        }

        $this->db->select("COUNT(DISTINCT ssxa.id) AS count");
        $this->db->from("ssx_auctions ssxa");
        $this->db->where("ssxa.expires_at >= CURDATE()");
        $this->db->where("ssxa.deleted_at",NULL);
        $this->db->where_in('ssxa.id',$fav_id);
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


}