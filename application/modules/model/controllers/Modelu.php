<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 3:54 PM
 */

class ModelU extends User_Controller
{


    /**
     * ModelU constructor.
     */
    public function __construct()
    {
        parent::__construct();

        $this->load->model('model_m', 'modelModel', TRUE);
        $this->load->library('my_encrypt');

    }

    public function getModel()
    {

        $response = [
            'result' => false,
            'message' => 'Something went wrong',
            'data' => null
        ];
        $id = (int)$this->input->post('id');

        /*Checking for id is integer*/
        if (!empty($id) && is_int($id)) {

            $models = $this->modelModel->as_array()->get_all(['make_id'=>$id]);
            /*Checking for records*/
            if (!empty($models)) {

                $response['result'] = true;
                $response['message'] = 'Successful';
                $response['data'] = $models;

                echo json_encode($response);
            }
            else {
                $response['result'] = false;
                $response['message'] = 'No Models';
                echo json_encode($response);
            }

        } else {
            $response['result'] = false;
            $response['message'] = 'Invalid Model ID';
            echo json_encode($response);
        }
    }
}