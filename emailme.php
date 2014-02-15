<?php

require 'includes/bootstrap.inc';

$error = false;

if (empty($_POST['email'])) {
  $error = true;
  set_message('You must specify your email address.', 'error');
}

if (empty($_POST['message'])) {
  $error = true;
  set_message('You must type a message.', 'error');
}

if ($error) {
  $redirect = '/contact';
}
else {
  $redirect = '/';

  $to      = 'tomcant@gmail.com';
  $subject = 'tomcant.name - contact form submitted';

  $message = $_POST['message'];
  $headers = 'From: ' . $_POST['email'];

  mail($to, $subject, $message, $headers);

  set_message('Thank you for your message. I will get back to you as soon as possible.');
}

header("Location:$redirect");

?>
