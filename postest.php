<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 3:05
 */

print_r(defendXSSLight());
function defendXSSLight(){
    $str = $_REQUEST;
    $str = preg_replace('/\</','&lt;', $str);
    $str = preg_replace('/\>/','&gt;', $str);
    return $str;
}
$s = "abcdefg";
echo "<br>".md5($s);
echo "<br>".sha512($s);
sha