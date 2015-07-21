<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
    header('content-type:text/html;charset=utf-8');
    include_once 'upload_func.php';
    $file_info=$_FILES['file'];
    $new_name=upload_file($file_info);
    echo $new_name;
?>