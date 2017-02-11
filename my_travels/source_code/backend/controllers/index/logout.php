<?php

$_SESSION = array(); // xoa het SESSION trinh duyet
session_decode(); // tao ra session_decode
setcookie(session_name(), '', true, time() - 36000);// xoa het COOKIE cua trinh duyet
header("location: admin.php?controller=index&action=login");

?>