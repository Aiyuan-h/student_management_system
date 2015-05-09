<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 2:12 PM
 */
require_once('db_func.php');

function search_grade($username,$studentid){
    $conn=db_connect();

    // check if the grade is found
    $result = $conn->query("select * from student
                         where username='".$username."'
                         and studentid ='".$studentid."'");
    if (!$result) {
        throw new Exception('查询成绩失败');
    }
    return $result;
}

function search_grade_all(){
    $conn=db_connect();
    //search all
    $result = $conn->query("select * from student");
    if (!$result) {
        throw new Exception('查询成绩失败');
    }
    return $result;
}

function insert_grade($username,$grade){
    $conn=db_connect();

    // check if the grade is found
    $result = $conn->query("insert into student(username,grade) VALUES ('$username','$grade')");
    if (!$result) {
        throw new Exception('查询成绩失败');
    }
    return $result;
}