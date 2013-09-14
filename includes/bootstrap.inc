<?php

require 'includes/common.inc';

session_start();

$pages = array('home', 'contact');
$default_page = 'home';

// Determine the current page.
if (isset($_GET['page'])) {
  if (in_array($_GET['page'], $pages)) {
    $current_page = $_GET['page'];
    if ($current_page == $default_page) {
      header('Location:/');
    }
  }
  else {
    header('Location:/');
  }
}
else {
  $current_page = $default_page;
}

// CSS.
$css_file = "css/$current_page.css";
$load_css = file_exists($css_file);

// JS.
$js_file = "js/$current_page.js";
$load_js = file_exists($js_file);

?>