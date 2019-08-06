<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/user_guide/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
/*route for sitemap*/
$route['sitemap\.xml'] = 'user/template/sitemap';
/*----end----*/

$route['migration'] = 'migration/index';

$route['rat'] = 'RatchetServer/index'; //ratchet server for websocket

$route['test/(:any)'] = 'test/$1';

/*inbox*/
$route['inbox'] = 'user/profile/Inbox';
/*end-inbox*/
// Notifications
$route['Notifications'] = 'user/profile/Notifications';
// end Notifications
// Notifications
$route['getNotifications'] = 'user/profile/getNotifications';
$route['message_attach'] = 'user/profile/message_attach';
// end Notifications
/*inbox*/
$route['web_worker/(:any)'] = 'user/profile/web_worker/$1';
/*end-inbox*/
/*Uzair work Starts*/
/* Private Profile, my posts and etc*/
$route['alerts/(:any)/(:any)'] = 'user/alerts/$1/$2';
$route['alerts/(:any)'] = 'user/alerts/$1';
$route['alerts'] = 'user/alerts';
$route['auction-alerts'] = 'user/alerts/alerts_view';

$route['bid/(:any)/(:any)'] = 'user/bids/bid/$1/$2';
$route['bid/(:any)'] = 'user/bids/bid/$1';

$route['bids/(:any)/(:any)'] = 'user/bids/$1/$2';;
$route['bids/(:any)'] = 'user/bids/$1';
$route['bids|bid'] = 'user/bids';


$route['auction/create'] = 'user/auctions/create'; /*required , otherwise auction create with fall into auction method*/
$route['auction/storeAuction'] = 'user/auctions/storeAuction'; /*required , otherwise auction storeAuction with fall into auction method*/

$route['auction/(:any)/(:any)'] = 'user/auctions/auction/$1/$2';
$route['auction/(:any)'] = 'user/auctions/auction/$1';

$route['auctions/(:any)/(:any)'] = 'user/auctions/$1/$2';
$route['auctions/(:any)'] = 'user/auctions/$1';
$route['auctions'] = 'user/auctions';
$route['My-favourites'] = 'user/auctions/my_favourites';

/*add to favourite*/ //Add_to_favourite
$route['Add_to_favourite/(:any)'] = 'user/auctions/Add_favourites/$1';
/*end add to favourite*/
/*add to folloe*/ //Add_to_favourite
$route['follow/(:any)'] = 'user/profile/follow/$1';
/*end add to follow*/
/*add to unfollow*/ //Add_to_favourite
$route['unfollow/(:any)'] = 'user/profile/unfollow/$1';
/*end add to unfollow*/

$route['profile/(:any)/(:any)'] = 'user/profile/$1/$2';
$route['profile/(:any)'] = 'user/profile/$1';
$route['profile'] = 'user/profile';
$route['(:any)/user'] = 'user/merchant/show/$1';
$route['(:any)/buying_posts'] = 'user/merchant/buying_posts/$1';
$route['(:any)/selling_posts'] = 'user/merchant/selling_posts/$1';
$route['(:any)/followers'] = 'user/merchant/followers/$1';
$route['(:any)/following'] = 'user/merchant/following/$1';

$route['password/(:any)/(:any)'] = 'user/password/$1/$2';
$route['password/(:any)'] = 'user/password/$1';
$route['password'] = 'user/password';

/*Merchant*/

/*Thank You Page*/
$route['thank-you'] = 'user/register/thankYou';
/*Thank You Page*/
/*Uzair work ends*/


$route['sign-up/(:any)/(:any)'] = 'user/register/$1/$2';
$route['sign-up/(:any)'] = 'user/register/$1';
$route['sign-up'] = 'user/register';
$route['login/(:any)'] = 'login/$1';




/* Slug Handler mobile-tablet/category1 */
$route['(:any)/(category1|category2|category3|auction|merchant)'] = 'user/$2/show/$1';


$route['(:any)/(:any)/(:any)/(:any)'] = 'user/$1/$2/$3/$4';
$route['(:any)/(:any)/(:any)'] = 'user/$1/$2/$3';
$route['(:any)/(:any)'] = 'user/$1/$2';
$route['(:any)'] = 'user/$1';


$route['(:any)'] = 'user/$1';


$route['default_controller'] = 'user/index';

$route['404_override'] = '';

$route['translate_uri_dashes'] = FALSE;

