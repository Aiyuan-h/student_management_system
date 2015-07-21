<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="Experimental guidance.aspx.cs" Inherits="Threetanks_Bowers.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>实验指导</title>

    <!--### Bootstrap 样式表-->
    <!--#################################################################-->
    <link href="Dist/css/bootstrap-theme.css" type="text/css" rel="stylesheet">
    <link href="Dist/css/bootstrap-theme.min.css" type="text/css" rel="stylesheet">
    <link href="Dist/css/bootstrap.css" type="text/css" rel="stylesheet">
    <link href="Dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">

    <link href="../dist/css/bootstrap.min.css" rel="stylesheet">

<!-- Hi，如果你要在自己的网站上引入bootstrap样式文件的话，请使用当前最新版本v3.0.3的CDN链接，页面加载速度会更快！
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">
-->

<!-- Documentation extras -->
<link href="../docs-assets/css/docs.css" rel="stylesheet">
<link href="http://cdn.bootcss.com/highlight.js/7.3/styles/github.min.css" rel="stylesheet">
   <!-- #################################################################-->




</head>
<body>
    <form id="form1" runat="server">

        <div style="min-height: 1px; padding-right: 0px; padding-left: 0px; position: fixed; width:100%;z-index: 1030;float:left">
             <img src="image/1.jpg">
         </div>
    <div>
    <!--###导航栏-->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
      <!-- Brand and toggle get grouped for better mobile display -->
      <div class="navbar-header">
        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
          <span class="sr-only">Toggle navigation</span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="main.html">Three-Tanks Platform</a>
      </div>

      <!-- Collect the nav links, forms, and other content for toggling -->
      <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
        <ul class="nav navbar-nav">
          <li><a href="main.html">系统介绍</a></li>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">预约安排 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">实验预约</a></li>
              <li class="divider"></li>
              <li><a href="#">实验预习</a></li>
            </ul>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">教务管理 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">实验中心信息</a></li>
              <li class="divider"></li>
              <li><a href="#">通知</a></li>
              <li class="divider"></li>
              <li><a href="#">成绩查询</a></li>
              <li class="divider"></li>
              <li><a href="#">成绩补录</a></li>
              <li class="divider"></li>
              <li><a href="#">留言管理</a></li>
            </ul>

          <li class="dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统设置 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#">教师管理</a></li>
              <li class="divider"></li>
              <li><a href="#">学生管理</a></li>
            </ul>
          </li>

         <li><a href="The remote experiment.aspx">远程实验</a></li>

          <li class="dropdown">
            <a href="Experimental guidance-doc.aspx" class="dropdown-toggle" data-toggle="dropdown">实验指导 <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="#anchor1">实验指导书</a></li>
              <li class="divider"></li>
              <li><a href="#anchor2">实验指导视频</a></li>
            </ul>
          </li>


        </ul>
      </div><!-- /.navbar-collapse -->
    </nav>
    </div>

    <div style="min-height: 1px; padding-right: 15px; padding-left: 170px; position: fixed;top:20%; width:80%; float:left">
        <div class="list-group">
          <a href="#" class="list-group-item active">
            实验目标
          </a>
          <a herf="#" class="list-group-item">实验目标</a>
        </div>

        <div class="list-group">
          <a href="#" class="list-group-item active">
            实验流程
          </a>
          <a href="#" class="list-group-item">实验流程</a>
        </div>

        <div class="list-group">
          <a href="#" class="list-group-item active">
            练习
          </a>
          <a href="#" class="list-group-item">练习</a>
        </div>
    </div>

    </form>

    <!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- Bootstrap core JS file
  注意：此文件跟随官网最新版本更新，随时会有改变。建议使用下面v3.0.3版本的CDN链接！
 -->
<script src="../dist/js/bootstrap.js"></script>

</body>
</html>
