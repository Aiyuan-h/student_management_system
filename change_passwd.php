<?php
  require_once('sms_header.php');
  session_start();
  do_html_header('密码更改...');

  // create short variable names
  $old_passwd = $_POST['old_passwd'];
  $new_passwd = $_POST['new_passwd'];
  $new_passwd2 = $_POST['new_passwd2'];

  try {
    check_valid_user();
    if (!filled_out($_POST)) {
      throw new Exception('您没有填写完成表单，请返回并重试！');
    }

    if ($new_passwd != $new_passwd2) {
       throw new Exception('密码输入不一致，请返回并重试！');
    }

    if ((strlen($new_passwd) > 16) || (strlen($new_passwd) < 6)) {
       throw new Exception('新密码长度必须为6-16之间，请重新输入！');
    }

    // attempt update
    change_password($_SESSION['valid_user'], $old_passwd, $new_passwd);
    echo '密码已经更改';
  }
  catch (Exception $e) {
    echo $e->getMessage();
  }
  display_user_menu();
  do_html_footer();
?>
