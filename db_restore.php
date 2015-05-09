<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/18/15
 * Time: 5:25 PM
 */

require_once("db_func.php");
require_once('data_valid_func.php');
require_once('html_output_func.php');
header('content-type:text/html;charset=utf-8');

do_html_header("数据库还原");

$file_info=$_FILES['sql_file'];
$file_name = $file_info['name']; //要导入的SQL文件名
$tmp_name = $file_info['tmp_name'];

try{
    // check forms filled in
    //filled_out 只能检查form表单是否填写，input这个函数不可以用么？？
    if (!filled_out($_POST)) {
        throw new Exception('您没有导入数据库，请返回并重试！');
    }

    //判断是否为数据库指定类型
    $ext=pathinfo($file_name,PATHINFO_EXTENSION);
    if($ext!='sql'){
        throw new Exception('文件类型不符');
    }

    if(!is_uploaded_file($tmp_name)){ 	//判断的是保存在服务器上的临时文件，这里注意写成$file_name，查看php手册上有讲解
        throw new Exception('文件不是通过HTTP POST方式上传来的');
    }

    $is_success=db_restore($file_info);
    if(!$is_success){
        throw new Exception('数据库恢复失败');
    }
//    do_html_footer();
}
catch (Exception $e){
    do_html_header('出错:');
    echo $e->getMessage();
    //echo '数据库恢复出错！';
//    do_html_url('login.php', 'Login');
//    do_html_footer();
    exit;
}
