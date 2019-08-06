<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_Bids extends CI_Migration
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

            /*Selling / Buying Bid */
            'type' =>[
                'type' => 'ENUM("unknown","buy","sell")',
                'null' => FALSE,
                'default' => 'unknown',
            ],

            'amount' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'currency' => [
                'type' => 'VARCHAR',
                'constraint' => 30,
                'default' => 'NULL',
            ],

            'status' => [
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => TRUE,
                'default' => NULL
            ],

            'description' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],

            'expires_at' => [
                'type' => 'TIMESTAMP',
                'default' => NULL,
                'default_string' => TRUE,
                'null' => TRUE,

            ],

            /*Foreign Keys*/
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'auction_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
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

        $this->dbforge->create_table('bids');
    }

    public function down()
    {
        $this->dbforge->drop_table('bids');
    }
}