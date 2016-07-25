<?php
header("Content-type:text/html;charset=utf-8");
// include function files for this application
require_once('book_sc_fns.php');
session_start();

do_html_header("添加书籍");
if (check_admin_user()) {
  display_book_form();
  do_html_url("admin.php", "返回管理员界面");
} else {
  echo "<p>You are not authorized to enter the administration area.</p>";
}
do_html_footer();

?>
