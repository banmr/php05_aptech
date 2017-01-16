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
	 
$select = "id, name, position, created";

$options = array(
	'select' => $select,
    'order_by' => $order_by,
);

$post_categories = select_all($dbc, 'post_categories', $options);


//load view
require('backend/views/post_categories/index.php');
?>
