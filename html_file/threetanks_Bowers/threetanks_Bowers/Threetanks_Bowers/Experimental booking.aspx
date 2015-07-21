<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>实验预约</title>

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
   <div>
             <div style="min-height: 1px; padding-right: 0px; padding-left: 0px; position: fixed; width:100%;z-index: 1030;float:left">
             <img src="image/1.jpg">
         </div>

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
            <a  class="active" href="#" class="dropdown-toggle" data-toggle="dropdown">预约安排 <b class="caret"></b></a>
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

    <div id="content">
        <img src="image/实验台.jpg" style="position:absolute;top:200px;left:100px;">
        <Label style="position:absolute;top:390px;left:100px;"><font size="4">1号实验台</font></Label>
        <Label style="position:absolute;top:395px;left:220px;">状态：</Label>
        <asp:TextBox ID="TextBox1" runat="server" style="position:absolute;top:395px;left:270px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button1" runat="server" style="position:absolute;top:430px;left:220px;" Text="预约" />
        <asp:Button ID="Button2" runat="server" style="position:absolute;top:430px;left:290px;" Text="取消" />

        <img src="image/实验台.jpg" style="position:absolute;top:200px;left:400px;">
        <Label style="position:absolute;top:390px;left:400px;"><font size="4">2号实验台</font></Label>
        <Label style="position:absolute;top:395px;left:520px;">状态：</Label>
        <asp:TextBox ID="TextBox2" runat="server" style="position:absolute;top:395px;left:570px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button3" runat="server" style="position:absolute;top:430px;left:520px;" Text="预约" />
        <asp:Button ID="Button4" runat="server" style="position:absolute;top:430px;left:590px;" Text="取消" />

        <img src="image/实验台.jpg" style="position:absolute;top:200px;left:700px;">
        <Label style="position:absolute;top:390px;left:700px;"><font size="4">3号实验台</font></Label>
        <Label style="position:absolute;top:395px;left:820px;">状态：</Label>
        <asp:TextBox ID="TextBox3" runat="server" style="position:absolute;top:395px;left:870px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button5" runat="server" style="position:absolute;top:430px;left:820px;" Text="预约" />
        <asp:Button ID="Button6" runat="server" style="position:absolute;top:430px;left:890px;" Text="取消" />
        
        <img src="image/实验台.jpg" style="position:absolute;top:200px;left:1000px;">
        <Label style="position:absolute;top:390px;left:1000px;"><font size="4">4号实验台</font></Label>
        <Label style="position:absolute;top:395px;left:1120px;">状态：</Label>
        <asp:TextBox ID="TextBox4" runat="server" style="position:absolute;top:395px;left:1170px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button7" runat="server" style="position:absolute;top:430px;left:1120px;" Text="预约" />
        <asp:Button ID="Button8" runat="server" style="position:absolute;top:430px;left:1190px;" Text="取消" />        
        
        <img src="image/实验台.jpg" style="position:absolute;top:500px;left:100px;">
        <Label style="position:absolute;top:690px;left:100px;"><font size="4">5号实验台</font></Label>
        <Label style="position:absolute;top:695px;left:220px;">状态：</Label>
        <asp:TextBox ID="TextBox5" runat="server" style="position:absolute;top:695px;left:270px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button9" runat="server" style="position:absolute;top:730px;left:220px;" Text="预约" />
        <asp:Button ID="Button10" runat="server" style="position:absolute;top:730px;left:290px;" Text="取消" />        
        
        <img src="image/实验台.jpg" style="position:absolute;top:500px;left:400px;">
        <Label style="position:absolute;top:690px;left:400px;"><font size="4">6号实验台</font></Label>
        <Label style="position:absolute;top:695px;left:520px;">状态：</Label>
        <asp:TextBox ID="TextBox6" runat="server" style="position:absolute;top:695px;left:570px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button11" runat="server" style="position:absolute;top:730px;left:520px;" Text="预约" />
        <asp:Button ID="Button12" runat="server" style="position:absolute;top:730px;left:590px;" Text="取消" />        
        
        <img src="image/实验台.jpg" style="position:absolute;top:500px;left:700px;">
        <Label style="position:absolute;top:690px;left:700px;"><font size="4">7号实验台</font></Label>
        <Label style="position:absolute;top:695px;left:820px;">状态：</Label>
        <asp:TextBox ID="TextBox7" runat="server" style="position:absolute;top:695px;left:870px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button13" runat="server" style="position:absolute;top:730px;left:820px;" Text="预约" />
        <asp:Button ID="Button14" runat="server" style="position:absolute;top:730px;left:890px;" Text="取消" />        
        
        <img src="image/实验台.jpg" style="position:absolute;top:500px;left:1000px;">
        <Label style="position:absolute;top:690px;left:1000px;"><font size="4">8号实验台</font></Label>
        <Label style="position:absolute;top:695px;left:1120px;">状态：</Label>
        <asp:TextBox ID="TextBox8" runat="server" style="position:absolute;top:695px;left:1170px; width: 56px;"></asp:TextBox>
        <asp:Button ID="Button15" runat="server" style="position:absolute;top:730px;left:1120px;" Text="预约" />
        <asp:Button ID="Button16" runat="server" style="position:absolute;top:730px;left:1190px;" Text="取消" />     

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
