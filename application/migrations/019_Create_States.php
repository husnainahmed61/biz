<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_states extends CI_Migration
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

            'code' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => FALSE,
            ],

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
            ],

            'continent_code' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => FALSE,
            ],

            'continent_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],

            'country_code' => [
                'type' => 'VARCHAR',
                'constraint' => 5,
                'null' => FALSE,
            ],

            'country_id' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
            ],

            'is_active' => [
                'type' => 'INT',
                'constraint' => 11,
                'null' => FALSE,
                'default' => 1
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

        $this->dbforge->create_table('states');
    }

    public function down()
    {
        $this->dbforge->drop_table('states');
    }
}