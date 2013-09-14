<?php

require 'includes/bootstrap.inc';

// Check for messages.
$messages = get_messages();
if (!empty($messages)) {
  $message_output = '';
  foreach ($messages as $type => $values) {
    $message_output .= '<ul class="'.$type.'">';
    foreach ($values as $message) {
      $message_output .= '<li>'.$message.'</li>';
    }
    $message_output .= '</ul>';
  }
  $messages = $message_output;
}

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>tomcant - <?php echo $current_page; ?></title>
<meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
<link rel="stylesheet" type="text/css" href="css/main.css" />
<?php if ($load_css): ?>
  <link rel="stylesheet" type="text/css" href="<?php echo $css_file ?>" />
<?php endif; ?>
<!--[if lt IE 9]><link rel="stylesheet" type="text/css" href="css/ie.css" /><![endif]-->
<?php if ($load_js): ?>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.5.1/jquery.min.js"></script>
  <script src="<?php echo $js_file; ?>"></script>
<?php endif; ?>
</head>

<body>

<div id="wrapper">
  <div id="header" class="clear-fix">
    <?php require_once "header.php" ?>
  </div>

  <div id="content">
    <?php if ($messages): ?>
      <div class="messages">
        <?php echo $messages ?>
      </div>
    <?php endif; ?>

    <?php require_once "content/".$current_page.".html"; ?>
  </div>

  <div id="footer">
    &copy; Tom Cant 2009 - <?php echo date('Y') ?>
  </div>
</div>

</body>
</html>
