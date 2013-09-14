<?php

/**
 * Add a value to the messages session variable.
 */
function set_message($message, $type = 'notice') {
  $_SESSION['messages'][$type][] = $message;
}

/**
 * Retrieve values from the messages session variable.
 */
function get_messages($type = NULL) {
  if (!isset($_SESSION['messages'])) {
    return null;
  }

  $messages = $_SESSION['messages'];
  if (empty($messages)) {
    return null;
  }

  if (is_null($type)) {
    unset($_SESSION['messages']);
    return $messages;
  }

  if (isset($messages[$type])) {
    unset($_SESSION['messages'][$type]);
    return $messages[$type];
  }

  return null;
}

/**
 * Handy when debugging.
 */
function pre($data) {
  echo "<pre>"; print_r($data); echo "</pre>";
}

?>
