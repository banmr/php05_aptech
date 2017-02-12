<?php
if(isset($_SESSION['name'])) {
	header("location: admin.php?controller=index");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form
	$errors = array(); // tao 1 mãng để bỏ những lổi xãy ra vào đây (tránh tình trạng có lổi vẩn chèn vào csdl)

	if(!empty($_POST['username'])){
		$username = trim(escape_strip_tags($dbc, $_POST['username'])); // trim bo ky tu trong dang truoc ky tu
	} else {
		$errors[] = 'username';
	}

	if(!empty($_POST['password'])){
		$password = escape_strip_tags($dbc, $_POST['password']);
		
	} else {
		$errors[] = 'password';
	}
	
	

	if(empty($errors)){

		$passwordmd5 = md5($password);// chuyen pass thanh md5 de so sanh voi pass md5 trong csdl
		// Bat dau truy van CSDL de lay thong tin nguoi dung
		$q = "SELECT id, name FROM users WHERE name = '{$username}' AND password = '{$passwordmd5}' LIMIT 1";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

		// neu co 1 gia tri trong rows table thi chuyen huong admin
		
		if(mysqli_num_rows($r) == 1){
			list($u_id, $u_name,) = mysqli_fetch_array($r, MYSQLI_NUM);			
			$_SESSION['id'] = $u_id;
            $_SESSION['name'] = $u_name;

			header("location: admin.php?controller=index");
		} else {
			$message[] = "<div class='alert alert-error'>The email or password do not match those on file.</div>";
		}

	} else {
		$message[] = "<div class='alert alert-error'>Please fill in all the required fields.</div>";
	}
}
//load view
require('backend/views/index/login.php');
?>