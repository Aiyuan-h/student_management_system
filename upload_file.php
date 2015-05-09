<?php
header('content-type:text/html;charset=utf-8');
include_once 'upload_func.php';
$file_info=$_FILES['myfile'];
$new_name=upload_file($file_info);
echo $new_name;
