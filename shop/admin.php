<?php
header("Content-type:text/html;charset=utf-8");
// include function files for this application
require_once('book_sc_fns.php');
session_start();


if (($_POST['username']) && ($_POST['passwd'])) {
	// they have just tried logging in

    $username = $_POST['username'];
    $password = $_POST['passwd'];

    if (login($username, $password)) {
      // if they are in the database register the user id
      $_SESSION['admin_user'] = $username;

   } else {
      // unsuccessful login
      do_html_header("问题来了:");
      echo "<p>You could not be logged in.<br/>
            You must be logged in to view this page.</p>";
      do_html_url('blogin.php', '登陆');
      do_html_footer();
      exit;
    }
}

do_html_header("管理员要搞事啦");

if (check_admin_user()) {
  display_admin_menu();
   display_button('blogout.php', 'logout', 'Log Out');
} else {
  echo "<p>Sorry，你没有管理员权限.</p>";
  do_html_url('blogin.php', '登陆');
}
do_html_footer();

?>
