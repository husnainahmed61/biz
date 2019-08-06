<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 1:53 PM
 */
class Migration_Create_users extends CI_Migration
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
            /*UZair*/
            'profile_picture' => [
                'type' => 'VARCHAR',
                'constraint' => '150',
            ],
            /*UZair*/
            'first_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],
            'last_name' => [
                'type' => 'VARCHAR',
                'constraint' => '50',
            ],

            /*UZair Work Starts*/
            'slug' => [
                'type' => 'VARCHAR',
                'constraint' => 100,
                'null' => FALSE,
                'default' => NULL
            ],
            /*UZair Work Ends*/

            /* for individiual / business*/
            'type' => [
                'type' => 'ENUM("unknown","individual","business")',
                'null' => FALSE,
                'default' => 'unknown',
            ],

            'phone' =>[
                'type' => 'VARCHAR',
                'constraint' => '100',
            ],

            'country_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'state_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            'city_id' =>[
                'type' => 'INT',
                'constraint' => 11,
                'unsigned' => TRUE
            ],
            /* social media link*/
            'facebook_link' =>[
                'type' => 'VARCHAR',
                'constraint' => '500',
                'default' => NULL,
                'null' => TRUE,
            ],
            'twitter_link' =>[
                'type' => 'VARCHAR',
                'constraint' => '500',
                'default' => NULL,
                'null' => TRUE,
            ],
            'google_link' =>[
                'type' => 'VARCHAR',
                'constraint' => '500',
                'default' => NULL,
                'null' => TRUE,
            ],

            /*end socail media*/
            
            /*Business Attributes */
            'business_name' =>[
                'type' => 'VARCHAR',
                'constraint' => '50',
                'default' => NULL,
                'null' => TRUE,
            ],

            'business_description' =>[
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE,
            ],

            'tax_number' =>[
                'type' => 'VARCHAR',
                'constraint' => '25',
                'default' => NULL,
                'null' => TRUE,
            ],

            'registered_address' =>[
                'type' => 'text',
                'default' => NULL,
                'null' => TRUE,
            ],
            
            /*UZair */
            'website_url' =>[
                'type' => 'VARCHAR',
                'constraint' => '100',
                'default' => NULL,
                'null' => TRUE,
            ],
/*Uzair*/

            'approved' =>[
                'type' => 'VARCHAR',
                'constraint' => '20',
                'default' => NULL,
                'null' => TRUE,
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

        $this->dbforge->create_table('users');
    }

    public function down()
    {
        $this->dbforge->drop_table('users');
    }
}