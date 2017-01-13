<?php
$posts = get_a_record($dbc, 'posts'); //select database voi $table = posts

//load view
require('frontend/views/post/index.php');
?>