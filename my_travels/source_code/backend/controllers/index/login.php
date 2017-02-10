<?php

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form
	$errors = array(); // tao 1 mãng để bỏ những lổi xãy ra vào đây (tránh tình trạng có lổi vẩn chèn vào csdl)

	if(!empty($_POST['username'])){
		$username = escape_strip_tags($dbc, $_POST['username']);
	} else {
		$errors[] = 'username';
	}

	if(!empty($_POST['password'])){
		$password = md5(escape_strip_tags($dbc, $_POST['password']));
	} else {
		$errors[] = 'password';
	}

	if(empty($errors)){
		// Bat dau truy van CSDL de lay thong tin nguoi dung
		$q = "SELECT id, name, password FROM users WHERE name = '{$username}' AND password = '{$password}' LIMIT 1";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

		// neu co 1 gia tri trong rows table thi chuyen huong admin
		if(mysqli_num_rows($r) == 1){
			list($username, $password) = mysqli_fetch_array($r, MYSQLI_NUM);
			$_SESSION['id'] = $uid;
            $_SESSION['name'] = $name;



			header("location: admin.php?controller=index");
		} else {
			$message = "<div class='alert alert-error'>The email or password do not match those on file.</div>";
		}

	} else {
		$message = "<div class='alert alert-error'>Please fill in all the required fields.</div>";
	}
}


//load view
require('backend/views/index/login.php');
?>