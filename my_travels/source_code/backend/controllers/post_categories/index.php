<?php
$q = "SELECT id, name, created FROM post_categories ORDER BY position ASC";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

//load view
require('backend/views/post_categories/index.php');
?>
