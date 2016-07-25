<?php
header("Content-type:text/html;charset=utf-8");
  // include function files for this application
  require_once('bookmark_fns.php');

  //create short variable names
  $email=$_POST['email'];
  $username=$_POST['username'];
  $passwd=$_POST['passwd'];
  $passwd2=$_POST['passwd2'];
  // start session which may be needed later
  // start it now because it must go before headers
  session_start();
  try   {
    // check forms filled in
    if (!filled_out($_POST)) {
      throw new Exception('你还没有填完资料 - 请返回继续填写.');
	 
    }

    // email address not valid
    if (!valid_email($email)) {
      throw new Exception('你还没有填邮箱 - 请返回继续填写.');
    }

    // passwords not the same
    if ($passwd != $passwd2) {
      throw new Exception('你还没有填密码 - 请返回继续填写.');
    }

    // check password length is ok
    // ok if username truncates, but passwords will get
    // munged if they are too long.
    if ((strlen($passwd) < 6) || (strlen($passwd) > 16)) {
      throw new Exception('你密码必须在6到16 之间 -请返回继续填写.');
    }

    // attempt to register
    // this function can also throw an exception
    register($username, $email, $passwd);
    // register session variable
    $_SESSION['valid_user'] = $username;

    // provide link to members page
    do_html_header('哇哦注册成功了');
    echo '请点击鼠标开始你的买书之旅吧!';
    do_html_url('member.php', 'GoGoGo买买买！');

   // end page
   do_html_footer();
  }
  catch (Exception $e) {
     do_html_header('问题来了！');
	 do_html_url('login.php', '返回继续登陆');
     echo $e->getMessage();
     do_html_footer();
     exit;
  }
?>
