<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-08-24
 * Time: 09:51
 */
header("Access-Control-Allow-Origin:*");
header('Content-Type:text/html,charset=utf-8');
$data['goods_name'] = '航空母舰';
$data['price'] = 198;
$data['nu'] = 10;

echo json_encode($data);