<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/9/15
 * Time: 15:18
 */
// 请求头，响应头
header("content-type:text/html;charset:utf-8");// 设置相应头
echo $_GET["user"];
echo "<br>";
echo $_GET["pass"];

// 定义变量
$a = 10;
$b = 40;
abc();
function abc(){
    $a = 20; // 当函数完成后清除局部变量
    echo "<br>",$a;
    echo "&nbsp",$GLOBALS["b"]; // 一次性定义全局变量
    global $b;
    echo "<br>",$b;

    static $c=20; // 当函数完成后不清除静态变量，定义这句话只在第一次运行函数时运行
    // 超全局变量
    echo "<br>";
    print_r($_REQUEST); // $_REQUEST 可以收集表单的get或post请求
}

echo "aaa"; // 返回给前端
echo "<br>";
print $a;   // 仅能输出一个值，返回一个1
// print_r 打印一个数组
echo "<br>";
var_dump($a); // 打印类型和值

// 数组
$arr=array(1,2,3,4);
echo "<br>";
print_r($arr);
for($i=0;$i<count($arr);$i++){
    echo "<br>";
    echo $arr[$i];
}
// 对象数组
$arr2 = array("name"=>"iphone","type"=>"X","price"=>"9999");
echo "<br>";
echo count($arr2);
foreach ($arr2 as $key=>$item) {
    echo "<br>";
    echo $key,":",$item;
}
foreach ($arr as $value) {
    echo "<br>";
    echo $value;

}
// sort() 升序排序；rsort() 降序排序；asort() 根据值升序排序； ksort() 根据键升序排序 arsort，aksort
echo "<br>";
echo json_encode($arr); // 将对象转化为字符串
echo "<br>";
print_r(json_decode("[1,2,3,4,5]")); // 将字符串转化为数组

// 面向对象
class Box{
    // 函数名和类名相同，因此这个函数就是构造函数
    var $w=0;
    function Box($_w){
        // php 是箭头语法，不使用. 使用->
        $this->w=$_w; // 注意和JavaScript的不同
    }
    function play(){
        echo "<br>";
        echo $this->w;
    }
}
$box= new Box(20);
$box->play();
//echo "<div style='color:red'>aaa</div>
//<script>
//    var p=document.createElement('span');
//    p.textContent='你好';
//    document.body.appendChild(p);
//</script>";