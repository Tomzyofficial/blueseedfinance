<?php
if (isset($_POST['submit'])) {
  require_once('session.inc.php');
  $name = ucfirst(mysqli_real_escape_string($conn, $_POST['name']));
  $email = mysqli_real_escape_string($conn, $_POST['email']);
  $message = mysqli_real_escape_string($conn, $_POST['message']);
  // error handlers
  if (empty($name) || empty($email) || empty($message)) {
    $_SESSION["errMessage"] = "All input field must be field.";
    header("Location: ../../contact.php");
    exit(); 
  } elseif (!preg_match("/^[a-zA-Z ]*$/", $name)) {
    $_SESSION["errMessage"] = "Name must contain only alphabets.";
    header("Location: ../../contact.php");
    exit();
  } elseif (strlen($message) > 100) {
    $_SESSION["errMessage"] = "Message input shouldn't exceed 100 characters.";
    header("Location: ../../contact.php");
    exit();
  } else {
    $sql = "INSERT INTO message_input (name, email, message) VALUES ('$name', '$email', '$message')";
    mysqli_query($conn, $sql);
    $_SESSION["succMessage"] = "Your message has been sent successfully. We usually respond within 24 working hours";
    header("Location: ../../contact.php");
    exit();
  }
} else {
  header("Location: ../../index.php");
  exit();
}