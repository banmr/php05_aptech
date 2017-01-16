<?php

/**
 * ham select database tra ve 1 mang array
 */
function get_all_record($db, $table, $select = '*') {
    //truy vấn
    $q = "SELECT `$select` FROM `$table`";
    $r = mysqli_query($db, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($db));

     //dữ liệu trả về la 1 mang array name
    $data = array(); // tao 1 array
    if (mysqli_num_rows($r) > 0) { // kiem tra neu co 1 ket qua thi tra ve
        while ($array_row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { // mysqli_fetch_array theo kieu name MYSQLI_ASSOC
            $data[] = $array_row;
        }
        mysqli_free_result($r); // ket thuc, giai phong mysqli
    }
    return $data; // tra ve ket qua la $data
}

/**
 * Trả về tất cả bản ghi thỏa mãn điều kiện trong $option. 
 */
function select_all($db, $table, $options = array()) {

    //xử lý $options
    $select = isset($options['select']) ? $options['select'] : '*';
    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
    $order_by = isset($options['order_by']) ? 'ORDER BY ' . $options['order_by'] : '';
    $limit = isset($options['offset']) && isset($options['limit']) ? 'LIMIT ' . $options['offset'] . ',' . $options['limit'] : '';

    //truy vấn
    $q = "SELECT $select FROM `$table` $where $order_by $limit";
    $r = mysqli_query($db, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_error($db));

    //dữ liệu trả về
    $data = array();
    if (mysqli_num_rows($r) > 0) { // kiem tra neu co 1 ket qua thi tra ve
        while ($array_row = mysqli_fetch_array($r, MYSQLI_ASSOC)) { // mysqli_fetch_array theo kieu name MYSQLI_ASSOC
            $data[] = $array_row;
        }
        mysqli_free_result($r); // ket thuc, giai phong mysqli
    }

    return $data;
}