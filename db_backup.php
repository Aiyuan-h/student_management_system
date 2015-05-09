<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 7:51 PM
 */
require_once('db_func.php');
//require_once('login_header.php');
//do_html_header("数据库备份");

try {

    db_backup();
    echo '数据库备份成功.<br />';
}
catch (Exception $e) {
    echo $e->getMessage();
    //echo '您的密码不能够被重置，请稍候再试！';
}

//do_html_footer();
?>