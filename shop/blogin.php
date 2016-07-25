<?php
header("Content-type:text/html;charset=utf-8");
 require_once('book_sc_fns.php');
 do_html_header("管理员界面");

 display_login_form();

 display_button2('star.php', 'logout', 'Back');
 function display_button2($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"images/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"30\"
           width=\"70\"/></a></div>";
}
 do_html_footer();
?>
