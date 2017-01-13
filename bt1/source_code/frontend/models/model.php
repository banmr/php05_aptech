<?php

// $q = "SELECT id, title, des FROM posts";
// $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

/**
 * ham query database
 */
function get_a_record($table, $dbc, $select = '*') {
    //truy vấn
    $q = "SELECT $select FROM $table";
    $r = mysqli_query($dbc, $q) or die ("Query {$q} \n<br> MYSQL error: " . mysqli_errno($dbc));

     //dữ liệu trả về
    $data = NULL;
    if (mysqli_num_rows($r) > 0) {
        while ($array_data = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
            $data[] = $array_data;
        }
    }
    return $data;

}