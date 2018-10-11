<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-17
 * Time: 14:05
 */

//实例化pdo对象
//$dsn = "mysql:host=106.75.129.183;dbname=test;port=3306;charset=utf8";
//$user = 'root';
//$pass = 'myroot123';
//$pdo = new PDO($dsn,$user,$pass);
//
////user表不存在
//$sql = "SELECT * FROM use";
//$pao_statement = $pdo->prepare($sql);
//$pao_statement->execute();
//$result = $pao_statement->errorInfo();
//echo "<pre>";
//
//echo "test";
//var_dump($result);
//$a = null;
//var_dump($a);
//if ( isset($a)) {
//    echo "存在";
//} else {
//    echo "不存在";
//}

//$a = 1;
//$b = 1;
//if ( $a===$b ) {
//    echo "全等于";
//}  else {
//    echo "全部等于";
//}

//$a = 10 ;
//$c = ++$a + $a++;
//echo $c;

//for ( $i=1;$i<=6;$i++) {
//    for ( $k=1;$k<=6-$i;$k++) {
//        echo "&nbsp;";
//    }
//    for ( $j=1;$j<=2*$i-1;$j++) {
//        echo "*";
//    }
//    echo "<br/>";
//}

//$a = 10;
//$c = $a++ + ++$a;
//echo $c;

/*$arr1 = array("1"=>"haha","2"=>"ddd");
$arr2 = array("3"=>"ff","4"=>"ddd4");
//var_dump($arr1+$arr2);
$arr3 = array_merge($arr1,$arr2);
var_dump($arr3);*/

//$arr = array(
//    array("1"=>"haha","2"=>"ddd"),
//    array("3"=>"ff","4"=>"ddd4")
//);
////$arr = array_pop($arr);
////var_dump($arr);
//function mergeArr( $array ) {
//    if (!is_array($array)) {
//        return '$array不是数组';
//    }
//    $list = array();
////    $count =  count($array);
//  //  for ( $i=0;$i<$count;$i++ ) {
////        $list= array_merge($list,$array[$i]);
////    }
//    foreach ( $array as $value ) {
//        $list= array_merge($list,$value);
//    }
//    return $list;
//}
// $count = mergeArr($arr);
//var_dump($count);

//
//$b = 6;
// function abc( &$a ){
//     $a = 3;
//     echo $a;
// }
//
// abc($b);
// echo $b;

//function sum ( &$num1,&$num2 ) {
//    $res = $num1+$num2;
//    return $res;
//}
//
//$num1 = 10;
//$num2 = 20;
//
//$res = sum($num1,$num2);
//echo $res;


//function &test(){
//    static $b=0;//申明一个静态变量
//    $b=$b+1;
//    echo $b;
//    return $b;
//}
//
//$a=test();//这条语句会输出　$b的值　为１
//$a=5;
//$a=test();//这条语句会输出　$b的值　为2
//
//$a=&test();//这条语句会输出　$b的值　为3
//$a=4;
//$a=test();//这条语句会输出　$b的值　为6
//
//
//echo 5-8;

//
//function abc ( $a ) {
//    if ( $a>2) {
//        abc(--$a);
//    }
//    echo $a;
//}
//abc(4);

//
////冒泡排序发
//$arr = array(2,5,4,9,7,3);
//for ( $i=0;$i<count($arr);$i++ ){
//    for ( $j=0;$j<count($arr)-1-$i;$j++) {
//        if ( $arr[$j] > $arr[$j+1]) {
//            $temp = $arr[$j];
//            $arr[$j] = $arr[$j+1];
//            $arr[$j+1] = $temp;
//        }
//    }
//}
//var_dump($arr);

//选择排序,先设置最大值和最大索引值
//$arr = [3,4,2,50,30,1,25];
//for ($i=0;$i<count($arr)-1;$i++) {
//    $max_num = $arr[$i];
//    $max_index = $i;
//    for ( $j=$i+1;$j<count($arr);$j++) {
//        if ( $max_num > $arr[$j] ) {
//            $max_num = $arr[$j];
//            $max_index = $j;
//        }
//    }
//
//    $arr[$max_index] = $arr[$i];
//    $arr[$i] = $max_num;
//}
//
//var_dump($arr);

//二分法
$arr = array(2,4,5,6,7,8,9,10);
$low = 0;   //要查找范围的最小键值
$search = 7;
//计算出数组的长度
$high = count($arr)-1;
while($low <= $high){
    //取得数组的中间键值
    $mid = intval(($low+$high)/2);
    if($arr[$mid]==$search){
        //如果取出中间的下标值跟你要搜索的值相等的话，直接去除值得下标就行
        echo "你要查找的值在数组内的下标为".$mid; break;
    }elseif($arr[$mid] > $search){
        $high = $mid -1;
    }else{
        $low = $mid + 1;
    }
}
//function search($array,$k,$low=0,$high=0){
//    //判断数组元素的数量
//    if(count($array)!=0 and $high==0){      //判断是否为第一次调用
//        //数组的元素个数
//        $high = count($array);
//    }
//    if($low <= $high){      //如果还存在剩余的数组元素
//        $mid = intval(($low+$high)/2);      //取$low 与$high的中间值
//        //return $array[$mid];
//        if($array[$mid] == $k){
//            return $mid;    //如果找到则返回
//        }elseif($k < $array[$mid]){
//            //如果上面没有找到，则继续查找
//            return search($array,$k,$low,$mid-1);
//        }else{
//            return search($array,$k,$mid+1,$high);
//        }
//    }
//    return "没有要查找的值";
//}
//$array = array(3,4,5,7,8,9,10);
//echo search($array,9);

//class  Person{
//    public  $name;
//}
//$p1 = new  Person();
//$p1->name = "aa";
//$p2 = $p1;
//$p2->name = 'abc';
//echo $p2->name;
