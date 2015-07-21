<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="The remote experiment.aspx.cs" Inherits="Threetanks_Bowers.The_remote_experiment" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>远程实验</title>

    <script type="text/javascript" src="JS/FusionCharts.js"></script>

    <script type="text/javascript">
        function LoadFlash(num){
            document.getElementById("Flash").innerHTML="<object classid='clsid:D27CDB6E-AE6D-11cf-96B8-444553540000' codebase='http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0' width='1280' height='568'>"+
       "<param name='movie' value='Flash/"+num+".swf'>"+
       "<param name='quality' value='high'>"+
       "<param name='wmode' value='transparent'>"+
       "<embed src='Flash/"+num+".swf' width='900' height='450' quality='high' pluginspage='http://www.macromedia.com/go/getflashplayer' type='application/x-shockwave-flash' wmode='transparent'></embed>"+
       "</object>";
        }

        function UpdateChart() {
            var mychartZoom = new FusionCharts("FusionCharts/ZoomLine.swf", "mychart1", "900", "375");
            mychartZoom.setDataURL("DataZoom.xml")
            mychartZoom.render("chartZoom");
        }
    </script>

        <script type="text/javascript">
            //定时刷新页面  
            var a = new Date().getTime();
            setTimeout("location.href='The remote experiment.aspx'", 10000);
    </script>


    <!--### Bootstrap 样式表 -->
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



    <%--样式表--%>
    <style type="text/css">

        #top {
            height: 119px;
        }
        #chartZoom {
            position: absolute;
            background-color: ButtonHighlight;
            top: 28px;
            left: 22px;
            width: 755px;
            height: 357px;
            border: solid 1px gray;
        }


    </style>

</head>
<body>
    <form id="form1" runat="server">
    <div id="top" style="position: relative; min-height: 1px; padding-left: 1px; padding-right: 15px; top:0px; width: 100%; height:120px; float:right; left: 0px;">
            <div style="min-height: 1px; padding-right: 0px; padding-left: 0px; position: fixed; width:100%;z-index: 1030;float:left">
                 <img src="image/1.jpg">
             </div>

        <!--###导航栏 style="position:absolute;top:72px;"-->
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
                  <li><a href="Experinental booking.aspx">实验预约</a></li>
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

             <li class="active"><a href="The remote experiment.aspx">远程实验</a></li>

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

    <!--<div id ="left-1" style="position: relative; min-height: 1px; padding-left: 1px; padding-right: 15px; top:4px; width: 70%; height:10px; float:left; left: 0px;"> -->

    <div id="left-1" style="position: relative; min-height: 1px; padding-left: 1px; padding-right: 15px; top:21px; width: 70%; height:350px; float:left; left: 0px;">
 
        <label style="position:absolute;top:1px; left:5px; height:21px;width:80px;height:25px;text-align:center;font-family:微软雅黑"><font size="3">用户：</font></label>
        <asp:Label runat="server" ID="user" style="position:absolute;top:1px;left:49px; width:80px;height:25px;text-align:center;" Font-Bold="true" Font-Names="微软雅黑"><font size="3">###</font></asp:Label>

        <label style="position:absolute;top:1px; left:200px; height:21px;width:80px;height:25px;text-align:center;font-family:微软雅黑"><font size="3">实验类型：</font></label>
        <asp:Label runat="server" ID="Exp" style="position:absolute;top:1px;left:285px;width:180px;height:25px;text-align:left;" Font-Bold="true" Font-Names="微软雅黑"><font size="4">######</font></asp:Label>

        <asp:Label runat="server" ID="high1" style="position:absolute;top:110px;left:125px;width:80px;height:25px;text-align:center;">0</asp:Label>
        <asp:Label runat="server" ID="high2" style="position:absolute;top:110px;left:295px;width:80px;height:25px;text-align:center;">0</asp:Label>
        <asp:Label runat="server" ID="high3" style="position:absolute;top:110px;left:490px;width:80px;height:25px;text-align:center;">0</asp:Label>
        <asp:Label runat="server" ID="temp" style="position:absolute;top:106px;left:775px;width:80px;height:25px;text-align:center;">0.0</asp:Label>
        <asp:Label runat="server" ID="flow1" style="position:absolute;top:399px;left:32px;width:80px;height:25px;text-align:center;">0</asp:Label>
        <asp:Label runat="server" ID="flow2" style="position:absolute;top:399px;left:792px;width:80px;height:25px;text-align:center;">0</asp:Label>
       <div>
         <asp:Button ID="Button1" runat="server" Text="开始" style="position:absolute;top:0; left: 450px; height: 23px; " OnClick="Button1_Click"/>
        
       </div>
        <div id="Flash">

        </div>
    </div>

    <div id="left-2" style="position: relative; min-height: 1px; padding-left: 1px; padding-right: 15px; top:100px; width: 70%; height:350px; float:left; left: 0px;">
        <div id="chartZoom">
        </div>
    </div>


    <div id="content" style="position: absolute; min-height: 1px; padding-left: 1px; padding-right: 15px; top:120px; width: 28%; height:800px; float:right; left: 950px;">
        <label style="position:absolute;top:27px; left:110px; height:21px;width:100px;font-family:微软雅黑"><font size="5">目标设置</font></label>

        <label style="position:absolute;top:75px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">液位1:</font></label>
        <asp:Label runat="server" ID="high1_value" style="position:absolute;top:75px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:74px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(mm)</font></label>

        <label style="position:absolute;top:110px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">液位2:</font></label>
        <asp:Label runat="server" ID="high2_value" style="position:absolute;top:110px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:109px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(mm)</font></label>

        <label style="position:absolute;top:145px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">液位3:</font></label>
        <asp:Label runat="server" ID="high3_value" style="position:absolute;top:145px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:144px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(mm)</font></label>

        <label style="position:absolute;top:180px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">温度1:</font></label>
        <asp:Label runat="server" ID="temp1_value" style="position:absolute;top:180px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0.0</font></asp:Label>
        <label style="position:absolute;top:179px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(℃)</font></label>

        <label style="position:absolute;top:215px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">流量1:</font></label>
        <asp:Label runat="server" ID="flow1_value" style="position:absolute;top:215px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:214px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(ml/s)</font></label>

        <label style="position:absolute;top:250px;left:100px;height:21px;width:80px;font-family:微软雅黑"><font size="4">流量2:</font></label>
        <asp:Label runat="server" ID="flow2_value" style="position:absolute;top:250px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:249px;left:215px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(ml/s)</font></label>


        <label style="position:absolute;top:292px; left:100px; height:21px;width:120px;font-family:微软雅黑"><font size="5">初始化设置</font></label>

        <label style="position:absolute;top:340px; left:80px; height:21px;width:120px;font-family:微软雅黑"><font size="4">水泵1#电压：</font></label>
        <asp:Label runat="server" ID="Pump1_V" style="position:absolute;top:339px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:339px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(V)</font></label>

        <label style="position:absolute;top:375px; left:80px; height:21px;width:120px;font-family:微软雅黑"><font size="4">水泵2#电压：</font></label>
        <asp:Label runat="server" ID="Pump2_V" style="position:absolute;top:374px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:374px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(V)</font></label>

        <label style="position:absolute;top:410px; left:80px; height:21px;width:120px;font-family:微软雅黑"><font size="4">球阀1#开度：</font></label>
        <asp:Label runat="server" ID="Ball1_value" style="position:absolute;top:409px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:409px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>

        <label style="position:absolute;top:445px; left:80px; height:21px;width:120px;font-family:微软雅黑"><font size="4">球阀2#开度：</font></label>
        <asp:Label runat="server" ID="Ball2_value" style="position:absolute;top:444px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:444px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>

        <label style="position:absolute;top:480px; left:80px; height:21px;width:120px;font-family:微软雅黑"><font size="4">球阀3#开度：</font></label>
        <asp:Label runat="server" ID="Ball3_value" style="position:absolute;top:479px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:479px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>

        <label style="position:absolute;top:515px; left:84px; height:21px;width:120px;font-family:微软雅黑"><font size="4">加热占空比：</font></label>
        <asp:Label runat="server" ID="temp_value" style="position:absolute;top:514px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:514px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>

        <label style="position:absolute;top:550px; left:61px; height:21px;width:155px;font-family:微软雅黑"><font size="4">连通阀1#开度：</font></label>
        <asp:Label runat="server" ID="Ball4_value" style="position:absolute;top:549px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:549px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>

        <label style="position:absolute;top:585px; left:61px; height:21px;width:155px;font-family:微软雅黑"><font size="4">连通阀2#开度：</font></label>
        <asp:Label runat="server" ID="Ball5_value" style="position:absolute;top:584px;left:175px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>
        <label style="position:absolute;top:584px;left:240px;height:21px;width:80px;font-family:微软雅黑"><font size="4">(%)</font></label>


        <label style="position:absolute;top:627px; left:100px; height:21px;width:150px;font-family:微软雅黑"><font size="5">PID参数设置</font></label>

        <label style="position:absolute;top:675px; left:120px; height:21px;width:50px;font-family:微软雅黑"><font size="4">Kp：</font></label>
        <asp:Label runat="server" ID="Kp_value" style="position:absolute;top:674px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">20</font></asp:Label>

        <label style="position:absolute;top:710px; left:120px; height:21px;width:50px;font-family:微软雅黑"><font size="4">Ki&nbsp：</font></label>
        <asp:Label runat="server" ID="Ki_value" style="position:absolute;top:709px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">12</font></asp:Label>

        <label style="position:absolute;top:745px; left:120px; height:21px;width:50px;font-family:微软雅黑"><font size="4">Kd：</font></label>
        <asp:Label runat="server" ID="Kd_value" style="position:absolute;top:744px;left:145px;width:80px;height:25px;text-align:center;" Font-Bold="true" ForeColor="#000000" Font-Names="Arial"><font size="4">0</font></asp:Label>




    </div>


        <!-- Placed at the end of the document so the pages load faster -->
<script src="http://cdn.bootcss.com/jquery/1.10.2/jquery.min.js"></script>

<!-- Bootstrap core JS file
  注意：此文件跟随官网最新版本更新，随时会有改变。建议使用下面v3.0.3版本的CDN链接！
 -->
<script src="../dist/js/bootstrap.js"></script>



    </form>


        </body>
</html>
