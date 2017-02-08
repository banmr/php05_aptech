<?php

$q = "SELECT p.id AS posts_id, p.image, p.post_category_id, p.title AS p_name, p.position, c.id, c.name AS cate_name FROM posts p, post_categories c  WHERE p.post_category_id = c.id";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($dbc));


//load view
require('backend/views/posts/index.php');
?>
