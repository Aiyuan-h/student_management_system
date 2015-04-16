<?php

// include function files for this application
require_once('sms_header.php');
session_start();
$old_user = $_SESSION['valid_user'];

// store  to test if they *were* logged in
unset($_SESSION['valid_user']);
$result_dest = session_destroy();

// start output html
do_html_header('退出...');

if (!empty($old_user)) {
  if ($result_dest)  {
    // if they were logged in and are now logged out
    echo 'Logged out.<br />';
    do_html_url('login.php', 'Login');
  } else {
   // they were logged in and could not be logged out
    echo '退出失败.<br />';
  }
} else {
  // if they weren't logged in but came to this page somehow
  echo '您并没有登录，或者您已经退出系统！<br />';
  do_html_url('login.php', 'Login');
}

do_html_footer();

?>
