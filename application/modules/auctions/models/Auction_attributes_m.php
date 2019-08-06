<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 01-Aug-18
 * Time: 12:13 AM
 */
class Auction_attributes_m extends MY_Model
{

    public $auctionAttributeFields ;
    /**
     * Auction_attributes_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('auction_attributes');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

      /*  $this->has_many['attr_values'] = array(
            'foreign_model' => 'Attribute_values_m',
            'foreign_table' => $this->db->dbprefix('attribute_values'),
            'foreign_key' => 'attribute_id',
            'local_key' => 'id'
        );*/

        $this->auctionAttributeFields = [
            'name' => "",
            'value' => "",
            'auction_id' => "",
            'attribute_id' => "",
            'attribute_value_id' => "",
        ];
    }

    public function setAuctionAttributes($attributes){

    }

}