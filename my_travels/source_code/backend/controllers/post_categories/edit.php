<?php
//xác nhân get có tồn tại hay không và get thuộc loại dử liệu là số lớn hơn hoăc bằng 1

if(isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_rande' => 1))){
	$cid = $_GET['cid'];
} else {
	show_404();
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form

	$errors = array(); // tao 1 mãng để bỏ những lổi xãy ra vào đây (tránh tình trạng có lổi vẩn chèn vào csdl)

	if(empty($_POST['post_categories'])) {
		$errors[] = "errors post category";
	} else {
		$cat_post_name = mysqli_real_escape_string($dbc, strip_tags($_POST['post_categories']));
	}
	if(isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT,  array('min_rande' => 1))) {
		$position = $_POST['position'];
	} else {
		$errors[] = "errors post position";
	}


	if(empty($errors)){ // Kiểm tra nếu không có lổi xãy ra thì chèn vào csdl
		$q = "UPDATE post_categories SET name = '{$cat_post_name}', position = {$position}, modified = NOW() WHERE id = {$cid} LIMIT 1";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

		if(mysqli_affected_rows($dbc) == 1){
			$messages = "<div class='alert alert-success'><strong>Well done!</strong> The category post edit successfully.</div>" ;
		} else {
			$messages = "<div class='alert alert-error'><strong>Error!</strong> could not edit to the database due to a system error.</div>" ;
		}
	} else {
		$messages =  "<div class='alert alert-error'><strong>Error!</strong> please fill all the required fields.</div>" ;

	}
	
} // END main if submit condition


//load view
require('backend/views/post_categories/edit.php');