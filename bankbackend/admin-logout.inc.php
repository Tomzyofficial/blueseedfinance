<?php
if (isset($_POST['submit'])) {
  require_once('session.inc.php');
  session_unset();
  session_destroy();
  header('Location: index.php');
  exit();
} else {
  header('Location: index.php');
  exit();
}