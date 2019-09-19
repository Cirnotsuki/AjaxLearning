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
openSQL();
function openSQL(){
    $sql = mysqli_connect("localhost","root","root","signin","3306");
    if(mysqli_connect_error()){
        echo "数据库连接失败";
        return;
    }

    switch ($_REQUEST["tpye"]){
        case "submit":
            $name = $_REQUEST["user"];
            $nameExist = mysqli_query($sql,"SELECT `name` FROM `user` WHERE name LIKE '$name'")->num_rows;
            if($nameExist<=0){
                echo "false";
                return;
            }
            $list = mysqli_query($sql,"SELECT `password` , `idate` FROM `user` WHERE name LIKE '$name'");
            // 返回密码值和掩码值
            $obj = mysqli_fetch_array($list);
            echo json_encode(array($obj["password"],md5(md5(md5($obj["idate"])))));
            break;
        case "login":
            $name = $_REQUEST["user"];
            $ckMd5 = $_REQUEST["ck"];
            $bool = mysqli_query($sql,"UPDATE `user` SET `ckMd5`='$ckMd5' WHERE name LIKE '$name'");
            if($bool==1){
                $list = mysqli_query($sql,"SELECT `uid` FROM `user` WHERE name LIKE '$name'");
                // 返回密码值和掩码值
                $obj = mysqli_fetch_array($list);
                echo $obj["uid"];
            }else{
                echo "登陆失败";
            }
            break;
        case "autoLogin":
            $id = $_REQUEST["id"];
            $list = mysqli_query($sql,"SELECT `ckMd5`,`name` FROM `user` WHERE uid LIKE '$id'");
            // 返回密码值和掩码值
            $obj = mysqli_fetch_array($list);
            if($_REQUEST["ck"] == $obj["ckMd5"]){
               echo $obj["name"];
            }else{
                echo "false";
            }
            break;
        default:

    }
}


