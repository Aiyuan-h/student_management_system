<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */

function do_html_header($title) {
?>
<html>
<head lang="en">
    <meta charset="UTF-8">
    <title><?php echo $title;?></title>

    <!--使用的是bootstrap3.0版本的，其他版本可能显示不同-->
    <link href="./html_file/Dist/css/bootstrap.min.css" type="text/css" rel="stylesheet">
    <!--下拉菜单实现须使用js实现-->
    <script src="jq/jquery.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <link href="css/main_form_css.css" type="text/css" rel="stylesheet">
    <script src="js/full_screen.js"></script>
    <!--实验预约界面css样式控制-->
    <link rel="stylesheet" type="text/css" href="./css/experimental_booking_css.css">

</head>
<body>
    <div class="top" style="min-height: 1px; padding-right: 0px; padding-left: 0px; position: fixed; width:100%;z-index: 10;float:left;">
        <img src="images/1.jpg" style="z-index: 15">
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
                <a class="navbar-brand" href="introduce_system.php">Three-Tanks Platform</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="introduce_system.php">系统介绍</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">预约安排 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="experimental_booking_form.php">实验预约</a></li>
                            <li class="divider"></li>
                            <li><a href="#">实验预习</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">教务管理 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">通知</a></li>
                            <li class="divider"></li>
                            <li><a href="upload_file_form.php">资料的上传</a></li>
                            <li class="divider"></li>
                            <li><a href="download_file.php">资料的下载</a></li>
                            <li class="divider"></li>
                            <li><a href="Leaving Messages">留言管理</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">成绩管理<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="search_grade_form.php">成绩查询</a></li>
                            <li class="divider"></li>
                            <li><a href="update_grade_form.php">成绩修改</a></li>
                            <li class="divider"></li>
                            <li><a href="insert_grade_form.php">成绩补录</a></li>
                            <li class="divider"></li>
                            <li><a href="delete_grade_form.php">成绩删除</a></li>
                        </ul>
                    </li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">系统设置 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">教师管理</a></li>
                            <li class="divider"></li>
                            <li><a href="#">学生管理</a></li>
                        </ul>
                    </li>

                    <li><a href="#">远程实验</a></li>

                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">实验指导 <b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="#">实验指导书</a></li>
                            <li class="divider"></li>
                            <li><a href="#">实验指导视频</a></li>
                        </ul>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">数据库操作<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="db_backup_form.php">数据库备份</a></li>
                            <li class="divider"></li>
                            <li><a href="db_restore_form.php">数据库还原</a></li>
                        </ul>
                    </li>

                </ul>
                <ul class="nav navbar-nav navbar-right" style="margin-right: 10px">
                    <li><a>当前用户：<?php
                            if(isset($_SESSION['valid_user']))  {
                                echo $_SESSION['valid_user'];
                            } else {
                            }?>
                        </a>
                    </li>
                    <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">用户设置<b class="caret"></b></a>
                        <ul class="dropdown-menu">
                            <li><a href="change_passwd_form.php">密码修改</a></li>
                            <li class="divider"></li>
                            <li><a href="login.php">重新登录</a></li>
                            <li class="divider"></li>
                            <li><a href="logout.php">退出系统</a></li>
                        </ul>
                    </li>
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>
    </div>
<?php
//    if($title) {
//    do_html_heading($title);
//}

}

function display_login_form() {
?>
    <!DOCTYPE html>
    <html>
    <head lang="en">
        <meta charset="UTF-8">
        <title>student manage system</title>

        <link href="css/bootstrap.min.css" type="text/css" rel="stylesheet">
        <link href="css/login_css.css" type="text/css" rel="stylesheet">
        <script src="jq/jquery.min.js"></script>
        <script src="js/bootstrap.min.js"></script>

    </head>
    <body >
    <div class="photo_contain">
        <img src="login_photo/2013517234333476.jpg"/>
        <div class="login">
            <!--<div class="container">-->
            <div class="shadeDiv"></div>
            <form class="form-signin" role="form" method="post" action="member.php">
                <h2 class="form-signin-heading"style="margin: 0px">用户登录</h2>
                <a class="form-register" href="register_form.php" style="float: right">注册？</a>
                <br>
                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-user"></span></span>
                    <input type="text" class="form-control"  name="username" placeholder="用户名" required autofocus>
                    <div class="input-group-btn">
                        <button type="button" class="btn btn-lg btn-default dropdown-toggle" data-toggle="dropdown"><span class="caret"></span></button>
                        <ul class="dropdown-menu dropdown-menu-right" role="menu">
                            <li><a href="#">学生</a></li>
                            <li><a href="#">教师</a></li>
                            <li><a href="#">管理员</a></li>
                        </ul>
                    </div>
                </div>

                <div class="input-group input-group-lg">
                    <span class="input-group-addon"><span class="glyphicon glyphicon-lock"></span></span>
                    <input type="password" class="form-control" name="passwd" placeholder="密码" required>
                </div>
                <div class="checkbox">
                    <label>
                        <input type="checkbox" value="remember-me"> 记住我
                    </label>

                    <label style="float: right">
                        <a href="forgot_passwd_form.php">忘记密码?</a>
                    </label>
                </div>

                <button class="btn btn-lg btn-primary btn-block" type="submit">登录</button>
            </form>
            <!--</div> &lt;!&ndash; /container &ndash;&gt;-->
        </div>
    </div>
    </body>
    </html>
<?php
}

function display_registration_form() {
?>
 <form method="post" action="register_new.php" style="margin-top: 160px">
 <table style="background-color: #cccccc">
   <tr>
     <td>Email 地址：</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>
   <tr>
     <td>用户名：<br />(max 16 chars):</td>
     <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>密码：<br />(between 6 and 16 chars):</td>
     <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>确认密码：</td>
     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="注册"></td></tr>
 </table></form>
<?php

}

function display_password_form() {
  // display html change password form
?>
   <br />
   <form action="change_passwd.php" method="post" style="margin-top: 160px">
   <table width="250" cellpadding="2" cellspacing="0"  style="background-color: #cccccc">
   <tr><td>旧密码：</td>
       <td><input type="password" name="old_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>新密码：</td>
       <td><input type="password" name="new_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>重复新密码：</td>
       <td><input type="password" name="new_passwd2"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan="2" align="center">
       <input type="submit" value="更改密码"/>
   </td></tr>
   </table></form>
   <br />
<?php
}

function display_forgot_passwd() {
  // display HTML form to reset and email password
?>
    <!--    <div style="position:absolute;padding-top:150px;width:200px;height: 100px;text-align: center;">-->
    <form action="forgot_passwd.php" method="post" style="margin-top: 160px;" >
        <table width="auto" height="50px" cellpadding="2" cellspacing="0" style="background-color: #cccccc">
            <tr>
                <td>输入用户名：</td>
                <td><input type="text" name="username" size="16" maxlength="16"/></td>
            </tr>
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="更改密码"/>
                </td>
            </tr>
        </table>
    </form>
    <!--    </div>-->
<?php
}

function do_html_heading($heading) {
    // print heading
?>
    <h2 style="margin-top:140px"><?php echo $heading;?></h2>
<?php
}


function display_db_restore(){
?>
    <br />
    <form id="form1" name="form1" method="post" action="db_restore.php" enctype="multipart/form-data" style="margin-top: 160px;" >
        【数据库SQL文件】：<input id="sqlFile" name="sql_file" type="file" />
        <input id="submit" name="submit" type="submit" value="还原" />
    </form>
    <br />
<?php
}

function display_db_backup(){
    ?>
    <br />
    <div style="margin-top: 160px"><a href="db_backup.php">备份</a></div>
    <br />
<?php
}

function display_search_form(){
?>
    <br />
    <form method="post" action="search_grade.php" style="margin-top: 160px;" >
        <table bgcolor="#cccccc">
            <tr>
                <td>姓名：</td>
                <td valign="top"><input type="text" name="name"/></td></tr>
            <tr>
                <td>学号：</td>
                <td valign="top"><input type="text" name="id"/></td></tr>
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="查询">
                    <a href="search_grade_all.php">查询所有！</a></td></tr>
        </table></form>
    <br />
<?php
}

function display_insert_grade_form()
{
?>
    <br />
    <form method="post" action="insert_grade.php" style="margin-top: 160px;" >
        <table bgcolor="#cccccc">
            <tr>
                <td>学号：</td>
                <td valign="top"><input type="text" name="id"/></td></tr>
            <tr>
                <td>姓名：</td>
                <td valign="top"><input type="text" name="name"/></td></tr>
            <tr>
                <td>成绩：</td>
                <td valign="top"><input type="text" name="grade"/></td></tr>
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="插入成绩">
        </table></form>
    <br />
<?php
}

function display_delete_grade_form()
{
    ?>
    <br />
    <form method="post" action="delete_grade.php" style="margin-top: 160px;" >
        <table bgcolor="#cccccc">
            <tr>
                <td>学号：</td>
                <td valign="top"><input type="text" name="id"/></td></tr>
<!--            <tr>-->
<!--                <td>成绩：</td>-->
<!--                <td valign="top"><input type="text" name="id"/></td></tr>-->
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="删除成绩">
        </table></form>
    <br />
<?php
}

function display_update_grade_form()
{
    ?>
    <br />
    <form method="post" action="update_grade.php" style="margin-top: 160px;" >
        <table bgcolor="#cccccc">
            <tr>
                <td>学号：</td>
                <td valign="top"><input type="text" name="id"/></td></tr>
            <tr>
                <td>成绩：</td>
                <td valign="top"><input type="text" name="grade"/></td></tr>
            <tr>
                <td colspan=2 align="center">
                    <input type="submit" value="修改成绩">
        </table></form>
    <br />
<?php
}


function display_teacher(){
    //output teacher view
?>


<?php
}

function display_admin(){
    //output admin view
?>


<?php
}


function display_main_form(){
?>
    <!--###系统介绍-->
    <div class="body" >
        <div class="picture_content" style="  padding-top: 0px; position: fixed;padding-left: 5%;top: 25%;width: 45%;float: left;">

            <img class="pic img-responsive" src="images/xm-1.png">
            <!--<img class="featurette-image img-responsive" src="images/xm-1-2.png" alt="Generic placeholder image">-->
        </div>

        <div calss="literate_content" style="position: relative; min-height: 1px; padding-left: 1px; padding-right: 15px; top:180px; width: 55%; float:right ">

            <h3 class="featurette-heading"><font size="6">&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp计算机控制技术实验系统 <span class="text-muted"></span></font></h3>
            <p class="lead">　　计算机控制技术实验系统由控制计算机和控制器两大部分组成。该系统可实现输入输出接口与过程通道技术，计算机控制算法和上位机界面操作三大功能。控制器可采集温度、压力、流量等模拟信号，使用了高精度转换芯片，最高A/D转换精度可达到24位，已满足工业级标准。实验台的面板绘制了控制器电路原理，并引出各类检测点用于测试，样式美观、操作性强。上位机用于算法选择和实验设置，可绘制液位、温度、流量等曲线，界面友好，操作简单。</p>
            <br />
            <div class="literate_picture" style="width:100%;text-align: center">
                <img src="images/xm-1-2.jpg"  alt="Generic placeholder image">
            </div>
            <p class="lead">
                系统功能<br/>
                PID算法三容水箱液位控制实验；<br/>
                PID算法单容水箱温度控制实验；<br/>
                PID算法流量控制实验；<br/>
                前馈-反馈算法三容水箱液位控制实验；<br/>
                串级算法三容水箱液位控制实验；<br/>
                智能算法三容水箱液位控制实验；<br/>
                数据保存及曲线绘制。
            </p>
            <br />
            <p class="lead">
                系统特点<br/>
                实验面板可检测控制器各类信号，操作性强。<br/>
                系统设有各类安全措施，例如液位开关，安全可靠，稳定性强。<br/>
                实验台设计美观，配套的软件界面友好。<br/>
            </p>
            <br />
            <p class="lead">
                技术参数<br/>
                水槽：容积 71L，长宽高580mm*490mm*250mm；<br/>
                水箱容积：大水箱8L，小水箱3.5L；<br/>
                实验台：长宽高 604mm*514mm*730mm；<br/>
                重量：31kg（无水时），50kg(有水时)；<br/>
                电源：220V交流供电；<br/>
                上位机界面使用C#.net编写，包含实验选择、动画显示、数据显示、曲线显示、报警显示、参数设置及历史查询等功能，界面直观，操作简单。
            </p>
            <br />
        </div>
    </div>
<?php
}

function display_experimentai_booking_form(){
?>
    <div class="container">
        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">1号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button1" type = "button" value = "预约" />
                <input id="button2" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">2号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button3" type = "button" value = "预约" />
                <input id="button4" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">3号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button5" type = "button" value = "预约" />
                <input id="button6" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">4号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button7" type = "button" value = "预约" />
                <input id="button8" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">5号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button9" type = "button" value = "预约" />
                <input id="button10" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">6号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button11" type = "button" value = "预约" />
                <input id="button12" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">7号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button13" type = "button" value = "预约" />
                <input id="button14" type = "button" value = "取消" />
            </div>
        </div>

        <div>
            <div><img src="images/实验台.jpg"></div>
            <p></p>
            <div style="text-align: right">
                <b><font size="4">8号实验台</font></b>
                &nbsp&nbsp&nbsp<b>状态：</b><input type="text" name="fname" style="width: 40px;height: 20px;"/>
            </div>
            <div style = "text-align:right;">
                <input id="button15" type = "button" value = "预约" />
                <input id="button16" type = "button" value = "取消" />
            </div>
        </div>
    </div>
<?php
}


function display_upload_file_form(){
?>
    <form action="upload_file.php" method="post" enctype="multipart/form-data" style="margin-top: 160px;">
        请选择要上传的文件：
        <input type="file" name="myfile" /><br />
        <input type="submit" value="上传文件"/><br />
    </form>
<?php
}

function display_download_file_form(){
    ?>
    <!--超链接php文件相当于执行了php文件，如果是超链接的其他文件就是直接打开文件例如图片类型，或者html类型-->
    <a href="download_file.php">下载</a>
<?php
}
?>