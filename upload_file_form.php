<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 5/11/15
 * Time: 6:38 PM
 *
<!-- 文件的上传和下载 -->
<!-- 客户端配置： -->
<!-- 表单页面 -->
<!-- 表单的发送方式为post -->
<!-- 添加enctype=“multipart/form-data” -->

<!-- 客户端限制： -->
<!-- 通过表单隐藏域限制上传文件的最大值,但是在客户端作的限制是没用的，可以通过审查元素方式可以修改其值 -->
<!-- <input type='hidden' name= 'MAX_FILE_SIZE' value='字节数'/> -->
<!-- <input type='file' name='myFile' accept='文件的MIME类型'/> -->
 */
    require_once('grade_header.php');
    do_html_header('上传文件');

    display_upload_file_form();

//do_html_footer();
?>