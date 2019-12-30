<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Admin
$route['dashboard-a'] = 'index/index';
$route['login'] = 'index/login';
$route['logout'] = 'index/logout';
$route['register'] = 'index/register';

$route['building'] = 'building/index';
$route['room'] = 'room/index';

$route['manager'] = 'index/getManagersList';
$route['report'] = 'report/index';
$route['report-m'] = 'report/getReports';

$route['student'] = 'student/index';
$route['profile/(:num)'] = 'student/profile/$1';

$route['form'] = 'register/index';

$route['electricity-price'] = 'price/index';
$route['water-price'] = 'price/waterPrice';
$route['room-price'] = 'price/roomPrice';

//Manager
$route['dashboard-m'] = 'index/indexManager';
$route['room-m'] = 'room/roomManager';
$route['electricity-bill'] = 'bill/elecBill';
$route['water-bill'] = 'bill/waterBill';
$route['room-bill'] = 'bill/roomBill';