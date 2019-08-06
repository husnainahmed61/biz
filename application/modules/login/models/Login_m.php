<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 17-Oct-17
 * Time: 3:32 PM
 */
class Login_m extends MY_Model
{

    function __construct()
    {
        $this->table = $this->db->dbprefix('user_details');
        $this->primary_key = 'id';
        parent::__construct();
    }
    public function login($role)
    {
        $user = $this->as_array()->get(array(
            'email' => $this->input->post('email'),
            'password_en' => $this->hash( $this->input->post('password') ),
            'role' => $role

        ));
        if (isset($user) && !empty($user)) {
            // Log In User
            $data = array(
                'name' => $user['name'],
                'email' => $user['email'],
                'id' => $user['id'],
                'role' => $user['role'],
                'loggedin' => TRUE
            );
            //  var_dump($user);
            $this->session->set_userdata($data);
            return TRUE;
        }
        return FALSE;
    }

    public function login_user()
    {
        // echo "login model";
        $user = $this->as_array()->get(array(
            'email' => $this->input->post('email'),
            'password_en' => $this->hash($this->input->post('password')),
        ));
        if (isset($user) && !empty($user)) {
            return TRUE;
        }
        return FALSE;
    }

    public function is_logged_in()
    {
        return (bool)$this->session->userdata('loggedin');
    }

    public function is_admin()
    {
        if ($this->session->userdata('role') == 'admin') {
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

    public function is_user()
    {
        if ($this->session->userdata('role') == 'user') {
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }

    public function is_moderator()
    {
        if ($this->session->userdata('role') == 'moderator') {
            return (bool)TRUE;
        }
        return (bool)FALSE;
    }



    public function hash($password)
    {
        return hash('sha512', $password . $this->config->item('encryption_key'));
    }
}   