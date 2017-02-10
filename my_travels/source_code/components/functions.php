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
 * Phân trang
 */
function pagination($table, $options = array()){
    global $dbc;
    global $start;
    global $display;
    
    $select = isset($options['select']) ? $options['select'] : '*';
    
    if(isset($_GET['p']) && filter_var($_GET['p'], FILTER_VALIDATE_INT, array('min_range' => 1))){
        $page = $_GET['p'];
    } else {
        //nếu không có p sẽ truy vấn csdl xem có bao nhiêu page để hiển thị
        $qpage = "SELECT COUNT({$select}) FROM {$table}";
        $rpage = mysqli_query($dbc, $qpage) or die ("Query {$qpage} \n<br> MYSQL error: " . mysqli_errno($dbc));
        
        list($record) = mysqli_fetch_array($rpage, MYSQLI_NUM);
        
        // tìm số trang bằng cách chia số bài cho $díplay
        if($record > $display){
            $page = ceil($record / $display);
        } else {
            $page = 1;
        }
    }
    
    
    $output = "<ul class='pagination'>";
        if($page > 1){
            $current_page = ($start / $display) + 1;  
            
            //nếu không phải ở trang đầu thì hiển thị Previous
                if($current_page != 1){
                    $output .= "<li class='prev'><a href='index.php?controller=posts&amp;s=" . ($start - $display) . "&amp;p={$page}'>< Previous</a></li>";
                }
                
                //hiển thị phần còn lại của trang
                for($i = 1; $i <= $page; $i++){
                    if($i != $current_page){
                        $output .= "<li><a href='index.php?controller=posts&amp;s=" . ($display * ($i - 1)) . "&amp;p={$page}'>{$i}</a></li>";
                    } else {
                        $output .= "<li class='active'><a>{$i}</a></li>";
                    }
                }
                
                //nếu không phải ở trang cuối thì hiển thị Next
                
                if($current_page != $page){
                    $output .= "<li class='prev'><a href='index.php?controller=posts&amp;s=" . ($start + $display) . "&amp;p={$page}'>Next ></a></li>";
                }
                
            }
        $output .= "</ul>";
        
        return $output;
}
/**
 * chống spam mail
 */
function clearemail($value){
    $suspects = array('to:', 'bcc:', 'content-type:', 'mime-version:', 'multipart-mixed:', 'content-transfer-encoding:' );
    foreach($suspects as $suspect){
        // strpos: Tìm vị trí của chuỗi $suspect trong chuỗi $value, kết quả trả về false nếu không tìm thấy.
        if(strpos($value, $suspect) !== FALSE){
            return '';
        }
        // str_replace thay thế tất cả các array('\n', '\r', '%0a', '%0d') thành '' trong biến $value
        $value = str_replace(array('\n', '\r', '%0a', '%0d'), '', $value);
        
        // trim : Xóa ký tự $ky_tu nằm ở đầu và cuối chuỗi $value, nếu ta không nhập ky tu thì mặc định nó hiểu là xóa khoảng trắng.
        return trim($value);
        
    }
}