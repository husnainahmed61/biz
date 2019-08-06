<?php

/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 10-Aug-18
 * Time: 12:31 AM
 */
class Auction_details_m extends MY_Model
{

    /**
     * Auction_details_m constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->db->dbprefix('auction_details');
        $this->primary_key = 'id';
        $this->return_as = 'array';

        $this->soft_deletes = TRUE;
    }
}