<?php
	 
$select = "id, name, position, created";

$options = array(
	'select' => $select,
);


$post_categories = select_all($dbc, 'post_categories', $options);
$title_page = "Category Post | Cpanel";


//load view
require('backend/views/post_categories/index.php');
?>
