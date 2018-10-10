<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-08-23
 * Time: 16:32
 */
var_dump($_POST);
$file =  iconv('utf-8','gbk',$_FILES['userpic']['name']);
if (move_uploaded_file($_FILES['userpic']['tmp_name'],'./upload/'.$file)) {
    echo $file;
    echo '上传成功';
} else {
    echo '上传失败';

}