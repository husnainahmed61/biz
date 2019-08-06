<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */

class Migration_Create_alerts extends CI_Migration
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

            /*Selling / Buying Bid */
            'type' =>[
                'type' => 'ENUM("unknown","buy","sell")',
                'null' => FALSE,
                'default' => 'unknown',
            ],

            'email_alerts' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],

            'sms_alerts' => [
                'type' => 'INT',
                'constraint' => 11,
                'default' => 0
            ],

            'user_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
                'default' => 0
            ],

            'category1_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'category2_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            'category3_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE,
            ],
            /*UZair*/
            'title' => [
                'type' => 'VARCHAR',
                'constraint' => 50,
            ],
            /*UZair*/
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

        $this->dbforge->create_table('alerts');
    }

    public function down()
    {
        $this->dbforge->drop_table('alerts');
    }
}