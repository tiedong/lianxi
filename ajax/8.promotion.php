<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-08-22
 * Time: 10:37
 */
$data['year'] = 2018;
$data['month'] = 8;
$data['day'] = [22,23];

//给客户端回应
echo json_encode($data);