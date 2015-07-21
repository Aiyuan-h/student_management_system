<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 7:51 PM
 */
    require_once('db_func.php');
    require_once('html_output_func.php');
    session_start();
    //require_once('login_header.php');
//    do_html_header("数据库备份");

    try {
        db_backup();
//        echo '<div style="margin-top: 160px">数据库备份成功.</div>';
        echo "<script>alert('数据库备份成功.');window.location='introduce_system.php'</script>";
    }
    catch (Exception $e) {
//        echo $e->getMessage();
        echo "<script>alert('数据库备份失败.');window.history.back();</script>";
    }
    //do_html_footer();
?>