<?php

/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 16-Oct-17
 * Time: 2:29 PM
 */
class Migration extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->dbforge();
    }

    public function go()
    {
        echo "migration go";
    }

    public function index()
    {
        echo "<h4>Migration Starting...</h4>";
        $this->load->library('migration');

        if ($this->migration->current() === FALSE) {
            show_error($this->migration->error_string());
        } else {
            echo "<h2>Completed !</h2>";
           /* $data = array(
                'first_name' => 'Daniyal',
                'email' => 'admin@admin.com',
                'type' => 'admin',
                'password_en' => '7623A52A4C8A383A8EB599B961E007DEC56F1F2DE7158828962434B29789DF0DBDB7A243DDC0EB9719ABCB07AF741841989AAEDE93D299FCD8E0B89CDC2CA90D',
                // password is 123
            );
            $this->db->insert('users', $data);*/
        }
    }

    public function create_database()
    {
        if ($this->dbforge->create_database('vayzn_db')) {
            echo 'Database created!';
        }
    }


    public function drop_database()
    {
        if ($this->dbforge->drop_database('vayzn_db')) {
            echo 'Database deleted!';
        }
    }

    public function truncate_all()
    {

    }

    public function truncate_one()
    {

    }

    public function truncate_some()
    {

    }
}