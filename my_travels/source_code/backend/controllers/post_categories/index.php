<?php

	if(isset($_GET['sort'])) {
	  	switch ($_GET['sort']) {
		    case 'title':
		      $order_by = 'name';
		      break;
		    
		    case 'date':
		      $order_by = 'created';
		      break;

		    case 'position':
		      $order_by = 'position';
		      break;

		    default:
		      $order_by = 'position';
		      break;
	  	}
	} else {
	$order_by = 'position';
	} 
$q = "SELECT id, name, position, created FROM post_categories ORDER BY {$order_by} ASC";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

//load view
require('backend/views/post_categories/index.php');
?>
