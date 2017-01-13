<?php

$q = "SELECT id, title, des FROM posts";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

//load view
require('frontend/views/index/index.php');
?>