<!DOCTYPE html>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title>计算机控制技术教学管理平台主页</title>

    <!--使用的是bootstrap3.0版本的，其他版本可能显示不同-->
    <link href="../html_file/Dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!--下拉菜单实现须使用js实现-->
    <script src="../jq/jquery.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <link href="../css/main_form_css.css" type="text/css" rel="stylesheet">
    <script src="../js/full_screen.js"></script>

</head>
<body>
    <div class="top">
        <img src="../images/1.jpg">
    </div>
    <div class="nav">
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
                    <li class="active"><a href="main.html">系统介绍</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">预约安排 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="Experimental booking.aspx">实验预约</a></li>
                            <li class="divider"></li>
                            <li><a href="Experimental Preparing.aspx">实验预习</a></li>
                        </ul>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">教务管理 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="imformations.aspx">通知</a></li>
                            <li class="divider"></li>
                            <li><a href="grade table.aspx">成绩查询</a></li>
                            <li class="divider"></li>
                            <li><a href="grade insert.aspx">成绩补录</a></li>
                            <li class="divider"></li>
                            <li><a href="Leaving Messages">留言管理</a></li>
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
                        <a href="Experimental guidance.aspx" class="dropdown-toggle" data-toggle="dropdown">实验指导 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="Experimental guidance.aspx">实验指导书</a></li>
                            <li class="divider"></li>
                            <li><a href="#anchor2">实验指导视频</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>


    <!--###系统介绍-->
    <div class="body" >
      <img src="../images/实验台.jpg" style="float: left">
    </div>

</body>
</html>

