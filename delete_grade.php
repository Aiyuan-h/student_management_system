<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 5/11/15
 * Time: 1:16 PM
 */
    require_once("grade_header.php");
    session_start();
    do_html_header('删除成绩');

    //create short variable names
    //使用post、get、session等变量赋值时，一定要检测变量是否已经设置。具体看blog
//    $name= isset($_POST['name']) ? $_POST['name'] : '';
    $id= isset($_POST['id']) ? $_POST['id'] : '';

    try{
        // check forms filled in
        if (!filled_out($_POST)) {
            throw new Exception('您没有填写完成表单，请返回并重试！');
        }
        if($result=delete_grade($id)){
//            echo "<script>alert('删除成功');window.history.back();</script>";
            echo "<script>alert('删除成功');window.location='introduce_system.php'</script>";
        }
    }
    catch(Exception $e){
        do_html_header('出错:');
//        echo '<div style="margin-top: 160px">'.$e->getMessage().'</div>';
        echo "<script>alert('删除失败');window.history.back();</script>";
        exit;
    }
    //    $result->close();
    // end page
    // do_html_footer();
?>