<?php

/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 11/27/2018
 * Time: 12:27 AM
 */
class Alerts extends User_Controller
{
    public $response;

    function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->load->model('Alerts_m', 'alertsModel', TRUE);
        $this->load->model('Alert_attributes_m', 'alertsAttributeModel', TRUE);

        $this->moduleName = 'alerts';
        $this->modulePath = "$this->moduleName/$this->userName";


        $this->loggedInUser = $this->get_logged_in_user(); //UZair
        $this->data['user']['head']['pageLevelPlugins']['css'] = ['bs-select'];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['bs-select','pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";

        $this->alertData = ['type' => "", 'user_id' => "", 'category1_id'  => "", 'category2_id'  => "", 'category3_id'  => "", 'title' => "",];

        $this->sort_private = [
            [
                'text' => 'Name (A - Z)',
                'colName' => 'a.name',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Name (Z - A)',
                'colName' => 'a.name',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Latest to Oldest',
                'colName' => 'a.created_at',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Oldest to Latest',
                'colName' => 'a.created_at',
                'direction' => 'ASC'
            ]
        ];
        $this->sort = [
            [
                'text' => 'Name (A - Z)',
                'colName' => 'ssxa.name',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Name (Z - A)',
                'colName' => 'ssxa.name',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Price (Low > High)',
                'colName' => 'ssxa.amount',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Price (High > Low)',
                'colName' => 'ssxa.amount',
                'direction' => 'DESC'
            ]
        ];

        $this->pageLimit = [
            [
                'text' => "20",
                'value' => 20
            ],
            [
                'text' => "40",
                'value' => 40
            ],
            [
                'text' => "60",
                'value' => 60
            ],
            [
                'text' => "80",
                'value' => 80
            ],
            [
                'text' => "100",
                'value' => 100
            ]
        ];

    }

    public function index()
    {
        if ($this->check_user_authentication('', 'home')) {
            $this->data['user']['pageHeader'] = 'Alerts';

            $this->data['user']['sort_private'] = $this->sort_private;
            $this->data['user']['content_view'] = "$this->modulePath/show_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    public function create()
    {
        if ($this->check_user_authentication('', 'home')) {
            $this->data['user']['pageHeader'] = 'Add Alert';


            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/create_v";

            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    public function store(){
        //printData($_REQUEST);
        $request = $_REQUEST;

        $where = ['id' => $request['category_3']];
        $category3 = $this->categories3->cat3Model->getAll('*',$where);
        $userLogin = $this->session->userdata('user_login');
        //printData($userLogin);
        $param['alert'] = [
                'name'         => $request['title'],
                'type'          => $request['mode'],
                'email_alerts'    => !empty($request['type'][0]) ? 1 : 0,
                'sms_alerts'    => !empty($request['type'][1]) ? 1 : 0,
                'user_id'       => $userLogin['id'],
                'category1_id'  => $category3[0]['category1_id'],
                'category2_id'  => $category3[0]['category2_id'],
                'category3_id'  => $category3[0]['id'],
        ];

        $param['alertAttributes'] = $this->setAlertAttributes($category3  );
        $alert = $this->alertsModel->addAlertWithAttributes($param);

        if(!empty($alert)){
            $this->response['status'] = TRUE;
            $this->response['code'] = "200";
            $this->response['title'] = "Success";
            $this->response['Message_type'] = "messageSuccess";
            $this->response['message'] = "Alert Added.";
        }else{
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['Message_type'] = "messageError";
            $this->response['message'] = "Something went wrong";
        }
        $responseMessage = "showstatusMessage('".$this->response['Message_type']."','".$this->response['title']."', '".$this->response['message'] ."', 4000);";
        $this->response['csrf'] = $this->getCSRF();
        $this->session->set_flashdata('message_name', $responseMessage);
        redirect('alerts/create');
    }

    private function setAlertAttributes($category3)
    {
        $auctionAttrFields = [];

        $attributes = $this->auctions->attributesModel->getByCategories($category3[0]['category1_id'], $category3[0]['category2_id'], $category3[0]['id']);
//        echo "<pre>auctionAttrFields: <br><br>";
//        print_r($attributes);

        foreach ($attributes AS $key => $item) {
            if (!empty($this->input->post('attribute_' . $item['id']))) {
                $auctionAttrFields[$key]['attribute_id'] = $item['id'];
                $auctionAttrFields[$key]['name'] = $item['name'];
                $auctionAttrFields[$key]['type'] = $item['type'];

                if ($item['type'] == "select") {
                    $attrValueId = $this->input->post('attribute_' . $item['id']);
                    $auctionAttrFields[$key]['attribute_id'] = $item['id'];

                    $attributeValue = $this->attributeValuesModel->get($attrValueId);

                    $auctionAttrFields[$key]['attribute_value_id'] = $attributeValue['id'];
                    $auctionAttrFields[$key]['value'] = $attributeValue['value'];

                } else if ($item['type'] == "text") {
                    $auctionAttrFields[$key]['attribute_value_id'] = "";
                    $auctionAttrFields[$key]['value'] = $this->input->post('attribute_' . $item['id']);
                }
            } else {
//                echo "item[id] is empty<br>";
            }
        }/*Loop End*/
        return $auctionAttrFields;
    }

    public function getFilteredAlerts(){
//        printData($this->input->get());

        $currency = $this->input->get('currency');
        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');

        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];

        $userId = $this->loggedInUser['id'];

        $alerts = $this->alertsModel->getAlerts($type, $userId, $this->sort_private[$sort - 1], $limit,$currency);
        $alertsCount = $this->alertsModel->countAlerts($type, $userId);
//        printDataDie($alerts);

        if (!empty($alerts) && is_array($alerts) && count($alerts) > 0) {

            $this->data['user']['alerts'] = $alerts;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/user_auctions_filtered";

            $this->response['data'] = $alerts;
            $this->response['totalNumber'] = $alertsCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Retrieved";
            $this->response['html'] = $this->load->view("$this->modulePath/user_alerts_filtered_v", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
            $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
            $this->response['html'] = "<h4>No alerts Found</h4>";
            echo json_encode($this->response);


            //echo "No alerts Found";
        }
    }

    public function edit($id){
        if ($this->check_user_authentication('', 'home')) {
            $this->data['user']['pageHeader'] = 'Edit Alert';
            $this->data['user']['serverDateTime'] = new DateTime($this->serverDateTime);
            $this->data['user']['categories3'] = $this->categories3->cat3Model->getAll();
            $this->data['user']['content_view'] = "$this->modulePath/edit_v";
            $loggedInUser = $this->get_logged_in_user();
//            printData($loggedInUser);

            $alertWhere['user_id'] = $loggedInUser['id'];
            $alertWhere['id'] = $id;
            $alert = $this->alertsModel->getBy($alertWhere);

            $this->data['user']['alert'] = $alert[0];
            $alertAttrWhere['aa.alert_id'] =  $id;
//            printData($alertAttrWhere);
            $alertAttr = $this->alertsAttributeModel->getAlertsWithValues(NULL,$alertAttrWhere);
//            printDataDie($alertAttr);
            $data['auctionAttributes'] = $this->alertsAttributeModel->parseAlertAttributes($alertAttr);

            $data['attributes'] = $this->auctions->getAttributesWithValues($alert[0]['category1_id'],$alert[0]['category2_id'],$alert[0]['category3_id']);
//printDataDie($data);

            $this->data['user']['attributes_view']  = $this->load->view("auctions/user/auction-attributes-filled", $data, TRUE);

//            printDataDie($data['auctionAttributes']);
            //printData( $this->data['attributes']);
//            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    public function update($id){
        $request = $this->input->post();
        //printData($this->input->post());

        $updateData = [];
        $updateData['id'] = $id;
        $updateData['type'] = $request['mode'];
        $updateData['category3_id'] = $request['category_3'];
        $updateData['name'] = $request['title'];
        $updateData['email_alerts']    = !empty($request['type'][0]) ? 1 : 0;
        $updateData['sms_alerts'] = !empty($request['type'][1]) ? 1 : 0;

        $updateARes = $this->alertsModel->updateAlert($updateData);
//        printData($updateARes,'$updateARes');

        $attributes = $this->attributesModel->getByCategory3($request['category_3']);
//        printData($attributes);

        $pAttr = $this->alertsAttributeModel->setAttributes($attributes);
//        printData($pAttr,'$pAttr');

        $updateAttrRes = $this->alertsAttributeModel->updateAlertAttributes($pAttr,$id);
//        printDataDie($updateAttrRes ,'$updateAttrRes ');

        if($updateARes){
            $attrMsg =(empty($updateAttrRes[0])) ? ' (error in attributes update)' : '';
            $responseMessage = $this->set_showStatusMessage('messageSuccess' , 'Successful','Alert Updated.'.$attrMsg,4000);
            $this->response['csrf'] = $this->getCSRF();
            $this->session->set_flashdata('message_name', $responseMessage);
            redirect('alerts');
        }else{
            $responseMessage = $this->set_showStatusMessage('messageError' , 'Failed','Alert Not Updated.',4000);
            $this->response['csrf'] = $this->getCSRF();
            $this->session->set_flashdata('message_name', $responseMessage);
            redirect('alerts');
        }
    }

    public function delete($id){
            $alert = $this->alertsModel->getById($id);
            if(count($alert) > 0){
                $this->alertsModel->delete($id);
                $this->alertsAttributeModel->delete(['alert_id' => $id]);
                $responseMessage = $this->set_showStatusMessage('messageSuccess' , 'Successful','Alert Deleted.',4000);
                $this->session->set_flashdata('message_name', $responseMessage);
                redirect('alerts');
            }else{
                $responseMessage = $this->set_showStatusMessage('messageError' , 'Failed','Alert Not Not Found.',4000);
                $this->session->set_flashdata('message_name', $responseMessage);
                redirect('alerts');
            }
    }
    public function alerts_view($value='')
    {
        $this->data['user']['sort'] = $this->sort;
        
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $this->data['user']['currentDate'] = $this->serverDateTime;
        $this->data['user']['currency'] = $this->auctions->getAllCurrency();
        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
        $auctionType = $currentMode == 'buy' ? 'sell' : 'buy';



        //$auctions = $this->auctions->getSearchResult($columns,$where,$like);

      
        //$this->data['user']['auctions'] = $auctions;

        $this->data['user']['content_view'] = "$this->modulePath/auction_alert_v";
        // echo "<pre>";
        // print_r($this->data['user']);
        // exit();
        // $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
        //     $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
        //     $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
            $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
            $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        $this->template->setup_template($this->data['user']);
    }
    public function getFilteredProducts()
    {
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";

        $this->data['user']['currentDate'] = $this->serverDateTime;


        $sort = $this->input->get('sort');
        $postType = $this->input->get('type');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $currency = $this->input->get('currency');
       


        if ($currency != '') {
        $currency = explode(',', $currency);
        }

        $limit = [
            //             20 * 2 - 1
            'start' => $pageSize*($pageNumber-1),
            'offset' => $pageSize
        ];


        $currentMode = $this->getBaseMode();
        //print_r($currentMode); exit();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';
    
        $auctions = $this->alertsModel->getAuctionAlerts($this->sort[$sort-1],$currency,$postType,$limit,$this->loggedInUser['id']);

        $auctionCount = $this->alertsModel->getAuctionAlertsCount($currency,$postType,$limit,$this->loggedInUser['id']);
        // echo "<pre>";
        // print_r($auctions);
        // echo "<pre>";
        // print_r($auctionCount);
        // die;

        if (!empty($auctions) && (is_array($auctions) && count($auctions) > 0)) {


            $this->data['user']['auctions'] = $auctions;
            $this->data['user']['content_view'] = "$this->modulePath/auction_alert_v_filtered";

            $this->response['data'] = $auctions;
            $this->response['totalNumber'] = $auctionCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Products Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/auction_alert_v_filtered", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
             $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
             $this->response['html'] = "<h4>No Auctions Alert Found</h4>";
             echo json_encode($this->response);
             

            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }

}