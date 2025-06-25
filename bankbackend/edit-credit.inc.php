<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) {
    $checking = mysqli_real_escape_string($conn, $_POST['checking']);
    $savings = mysqli_real_escape_string($conn, $_POST['savings']);
    $credit = mysqli_real_escape_string($conn, $_POST['credit']);
    $total_checking = mysqli_real_escape_string($conn, $_POST['total_checking']);
    $total_savings = mysqli_real_escape_string($conn, $_POST['total_savings']);
    $date_time = ucfirst(mysqli_real_escape_string($conn, $_POST['date_time']));
    $time_date = mysqli_real_escape_string($conn, $_POST['time_date']);
    // update record
  
    $sql = "UPDATE transaction_credit SET checking = '$checking', savings = '$savings', credit = '$credit', total_checking = '$total_checking', total_savings = '$total_savings', date_time = '$date_time', time_date = '$time_date' WHERE id = '$searchParam'";
    $conn->query($sql);
    header('Location: admin-deb-cred.php');
    exit();
  } else {
    header('Location: index.php');
    exit();
  }