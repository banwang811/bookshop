<?php
header("Content-type:text/html;charset=utf-8");
function do_html_header($title) {
  // print an HTML header
?>
  <html>
  <head>
    <title><?php echo $title;?></title>
    <style>
      body { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      li, td { font-family: Arial, Helvetica, sans-serif; font-size: 13px }
      hr { color: #3333cc; width=300; text-align=left}
      a { color: #000000 }
    </style>
  </head>
  <body>
  <img src="bookmark.gif" alt="PHPbookmark logo" border="0"
       align="left" valign="bottom" height="55" width="57" />
  <h1>PHPbookmark</h1>
  <hr />
<?php
  if($title) {
    do_html_heading($title);
  }
}

function do_html_footer() {
  // print an HTML footer
?>
  </body>
  </html>
<?php
}

function do_html_heading($heading) {
  // print heading
?>
  <h2><?php echo $heading;?></h2>
<?php
}

function do_html_URL($url, $name) {
  // output URL as link and br
?>
  <br /><a href="<?php echo $url;?>"><?php echo $name;?></a><br />
<?php
}

function display_site_info() {
  // display some marketing info
?>
  <ul>
  <li>Store your bookmarks online with us!</li>
  <li>See what other users use!</li>
  <li>Share your favorite links with others!</li>
  </ul>
<?php
}

function display_login_form() {
?>
  <p><a href="register_form.php">注册?</a></p>
  <form method="post" action="member.php">
  <table bgcolor="#cccccc" align="center">
   <tr>
     <td colspan="2">用户登录:</td>
   <tr>
     <td>用户名:</td>
     <td><input type="text" name="username"/></td></tr>
   <tr>
     <td>密码:</td>
     <td><input type="password" name="passwd"/></td></tr>
   <tr>
     <td colspan="2" align="center">
     <input type="submit" value="登陆"/></td></tr>
   <tr>
     <td colspan="2"><a href="forgot_form.php">忘记密码?</a></td>
   </tr>
 </table></form>
<?php
}

function display_registration_form() {
?>
 <form method="post" action="register_new.php">
 <table bgcolor="#cccccc" align="center">
   <tr>
     <td>邮箱:</td>
     <td><input type="text" name="email" size="30" maxlength="100"/></td></tr>
   <tr>
     <td>用户名:<br />(不超出16位):</td>
     <td valign="top"><input type="text" name="username"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>密码:<br />(6到16位):</td>
     <td valign="top"><input type="password" name="passwd"
         size="16" maxlength="16"/></td></tr>
   <tr>
     <td>确认密码:</td>
     <td><input type="password" name="passwd2" size="16" maxlength="16"/></td></tr>
   <tr>
     <td colspan=2 align="center">
     <input type="submit" value="注册"></td></tr>
 </table></form>
<?php

}

function display_user_urls($url_array) {
  // display the table of URLs

  // set global variable, so we can test later if this is on the page
  global $bm_table;
  $bm_table = true;
?>
  <br />
  <form name="bm_table" action="delete_bms.php" method="post">
  <table width="300" cellpadding="2" cellspacing="0" align="center">
  <?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\"><td><strong>书签</strong></td>";
  echo "<td><strong>删除?</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array) > 0)) {
    foreach ($url_array as $url)  {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      //remember to call htmlspecialchars() when we are displaying user data
      echo "<tr bgcolor=\"".$color."\"><td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td>
            <td><input type=\"checkbox\" name=\"del_me[]\"
                value=\"".$url."\"/></td>
            </tr>";
    }
  } else {
    echo "<tr><td>没有书签</td></tr>";
  }
?>
  </table>
  </form>
<?php
}

function display_user_menu() {
  // display the menu options on this page
?>
<hr />
<a href="member.php">----- 个人主页-----</a></br>
<a href="add_bm_form.php">----- 增加书签----- </a></br> 
<?php
  // only offer the delete option if bookmark table is on this page
  global $bm_table;
  if ($bm_table == true) {
    echo "<a href=\"#\" onClick=\"bm_table.submit();\">----- 删除书签----- </a></br> ";
  } else {
    echo "<span style=\"color: #3333cc\">----- 删除书签----- </span></br>";
  }
?>
<a href="change_passwd_form.php">----- 修改密码----- </a></br>
<a href="recommend.php">----- 推荐书签URL----- </a><br>
<a href="logout.php">退出</a>
<hr />

<?php
}

function display_add_bm_form() {
  // display the form for people to ener a new bookmark in
?>
<form name="bm_table" action="add_bms.php" method="post">
<table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
<tr><td>URL:</td></br>
<td><input type="text" name="new_url" value="http://"
     size="30" maxlength="255"/></td></tr>
<tr><td colspan="2" align="center">
    <input type="submit" value="增加书签"/></td></tr>
</table>
</form>
<?php
}

/*function display_password_form() {
  // display html change password form
?>
   <br />
   <form action="change_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>Old password:</td>
       <td><input type="password" name="old_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>New password:</td>
       <td><input type="password" name="new_passwd"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td>Repeat new password:</td>
       <td><input type="password" name="new_passwd2"
            size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan="2" align="center">
       <input type="submit" value="Change password"/>
   </td></tr>
   </table>
   <br />
<?php
}*/




function display_forgot_form() {
  // display HTML form to reset and email password
?>
   <br />
   <form action="forgot_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc">
   <tr><td>输入用户名:</td>
       <td><input type="text" name="username" size="16" maxlength="16"/></td>
   </tr>
   <tr><td colspan=2 align="center">
       <input type="submit" value="修改密码"/>
   </td></tr>
   </table>
   <br />
<?php
}

function display_recommended_urls($url_array) {
  // similar output to display_user_urls
  // instead of displaying the users bookmarks, display recomendation
?>
  <br />
  <table width="300" cellpadding="2" cellspacing="0">
<?php
  $color = "#cccccc";
  echo "<tr bgcolor=\"".$color."\">
        <td><strong>Recommendations</strong></td></tr>";
  if ((is_array($url_array)) && (count($url_array)>0)) {
    foreach ($url_array as $url) {
      if ($color == "#cccccc") {
        $color = "#ffffff";
      } else {
        $color = "#cccccc";
      }
      echo "<tr bgcolor=\"".$color."\">
            <td><a href=\"".$url."\">".htmlspecialchars($url)."</a></td></tr>";
    }
  } else {
    echo "<tr><td>No recommendations for you today.</td></tr>";
  }
?>
  </table>
<?php
}

?>
