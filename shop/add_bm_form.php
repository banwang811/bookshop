<?php
// include function files for this application
require_once('bookmark_fns.php');
session_start();
header("Content-type:text/html;charset=utf-8");
// start output html
do_html_header('增加书签');

check_valid_user();
display_add_bm_form();

display_user_menu();
do_html_footer();

?>
