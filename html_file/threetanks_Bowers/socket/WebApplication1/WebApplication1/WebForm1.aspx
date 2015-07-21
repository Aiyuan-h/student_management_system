<%@ Page Language="C#" AutoEventWireup="true" CodeBehind="WebForm1.aspx.cs" Inherits="WebApplication1.WebForm1" %>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <title></title>
</head>
<body>
    <form id="form1" runat="server">
    <div>
    
        <asp:Button ID="Button2" runat="server" Text=" 2" OnClick="Button2_Click"/>
    
    </div>
        <asp:TextBox ID="TextBox1" runat="server">192.168.0.1</asp:TextBox>
        <asp:TextBox ID="TextBox2" runat="server">8080</asp:TextBox>
        <asp:TextBox ID="change" runat="server">0000</asp:TextBox>
        <asp:TextBox ID="text" runat="server">0000</asp:TextBox>
        <asp:Label ID="Label1" runat="server" Text="Label">0</asp:Label>
    <div>
        <asp:Button ID="Button1" runat="server" Text=" 3" OnClick="Button1_Click"/>
        <asp:Button ID="Button3" runat="server" Text=" 1" OnClick="Button3_Click"/>

    </div>

 
     


    </form>
</body>
</html>
