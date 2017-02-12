<?php


$users = select_all($dbc, 'users');
$title_page = "User | Cpanel";


//load view
require('backend/views/users/index.php');
?>