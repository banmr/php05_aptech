<?php

$q1 = "SELECT * FROM posts ORDER BY created ASC LIMIT 0, 10";
$r1 = mysqli_query($dbc, $q1) or die ("Query {$q1} \n<br> MYSQL error: " . mysqli_errno($dbc));

//load view
require('frontend/views/blog/index.php');
?>