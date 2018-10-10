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

for ( $i=1;$i<=6;$i++) {
    for ( $k=1;$k<=6-$i;$k++) {
        echo "&nbsp;";
    }
    for ( $j=1;$j<=2*$i-1;$j++) {
        echo "*";
    }
    echo "<br/>";
}
