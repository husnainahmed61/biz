<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */

class Migration_Create_auctions extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'auto_increment' => TRUE
            ],

            /*UZair Work starts*/
            'code' =>[
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE
            ],
            /*UZair Work ends*/

            /*Selling Or Buying*/
            'type' =>[
                'type' => 'VARCHAR',
                'constraint' => 25,
                'null' => FALSE
            ],

            /*Title of post*/
            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
                'null' => FALSE,
            ],

            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
                'default' => NULL
            ],

            'description' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],
            'condition' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => TRUE,
                'default' => NULL
            ],

            'image_sm_1' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_sm_2' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_sm_3' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_sm_4' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_sm_5' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],

            'display_image' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],

            'starts_at' => [
                'type' => 'TIMESTAMP',
                'default' => NULL,
                'default_string' => TRUE,
                'null' => TRUE,
            ],
            'expires_at' => [
                'type' => 'TIMESTAMP',
                'default' => NULL,
                'default_string' => TRUE,
                'null' => TRUE,
            ],

            /*Active Inactive*/
            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE,
            ],

            /*demanded amount*/
            'amount' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'NULL',
            ],

            /*Range bid type*/
            'start_price' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
            ],
            'end_price' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
            ],

            /*Range bid type*/
            'current_price' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => TRUE,
                'default' => NULL
            ],

            'bid_type' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'NULL',
            ],

            'qty_unit' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'NULL',
            ],

            'qty' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'NULL',
            ],


            /*User type of bidders*/
            'bidder_type' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'null' => TRUE,
                'default' => NULL
            ],

            /*Foreign Keys*/
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'category1_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'category2_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'category3_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'bid_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => '0',
            ],

            'average_rating' => [
                'type' => 'INT',
                'constraint' => 11, 
                'default' => '0',
            ],

            'rating_count' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => '0',
            ],

            'created_at' => [
                'type' => 'TIMESTAMP',
                'default' => 'CURRENT_TIMESTAMP',
                'default_string' => TRUE
            ],
            'updated_at' => [
                'type' => 'TIMESTAMP',
                'default' => NULL,
                'null' => TRUE,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'default' => NULL,
                'null' => TRUE,
            ],


        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('auctions');
    }

    public function down()
    {
        $this->dbforge->drop_table('auctions');
    }
}