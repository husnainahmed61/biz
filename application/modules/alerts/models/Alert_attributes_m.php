<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 01-Aug-18
 * Time: 12:13 AM
 */
class Alert_attributes_m extends MY_Model
{

    public $alertAttributeFields ;
    public $tblAttrValues;

    /**
     * Auction_attributes_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('alert_attributes');
        $this->tblAttrValues = $this->db->dbprefix('attribute_values');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;

        $this->alertAttributeFields = [
            'name' => "",
            'value' => "",
            'auction_id' => "",
            'attribute_id' => "",
            'attribute_value_id' => "",
        ];
    }

    public function getById($id){
        $this->db->get_where($this->table,['id' => $id])->result_array();
    }

    public function getBy($where){
        $this->db->get_where($this->table,$where)->result_array();
    }

    public function getAlertsWithValues($columns = NULL,$where){

        $this->db->select("aa.*, av.value AS av_value, at.name, at.description, at.type");
        $this->db->from("ssx_alert_attributes AS aa");
        $this->db->join("ssx_attribute_values av", "av.id = aa.attribute_value_id", "left");
        $this->db->join("ssx_attributes at", "at.id = aa.attribute_id", "left");

        $this->db->where($where);
        return $this->db->get()->result_array();

    }

    public function parseAlertAttributes($attr){

            $parsed = [];
            foreach ($attr AS $key => $item) {
                $parsed[$item['attribute_id']] = $item;
                /*echo "<pre>"; print_r( $parsed);
                foreach ($item['attribute_values'] as $key2 => $attribute_value) {

                    $parsed[$item['attribute_id']]['attribute_values'][$attribute_value['id']] = $attribute_value;

                }*/
            }
            return $parsed;

    }

    public function setAttributes($attributes){
        $auctionAttrFields = [];

        $this->db->where_in();

        foreach ($attributes AS $key => $item) {
            if (!empty($this->input->post('attribute_' . $item['id']))) {
                $auctionAttrFields[$key]['attribute_id'] = $item['id'];
                $auctionAttrFields[$key]['name'] = $item['name'];
                $auctionAttrFields[$key]['type'] = $item['type'];

                if ($item['type'] == "select") {
                    $attrValueId = $this->input->post('attribute_' . $item['id']);
                    $auctionAttrFields[$key]['attribute_id'] = $item['id'];

                    $attributeValue= $this->db->get_where($this->tblAttrValues, array('id' => $attrValueId), 1, 0)->row_array();

                    $auctionAttrFields[$key]['attribute_value_id'] = $attributeValue['id'];
                    $auctionAttrFields[$key]['value'] = $attributeValue['value'];

                } else if ($item['type'] == "text") {
                    $auctionAttrFields[$key]['attribute_value_id'] = "";
                    $auctionAttrFields[$key]['value'] = $this->input->post('attribute_' . $item['id']);
                }
            } else {
//                echo "item[id] is empty<br>";
            }
        }/*Loop End*/
        return $auctionAttrFields;

        /* echo "<pre>auctionAttrFields: <br><br>";
         print_r($auctionAttrFields);
         echo "<pre>auctionAttrFields_2: <br><br>";
         print_r($this->auctionsModel->auctionAttributeFields);*/
    }

    public function updateAlertAttributes($attrs , $alertId){

        $result = [];
        foreach ($attrs AS $key => $item){
            $where = [];
            $where['alert_id'] = $alertId;
            $where['attribute_id'] = $item['attribute_id'];  // printData($where,'up_AlertWhere');
            $result[] = $this->where($where)->update($item);
        }
        return $result;
    }

}