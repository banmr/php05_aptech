<?php
/**
 * Chuyển hướng đến trang báo lỗi 404
 */
function show_404(){
    header('HTTP/1.1 Not Found 404', true, 404);
    require('404.php');
    exit();
}
