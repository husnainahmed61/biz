<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */

class Migration_Create_categories1 extends CI_Migration
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

            'name' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
            ],
            'icon' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
            ],

            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
                'default' => NULL
            ],

            'meta_title' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => TRUE,
                'default' => NULL
            ],

            'meta_description' => [
                'type' => 'text',
                'constraint' => 100,
                'null' => TRUE,
                'default' => NULL
            ],

            'meta_keywords' => [
                'type' => 'text',
                'constraint' => 100,
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

        $this->dbforge->create_table('categories1');
    }

    public function down()
    {
        $this->dbforge->drop_table('categories1');
    }
}