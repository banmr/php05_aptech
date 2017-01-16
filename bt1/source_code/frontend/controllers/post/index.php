<?php
// select model
$posts = get_all_record($dbc, 'posts'); //select database voi $table = posts

//load view
require('frontend/views/post/index.php');
?>