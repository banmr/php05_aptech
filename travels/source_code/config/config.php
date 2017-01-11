<?php
/** setting **/
define('BASEURL' , 'http://127.0.0.1/php05_aptech/travels/source_code/');
define('BASEPATH', dirname(__FILE__) . '/');

/** kết nối MySQL **/
$db = mysql_connect('127.0.0.1', 'root', '') or die('Could not connect to Server');
mysql_select_db('shop_travels') or die('Could not connect to Database');
mysql_set_charset('utf-8');