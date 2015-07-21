<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
    require_once("login_header.php");
    do_html_header("重置密码...");

    // creating short variable name
    $username = $_POST['username'];

    try {
        $password = reset_password($username);
        notify_password($username, $password);
        echo '<div style="margin-top: 160px">您的新密码已经发送到您的邮箱.</div>';
    }
    catch (Exception $e) {
        do_html_header('出错:');
        echo $e->getMessage();
        echo '<div style="margin-top: 160px">您的密码不能够被重置，请稍候再试！</div>';
    }
    // do_html_url('login.php', 'Login');
    // do_html_footer();
?>
