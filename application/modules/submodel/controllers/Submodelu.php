<?php
/**
 * Created by PhpStorm.
 * User: daniyal.nasir
 * Date: 22-Dec-17
 * Time: 5:30 PM
 */

class SubmodelU extends User_Controller
{


    /**
     * SubmodelU constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->load->model('submodel_m', 'smdlModel', TRUE);
        $this->load->library('my_encrypt');
    }

    public function getSubmodel(){
        $response = [
            'result' => false,
            'code' => 'invalid',
            'data' => null
        ];

        $id = (int)$this->input->post('id');

        /*Checking for id is integer*/
        if (!empty($id) && is_int($id)) {

            $subModels = $this->smdlModel->as_array()->get_all(['model_id'=>$id]);
            /*Checking for records*/
            if (!empty($subModels)) {

                $response['result'] = true;
                $response['code'] = 'found';
                $response['data'] = $subModels;

                echo json_encode($response);
            }
            else {
                $response['result'] = false;
                $response['message'] = 'not_found';
                echo json_encode($response);
            }

        } else {
            $response['result'] = false;
            $response['message'] = 'Invalid Submodel ID';
            echo json_encode($response);
        }
    }
}