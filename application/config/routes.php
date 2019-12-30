<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['dashboard'] = 'index/index';
$route['login'] = 'index/login';
$route['logout'] = 'index/logout';
$route['register'] = 'index/register';
$route['profile/(:num)'] = 'index/editProfile/$1';

$route['registration'] = 'register/index';
$route['register-list'] = 'register/registerList';
$route['roommate-list'] = 'register/roommateList';

$route['e-bill'] = 'bill/elecBill';
$route['w-bill'] = 'bill/waterBill';
$route['r-bill'] = 'bill/roomBill';
