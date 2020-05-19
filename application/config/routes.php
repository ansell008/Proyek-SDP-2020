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
$route['default_controller'] = 'IndexController';

$route['register'] = 'AuthUser/register';
$route['login'] = 'AuthUser/login';
$route['verify/(:any)'] = 'AuthUser/verify/$1';
$route['verifyP/(:any)'] = 'AuthUser/verifyP/$1';

$route['user/profile'] = 'user/UserController/loadProfile';
$route['user/changePassword'] = 'user/UserController/changePass';
$route['user/updateProfile'] = 'user/UserController/updateProfile';
$route['user/dash'] = 'user/UserController/showDash';
$route['user/projects'] = 'user/UserController/showProject';
$route['user/myprojects'] = 'user/UserController/myProject';
$route['user/loadProject'] = 'user/UserController/loadProjects';
$route['user/detailProject/(:any)'] = 'user/UserController/detailProject/$1';
$route['user/searchProject'] = 'user/UserController/searchProject';
$route['user/searchByCategory'] = 'user/UserController/searchCat';
$route['user/searchFilterCategory'] = 'user/UserController/searchByCat';
$route['user/takeProject'] = 'user/UserController/takeProject';
$route['user/MySubProject/(:any)'] = 'user/UserController/showMySubProject/$1';
$route['user/myprojectdetail'] = 'user/UserController/myProjectDetail';

$route['admin'] = 'admin/AuthAdmin';
$route['admin/authAdmin'] = 'admin/AuthAdmin/adminView';
$route['admin/dash'] = 'admin/AuthAdmin/loadViewAdmin/landing';
$route['admin/userListing'] = 'admin/UserListing/loadFreelance';
$route['admin/companyListing'] = 'admin/UserListing/loadCompany';
$route['admin/ratings'] = 'admin/RatingController';
$route['admin/skills'] = 'admin/SkillAdmin';

$route['company/dashComp'] = 'company/Company';
$route['company/project'] = 'company/Company/projectsCompany';
$route['company/payProject'] = 'payment/PaymentController';
$route['company/transaction'] = 'company/Company/loadTransaction';
$route['company/proceedTransaction/(:any)'] = 'company/Company/proceedTransaction/$1';
$route['company/getTransactionDetail/(:any)'] = 'company/Company/getTransactionDetail/$1';
$route['company/summary'] = 'company/Company/showSummary';
$route['company/getSummary'] = 'company/Company/getSummary';
$route['company/myprofile'] = 'company/Company/profileCompany';
$route['company/myprojects'] = 'company/Company/projectsCompany';
$route['company/detailproject'] = 'company/Company/projectsDetail';

$route['payment/getTransDetail'] = 'payment/PaymentController/getTransDetail';
$route['payment/refreshStatus'] = 'payment/PaymentController/process';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
