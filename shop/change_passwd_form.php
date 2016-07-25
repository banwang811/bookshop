<?php
header("Content-type:text/html;charset=utf-8");
 require_once('bookmark_fns.php');
 session_start();
 do_html_header('修改密码啦');
 check_valid_user();
 
 function display_passwd_form() {
// displays html change password form
?>
   <br />
   <form action="change_passwd.php" method="post">
   <table width="250" cellpadding="2" cellspacing="0" bgcolor="#cccccc" align="center">
   <tr><td>原密码:</td>
       <td><input type="passwd" name="old_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>新密码:</td>
       <td><input type="passwd" name="new_passwd" size="16" maxlength="16" /></td>
   </tr>
   <tr><td>确认密码:</td>
       <td><input type="passwd" name="new_passwd2" size="16" maxlength="16" /></td>
   </tr>
   <tr><td colspan=2 align="center"><input type="submit" value="修改密码">
   </td></tr>
   </table>
   <br />
<?php
}
 
display_passwd_form();

 display_user_menu(); 
 do_html_footer();
?>
