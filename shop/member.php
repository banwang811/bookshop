<?php
header("Content-type:text/html;charset=utf-8");
// include function files for this application
require_once('bookmark_fns.php');
session_start();

//create short variable names
@$username = $_POST['username'];
@$passwd = $_POST['passwd'];

if ($username && $passwd) {
// they have just tried logging in
  try  {
    login($username, $passwd);
    // if they are in the database register the user id
    $_SESSION['valid_user'] = $username;
  }
  catch(Exception $e)  {
    // unsuccessful login
    do_html_header('问题来了:');
    echo 'You could not be logged in.
          You must be logged in to view this page.';
    do_html_url('login.php', '登陆');
    do_html_footer();
    exit;
  }
}

do_html_header('Home');
check_valid_user();
// get the bookmarks this user has saved
if ($url_array = get_user_urls($_SESSION['valid_user'])) {
  display_user_urls($url_array);
}

// give menu of options
display_user_menu();
function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"images/".$image.".png\"
           alt=\"".$alt."\" border=\"0\" height=\"50\"
           width=\"135\"/></a></div>";
}
display_button("index.php", "cat", "buy Menu");

/*setcookie("username", "user1", time()+3600);//PHP中有cookie相关的函数， 用户登录成功的时候，可能有如下的语句
判断用户是否登录的时候，有类似这样的语句：
if (isset($_COOKIE["username"])){
/echo "已经登录";
}
用户退出的时候，有类似这样的语句：
setcookie("username", "", time()-3600);*/

do_html_footer();

?>
