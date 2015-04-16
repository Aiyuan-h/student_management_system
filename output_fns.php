<?php

function do_html_header($title) {
  // print an HTML header
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left}
      a { color: #000000 }
    </style>
  </head>
  <body>
<!--  src处可以添加图片作为页面标签-->
  <img src="" alt="Student Management System logo" border="0"
       align="left" valign="bottom" height="55" width="57" />
  <h1>学生实验管理系统</h1>
  <hr />
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo $heading;?></h2>
<?php
}

//function display_site_info() {
//    // display some marketing info
//    ?>
<!--    <ul>-->
<!--        <li>Store your bookmarks online with us!</li>-->
<!--        <li>See what other users use!</li>-->
<!--        <li>Share your favorite links with others!</li>-->
<!--    </ul>-->
<?php
//}

function display_login_form() {
?>
  <p><a href="register_form.php">注册?</a></p>
  <form method="post" action="member.php">
  <table bgcolor="#cccccc">
   <tr>
     <td colspan="2">用户登录:</td>
   <tr>
     <td>用户名:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>密码:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="登录"/></td></tr>
   <tr>
     <td colspan="2"><a href="forgot_form.php">忘记密码?</a></td>
   </tr>
 </table></form>
<?php
}

function display_registration_form() {
?>
 <form method="post" action="register_new.php">
 <table bgcolor="#cccccc">
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
   <form action="change_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
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
   </table>
   <br />
<?php
}

function display_forgot_form() {
  // display HTML form to reset and email password
?>
   <br />
   <form action="forgot_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>输入用户名：</td>
       <td><input type="text" name="username" size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan=2 align="center">
       <input type="submit" value="更改密码"/>
   </td></tr>
   </table>
   <br />
<?php
}

function do_html_URL($url, $name) {
    // output URL as link and br
?>
    <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function display_student(){
    //output student view
?>


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

?>
