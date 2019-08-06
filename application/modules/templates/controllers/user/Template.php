<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Template extends MY_Base_Controller
{
    function __construct()
    {
        parent::__construct();
    }
    function index()
    {
        echo "i m";
    }
    
    function sitemap()
    {

        //$data = "";//select urls from DB to Array
        header("Content-Type: text/xml;charset=iso-8859-1");
        $this->load->view("templates/user/sitemap");
    }

    function setup_template($data = NULL)
    {
    	
        $this->load->view('templates/user/template_v', $data);
    }

    function setup_private_template($data = NULL)
    {
    	
        $this->load->view('templates/user/private_template_v', $data);
    }

    public function web_login()
	{
		$data['user'] = array();

		// Check if user is logged in
		if ($this->facebook->is_authenticated())
		{
			// User logged in, get user details
			$user = $this->facebook->request('GET', '/me');
			if (!isset($user['error']))
			{
				$data['user'] = $user;
			}

		}
		print_r($data['user']);
		exit();
		// display view
		//$this->load->view('examples/web', $data);
	}
	public function logout()
	{
		$this->facebook->destroy_session();
		//redirect('example/web_login', redirect);
	}


}