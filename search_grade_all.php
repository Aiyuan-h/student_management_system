<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 3:58 PM
 */
require_once("grade_header.php");
session_start();
do_html_header('查找所有');

try {
    // check forms filled in

    $result = search_grade_all();

    echo "<table border='1'>
            <tr>
            <th>用户名</th>
            <th>学号</th>
            <th>成绩</th>
            </tr>";

    // $row=$result->fetch_object();
    //从结果中返回作为对象
    while ($row = mysqli_fetch_object($result)) {
        echo "<tr>";//换行用
        echo "<td>" . $row->username . "</td>";
        echo "<td>" . $row->studentid . "</td>";
        echo "<td>" . $row->grade . "</td>";
    }
    echo "</table>";
}
catch(Exception $e){
    // unsuccessful login
    do_html_header('出错:');
    echo $e->getMessage();
    echo '查询出错，请重新登录！';
//    do_html_url('login.php', 'Login');
//    do_html_footer();
    exit;
}

// end page
//do_html_footer();