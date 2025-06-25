<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) {
    $firstname = ucwords(mysqli_real_escape_string($conn, $_POST['first_name']));
    $middleName = ucwords(mysqli_real_escape_string($conn, $_POST['middle_name']));
    $lastname = ucwords(mysqli_real_escape_string($conn, $_POST['last_name']));
    $username = ucwords(mysqli_real_escape_string($conn, $_POST['username']));
    $email = mysqli_real_escape_string($conn, $_POST['email']);
    $ssn = mysqli_real_escape_string($conn, $_POST['ssn']);
    $dob = mysqli_real_escape_string($conn, $_POST['dob']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $sql = "UPDATE user_details SET first_name = '$firstname', middle_name = '$middleName', last_name = '$lastname', user_name = '$username', email = '$email', ssn = '$ssn', dob = '$dob', phone = '$phone', pwd = '$password' WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-users.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }
?>