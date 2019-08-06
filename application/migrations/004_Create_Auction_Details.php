<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_auction_details extends CI_Migration
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
            'auction_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],


            'image_md_1' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_md_2' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_md_3' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_md_4' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_md_5' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],

            'image_lg_1' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_lg_2' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_lg_3' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_lg_4' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
            ],
            'image_lg_5' => [
                'type' => 'TEXT',
                'null' => TRUE,
                'default' => NULL
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

        $this->dbforge->create_table('auction_details');
    }

    public function down()
    {
        $this->dbforge->drop_table('auction_details');
    }
}