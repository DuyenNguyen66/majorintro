<?php
defined('BASEPATH') OR exit('No direct script access allowed');

//Admin
$route['dashboard-a'] = 'index/index';
$route['login'] = 'index/login';
$route['logout'] = 'index/logout';
$route['register'] = 'index/register';

$route['add-editor'] = 'editor/add';
$route['list-editor'] = 'editor/getList';
$route['list-news-a'] = 'news/getNews';
$route['add-group'] = 'group/add';
$route['list-group'] = 'group/index';
$route['add-major'] = 'major/add';
$route['list-major'] = 'major/index';

//Editor
$route['dashboard-e'] = 'editor/index';
$route['add-news'] = 'news/add';
$route['list-news'] = 'news/index';
$route['account'] = 'editor/getAccount';
