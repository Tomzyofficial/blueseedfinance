<?php
  require_once('session.inc.php');
  if (isset($_POST['submit'])) {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    $confirmPwd = mysqli_real_escape_string($conn, $_POST['confirm_pwd']);
    if (empty($userName) || empty($pwd) || empty($confirmPwd)) {
      $_SESSION['errMessage'] = 'You have to fill all inputs';
      header('Location: admin-signup.php');
      exit();
    } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$%^&!])[A-Za-z\d@#$%^&!]+$/', $pwd)) {
      $_SESSION['errMessage'] = 'Password must contain at least one of [A-Za-z1-9@!#$%]';
      header('Location: admin-signup.php');
      exit();
    } elseif ($confirmPwd !== $pwd) {
      $_SESSION['errMessage'] = 'Your password didn\'t match';
      header('Location: admin-signup.php');
      exit();
    } else {
      $sql = "SELECT * FROM admin_backend";
      $query = $conn->query($sql);
      $queryRows = $query->num_rows;
      if ($queryRows > 0) {
        $_SESSION['errMessage'] = 'Admin already exist';
        header('Location: admin-signup.php');
        exit(); 
      }
      $hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
      $sql = "INSERT INTO admin_backend (user_name, pwd) VALUES ('$userName', '$hashedPwd')";
      $query = $conn->query($sql);
      if ($query) {
        header('Location: admin-users.php');
        exit();
      } else {
        $_SESSION['errMessage'] = 'An error occurred';
        header('Location: admin-signup.php');
        exit();
      }
    }
  } else {
    header('Location: admin-signup.php');
    exit();
  }
  $conn->close();
?>