<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 2:46 PM
 */

class MakeU extends User_Controller
{
    /**
     * Make constructor.
     */
    public function __construct()
    {
        parent::__construct();

        /*$this->data['user']['head']['pageLevelPlugins']['css'] = ['bs-select'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['bs-select'];
        $this->data['user']['page_js'] = 'products/user-js';*/

        $this->load->model('make_m', 'makeModel', TRUE);
        $this->load->library('my_encrypt');
    }



}