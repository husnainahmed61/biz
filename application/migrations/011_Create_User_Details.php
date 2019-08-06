<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_user_details extends CI_Migration
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
            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],

            'email' => [
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'paid_rank' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'default' => NULL,
            ],

            'password_en' => [
                'type' => 'VARCHAR',
                'constraint' => '255',
            ],

            'account_status' =>[
                'type' => 'VARCHAR',
                'constraint' => '30',
                'null' => TRUE,
                'default' => NULL,
            ],


            'email_token' =>[
                'type' => 'VARCHAR',
                'constraint' => '255',
                'default' => NULL,
                'null' => TRUE,
            ],
            'sms_token' =>[
                'type' => 'VARCHAR',
                'constraint' => '6',
                'null' => TRUE,
                'default' => NULL,
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

        $this->dbforge->create_table('user_details');
    }

    public function down()
    {
        $this->dbforge->drop_table('user_details');
    }
}