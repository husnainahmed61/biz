<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 7/8/2018
 * Time: 9:40 PM
 */

class Bids_m extends MY_Model
{
    public $rules = [
        'insert' => [
            'bid_amount' => [
                'field' => 'amount',
                'label' => 'Amount',
                'rules' => 'trim|required|numeric'
            ],
            'expires_at' => [
                'field' => 'expires_at',
                'label' => 'Expires At',
                'rules' => 'trim|required'
            ],
            'bid_description' => [
                'field' => 'description',
                'label' => 'Description',
                'rules' => 'trim|required'
            ]
        ]
    ];

    public $bidFields = [];

    public $auctionUpdateFields = [];



    public function __construct()
    {
        parent::__construct();

        $this->table = $this->db->dbprefix('bids');
        $this->table1 = $this->db->dbprefix('auctions');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        /*UZair Work starts*/
        $this->has_one['auction'] = array(
            'foreign_model' => 'Auctions_m',
            'foreign_table' => 'auctions',
            'foreign_key' => 'id',
            'local_key' => 'auction_id'
        );

        $this->has_one['user'] = array(
            'foreign_model' => 'Users_m',
            'foreign_table' => 'users',
            'foreign_key' => 'id',
            'local_key' => 'user_id'
        );
        /*UZair Work Ends*/
    }

    public function getById($id){
        return $this->db->get_where($this->table,['id' => $id])->result_array();
    }

    public function setFields($userId,$auctionId,$auctionDetail, $code)
    {
        //Modify by Uzair
        $type = $auctionDetail['type'];
        $bidCount = $auctionDetail['bid_count'];
        $bidType = $auctionDetail['bid_type'];

        $expireAt = date('Y-m-d H:i:s', strtotime($this->input->post('expires_at')));

        $this->bidFields['code'] = $code;
        $this->bidFields['type'] = ($type == 'sell' ? 'buy' : 'sell');
        $this->bidFields['amount'] = $this->input->post('amount');
        $this->bidFields['currency'] = $auctionDetail['currency'];
        $this->bidFields['status'] = 'pending';
        $this->bidFields['description'] = $this->input->post('description');
        $this->bidFields['expires_at'] = $expireAt;
        $this->bidFields['user_id'] = $userId;
        $this->bidFields['auction_id'] = $auctionId;
        $this->auctionUpdateFields['bid_count'] = $bidCount+1;
        if($bidType == 'incremental'){
            $this->auctionUpdateFields['current_price'] = $this->input->post('amount');
        }
        $this->auctionUpdateFields['bid_count'] = $bidCount+1;


       /* echo "<pre>";
         print_r($this->auctionUpdateFields);*/
    }



    public function submitBid()
    {
        $logged_in_user = $this->session->userdata('user_login');
        $this->db->trans_start();
        $this->db->insert($this->table, $this->bidFields);
        $this->db->where('id', $this->bidFields['auction_id']);
        $this->db->set($this->auctionUpdateFields);
        $this->db->update($this->table1);
            $auction_user = $this->db->select("user_id,slug,name")->from("ssx_auctions")->where("id",$this->bidFields['auction_id'])->get()->result_array();
             $userName = $this->db->select("first_name,slug")->from("ssx_users")->where("id",$logged_in_user['id'])->get()->result_array();

                $data = array(
                    'notification_type_id' => 3, 
                    'source_id' => $this->bidFields['user_id'] ,
                    'target_id' => $this->bidFields['auction_id'],
                    'target_reference_userId' => $auction_user[0]['user_id'],
                    'slug' => $auction_user[0]['slug'],
                    'name' => $auction_user[0]['name'],
                    'UserName' => $userName[0]['first_name'],
                    'source_slug' => $userName[0]['slug'], //source_slug
                );  
                $this->db->insert('ssx_notifications', $data);
        $this->db->trans_complete();
        return $this->db->trans_status();
    }
    
    public function getLastBidId($auctionId)
    {
        //print_r($auctionId); exit;
        $this->db->trans_start();
        $this->db->select("id,code");
        $this->db->from($this->table);
        $this->db->where('auction_id',$auctionId);
        $this->db->order_by('id','DESC');
        $res = $this->db->get();
        $this->db->trans_complete();
        
        //print_r($res->result_array()); exit();
        return $res->result_array();
        
    }
    public function bidDetailByAuctionId($auction_id='',$sort='', $limit='')
    {
        $this->db->trans_start();
        $this->db->select("ssxb.*,ssxu.first_name,ssxu.last_name,ssxu.slug,ssxu.type as bidder_type");
        $this->db->from("ssx_bids ssxb");
        $this->db->join("ssx_users ssxu","ssxu.id = ssxb.user_id","Left");
        $this->db->where('ssxb.auction_id',$auction_id);
        if (!empty($sort)) {
            $this->db->order_by($sort['colName'], $sort['direction']);
        }
        if (!empty($limit)) {
            $this->db->limit($limit['offset'],$limit['start']);
        }
        $res = $this->db->get();

        $this->db->trans_complete();
        
        //print_r($res->result_array()); exit();
        return $res->result_array();
    }
    public function countBidsByAuctionId($auction_id='')
    {
        if ($auction_id!='') {
            $this->db->select("COUNT(DISTINCT ssxb.id) AS count");
            $this->db->from("ssx_bids ssxb");

            $this->db->where('ssxb.auction_id',$auction_id);
            //$this->db->where("ssxa.category1_id", $category1ID);

            $res = $this->db->get();
            //echo $this->db->last_query();
            return $res->result_array();
        }
    }
    public function acceptBid($value='')
    {
        $data = array(
        'status' => 'accepted',
        'updated_at' => date('Y-m-d H:i:s')
        );

        $this->db->where('id', $value);
        $res = $this->db->update('ssx_bids', $data);
        return $res;
    }

    public function cancelBid($value='')
    {
        $data = array(
        'status' => 'declined'
        );

        $this->db->where('id', $value);
        $res = $this->db->update('ssx_bids', $data);
        return $res;
    }

    public function bidDetailByUserId($user_id='',$type='', $limit='', $currency='',$sort='')
    {
        $this->db->trans_start();
        $this->db->select("ssxb.*,ssxa.expires_at as auction_expire,ssxa.name as auction_name,ssxa.slug as auction_slug,ssxa.description as auction_description,ssxa.bid_count,ssxa.favourite_count,ssxc3.name as cat_name,ssxc3.slug as cat_slug");
        $this->db->from("ssx_bids ssxb");
        $this->db->join("ssx_auctions ssxa","ssxa.id = ssxb.auction_id","Left");
        $this->db->join("ssx_categories3 ssxc3","ssxa.category3_id = ssxc3.id","Left");
        $this->db->where('ssxb.user_id',$user_id);
        $this->db->where('ssxb.deleted_at',NULL);
        if (!empty($type)) {
            $this->db->where("ssxa.type",$type);
        }
        if (!empty($currency)) {
            $this->db->where("ssxa.currency",$currency);
        }
        if (!empty($sort)) {
            $this->db->order_by($sort['colName'], $sort['direction']);
        }
        // if (!empty($sort)) {
        //     $this->db->order_by($sort['colName'], $sort['direction']);
        // }
        if (!empty($limit)) {
            $this->db->limit($limit['offset'],$limit['start']);
        }
        $res = $this->db->get();

        $this->db->trans_complete();
        
//        print_r($this->db->last_query()); exit();
        return $res->result_array();
    }
    public function countBidsByUserId($user_id='',$type='', $currency='')
    {
        if ($user_id!='') {
            $this->db->select("COUNT(DISTINCT ssxb.id) AS count");
            $this->db->from("ssx_bids ssxb");

            $this->db->where('ssxb.user_id',$user_id);
            if (!empty($type) && $type == "buy") {
                $this->db->where("ssxb.type","sell");
            }
            if (!empty($type) && $type == "sell") {
                $this->db->where("ssxb.type","buy");
            }
            if (!empty($currency)) {
                $this->db->where("ssxb.currency",$currency);
            }
            //$this->db->where("ssxa.category1_id", $category1ID);

            $res = $this->db->get();
            //echo $this->db->last_query();
            return $res->result_array();
        }
    }
    public function checkConvoId($bid_id='',$userId='')
    {
        if (isset($bid_id) && !empty($bid_id)) {


             $auction_id = $this->db->select('auction_id')->from('ssx_bids')->where('id',$bid_id)->get()->result_array();
             $auction_id = $auction_id[0]['auction_id'];

             $bidderId = $this->db->select('user_id')->from('ssx_bids')->where('id',$bid_id)->get()->result_array();
             $bidderId = $bidderId[0]['user_id'];

             $getAuctioneerId = $this->db->select('user_id')->from('ssx_auctions')->where('id',$auction_id)->get()->result_array();
             $getAuctioneerId = $getAuctioneerId[0]['user_id'];

            $where = array(
            'sent_by_user' => $userId,
            'auction_id' => $auction_id
                );
             $getConvoId = $this->db->select('id')->from('ssx_conversations')->where($where)->get()->result_array();

             $returnArray = array(
                'auction_id' => $auction_id,
                'auctioneer_id' => $getAuctioneerId,
                'bidderId' => $bidderId
                 );
             if (isset($getConvoId) && !empty($getConvoId)) {
                 return $getConvoId[0]['id'];
             }
             else {
                return $returnArray;
             }

             
             



             
        }
        
    }
    public function insertConvoAndMessage($auction_id='',$auctioneer_id='',$user_id='',$message='')
    {
        if (!empty($auction_id)) {
            $this->db->trans_start();
            $this->db->select("ssxa.*,ssxu.first_name,ssxu.last_name,ssxu.id as auctioneer_id");
            $this->db->from("ssx_auctions ssxa");
            $this->db->join("ssx_users ssxu","ssxa.user_id = ssxu.id","Left");
            $this->db->where("ssxa.id",$auction_id);
            $this->db->trans_complete();            
            $res = $this->db->get();
        }
        if (!empty($auctioneer_id)) {
            $this->db->trans_start();
            $this->db->select("ssxu.first_name,ssxu.last_name,ssxu.id as user_id");
            $this->db->from("ssx_users ssxu");
            $this->db->where("ssxu.id",$auctioneer_id);
            $this->db->trans_complete();            
            $res2 = $this->db->get();
        }
        $res2 = $res2->result_array();
        $res2 = $res2[0];

        // echo "<pre>";
        $res = $res->result_array();
        $res = $res[0];
        // print_r($res2);
        // exit();

        $data = array(
        'auction_id' => $auction_id,
        'recieved_by_user' => $auctioneer_id,
        'sent_by_user' => $user_id,
        'auction_name' => $res['name'],
        'auction_slug' => $res['slug'],
        'auctioneer_name' => $res['first_name'].' '.$res['last_name'],
        'auctioneer_id' => $res['auctioneer_id'],
        'user_name' => $res2['first_name'].' '.$res2['last_name']
        );

            $this->db->trans_start();
            $this->db->insert('ssx_conversations', $data);
            $insert_id = $this->db->insert_id();
            $this->db->trans_complete();

            $data2 = array(
            'convo_id' => $insert_id, 
            'sender_user_id' => $user_id,
            'message' => $message
            );
            //print_r($insert_id); exit();

            if (!empty($insert_id)) {
                $this->db->trans_start();
                $this->db->insert('ssx_messages', $data2);
                $insert_id2 = $this->db->insert_id();
                $this->db->trans_complete();
                if (!empty($insert_id2)) {
                    // $this->db->trans_start();
                    // $this->db->select("*");
                    // $this->db->from("ssx_messages");
                    // $this->db->where("convo_id",$insert_id);
                    // $res = $this->db->get();
                    // $this->db->trans_complete();
                    return $insert_id;
                }
            }
    }

    public function insertMessagebyConvo($convo_id='',$sender_id='',$message='')
    {
        $data = array(
            'convo_id' => $convo_id, 
            'sender_user_id' => $sender_id,
            'message' => $message
        );
            $this->db->trans_start();
            $this->db->insert('ssx_messages', $data);
            $insert_id2 = $this->db->insert_id();
            $this->db->trans_complete();

            if (!empty($insert_id2)) {
                return $insert_id2;
            }
    }



    public function deleteBid($id){

        $data = array(
            'deleted_at' => date("Y-m-d H:i:s")
        );


        $this->db->where('id',$id);
        return $this->db->update($this->table,$data);
    }

    public function getByAuctionId($id='')
    {
        return $this->db->select("*")->from("ssx_bids")->where("auction_id",$id)->get()->result_array();
    }
    public function getBidsCountById($id='')
    {
       return $this->db->select("*")->from("ssx_bids")->where("auction_id",$id)->get()->num_rows();
    }
}