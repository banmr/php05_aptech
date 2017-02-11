<?php
@ob_start();
@session_start();

require_once('config/config.php');
require_once('components/functions.php');
require_once('backend/models/model.php');

//xử lý request từ trình duyệt và gọi controller / action tương ứng
if(isset($_GET['controller'])) $controller = $_GET['controller'];
else $controller = 'index';

if(isset($_GET['action'])) $action = $_GET['action'];
else $action = 'index';

//kiểm tra đăng nhập
if(!isset($_SESSION['name'])) {
    $controller = 'index';
    $action = 'login';
}

//gan' bien admin
$admin = array();
if(isset($_SESSION['name'])) {
	$admin['name'] = $_SESSION['name'];
}


$file = 'backend/controllers/'.$controller.'/'.$action.'.php';
if (file_exists($file)) {
    require($file);
} else {
    show_404();
}

mysqli_close($dbc);
@ob_end_flush();