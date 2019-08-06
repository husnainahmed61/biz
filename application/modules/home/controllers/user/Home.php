<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by PhpStorm.
 * User: Daniyal Nasir
 * Date: 23-Jan-18
 * Time: 11:22 PM
 */
class Home extends User_Controller
{
    private $response = [];
    private $moduleName;
    private $loggedInUser;

    /**
     * Home constructor.
     */
    public function __construct()
    {
        parent::__construct();
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->moduleName = 'home';
        $this->modulePath = "$this->moduleName/$this->userName";
        $this->data['user']['pageHeader'] = 'home';
        /*$this->data['admin']['pageDescription'] = 'Dress Categories description';*/

        /*$this->load->model('Categories_m', 'catM', TRUE);*/
        
        $this->loggedInUser = $this->get_logged_in_user(); //UZair
        $this->data['user']['head']['pageLevelPlugins']['css'] = [];
        $this->data['user']['foot']['pageLevelPlugins']['js'] = [];
        $this->data['user']['page_js'] = "$this->modulePath/custom-js";
    }


    public function index()
    {
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url')."images/auctions/";
        $this->data['user']['base_resources_url_slider'] = $this->config->item('base_resources_url')."slider/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->data['user']['currentDate'] = $this->serverDateTime;
        $this->data['user']['cookies'] = $this->input->cookie();

        $currentMode = $this->getBaseMode();
        $currentMode = !empty($currentMode) ? $currentMode : 'buy';

        /*Reversing for getting other type of posts*/
        $type = $currentMode == 'buy' ? 'sell' : 'buy';

        $start = 0;
        $end = 9;


        $this->data['user']['paidAuctioneer'] = $this->merchants->userDetailsM->getPaidUsers();
        $this->data['user']['foot']['total_products'] = $this->merchants->userDetailsM->getTotalProducts();
        $this->data['user']['foot']['Individual'] = $this->merchants->userDetailsM->getIndividualMembers();
        $this->data['user']['foot']['Business'] = $this->merchants->userDetailsM->getBusinessMembers();
        $countAllAuctions = $this->auctions->countByTypeWithExpireValid($type);
//        echo $countAllAuctions; die;

        if ($countAllAuctions <= 10) {
            $displayNone = 'display: none;';
            $this->data['user']['displayNone'] = $displayNone;
        }

        //$this->data['user']['auctions'] = $auctions;
        $this->data['user']['content_view'] = "$this->modulePath/show_v";

        $this->setupHeader1();
        $this->setupNav();
        $this->header_notification();
        $this->quick_menu();
        //echo"<pre>"; print_r($this->data['user']);die;
        $this->template->setup_template($this->data['user']);
    }

    public function getMoreAuctions()
    {
        $user = $this->get_logged_in_user();
        $this->data['user']['base_resources_url'] = $this->config->item('base_resources_url') . "images/auctions/";
        $this->data['user']['base_resources_url_user'] = $this->config->item('base_resources_url') . "users/profile_picture/";
        $this->data['user']['currentDate'] = $this->serverDateTime;
        //$this->data['user']['cookies'] = $this->input->cookie();


//        print_r($this->input->get());
        $pageSize = 12;
        //$currentMode = $this->getBaseMode();
        //$currentMode = !empty($currentMode) ? $currentMode : 'buy';

        /*Reversing for getting other mode of posts*/
        //$mode = $currentMode == 'buy' ? 'sell' : 'buy';

        $draw = $this->input->get('draw');
        $mode = $this->input->get('mode');
        $type = $this->input->get('type');

        $limit = [
            // 20 * 2 - 1
            'start' => $pageSize * ($draw - 1),
            'offset' => $pageSize
        ];
        if ($type == "following") {
            
            if (isset($user['id'])) {
                $UserFollowing = $this->auctions->getUserFollowing($user['id']);
                foreach ($UserFollowing as $key => $id) {
                    $ids[] = $id['following_id'];
                }
                if (isset($ids) && !empty($ids)) {
                    $UserFollowing = $ids;
                }
                else{
                    $UserFollowing = "";
                }
                

                $auctions = $this->auctions->getLimitedByTypeFollwing($mode, $limit['start'], $limit['offset'],$type,$user['id']);
                // echo "<pre>";
                // print_r($auctions);
                // exit();
                //$totalNum = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
                $this->data['user']['auctions'] = $auctions;
                $this->data['user']['content_view'] = "$this->modulePath/show_v";

                $this->response['totalNumber'] = $this->auctions->countByTypeWithExpireValidAndTypeFollowing($mode,$type,$UserFollowing);
                $this->response['pageSize'] = $pageSize;
                $this->response['html'] = $this->load->view("$this->modulePath/show_v_add_more_following", $this->data['user'], TRUE);
            }
            else{
                $this->data['user']['content_view'] = "$this->modulePath/show_v";
                $this->response['html'] = $this->load->view("$this->modulePath/show_v_followinig_access", $this->data['user'], TRUE);
            }
        }
        elseif ($type == "nearest") {
            if (isset($user['id'])) {
                $auctions = $this->auctions->getLimitedByType($mode, $limit['start'], $limit['offset'],$type);

                $totalNum = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
                $this->data['user']['auctions'] = $auctions;
                $this->data['user']['content_view'] = "$this->modulePath/show_v";

                $this->response['totalNumber'] = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
                $this->response['pageSize'] = $pageSize;
                $this->response['html'] = $this->load->view("$this->modulePath/show_v_add_more", $this->data['user'], TRUE);
            }
            else{
                $la = get_cookie("glo_lat");
                $lo = get_cookie("glo_long");
                
                if (isset($la) && isset($lo)) {
                    $getCityId = $this->CityIdByLatLong($la,$lo);
                    if (is_numeric($getCityId)) {
                        $auctions = $this->auctions->getLimitedByTypeCityId($mode, $limit['start'], $limit['offset'],$type,$getCityId);
                    }
                    else{
                        $auctions = '';
                    }

                    $totalNum = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
                    $this->data['user']['auctions'] = $auctions;
                    $this->data['user']['content_view'] = "$this->modulePath/show_v";
                    $this->response['totalNumber'] = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
                    $this->response['pageSize'] = $pageSize;
                    $this->response['html'] = $this->load->view("$this->modulePath/show_v_add_more", $this->data['user'], TRUE);
                }
                else{
                $this->data['user']['auctions'] = '';
                $this->data['user']['content_view'] = "$this->modulePath/show_v";

                $this->response['totalNumber'] = 0;
                $this->response['pageSize'] = $pageSize;
                $this->response['html'] = $this->load->view("$this->modulePath/show_v_location_access", $this->data['user'], TRUE);
                }                

            }
        }
        else{
            $auctions = $this->auctions->getLimitedByType($mode, $limit['start'], $limit['offset'],$type);

            $totalNum = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
            $this->data['user']['auctions'] = $auctions;
            $this->data['user']['content_view'] = "$this->modulePath/show_v";

            $this->response['totalNumber'] = $this->auctions->countByTypeWithExpireValidAndType($mode,$type);
            $this->response['pageSize'] = $pageSize;
            $this->response['html'] = $this->load->view("$this->modulePath/show_v_add_more", $this->data['user'], TRUE);
        }

        

        // echo "<pre>";
        // print_r($totalNum );
        // print_r($auctions );
        // exit();

        

        echo json_encode($this->response);
    }
    public function CityIdByLatLong($lat='',$long='')
    {
        $location  = file_get_contents("http://open.mapquestapi.com/geocoding/v1/reverse?key=4q1UQMEMFK7phXgZm45OvTyCQzG6mvGG&location=".$lat.",".$long."&includeRoadMetadata=false&includeNearestIntersection=false");
        $location = json_decode($location ,true);
        $location = $location['results'][0]['locations'][0]['adminArea5'];
        if (isset($location) && !empty($location)) {
            $city_id = $this->merchants->userDetailsM->getCityIdByName($location);
            if (is_numeric($city_id)) {
                return $city_id;
            }
            else{
                return false;
            }
        }
    }

    public function Search($value='')
    {
        $q = $this->input->get('q');

        //$items = $this->db->query("SELECT * FROM ssx_auctions where name Like %".$q."%")->result_array();
        $this->db->select("*");
        $this->db->from("ssx_auctions");
        $this->db->like('name', $q);
        $items = $this->db->get();
        $items = $items->result_array();

        $arrayName = array(
            'items' =>$items,
            'html_url' => $items[0]["slug"]."/auction"  );
        echo json_encode($arrayName);
    }
}