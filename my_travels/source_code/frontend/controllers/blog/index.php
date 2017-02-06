<?php

$q = "SELECT name FROM post_categories ORDER BY position ASC";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

$q1 = "SELECT * FROM posts ORDER BY position ASC";
$r1 = mysqli_query($dbc, $q1) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

//load view
require('frontend/views/blog/index.php');
?>