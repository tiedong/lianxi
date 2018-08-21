<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-08-21
 * Time: 14:28
 */
$fp = fopen('cache.txt','a');
fwrite($fp,'hello');
fclose($fp);
