<?php
header("Content-type:text/html;charset=utf-8");
// include function files for this application
require_once('book_sc_fns.php');
session_start();

do_html_header("删除目录");
if (check_admin_user()) {
  if (isset($_POST['catid'])) {
    if(delete_category($_POST['catid'])) {
      echo "<p>该书类型已经被删除.</p>";
  
  }
  else {
      echo "<p>该书类型不能被删除.<br />
            目录下不是空的.</p>";
  } 
}
else {
    echo "<p>No category specified.  Please try again.</p>";
  }
  do_html_url("admin.php", "返回管理界面");
 

}

else {
  echo "<p>You are not authorised to view this page.</p>";
}
do_html_footer();

?>
