<?php

if(isset($_GET['post_id'], $_GET['name']) && filter_var($_GET['post_id'], FILTER_VALIDATE_INT, array('min_range' => 1))){ // neu co cid va name va cod thoa man dieu kien la 1 so 
	$post_id = $_GET['post_id'];
	$post_name = $_GET['name'];
// neu chon yes

	$q = "DELETE FROM posts WHERE id = {$post_id} LIMIT 1";
	$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));
	

	// if($_SERVER['REQUEST_METHOD'] == 'POST'){ // neu submit
	// 	if(isset($_POST['delete']) && ($_POST['delete'] == 'yes')){
	// 		// neu chon yes
	// 		$q = "DELETE FROM post_categories WHERE id = {$cid} LIMIT 1";
	// 		$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

	// 		if(mysqli_affected_rows($dbc) == 1){
	// 			$messages = "<div class='alert alert-success'><strong>Well done!</strong> The category post was delete successfully.</div>";
	// 		} else {
	// 			$messages = "<div class='alert alert-error'><strong>Error!</strong> The category post not delete due to a system error.</div>";
	// 		}
	// 	} else {
	// 		$messages = "<div class='alert alert-error'>I thought so too! shouldn't be delete.</div>";
	// 	}
	// }
} else {
	show_404();
}

//load view
// require('backend/views/post_categories/delete.php');
header("location: admin.php?controller=posts");