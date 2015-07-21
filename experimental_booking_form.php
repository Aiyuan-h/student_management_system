<?php
/**
 * Created by PhpStorm.
 * User: hay
 * Date: 5/7/15
 * Time: 9:12 PM
 */

    require_once('login_header.php');
    session_start();
    do_html_header('实验台预约');
    check_valid_user();

    display_experimentai_booking_form();

    // do_html_footer();
?>
