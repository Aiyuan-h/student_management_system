<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
/*
 * 文件下载：
 * 文件下载的类型使用MIME类型表示
 * 下载文件的描述如给出文件名称等
 * 下载文件的长度以字节为单位
 */
//$file_name=$_GET['file_name'];
/*
 * header（）；函数向客户端发送原始的 HTTP 报头。
 * 认识到一点很重要，即必须在任何实际的输出被发送之前调用 header() 函数
 * 函数之前不能有任何的输出（echo “ ”；），即便是输出空格，及该函数之前不能有任何html输出
 *
 * 请注意一点header()必须在任何实际输出之前调用，不管是普通的html标签，还是文件里面的空行，
 * 空格或者是PHP文件里的空行，空格。这是一个非常普遍的错误，在通过include，require，
 * 或者其访问其他文件里面的函数的时候，如果在header()被调用之前，其中有空格或者空行。
 * 如果不是调用其他文件，仅仅是单独使用一个PHP或者HTML文件，在header()被调用之前有输出也会出错。
 */

    $file_name="./download/file_down.doc";
    header("Content-type:application/msword");//指定文档mime类型
    header("Accept-Ranges: bytes");
    header('content-disposition:attachment；file_name='.$file_name);//指定文件的描述，是附件，并且指定文件名
    header('content-length:'.filesize($file_name));//指定文件的大小
    readfile($file_name);

