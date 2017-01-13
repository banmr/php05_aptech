<?php
/** setting **/
// define('BASEURL' , 'http://127.0.0.1/php05_aptech/my_travels/source_code/');
// define('BASEPATH', dirname(__FILE__) . '/');

/** kết nối MySQL **/
$dbc = mysqli_connect('127.0.0.1', 'root', '', 'bt1');

// nếu kết nối không thành công thì báo lỗi
if(!$dbc){
	trigger_error("Could not connect to DB:" . mysqli_connect_error());
} else {
	// đặt phương thức kết nối utg8
	mysqli_set_charset($dbc, 'utf-8');
}