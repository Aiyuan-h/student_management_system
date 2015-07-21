<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
  // include function files for this application
    require_once('login_header.php');

    //create short variable names
    $email=$_POST['email'];
    $username=$_POST['username'];
    $passwd=$_POST['passwd'];
    $passwd2=$_POST['passwd2'];
    // start session which may be needed later
    // start it now because it must go before headers
    session_start();
    try   {
        // check forms filled in
        if (!filled_out($_POST)) {
        throw new Exception('您没有填写完成表单，请返回并重试！');
    }

    // email address not valid
    if (!valid_email($email)) {
        throw new Exception('邮件地址不可用，请返回并重试！');
    }

    // passwords not the same
    if ($passwd != $passwd2) {
        throw new Exception('密码输入不一致，请返回并重试！');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
        throw new Exception('您的密码长度必须处在6-16之间,请返回并重试！');
    }

    // attempt to register
    // this function can also throw an exception
    register($username, $email, $passwd);
    // register session variable
    $_SESSION['valid_user'] = $username;

    // provide link to members page
    do_html_header('注册成功');
    echo '<div style="margin-top: 160px"><p>注册成功..........!</p><p>请重新<a href="login.php">登录</a></p></div>';
    }
    catch (Exception $e) {
        do_html_header('问题:');
        echo '<div style="margin-top: 160px">'.$e->getMessage()."</div>";
        // do_html_footer();
        exit;
    }
?>
