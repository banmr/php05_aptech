<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form

	$errors = array(); // tao 1 mãng để bỏ những lổi xãy ra vào đây (tránh tình trạng có lổi vẩn chèn vào csdl)

	if(empty($_POST['post_categories'])) {
		$errors[] = "errors post category";
	} else {
		$cat_post_name = mysqli_real_escape_string($dbc, strip_tags($_POST['post_categories']));
	}
	if(isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT,  array('min_rande' => 1))) {
		$position= $_POST['position'];
	} else {
		$errors[] = "errors post position";
	}


	if(empty($errors)){ // Kiểm tra nếu không có lổi xãy ra thì chèn vào csdl
		$q = "INSERT INTO post_categories (users_id, name, position) VALUES (1, '{$cat_post_name}', '$position')";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

		if(mysqli_affected_rows($dbc) == 1){
			$messages = "<div class='alert alert-success'><strong>Well done!</strong> The category post added successfully.</div>" ;
		} else {
			$messages = "<div class='alert alert-error'><strong>Error!</strong> could not added to the database due to a system error.</div>" ;
		}
	} else {
		$messages =  "<div class='alert alert-error'><strong>Error!</strong> please fill all the required fields.</div>" ;

	}
	
} // END main if submit condition


//load view
require('backend/views/post_categories/add.php');