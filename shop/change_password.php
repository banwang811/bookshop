<?php
header("Content-type:text/html;charset=utf-8");
 require_once('book_sc_fns.php');
 session_start();
 do_html_header('Changing password');
 check_admin_user();
 if (!filled_out($_POST)) {
   echo "<p>You have not filled out the form completely.<br/>
         Please try again.</p>";
   do_html_url("admin.php", "返回管理界面");
   do_html_footer();
   exit;
 } else {
   $new_passwd = $_POST['new_passwd'];
   $new_passwd2 = $_POST['new_passwd2'];
   $old_passwd = $_POST['old_passwd'];
   if ($new_passwd != $new_passwd2) {
      echo "<p>密码前后输入不一致.</p>";
   } else if ((strlen($new_passwd)>16) || (strlen($new_passwd)<6)) {
      echo "<p>密码必须在6到16位之间.  请再次输入.</p>";
   } else {
      // attempt update
      if (change_password($_SESSION['admin_user'], $old_passwd, $new_passwd)) {
         echo "<p>密码修改成功.</p>";
      } else {
         echo "<p>密码修改不成功.</p>";
      }
   }
 }
 do_html_url("admin.php", "返回管理界面");
 do_html_footer();
?>
