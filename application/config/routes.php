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

$route['default_controller'] = 'admin/Home/login';

$route['admin/login'] = 'admin/Home/login';
$route['admin/dashboard'] = 'admin/Home/dashboard';

$route['admin/company'] = 'admin/Company/index';
$route['admin/company/add'] = 'admin/Company/add';
$route['admin/company/edit/(:num)'] = 'admin/Company/edit/$1';
$route['admin/company/delete/(:num)'] = 'admin/Company/delete/$1';


$route['admin/department'] = 'admin/Department/index';
$route['admin/department/add'] = 'admin/Department/add';
$route['admin/department/edit/(:num)'] = 'admin/Department/edit/$1';
$route['admin/department/delete/(:num)'] = 'admin/Department/delete/$1';

$route['admin/employee'] = 'admin/Employee/index';
$route['admin/employee/add'] = 'admin/Employee/add';
$route['admin/employee/edit/(:num)'] = 'admin/Employee/edit/$1';
$route['admin/employee/delete/(:num)'] = 'admin/Employee/delete/$1';

// API
$route['admin/api/company'] = 'api/Company/index';
$route['admin/api/company/(:num)'] = 'api/Company/index/$1';
$route['admin/api/company/add'] = 'api/Company/add';
$route['admin/api/company/edit/(:num)'] = 'api/Company/edit/$1';
$route['admin/api/company/post'] = 'api/Company/post';
$route['admin/api/company/delete/(:num)'] = 'api/Company/delete/$1';
$route['admin/api/company/department/(:num)'] = 'api/Company/department/$1';

$route['admin/api/department'] = 'api/Department/index';
$route['admin/api/department/(:num)'] = 'api/Department/index/$1';
$route['admin/api/department/add'] = 'api/Department/add';
$route['admin/api/department/edit/(:num)'] = 'api/Department/edit/$1';
$route['admin/api/department/post'] = 'api/Department/post';
$route['admin/api/department/delete/(:num)'] = 'api/Department/delete/$1';

$route['admin/api/employee'] = 'api/Employee/index';
$route['admin/api/employee/(:num)'] = 'api/Employee/index/$1';
$route['admin/api/employee/add'] = 'api/Employee/add';
$route['admin/api/employee/edit/(:num)'] = 'api/Employee/edit/$1';
$route['admin/api/employee/post'] = 'api/Employee/post';
$route['admin/api/employee/delete/(:num)'] = 'api/Employee/delete/$1';

$route['admin/logout'] = 'admin/Home/logout';

$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;
