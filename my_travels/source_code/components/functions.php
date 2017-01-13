<?php
/**
 * Chuyển hướng đến trang báo lỗi 404
 */
function show_404(){
    header('HTTP/1.1 Not Found 404', true, 404);
    require('404.php');
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
 * Upload file
 * @param  string
 * @param  array
 * @return mixed
 */
function upload($field, $config=array()){ 
    //cấu hình upload
    $options = array(
        'name' => '',
        'upload_path'  => './',
        'allowed_exts' => '*',
        'overwrite'    => TRUE,
        'max_size'     => 0
    );
    $options = array_merge($options, $config); 
    
    //nếu chưa upload? kết thúc
    if( !isset($_FILES[$field])) return FALSE;
    
    //file upload
    $file = $_FILES[$field];
    
    //lỗi upload? kết thúc
    if ($file['error'] != 0) return FALSE;
    
    //phần mở rộng của file
    $temp = explode(".", $file["name"]);
    $ext = end($temp);
    
    //phần mở rộng không phù hợp? kết thúc
    if ($options['allowed_exts']!='*') {
        $allowedExts = explode('|', $options['allowed_exts']);
        if ( !in_array($ext, $allowedExts)) return FALSE;
    }
    
    //kích thước quá lớn? kết thúc
    $size = $file['size'] / 1024 / 1024;
    if(($options['max_size']>0) && ($size > $options['max_size'])) return FALSE;    
    
    $name = empty($options['name']) ? $file["name"] : $options['name'].'.'.$ext;
    $file_path = $options['upload_path'].$name;

    //nếu cho phép ghi đè
    if ($options['overwrite'] && file_exists($file_path)) {
        unlink($file_path);
    }
    
    //upload file và trả về tên file
    move_uploaded_file($file["tmp_name"], $file_path);
    return $name;
}