<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Created by PhpStorm.
 * User: Uzair
 * Date: 7/6/201
 * Time: 1:53 AM */
class Bids extends User_Controller
{
    private $response = [];
    private $moduleName;
    private $loggedInUser; // Uzair
    private $auction_id;
    function __construct()    {        parent::__construct();        $this->moduleName = 'bids';        $this->modulePath = "$this->moduleName/$this->userName";        $this->load->model('Bids_m','bm', TRUE);        $this->loggedInUser = $this->get_logged_in_user();
    //UZair
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->data['user']['foot']['pageLevelPlugins']['js'] = ['pagination'];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
        $this->setupNav();    
        $this->sort = [
            [
                'text' => 'Bids ( New - Old)',
                'colName' => 'ssxb.created_at',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Bids ( Old - New)',
                'colName' => 'ssxb.created_at',
                'direction' => 'DESC'
            ],
            [
                'text' => 'Price (Low > High)',
                'colName' => 'ssxb.amount',
                'direction' => 'ASC'
            ],
            [
                'text' => 'Price (High > Low)',
                'colName' => 'ssxb.amount',
                'direction' => 'DESC'
            ]
        ];

    }

    public function index()
    {
        if ($this->check_user_authentication('', 'home')) {
            $userId = $this->loggedInUser['id'];
            $this->renderByUserId($userId);
            $this->data['user']['sort'] = $this->sort;
            $this->data['user']['currency'] = $this->auctions->getAllCurrency();
            $this->data['user']['content_view'] = "$this->modulePath/private_bids_v";
            $this->setupNav();
            $this->setupHeader1();
            $this->header_notification();
            $this->quick_menu();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    

    public function show()
    {
    }

    private function validateFields()
    {
        $rules = $this->bm->rules['insert'];
        $this->form_validation->set_rules($rules);
        return $this->form_validation->run();
    } 

    public function store()
    {

        if ($this->validateFields()) {
            $currentDate = $this->serverDateTime;
            $auctionId = $this->my_encrypt->decode($this->input->post('id'));
            $auctionAmount = $this->input->post('amount');
            $expireAt = $this->serverDateTime;
            $auctionDetail = $this->auctions->getDetailsById($auctionId);

            $loggedUser = $this->get_logged_in_user();
            $loggedUserType = $loggedUser['type'];
//            echo $auctionDetail['current_price']." < ".$auctionAmount;            die;

            if($auctionDetail['bidder_type'] == $loggedUserType || $auctionDetail['bidder_type'] == 'all')
            {
                if ($this->auctions->hasRange($auctionId)) {
                    $getRange = $this->auctions->getRange($auctionId);
                    $startPrice = $getRange['start_price'];
                    $endPrice = $getRange['end_price'];
                    if ($auctionAmount >= $startPrice && $auctionAmount <= $endPrice) {
                        $this->bidSubmission($auctionId, $auctionDetail);
//                        echo "Bid Submit"; die;
                        //Modify by Uzair
                    } else {
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "500";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "The Amount will be entered between " . $startPrice . " - " . $endPrice;
                    }
                }
                else if ($auctionDetail['bid_type'] == 'incremental') {
                    if ($auctionDetail['current_price'] < $auctionAmount) {
                         $this->bidSubmission($auctionId, $auctionDetail);
//                        echo "Bid Submit"; die;
                    } else {
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "500";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Bid needs to be greater than " . $auctionDetail['current_price'];
                    }
                }
                else {
                    if (/*$expireAt == $currentDate*/ 1) {
                        if ($this->check_user_authentication('', '')) {
                             $this->bidSubmission($auctionId, $auctionDetail);    //Modify by Uzair
//                            echo "Bid Submit"; die;
                        } else {
                            $this->response['status'] = FALSE;
                            $this->response['code'] = "401";
                            $this->response['title'] = "Failed";
                            $this->response['message'] = "You are not login. Please Login";
                        }
                    } else {
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "500";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Invalid Expire Date";
                    }
                }

            }
            else{
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "This auction can't be bid by a user of type $loggedUserType";
            }



        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "400";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Invalid input fields";
            $this->response['error_array'] = array_values($this->form_validation->error_array());
        }
        $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
        echo json_encode($this->response);
    }

    public function create()
    {
        $data = ['name' => 'Homeware, Furnishings & Decoration',];
        $data['slug'] = $this->createSlug($data['name']);
        //$this->cat1Model->insert($data);
    }    /*UZair work starts*/

    public function getBiddenAuction($auctionId, $columns)
    {
        return $this->bm->fields($columns)->get(array('auction_id' => $auctionId, 'user_id' => $this->loggedInUser['id']));
    }

    public function bidSubmission($auctionId, $auctionDetail)
    {
        if ($this->getBiddenAuction($auctionId, 'id')) {
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Already";
            $this->response['message'] = "Bid Submitted";
        } else {
            $this->auctions->auctionsModel->get_all(['id' => $auctionId]);
            $auctionCode = $auctionDetail['code'];
            $lastBid = $this->getLastId($auctionId);
            
            //echo "<pre>"; var_dump($lastBid); exit();
            
            if ($lastBid == FALSE) {
                $lastId = '0';                
            }
            else{
                $lastId = explode('-', $lastBid[0]['code']);    
            }
             
            //echo "<pre>"; print_r($lastId); exit();
            
            $startPoint = '0000';
            if (isset($lastId[2]) && !empty($lastId[2])) {
                $endPoint = $lastId[2] + 1;
            }
            else{
                $endPoint = $lastId + 1;    
            }
            
            $startPointLength = strlen($startPoint);
            $endPointLength = strlen($endPoint);
            // $series = '';
            // $series = $endPoint;
            // $code = $auctionCode . '-' . $series;
            // echo "<pre>";
            // print_r($code); 
            //print_r($startPointLength);
            //print_r($endPointLength);  
            //exit();
            $series = '';
            for ($i = $endPointLength; $i < $startPointLength; $i++): $series .= '0'; endfor;
            $series .= $endPoint;
            $code = $auctionCode . '-' . $series;

            //print_r($code);  exit();
            $this->bm->setFields($this->loggedInUser['id'], $auctionId, $auctionDetail, $code);
            if ($this->bm->submitBid() /*TRUE*/) {
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Bid Submitted";
            } else {
                $this->response['status'] = FALSE;
                $this->response['code'] = "500";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Something went wrong";
            }
        }
    }

    public function getRecentByAuctionId($auctionId)
    {
        return $this->bm->limit(10)->get_all(array('auction_id' => $auctionId));
    }

    public function getAllByAuctionId($auctionId)
    {
        return $this->bm->get_all(array('auction_id' => $auctionId));
    }

    public function getDetailsByAuctionId($bids)
    {
        if (isset($bids) && !empty($bids)): foreach ($bids AS $key1 => $bid): $bids[$key1]['bidder'] = NULL;
            $bidder = $this->merchants->getById($bid['user_id']);
            if (is_array($bidder)) : $bids[$key1]['bidder'] = $bidder; endif; endforeach; endif;
        return $bids;
    }

    public function getWithAuctionsByUserIdandType($bids, $type)
    {
        if (isset($bids) && !empty($bids)): foreach ($bids AS $key1 => $bid): $bids[$key1]['auction'] = NULL;
            $auctions = $this->auctions->getByIdandType($bid['auction_id'], $type);
            if (is_array($auctions)) : $bids[$key1]['auction'] = $auctions;
                foreach ($auctions AS $key2 => $auction): $bids[$key1]['auction'][$key2]['auctioneer'] = NULL;
                    $auctioneer = $this->merchants->getById($auction['user_id']);
                    if (is_array($auctioneer)) : $bids[$key1]['auction'][$key2]['auctioneer'] = $auctioneer; endif; endforeach; endif; endforeach; endif;
        return $bids;
    }

    public function getWithAuction($bids)
    {
        if (isset($bids) && !empty($bids)): foreach ($bids AS $key1 => $bid): $bids[$key1]['auction'] = NULL;
            $auctions = $this->auctions->getById($bid['auction_id']);
            if (is_array($auctions)) : $bids[$key1]['auction'] = $auctions;
                foreach ($auctions AS $key2 => $auction): $bids[$key1]['auction'][$key2]['auctioneer'] = NULL;
                    $bids[$key1]['auction'][$key2]['images'] = NULL;
                    $auctioneer = $this->merchants->getById($auction['user_id']);
                    if (is_array($auctioneer)) : $bids[$key1]['auction'][$key2]['auctioneer'] = $auctioneer; endif; endforeach; endif; endforeach; endif;
        return $bids;
    }

    public function getById($id)
    {
        return $this->bm->get(array('id' => $id));
    }

    public function renderByUserId($userId)
    {        //echo "userID: $userId";
        $this->data['user']['currentDate'] = $this->serverDateTime;
        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $sellingBids = $this->getByUserIdandType($userId, 'sell');
        $sellingAuctions = $this->getWithAuctionsByUserIdandType($sellingBids, 'buy');
        $buyingBids = $this->getByUserIdandType($userId, 'buy');
        $buyingAuctions = $this->getWithAuctionsByUserIdandType($buyingBids, 'sell');
        $this->data['user']['buyingAuctions'] = $buyingAuctions;
        $this->data['user']['sellingAuctions'] = $sellingAuctions;      /*  echo '<pre>';        print_r($sellingAuctions); die;*/
    }

    public function action($id)
    {
        $status = $this->input->post('status');
        if ($this->updateStatus($id, $status)) {
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Bid Cancel";
            $this->setupCancelEmail($id);
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "500";
            $this->response['title'] = "Failed";
            $this->response['message'] = "Something went wrong";
        }
        echo json_encode($this->response);
    }

    public function setupCancelEmail($id)
    {
        $bid = $this->getById($id);
        $auction = $this->auctions->getDetailsById($bid['auction_id']);
        $auctioneer = $this->merchants->getById($auction['user_id']);
        $auctioneerDetail = $this->merchants->getByUserId($auctioneer['id']);
        $bidder = $this->merchants->getById($bid['user_id']);
        $bidderDetail = $this->merchants->getByUserId($bidder['id']);
        $auctionUrl = base_url() . 'auction/' . $auction['slug'];
        $this->data['user']['bidderName'] = $bidder['first_name'] . ' ' . $bidder['last_name'];
        $this->data['user']['auctioneer'] = $auctioneer;
        $this->data['user']['auctioneerDetail'] = $auctioneerDetail;
        $this->data['user']['auctionUrl'] = $auctionUrl;
        $view = 'bid_cancel_email_v';
        $message = $this->load->view($this->modulePath . "/$view", $this->data['user'], TRUE);
        $subject = 'Bid Cancel- Vayzn';
        return $this->register->sendEmail($bidderDetail['email'], $subject, $message);
    }

    public function getByUserId($userId)
    {
        return $this->bm->get_all(array('user_id' => $userId));
    }

    public function getByAuctionIdandUserId($postId, $userId)
    {
        return $this->bm->get_all(array('auction_id' => $postId, 'user_id' => $userId));
    }

    public function getByUserIdandType($userId, $type)
    {
        return $this->bm->get_all(array('user_id' => $userId, 'type' => $type));
    }

    public function checkAnyAccept($id)
    {
        return $this->bm->get(array('id' => $id, 'status' => 'accept'));
    }

    public function updateStatus($id, $status)
    {
        $this->updateAuctionBidsCounter($id);
        return $this->bm->where('id', $id)->update(array('status' => $status));
    }

    public function bid($slug = NULL)
    {
        if ($this->check_user_authentication('', 'home')) {
            $userId = $this->loggedInUser['id'];
            $post = $this->auctions->getIdBySlug($slug);
            $postId = $post['id'];
            $this->renderDetails($postId, $userId);
            $this->data['user']['content_view'] = "$this->modulePath/private_bid_v";
            $this->setupHeader1();
            $this->setupNav();
            $this->template->setup_template($this->data['user']);
        }
    }

    public function renderDetails($auctionId, $userId)
    {
        $currentDate = $this->serverDateTime;
        $this->data['user']['currentDate'] = $currentDate;
        $this->data['user']['resources_path'] = $this->config->item('base_resources_url');
        $bid = $this->getByAuctionIdandUserId($auctionId, $userId);
        $auctions = $this->getWithAuction($bid);
        $auctionImages = $this->auctions->getImagesByPostID($auctionId);
        $this->data['user']['auction'] = $auctions;
        $this->data['user']['images'] = $auctionImages;
        if (($currentDate > $auctions[0]['expires_at']) || $auctions[0]['status'] != 'pending'): $this->data['user']['readonly'] = 'readonly';
            $this->data['user']['disabled'] = 'disabled'; endif;       /* echo '<pre>';        print_r($auctions); die;*/
    }

    public function edit()
    {
        if ($this->validateFields()) {
            $id = $this->my_encrypt->decode($this->input->post('id'));
            $auctionId = $this->my_encrypt->decode($this->input->post('auction_id'));
            $amount = $this->input->post('amount');
            $expiresAt = $this->input->post('expires_at');
            $description = $this->input->post('description');
            $updateArray = array('amount' => $amount, 'expires_at' => $expiresAt, 'description' => $description);
            if ($this->auctions->hasRange($auctionId)) {
                $getRange = $this->auctions->getRange($auctionId);
                $startPrice = $getRange['start_price'];
                $endPrice = $getRange['end_price'];
                if ($amount >= $startPrice && $amount <= $endPrice) {
                    if ($this->update($id, $updateArray)) {
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "Bid Update";
                    } else {
                        $this->response['status'] = FALSE;
                        $this->response['code'] = "500";
                        $this->response['title'] = "Failed";
                        $this->response['message'] = "Something went wrong";
                    }
                } else {
                    $this->response['status'] = FALSE;
                    $this->response['code'] = "500";
                    $this->response['title'] = "Failed";
                    $this->response['message'] = "The Amount will be entered between " . $startPrice . " - " . $endPrice;
                }
            } else {
                $this->response['status'] = FALSE;
                $this->response['code'] = "400";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Invalid input fields";
                $this->response['error_array'] = array_values($this->form_validation->error_array());
            }
            $this->response[$this->security->get_csrf_token_name()] = $this->security->get_csrf_hash();
            echo json_encode($this->response);
        }
    }

    public function update($id, $updateArray)
    {
        return $this->bm->where('id', $id)->update($updateArray);
    }

    public function getLastId($auctionId)
    {
        return $this->bm->getLastBidId($auctionId);
        //return $this->bm->fields('id')->order_by('id', 'DESC')->get();
    }

    public function updateAuctionBidsCounter($id)
    {
        $bid = $this->getById($id);
        return $this->auctions->decrementBidCounter($bid['auction_id']);
    }
        /*UZair work end*/

    public function biddetail(){

        $this->auction_id = $this->my_encrypt->decode($this->input->get('auction'));
//        printData($this->auction_id);
        if ($this->check_user_authentication('', 'home')) {
            $userId = $this->loggedInUser['id'];
            $this->renderByUserId($userId);
            if (!empty($this->auction_id)) {
                $bids_detail = $this->bm->bidDetailByAuctionId($this->auction_id );
//                 echo "<pre>";
//                 print_r($bids_detail);
//                 exit();
                
                $this->data['user']['sort'] = $this->sort;
                $this->data['user']['content_view'] = "$this->modulePath/private_bid_v";
                $this->data['user']['bids'] = $bids_detail;

            }
//            printDataDie($this->data['user']);
            
            $this->setupNav();
            $this->setupHeader1();
            $this->template->setup_private_template($this->data['user']);
        }
    }

    public function getFilteredProducts($value = '')
    {

        $id = $this->my_encrypt->decode($this->input->get('auction_id'));
        $sort = $this->input->get('sort');
        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');

        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];

        $bids = $this->bm->bidDetailByAuctionId($id, $this->sort[$sort - 1], $limit);

        $bidsCount = $this->bm->countBidsByAuctionId($id);
        // print_r($bids);
        // echo "<pre>";
        // print_r($bidsCount);
        // exit();

        if (!empty($bids) && is_array($bids) && count($bids) > 0) {


            $this->data['user']['bids'] = $bids;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/bids_sorted";

            $this->response['data'] = $bids;
            $this->response['totalNumber'] = $bidsCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Bids Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/bids_sorted", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
            $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
            $this->response['html'] = "<h4>No Bids.. Found</h4>";
            echo json_encode($this->response);


            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }

    public function accept_bid($value = '')
    {
        $bid_id = $value;

        if (!empty($bid_id)) {
            $userId = $this->loggedInUser['id'];

            $res = $this->bm->acceptBid($bid_id);

            if ($res === TRUE) {
                //echo "inserted";

                $getConvoId = $this->bm->checkConvoId($bid_id, $userId);

                if (is_numeric($getConvoId)) {
                    $result = $this->insertMessagebyConvo($getConvoId);
                    if ($result === TRUE) {
                        $this->response['data'] = "Added";
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "Bid Accepted";

                        echo json_encode($this->response);
                        exit();
                    }
                    //echo "insert message only";
                } else {
                    $result = $this->insertConvoAndMessage($getConvoId);
                    if ($result == TRUE) {
                        $this->response['data'] = "Added";
                        $this->response['status'] = TRUE;
                        $this->response['code'] = "100";
                        $this->response['title'] = "Successful";
                        $this->response['message'] = "Bid Accepted";

                        echo json_encode($this->response);
                        exit();
                    }

                    //echo "insert whole convo and message";
                }
                //print_r($getConvoId);
            } else {
                $this->response['data'] = "Failed";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Failed to Accept";

                echo json_encode($this->response);
            }
        } else {
            return;
        }
    }
    public function insertConvoAndMessage($getConvoId)
    {
        $user = $this->get_logged_in_user();
        $auction_id = $getConvoId['auction_id'];
        $auctioneer_id = $getConvoId['bidderId'];
        $message = "your bid has been accepted Successfully";
        $user_id = $user['id'];
        
        //$message = $this->test_input($message);
        

        if (!empty($auction_id) && !empty($auctioneer_id) && !empty($user_id) && !empty($message)) {
            $res = $this->bm->insertConvoAndMessage($auction_id,$auctioneer_id,$user_id,$message);

            if(is_int($res)){
                return TRUE;
            }
            else
            {
                return FALSE;
            }
        }
    }

    public function insertMessagebyConvo($getConvoId = '')
    {
        $convo_id = $getConvoId;
        //$auctioneer_id = $this->input->get("auctioneer_id");
        $sender_id = $this->loggedInUser['id'];
        $message = "Your Bid has been accepted Successfully";
        $res = $this->bm->insertMessagebyConvo($convo_id, $sender_id, $message);

        if (is_numeric($res)) {
            return TRUE;
        } else {
            return FALSE;
        }
    }

    public function cancel_bid($value = '')
    {
        $bid_id = $value;

        if (!empty($bid_id)) {

            $res = $this->bm->cancelBid($bid_id);

            if ($res === TRUE) {
                //echo "inserted";
                $this->setupCancelEmail($bid_id);
                $this->response['data'] = "Successful";
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Bid Declined";

                echo json_encode($this->response);

            } else {
                $this->response['data'] = "Failed";
                $this->response['status'] = FALSE;
                $this->response['code'] = "404";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Failed to Declined";

                echo json_encode($this->response);
            }
        } else {
            return;
        }

    }

    public function getFilteredBidsOfUser($value='')
    {

        $pageSize = $this->input->get('pageSize');
        $pageNumber = $this->input->get('pageNumber');
        $type = $this->input->get('type');
        $currency = $this->input->get('currency');
        $sort = $this->input->get('sort');

        $id = $this->loggedInUser['id'];

        $limit = [//             20 * 2 - 1
            'start' => $pageSize * ($pageNumber - 1), 'offset' => $pageSize];


        $bids = $this->bm->bidDetailByUserId($id,$type, $limit,$currency,$this->sort[$sort - 1]);
//        printDataDie($bids );

        $bidsCount = $this->bm->countBidsByUserId($id,$type,$currency);

//         echo "<pre>";
//         print_r($bids);
//         print_r($bidsCount);
//         exit();

        if (!empty($bids) && is_array($bids) && count($bids) > 0) {


            $this->data['user']['bids'] = $bids;
            // $this->data['user']['sellingAuctions'] = $sellingAuctions;

            $this->data['user']['content_view'] = "$this->modulePath/private_bids_sorted";

            $this->response['data'] = $bids;
            $this->response['totalNumber'] = $bidsCount[0]['count'];
            $this->response['status'] = TRUE;
            $this->response['code'] = "100";
            $this->response['title'] = "Successful";
            $this->response['message'] = "Bids Recieved";
            $this->response['html'] = $this->load->view("$this->modulePath/private_bids_sorted", $this->data['user'], TRUE);
            echo json_encode($this->response);

            // print_r($this->response);

        } else {
            $this->response['data'] = array();
            // $this->response['totalNumber'] = '0';
            // $this->response['status'] = FALSE;
            // $this->response['code'] = "400";
            // $this->response['title'] = "Faild";
            // $this->response['message'] = "Products Unavailable";
            $this->response['html'] = "<h4>No Bids Found</h4>";
            echo json_encode($this->response);


            //echo "No Auctions Found";
        }
        //$this->template->setup_template($this->data['user']);
    }


    public function delete_bid()
    {
        $id = $this->input->post('id');

        $bid = $this->bm->getById($id);

        if ($bid[0]['status'] != 'accepted') {
            if ($this->bm->deleteBid($id)) {
                $this->response['status'] = TRUE;
                $this->response['code'] = "100";
                $this->response['title'] = "Successful";
                $this->response['message'] = "Bid Deleted";
            } else {
                $this->response['status'] = FALSE;
                $this->response['code'] = "400";
                $this->response['title'] = "Failed";
                $this->response['message'] = "Bid Not Deleted";
            }
        } else {
            $this->response['status'] = FALSE;
            $this->response['code'] = "400";
            $this->response['title'] = "Failed";
            $this->response['message'] = "You can't delete an accepted bid.";
        }
        echo json_encode($this->response);
    }

    public function getBidInfo($value='')
    {
        $i =0;
        $bidsAmount = [];
        $id = $this->my_encrypt->decode($this->input->get('auction_id'));
        $bidsInfo = $this->bm->getByAuctionId($id);
        $bidsCount = $this->bm->getBidsCountById($id);

        foreach ($bidsInfo as $key => $bidValue) {
            $bidsAmount[$i] = $bidValue['amount'];
            $i++;
        }
        //$Amount = implode(', ', $bidsAmount);
            $this->response['bidsAmount'] = $bidsAmount;
            $this->response['Total_bids'] = $bidsCount;
            $this->response['title'] = "Success";
            $this->response['message'] = "here is graph data";
        //print_r($Amount);
        //exit();
       echo json_encode($this->response);
    }
}