<?php
  // We can include this file in all our files
  // this way, every file will contain all our functions and exceptions
  require_once('data_valid_fns.php'); //确认用户输入数据有效
  require_once('db_fns.php');//连接数据库
  require_once('user_auth_fns.php');//用户身份验证
  require_once('output_fns.php');//以html形式格式化输出的函数
?>
