<?php
//load model

//data
$pid = intval($_GET['pid']);
$product = get_a_record('products', $pid);

if (!$product) {
	show_404();
}

$title = $product['name'];
$categories = get_all('categories', array(
	'select' => 'id, name',
	'order_by' => 'position ASC'
));

//load view
require('frontend/views/product/view.php');