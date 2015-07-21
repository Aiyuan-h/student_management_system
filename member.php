<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */

    // include function files for this application
    require_once('login_header.php');
    session_start();

    //create short variable names
    //使用post、get、session等变量赋值时，一定要检测变量是否已经设置。具体看blog
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $passwd = isset($_POST['passwd']) ? $_POST['passwd'] : '';
    //$username = $_POST['username'];
    //$passwd = $_POST['passwd'];
    //echo $_POST['username'];
    //print_r($_POST);
    if ($username && $passwd) {
        // they have just tried logging in
        try  {
            login($username, $passwd);
            // if they are in the database register the user id
            $_SESSION['valid_user'] = $username;
        }
        catch(Exception $e)  {
            // unsuccessful login
            echo '<div style="margin-top: 160px">'.$e->getMessage().'</div>';
            do_html_header('出错:');
            echo '<div style="margin-top: 160px">登录出错，请重新登录！</div>';
            //    do_html_url('login.php', 'Login');
            //    do_html_footer();
            exit;
        }
    }

    do_html_header('计算机控制技术教学管理平台');
    check_valid_user();
    display_main_form();

    // get the bookmarks this user has saved
    //if ($url_array = get_user_urls($_SESSION['valid_user'])) {
    //  display_user_urls($url_array);
    //}

    // give menu of options
    //display_user_menu();

    //do_html_footer();
?>
