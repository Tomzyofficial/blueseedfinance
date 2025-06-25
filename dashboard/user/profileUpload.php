<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
    header("Location: ../../accounts.auth/signin.php");
    exit();
  } 
  if ($_FILES['image']['error'] === UPLOAD_ERR_OK) {
  $targetDir = './profileUploads/';
  $targetFile = $targetDir . basename($_FILES['image']['name']);
  move_uploaded_file($_FILES['image']['tmp_name'], $targetFile);
  } else {
    header('Location: profile.php');
    exit();
  }
?>