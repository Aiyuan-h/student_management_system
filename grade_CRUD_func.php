<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 2:12 PM
 * mysql_query() 仅对 SELECT，SHOW，EXPLAIN 或 DESCRIBE 语句返回一个资源标识符，如果查询执行不正确则返回 FALSE。
 * 对于其它类型的 SQL 语句， mysql_query() 在执行成功时返回TRUE，出错时返回 FALSE。
 * 非 FALSE 的返回值意味着查询是合法的并能够被服务器执行。这并不说明任何有关影响到的或返回的行数。
 * 很有可能一条查询执行成功了但并未影响到或并未返回任何行。
 */
require_once('db_func.php');


//增加
function insert_grade($id,$name,$grade){
    $conn=db_connect();

    // check if the grade is found
    $result = $conn->query("insert into student(id,name,grade) VALUES ('$id','$name','$grade')");
    if (!$result) {
        throw new Exception('插入成绩失败');
    }else{
        return true;
    }
}

//删除
function delete_grade($id){
    $conn=db_connect();

    // check if the grade is found
    $result = $conn->query("delete from student where id='".$id."'");
    if (!$result) {
//        $result->close();
        throw new Exception('删除成绩失败');
    }else{
        return true;
    }
}

//修改
function update_grade($id,$grade)
{
    $conn = db_connect();

    // check if the grade is found
    $result = $conn->query("UPDATE student SET grade='" . $grade . "'WHERE id='" . $id . "'");
    if (!$result) {

        throw new Exception('修改成绩失败');
    } else {
        return true;
    }
}

//查找
function search_grade($name,$id){
    $conn=db_connect();

    // check if the grade is found
    $result=$conn->query("set names utf8");
    $result = $conn->query("select * from student where name='".$name."' and id ='".$id."'");

    if (!$result) {
//        $result->close();
        throw new Exception('查询成绩失败');
    }

    if(@mysqli_num_rows($result)>0){
        return $result;
    }else{
        echo '<div style="margin-top: 160px;"> 未查询到相关数据！</div>';
//        $result->close();
        exit;
    }
}

function search_grade_all(){
    $conn=db_connect();
    //search all
    $result=$conn->query("set names utf8");
    $result = $conn->query("select * from student");
    if (!$result) {
//        $result->close();
        throw new Exception('查询成绩失败');
    }
    if(@mysqli_num_rows($result)>0){
        return $result;
    }else{
        echo '<div style="margin-top: 160px;"> 未查询到相关数据！</div>';
//        $result->close();
        exit;
    }
}

?>