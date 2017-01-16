<?php

$q = "SELECT p.post_category_id, p.title as p_name, c.id, c.name as cate_name FROM posts p, post_categories c  WHERE p.post_category_id = c.id";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));

//load view
require('backend/views/posts/index.php');
?>
