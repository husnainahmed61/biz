<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 7:12 PM
 */

class BodyTypeU extends User_Controller
{


    /**
     * BodyTypeU constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('bodytype_m', 'bodyModel', TRUE);
        $this->load->library('my_encrypt');
    }

    public function getBodyType()
    {
        /**
         * Using in Ajax */
        $response = [
            'result' => false,
            'code' => 'invalid',
            'data' => null
        ];

        $id = (int)$this->input->post('id');
        $type = $this->input->post('type');

        // print_r($_POST); die;

        /*Checking for id is integer*/
        if (!empty($id) && is_int($id) && !empty($type)) {

            $column = $type ;

            echo $column . " = ". $id;

            $bodyTypes = $this->bodyModel->as_array()->get_all([$column => $id]);
            print_r($bodyTypes); die;
            /*Checking for records*/
            if (!empty($bodyTypes)) {

                $response['result'] = true;
                $response['code'] = 'found';
                $response['data'] = $bodyTypes;

                echo json_encode($response);
            } else {
                $response['result'] = false;
                $response['code'] = 'not_found';
                echo json_encode($response);
            }

        } else {
            echo json_encode($response);
        }
    }
}