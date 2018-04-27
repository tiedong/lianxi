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

//插曲一条语句
$sql = "INSERT INTO user VALUES (NULL,'WangWu','123456')";
$pdo->exec($sql);
$id = $pdo->lastInsertId();
var_dump($id);
