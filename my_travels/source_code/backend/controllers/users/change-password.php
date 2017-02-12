<?php
$title_page = "Change Password | Cpanel";


if($_SERVER['REQUEST_METHOD'] == 'POST') {
	$errors = array();

	if(isset($_POST['cur_password']) && preg_match('/^\w{4,20}$/', trim($_POST['cur_password']))){
		$c_password = escape_strip_tags($dbc, md5(trim($_POST['cur_password'])));

		// neu nhap dinh dang pass dung thi kiem tra co dung trong csdl
		$q = "SELECT name FROM users WHERE password = '{$c_password}' AND id = {$admin['id']}";
		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

		if(mysqli_num_rows($r) == 1){
			// Tim thay nguoi dung trong CSDL, cho phep nguoi dung thay doi mat khau
            // Kiem tra xem new pass co dung dinh dang cho phep hay khong?
			if(isset($_POST['password1']) && preg_match('/^\w{4,20}$/', trim($_POST['password1']))){
				// Kiem tra xem password 1 co bang password 2 hay khong?
				if($_POST['password1'] == $_POST['password2']){
					$c_new_passwors = escape_strip_tags($dbc, md5(trim($_POST['password1'])));

					//update new passs
					$q = "UPDATE users SET password = '{$c_new_passwors}' WHERE id = {$admin['id']} LIMIT 1";
					$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

					if(mysqli_affected_rows($dbc) == 1){
						$messages = "<div class='alert alert-success'><strong>Well done!</strong> Your password has been successfully updated.</div>";
					} else {
						$messages = "<div class='alert alert-error'><strong>Error!</strong> Your password could not be changed due to a system error.</div>";
					}

				} else {
					$errors[] = "errors password 1 2";
					$messages = "<div class='alert alert-error'><strong>Error!</strong> password change fails</div>";
				}
			} else {
				$errors[] = "errors input password 1";
				$messages = "<div class='alert alert-error'><strong>Error!</strong> password change fails</div>";
			}
		} else {
			$errors[] = "errors sql password";
			$messages = "<div class='alert alert-error'><strong>Error!</strong> password change fails</div>";
		}

	} else {
		$errors[] = "errors input password";
		$messages = "<div class='alert alert-error'><strong>Error!</strong> password change fails</div>";
	}



}


//load view
require('backend/views/users/change-password.php');
?>