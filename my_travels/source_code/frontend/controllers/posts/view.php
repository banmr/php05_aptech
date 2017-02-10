<?php 

if(isset($_GET['post_id']) && filter_var($_GET['post_id'], FILTER_VALIDATE_INT, array('min_range' => 1))){

$post_id = $_GET['post_id'];
$q = "SELECT id, title, content, image FROM posts WHERE id = {$post_id}  LIMIT 1";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

} else {
    header("location: index.php?controller=posts");
}

$title_page_ar = mysqli_fetch_array($r, MYSQLI_ASSOC);
$title_page = $title_page_ar['title'] . '| Travel' ;


//load view
require('frontend/views/posts/view.php');
?>