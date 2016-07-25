<?php
header("Content-type:text/html;charset=utf-8");
// include function files for this application
require_once('book_sc_fns.php');
session_start();

do_html_header("添加目录");
if (check_admin_user()) {
  if (filled_out($_POST))   {
    $catname = $_POST['catname'];
    if(insert_category($catname)) {
      echo "<p>目录 \"".$catname."\" 已经被添加到数据库.</p>";
    } else {
      echo "<p>目录 \"".$catname."\" 添加到数据库失败.</p>";
    }
  } else {
    echo "<p>You have not filled out the form.  Please try again.</p>";
  }
  do_html_url('admin.php', '返回管理界面');
} else {
  echo "<p>You are not authorised to view this page.</p>";
}

do_html_footer();

?>
