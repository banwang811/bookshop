<?php
 require_once('bookmark_fns.php');
 do_html_header('');

 display_site_info(); 
 display_login_form();
 display_button('star.php', 'logout', 'Back');
 function display_button($target, $image, $alt) {
  echo "<div align=\"center\"><a href=\"".$target."\">
          <img src=\"images/".$image.".gif\"
           alt=\"".$alt."\" border=\"0\" height=\"30\"
           width=\"50\"/></a></div>";
}
 
 

 do_html_footer();
?>