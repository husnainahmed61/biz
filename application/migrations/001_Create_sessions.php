<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 17-Oct-17
 * Time: 11:09 AM
 */

class Migration_Create_Sessions extends CI_Migration
{
    public function up()
    {
        $this->dbforge->add_field(array(
            'id' => array(
                'type' => 'VARCHAR',
                'constraint' => '40',
                'null' => FALSE,
                'default' => '0',
            ),
            'ip_address' => array(
                'type' => 'VARCHAR',
                'constraint' => '45',
                'null' => FALSE,
                'default' => '0',
            ),
            'timestamp' => array(
                'type' => 'INT',
                'constraint' => '10',
                'unsigned' => TRUE,
                'default' => '0',
                'null' => FALSE,
            ),
            'data' => array(
                'type' => 'blob',
                'null' => FALSE,
            ),
        ));

        $this->dbforge->add_key('id', TRUE);
        $this->dbforge->create_table('ci_sessions');
        $this->db->query('ALTER TABLE `' . $this->db->dbprefix('ci_sessions') . '` ADD KEY `ci_sessions_timestamp` (`timestamp`) ');
    }

    public function down()
    {
        $this->dbforge->drop_table('ci_sessions');
    }
}

?>