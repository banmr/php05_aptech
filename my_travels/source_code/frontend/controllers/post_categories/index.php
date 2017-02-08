<?php 

if(isset($_GET['cid']) && filter_var($_GET['cid'], FILTER_VALIDATE_INT, array('min_range' => 1))){

$cid = $_GET['cid'];
$q = "SELECT post_category_id, title, content, image FROM posts WHERE post_category_id = {$cid} ORDER BY created DESC LIMIT 0, 10";
$r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));


}
//load view
require('frontend/views/post_categories/index.php');
?>