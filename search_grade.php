<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/16/15
 * Time: 2:23 PM
 */
    require_once("sms_header.php");
    session_start();
    $username=$_POST['username'];
    $studentid=$_POST['studentid'];

    try{
        // check forms filled in
        if (!filled_out($_POST)) {
            throw new Exception('您没有填写完成表单，请返回并重试！');
        }
        $result=search_grade($username,$studentid);

        echo "<table border='1'>
            <tr>
            <th>用户名</th>
            <th>学号</th>
            <th>成绩</th>
            </tr>";

        // $row=$result->fetch_object();
        $row=mysqli_fetch_object($result);//从结果中返回作为对象
        echo "<tr>";
        echo "<td>".$row->username."</td>";
        echo "<td>".$row->studentid."</td>";
        echo "<td>".$row->grade."</td>";
        echo "</table>";
    }
    catch(Exception $e){
        // unsuccessful login
        do_html_header('出错:');
        echo $e->getMessage();
        echo '查询出错，请重新登录！';
        do_html_url('login.php', 'Login');
        do_html_footer();
        exit;
    }

