<?php

//title page
$title_page = 'Blog | Travel Responsive Web Template';

$display = 4;

if(isset($_GET['s']) && filter_var($_GET['s'], FILTER_VALIDATE_INT, array('min_range' => 1))){
    $start = $_GET['s'];
} else {
    $start = 0;
}

$select = "id";
$options = array(
	'select' => $select,
);

$q1 = "SELECT * FROM posts ORDER BY created ASC LIMIT {$start}, {$display}";
$r1 = mysqli_query($dbc, $q1) or die ("Query {$q1} \n<br> MYSQL error: " . mysqli_errno($dbc));


//load view
require('frontend/views/posts/index.php');
?>
                        