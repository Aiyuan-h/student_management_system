<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 5/10/15
 * Time: 12:41 PM
 */
    require_once('login_header.php');
    session_start();
    do_html_header('主页');
    //check_valid_user();
    display_main_form();

?>