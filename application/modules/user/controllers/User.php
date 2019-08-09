<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User extends MY_Base_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->module([
            'home/user/home',
            'categories/user/categories1',
            'categories/user/categories2',
            'categories/user/categories3',
            'auctions/user/auctions',
            'bids/user/bids',
            'products/user/products',
            'myposts/user/myposts',
            'mybids/user/mybids',
            'register/user/register',
            'merchants/user/merchants',
            'merchants/user/profiles',
            'templates/user/template', //hasnain work for sitemap
            'merchants/user/passwords', // UZair works
            'locations/user/countries',
            'locations/user/states',
            'locations/user/cities',
            'login/user/login',
            'search/user/search', // UZair works
            'alerts/user/alerts', // UZair works
            'company/user/company', // hasnain works


        ]);
    }


    public function index($method = NULL, $param1 = NULL)
    {
        $this->load->module('home/user/home');


        if (method_exists($this->home, $method)) {
            $this->home->$method($param1);
        } else {
            $this->home->index();
        }
    }

    public function home($method = NULL, $param1 = NULL)
    {
        $this->load->module('home/user/home');
        if (method_exists($this->home, $method)) {
            $this->home->$method($param1);
        } else {
            $this->home->index();
        }
    }

    public function category1($method = NULL, $param1 = NULL)
    {
        /*echo "<br>".$method ;
        echo "<br>".$param1;
        die;*/
        $this->load->module('categories/user/categories1');
        if (method_exists($this->categories1, $method)) {
            $this->categories1->$method($param1);
            // echo "if";die;
        } else {
            //echo "else";die;
            $this->categories1->index();
        }
    }

    public function category2($method = NULL, $param1 = NULL)
    {
        $this->load->module('categories/user/categories2');
        if (method_exists($this->categories2, $method)) {
            $this->categories2->$method($param1);
        } else {
            //echo "else";
            $this->categories2->index();
        }
    }

    public function category3($method = NULL, $param1 = NULL)
    {
        $this->load->module('categories/user/categories3');
        if (method_exists($this->categories3, $method)) {
            $this->categories3->$method($param1);
        } else {
            //echo "else";
            $this->categories3->index();
        }
    }

    public function products($method = NULL, $param1 = NULL)
    {
        $this->load->module('products/user/products');
        //echo "2085 ".$method." ".$param1;
        if (method_exists($this->products, $method)) {
            $this->products->$method($param1);
        } else {
            $this->products->index();
        }
    }

    public function auctions($method = NULL, $param1 = NULL)
    {
        $this->load->module('auctions/user/auctions');
//        echo "2085 ".$method." ".$param1; die;
        if (method_exists($this->auctions, $method)) {
            $this->auctions->$method($param1);
        } else {
            $this->auctions->index();
        }

    }

    public function auction($method = NULL, $param1 = NULL)
    {
        $this->load->module('auctions/user/auctions');
        //echo "2085 M: $method ,P1: $param1"; die;
        if (method_exists($this->auctions, $method)) {
            $this->auctions->$method($param1);
        } else {
            $this->auctions->index();
        }
    }

    public function bids($method = NULL, $param1 = NULL)
    {

        $this->load->module('bids/user/bids');
        //echo "2085 ".$method." ".$param1;
        if (method_exists($this->bids, $method)) {
            $this->bids->$method($param1);
        } else {
            $this->bids->index();
        }
    }

    public function profile($method = NULL, $param1 = NULL,$param2 = NULL)
    {
        $this->load->module('merchants/user/profiles');
//         echo "2085 method = ".$method." , param1 = ".$param1; die;
        if (method_exists($this->profiles, $method)) {
            $this->profiles->$method($param1,$param2);
        }
        else {
            $this->profiles->index();
        }
    }

    /*UZair Work Starts*/
    public function password($method = NULL, $param1 = NULL)
    {
        $this->load->module('merchants/user/passwords');
        // echo "2085 method = ".$method." , param1 = ".$param1; die;
        if (method_exists($this->passwords, $method)) {
            $this->passwords->$method($param1);
        }
        else {
            $this->passwords->index();
        }
    }
    /*UZair Work Ends*/

    public function mybids($method = NULL, $param1 = NULL)
    {
        //echo "2085 ".$method." ".$param1;
        if (method_exists($this->mybids, $method)) {
            $this->mybids->$method($param1);
        } else {
            $this->mybids->index();
        }
    }

    public function register($method = NULL, $param1 = NULL)
    {
        /*echo "<br>".$method ;
       echo "<br>".$param1;
       die;*/
        $this->load->module('register/user/register');
        if (method_exists($this->register, $method)) {
            $this->register->$method($param1);
        } else {
            $this->register->index();
        }
    }

    public function merchant($method = NULL, $param1 = NULL)
    {
        $this->load->module('merchants/user/merchants');
        if (method_exists($this->merchants, $method)) {
            $this->merchants->$method($param1);
        } else {
            //echo "else";
            $this->merchants->index();
        }
    }

    public function cities($method = NULL,$param1 = NULL)
    {
        $this->load->module('locations/user/cities');
        if (method_exists($this->cities, $method)) {
            $this->cities->$method($param1);
        } else {
            $this->cities->index();
        }
    }

    public function countries($method = NULL,$param1 = NULL)
    {
        $this->load->module('locations/user/countries');
        if (method_exists($this->countries, $method)) {
            $this->countries->$method($param1);
        } else {
            $this->countries->index();
        }
    }

    public function states($method = NULL,$param1 = NULL)
    {
        $this->load->module('locations/user/states');
        if (method_exists($this->states, $method)) {
            $this->states->$method($param1);
        } else {
            $this->states->index();
        }
    }

    public function template($method = NULL,$param1 = NULL)
    {
        //     echo "<br>".$method ;
        //   echo "<br>".$param1;
        //   die;
        $this->load->module('templates/user/template');
        if (method_exists($this->template, $method)) {
            $this->template->$method($param1);
        } else {
            $this->template->index();
        }
    }

    /*UZair Work starts*/
    public function search($method = NULL,$param1 = NULL)
    {
        $this->load->module('search/user/search');
        if (method_exists($this->search, $method)) {
            $this->search->$method($param1);
        } else {
            $this->search->index();
        }
    }
    /*UZair Work Ends*/

    public function login($method = NULL,$param1 = NULL){
        //$this->load->module('search/user/search');
        if (method_exists($this->login, $method)) {
            $this->login->$method($param1);
        } else {
            $this->login->index();
        }
    }

    public function alerts($method = NULL,$param1 = NULL){
        //$this->load->module('search/user/search');
        if (method_exists($this->alerts, $method)) {
            $this->alerts->$method($param1);
        } else {
            $this->alerts->index();
        }
    }
    public function company($method = NULL,$param1 = NULL){
        //$this->load->module('search/user/search');
        if (method_exists($this->company, $method)) {
            $this->company->$method($param1);
        } else {
            $this->company->index();
        }
    }
}