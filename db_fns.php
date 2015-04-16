<?php

function db_connect() {
   $result = new mysqli('localhost', 'root', 'password', 'users_login');
   if (!$result) {
     throw new Exception('不能够连接数据库服务器！');
   } else {
     return $result;
   }
}

?>
