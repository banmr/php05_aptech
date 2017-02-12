<?php
if(isset($_SESSION['name'])) {
	header("location: admin.php?controller=index");
}

if($_SERVER['REQUEST_METHOD'] == 'POST') { //xũ lý giá trị tồn tại, xữ lý form
	$forgot_id = FALSE;
	$errors = array();
	if(isset($_POST['email']) && filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
		$f_email = escape_strip_tags($dbc, $_POST['email']);

		$q = "SELECT id FROM users WHERE email = '{$f_email}'";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));
		if(mysqli_num_rows($r) > 0){
			//tim thay email trong users
			list($forgot_id) = mysqli_fetch_array($r, MYSQLI_NUM);
		}
	} else {
		$errors[] = "email";
	}


	// neu co id cua users thi chung bi update password
	if($forgot_id) {
		// set newpass cho users

		$newpass = substr(uniqid(rand(), true), 2, 10); // goi newpass cho users
		$newpassmd5 = md5($newpass); // chuyen newpas thanh md5 roi update hoac so sanh voi csdl
		$q = "UPDATE users SET password = '{$newpassmd5}' WHERE id = {$forgot_id} LIMIT 1";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

		if(mysqli_affected_rows($dbc) == 1){
		// Neu update thanh cong, thi email den nguoi dung password tam thoi
            // $body = "Your password has been temporarily changed to {$newpass}. Please use this email address and the new password. Make sure you change it later.";
            // mail($f_email, "Your temporary password", $body, "FROM: admin localhost");
            $message = "<div class='alert alert-success'>Your password has been changed successfully. YOu will receive an email with the new password.</div>";
            var_dump($newpass); // chua goi email dua nen lay pass o day
        } else {
            $message = "<div class='alert alert-error'>Your password cannot be changed due to a system error.</div>";
        }
	} else {
        $message = "<div class='alert alert-error'>The email could not be found in our database.</div>";
        $errors[] = "email could not";
    }
}


//load view
require('backend/views/index/forgot.php');
?>