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
$route['default_controller'] = 'welcome';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['lang/language/(:any)'] = $route['default_controller'].'/lang/language/$1';

$route['login'] = $route['default_controller'].'/login';
$route['login/(:any)'] = $route['default_controller'].'/login';
$route['login/(:any)/(:any)'] = $route['default_controller'].'/login/$1';
$route['logout'] = $route['default_controller'].'/logout';

$route['pages/(:any)'] = 'users/user/$1';
$route['pages/(:any)/(:any)'] = 'users/user/$1/$2';

$route['front/(:any)'] = 'users/front/$1';
$route['front/(:any)/(:any)'] = 'users/front/$1/$2';

$route['files/(:any)'] = 'users/files/$1';
$route['files/(:any)/(:any)'] = 'users/files/$1/$2';

$route['public/(:any)'] = 'pub/index/$1';
$route['public/(:any)/(:any)'] = 'pub/index/$1/$2';
$route['u'] = 'pub/index/$1';
$route['u/(:any)'] = 'pub/index/$1';
$route['u/(:any)/(:any)'] = 'pub/index/$1/$2';

$route['f'] = 'users/file/$1';
$route['f/(:any)'] = 'users/file/$1';
$route['f/(:any)/(:any)'] = 'users/file/$1/$2';


//$route['cmd'] = $route['default_controller'].'/cmd';
//$route['cmd/(:any)'] = $route['default_controller'].'/cmd/$1';

//$route['users'] = '/users/index';
//$route['users/(:any)'] = '/users/$1';

