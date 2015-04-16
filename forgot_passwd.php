<?php
  require_once("sms_header.php");
  do_html_header("重置密码...");

  // creating short variable name
  $username = $_POST['username'];

  try {
    $password = reset_password($username);
    notify_password($username, $password);
    echo '您的新密码已经发送到您的邮箱.<br />';
  }
  catch (Exception $e) {
      echo $e->getMessage();
    echo '您的密码不能够被重置，请稍候再试！';
  }
  do_html_url('login.php', 'Login');
  do_html_footer();
?>
