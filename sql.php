<?php
header("content-type:text/html;charset=utf-8");
header("Access-Control-Allow-Origin:*");
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/16
 * Time: 1:11
 */
echo "<div>数据库连接中...</div>";
openSQL();
function openSQL(){
    $sql = mysqli_connect("localhost","root","root","game","3306");
//    $user = $_REQUEST["user"];
//    $pass = $_REQUEST["pass"];
//    $age = $_REQUEST["age"];
//    $gender = $_REQUEST["gender"];
//    $tel = $_REQUEST["tel"];
//    $email = $_REQUEST["email"];

    if(mysqli_connect_error()){
        return;
    }
    echo "<script>
                var div = document.querySelector('div');
                div.innerHTML = '数据库已连接'
          </script>";
//    $bool = mysqli_query($sql,"INSERT INTO `user`(`name`, `password`, `age`, `gender`, `tel`, `email`) VALUES ('$user','$pass',$age,'$gender','$tel','$email')");
    $list = mysqli_query($sql,"SELECT * FROM `user` WHERE age>15");
    // 查找name中是否包含某些字符时，可以 WHERE name LIKE ‘%乌’ 其中%代表乌前面的字符
    // 遍历数据库
    for($i=0;$i<$list->num_rows;$i++){
        $obj = mysqli_fetch_array($list);
        foreach ($obj as $key=>$value) {
            if (is_int($key)) continue;
            echo $key.":".$value."&nbsp;";
            
        }
//        print_r($obj);
        echo "<br>";

    }
    echo "<br>";
    print_r($list);
//    echo "数据库增添情况：",$bool;
//    if($bool==1){
//        echo "<br>用户：",$user,"&nbsp;已添加";
//    }else{
//        echo "<br>用户添加失败";
//    }
}


