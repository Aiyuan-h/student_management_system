<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/16/15
 * Time: 2:23 PM
 */
    require_once("grade_header.php");
    session_start();
    do_html_header('查找成绩');

    //create short variable names
    //使用post、get、session等变量赋值时，一定要检测变量是否已经设置。具体看blog
    $name = isset($_POST['name']) ? $_POST['name'] : '';
    $id = isset($_POST['id']) ? $_POST['id'] : '';

    try{
        // check forms filled in
        if (!filled_out($_POST)) {
            throw new Exception('您没有填写完成表单，请返回并重试！');
        }
        $result=search_grade($name,$id);

        echo '<table border="1" style="margin-top: 160px;" >
            <tr>
            <th>姓名</th>
            <th>学号</th>
            <th>成绩</th>
            </tr>';

        // $row=$result->fetch_object();
        $row=mysqli_fetch_object($result);//从结果中返回作为对象
        echo "<tr>";
        echo "<td>".$row->name."</td>";
        echo "<td>".$row->id."</td>";
        echo "<td>".$row->grade."</td>";
        echo "</table>";
    }
    catch(Exception $e){
        // unsuccessful login
        do_html_header('出错:');
        echo '<div style="margin-top: 160px">'.$e->getMessage().'</div>';
        //echo '<div style="margin-top: 160px">查询出错，请重新登录！</div>';
        //do_html_url('login.php', 'Login');
        //do_html_footer();
        exit;
    }
//    $result->close();
    // end page
    //do_html_footer();
?>