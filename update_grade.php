<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 5/10/15
 * Time: 6:32 PM
 */
require_once("grade_header.php");
session_start();
do_html_header('修改成绩');

//create short variable names
//使用post、get、session等变量赋值时，一定要检测变量是否已经设置。具体看blog
$id = isset($_POST['id']) ? $_POST['id'] : '';
$grade = isset($_POST['grade']) ? $_POST['grade'] : '';

try{
    // check forms filled in
    if (!filled_out($_POST)) {
        throw new Exception('您没有填写完成表单，请返回并重试！');
    }

    if($result=update_grade($id,$grade)){
//        echo "<script>alert('修改成功');window.history.back();</script>";
        echo "<script>alert('修改成功');window.location='introduce_system.php'</script>";
    }
}
catch(Exception $e){
    // unsuccessful login
    do_html_header('出错:');
    echo "<script>alert('修改失败');window.history.back();</script>";
//    echo '<div style="margin-top: 160px">'.$e->getMessage().'</div>';
    //echo '<div style="margin-top: 160px">查询出错，请重新登录！</div>';

    exit;
}