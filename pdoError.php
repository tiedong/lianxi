<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-04-17
 * Time: 14:05
 */

//实例化pdo对象
$dsn = "mysql:host=106.75.129.183;dbname=test;port=3306;charset=utf8";
$user = 'root';
$pass = 'myroot123';
$pdo = new PDO($dsn,$user,$pass);

//user表不存在
$sql = "SELECT * FROM use";
$pao_statement = $pdo->prepare($sql);
$pao_statement->execute();
$result = $pao_statement->errorInfo();
echo "<pre>";
var_dump($result);
