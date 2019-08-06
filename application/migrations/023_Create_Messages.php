<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_Messages extends CI_Migration
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

            'convo_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ],

            'sender_user_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE
            ],

            'reciever_user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],

            'type' =>[
                'type' => 'VARCHAR',
                'constraint' => 20,
                'null' => FALSE
            ],

            'message' =>[
                'type' => 'LONGTEXT',
                'null' => FALSE
            ],

            'status' =>[
                'type' => 'INT',
                'constraint' => 1,
                'null' => FALSE,
                'default' => 0,
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