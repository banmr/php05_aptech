<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form

	$errors = array(); // tao 1 mãng để bỏ những lổi xãy ra vào đây (tránh tình trạng có lổi vẩn chèn vào csdl)

	if(empty($_POST['post_name'])) {
		$errors[] = "errors posts";
	} else {
		$posts_name = escape_strip_tags($dbc, $_POST['post_name']);
	}

	if(isset($_POST['post_cat']) && filter_var($_POST['post_cat'], FILTER_VALIDATE_INT,  array('min_rande' => 1))) {
		$posts_cat = $_POST['post_cat'];
	} else {
		$errors[] = "errors post cat";
	}

	if(isset($_POST['position']) && filter_var($_POST['position'], FILTER_VALIDATE_INT,  array('min_rande' => 1))) {
		$position = $_POST['position'];
	} else {
		$errors[] = "errors post position";
	}

	if(empty($_POST['post_content'])) {
		$errors[] = "errors posts content";
	} else {
		$posts_content =  mysqli_real_escape_string($dbc, $_POST['post_content']);
	}


    if($_FILES['thumb_post']['name'] != NULL){ // Đã chọn file
        // Tiến hành code upload file
        if($_FILES['thumb_post']['type'] == "image/png"
        || $_FILES['thumb_post']['type'] == "image/jpeg"
        || $_FILES['thumb_post']['type'] == "image/gif"){
        // là file ảnh
        // Tiến hành code upload    
            if($_FILES['thumb_post']['size'] > 1048576){
                $errors[] =  "Files no larger than 1mb";
            }else{
                // file hợp lệ, tiến hành upload
                $path = "webroot/upload/"; // file sẽ lưu vào thư mục upload
                $target_file = $path . basename($_FILES["thumb_post"]["name"]);

                $tmp_name = $_FILES['thumb_post']['tmp_name'];
                $name = $_FILES['thumb_post']['name'];
                $type = $_FILES['thumb_post']['type']; 
                $size = $_FILES['thumb_post']['size']; 
                // Upload file
                move_uploaded_file($tmp_name,$path.$name);

           }
        }else{
           // không phải file ảnh
           $errors[] =  "File type not valid";
        }
   }else{
        $errors[] = "Please select the file";
   }


	// Kiểm tra, xữ lý và khai báo biến $_POST
	
	if(empty($errors)){ // Kiểm tra nếu không có lổi xãy ra thì chèn vào csdl
		$now = strtotime("now");

		$q = "INSERT INTO posts (title, content, image, post_category_id, user_id, position, created) VALUES ('{$posts_name}', '{$posts_content}', '$target_file', {$posts_cat}, 1 , $position, $now)";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

		if(mysqli_affected_rows($dbc) == 1){
			$messages = "<div class='alert alert-success'><strong>Well done!</strong> The post added successfully.</div>" ;
		} else {
			$messages = "<div class='alert alert-error'><strong>Error!</strong> could not added to the database due to a system error.</div>" ;
		}
	} else {
		$messages =  "<div class='alert alert-error'><strong>Error!</strong> please fill all the required fields.</div>" ;

	}
	
} // END main if submit condition



//load view
require('backend/views/posts/add.php');