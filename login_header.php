<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
    // We can include this file in all our files
    // this way, every file will contain all our functions and exceptions
    require_once('data_valid_func.php'); //确认用户输入数据有效
    require_once('db_func.php');//连接数据库
    require_once('user_auth_func.php');//用户身份验证函数
    require_once('html_output_func.php');//以html形式格式化输出的函数
?>
