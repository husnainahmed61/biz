<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_auction_reviews extends CI_Migration
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

            'rating' => [
                'type' => 'FLOAT',
                'constraint' => 11,
                'null' => FALSE,
            ],
            'description' => [
                'type' => 'TEXT',
                'null' => FALSE,
            ],

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
                'null' => TRUE,
            ],
            'deleted_at' => [
                'type' => 'TIMESTAMP',
                'default' => Null,
                'null' => TRUE,
            ],
        ));

        $this->dbforge->add_key('id', TRUE);

        $this->dbforge->create_table('auction_reviews');
    }

    public function down()
    {
        $this->dbforge->drop_table('auction_reviews');
    }
}