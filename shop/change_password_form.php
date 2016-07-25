<?php
header("Content-type:text/html;charset=utf-8");
 require_once('book_sc_fns.php');
 session_start();
 do_html_header("管理员密码要改改啦");
 check_admin_user();

 display_password_form();

 do_html_url("admin.php", "返回管理界面");
 do_html_footer();
?>
