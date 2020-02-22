<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$route['default_controller'] = 'index';
$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;

$route['trang-chu'] = 'index/index';
$route['nganh-hoc/(:num)'] = 'admin/group/show/$1';
$route['chuyen-nganh/(:num)'] = 'admin/major/show/$1';
$route['bai-viet/(:num)'] = 'admin/news/detail/$1';
$route['lien-he'] = 'index/contact';


