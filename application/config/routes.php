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
$route['default_controller'] = 'indexController';

$route['register'] = 'authUser/register';
$route['login'] = 'authUser/login';

$route['user/profile'] = 'user/userController/loadProfile';
$route['user/changePassword'] = 'user/userController/changePass';
$route['user/updateProfile'] = 'user/userController/updateProfile';


$route['admin'] = 'admin/authAdmin';
$route['admin/authAdmin'] = 'admin/authAdmin/adminView';
$route['admin/dash'] = 'admin/authAdmin/loadViewAdmin/landing';
$route['admin/userListing'] = 'admin/userListing/loadFreelance';
$route['admin/companyListing'] = 'admin/userListing/loadCompany';
$route['admin/ratings'] = 'admin/ratingController';
$route['admin/skills'] = 'admin/skillAdmin';


$route['sendEmail'] = 'sentMail/send';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
