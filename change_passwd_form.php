<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 4/20/15
 * Time: 1:59 PM
 */
    require_once('login_header.php');
    session_start();
    do_html_header('更改密码');
    check_valid_user();

    display_password_form();

    // display_user_menu();
    // do_html_footer();
?>
