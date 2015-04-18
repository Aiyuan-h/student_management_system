<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/18/15
 * Time: 5:25 PM
 */

require_once("sms_header.php");
header('content-type:text/html;charset=utf-8');

$file_info=$_FILES['sql_file'];


try{
    // check forms filled in
    //filled_out 只能检查form表单是否填写，input这个函数不可以用么？？
    if (!$file_info['name']) {
        throw new Exception('您没有导入数据库，请返回并重试！');
    }

    $is_success=db_restore($file_info);
    if(!$is_success){
        throw new Exception('数据库恢复失败');
    }
}
catch (Exception $e){
    do_html_header('出错:');
    echo $e->getMessage();
 //   echo '数据库恢复出错！';
    do_html_url('login.php', 'Login');
    do_html_footer();
    exit;
}
