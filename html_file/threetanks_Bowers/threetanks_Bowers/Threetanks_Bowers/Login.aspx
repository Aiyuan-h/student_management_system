﻿<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title>登入页面</title>
    <style type="text/css">
        body 
        {
            width:800px;
            height:600px;
            margin-top:0px;
            background-image:url(image/zm.jpg);
            background-repeat:no-repeat;
        }
        .a 
        {
            position:absolute;
            top:280px;
            left:275px;
            font-size:20px;
        }
        .b 
        {
            position:absolute;
            top:310px;
            left:275px;
            font-size:20px;
        }
        .c 
        {
            position:absolute;
            top:365px;
            left:350px;
        }
        .d 
        {
            position:absolute;
            top:350px;
            left:370px;

        }
        #userName 
        {
            position:absolute;
            top:300px;
            left:350px;
            height:20px;
            width:180px;        
        }
        #userPasswd
        {
            position:absolute;
            top:330px;
            left:350px;
            height:20px;
            width:180px;        
        }
        #LoginBtn 
        {
            position:absolute;
            top:360px;
            left:440px;
            height:25px;
        }
    </style>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    <p class="a">用户名：</p>
    <asp:TextBox ID ="userName" runat="server" BackColor="#F2F2F2" BorderStyle="None" Font-Size="Medium" Font-Names="Arial"></asp:TextBox>
    <p class="b">密&nbsp&nbsp码：</p>
    <asp:TextBox ID ="userPasswd" runat="server" TextMode="Password" BackColor="#F2F2F2" BorderStyle="None" Font-Size="Medium"></asp:TextBox>
    <input class="c" type="checkbox" name="student" value="yes">
    <p class="d">记住我</p>
    <asp:ImageButton ID="LoginBtn" runat="server" ImageUrl="image/btn.png"/>
    </div>
    </form>
</body>
</html>
