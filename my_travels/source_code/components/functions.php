<?php
/**
 * Chuyển hướng đến trang báo lỗi 404
 */
function show_404($page = '404.php'){
    $url = BASEURL . $page;
    header("location: $url");
    exit();
}
/**
 * Chống SQL Inject
 * @param  string
 * @return string
 */
function escape_strip_tags($dbc, $str) {
    return mysqli_real_escape_string($dbc, strip_tags($str));
}
/**
 * cat chuoi
 * @param  string
 * @param  array
 * @return mixed
 */

function _substr($str, $length, $minword = 3){
    $sub = '';
    $len = 0;
    foreach (explode(' ', $str) as $word)
    {
        $part = (($sub != '') ? ' ' : '') . $word;
        $sub .= $part;
        $len += strlen($part);
        if (strlen($word) > $minword && strlen($sub) >= $length)
        {
          break;
        }
     }
        return $sub . (($len < strlen($str)) ? ' ...' : '');
}
/**
 * resize
 */