<?php
$posts = get_a_record('posts', $dbc);
//load view
require('frontend/views/post/index.php');
?>