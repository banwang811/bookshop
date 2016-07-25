<?php
  include ('book_sc_fns.php');
  header("Content-type:text/html;charset=utf-8");
  // The shopping cart needs sessions, so start one
  session_start();
  //do_html_header("Welcome to Book-O-Rama");
if(isset($_SESSION['admin_user'])) {
	do_html_header("进入书籍管理目录");
  }
  else if(isset($_SESSION['valid_user'])) {
	do_html_header("欢迎尊贵的顾客，请放心购买");
  }
  else{do_html_header("欢迎游客进入目录，请放心购买");}
 
 echo "<p>请选择书的类型:</p>";

  // get categories out of database
  $cat_array = get_categories();

  // display as links to cat pages
  display_categories($cat_array);

  // if logged in as admin, show add, delete, edit cat links
  if(isset($_SESSION['admin_user'])) {
    display_button("admin.php", "admin-menu", "Admin Menu");
  }
  else if(isset($_SESSION['valid_user'])) {
    display_button('member.php', 'back', 'Back');
  }
  else{do_html_url('star.php', '不想买了');}

  do_html_footer();
?>
