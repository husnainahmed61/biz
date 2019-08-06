<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends Admin_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->modules([
            'login',
            'orders',
            'categories/admin/categories',
            'products',
            'test',
            'invoices',
            'customers',
        ]);
        $this->check_admin_authentication();
    }

    public function index($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->products, $method)) {
            $this->products->$method($param1);
        } else {
            $this->products->index();
        }
    }

    public function products($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->products, $method)) {
            $this->products->$method($param1);
        } else {
            $this->products->index();
        }
    }

    public function categories($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->categories, $method)) {
            $this->categories->$method($param1);
        } else {
            $this->categories->index();
        }
    }

    public function test($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->test, $method)) {
            $this->test->$method($param1);
        } else {
            $this->test->index();
        }
    }

    public function customers($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->customers, $method)) {
            $this->customers->$method($param1);
        } else {
            $this->customers->index();
        }
    }

    public function invoices($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->invoices, $method)) {
            $this->invoices->$method($param1);
        } else {
            $this->invoices->index();
        }
    }

    public function orders($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->orders, $method)) {
            $this->orders->$method($param1);
        } else {
            $this->orders->index();
        }
    }

    public function StandardDesigns($method = NULL, $param1 = NULL)
    {
        if (method_exists($this->standarddesigns, $method)) {
            $this->standarddesigns->$method($param1);
        } else {
            $this->standarddesigns->index();
        }
    }

    public function logout()
    {
        $this->login->admin_logout();
    }

    public function changepassword()
    {
        $this->changepassword->changepassword();
    }

    public function password($user_id)
    {
        $this->changepassword->password($user_id);
    }
}