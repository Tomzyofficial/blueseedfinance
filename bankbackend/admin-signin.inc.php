<?php
  require_once('session.inc.php');
  if (isset($_POST['submit'])) {
    $userName = mysqli_real_escape_string($conn, $_POST['userName']);
    $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);
    // error handlers
    if (empty($userName) || empty($pwd)) {
      $_SESSION['errMessage'] = 'All inputs are required';
      header('Location: index.php');
      exit();
    } else {
      $sql = "SELECT * FROM admin_backend WHERE user_name = '$userName'";
      $query = $conn->query($sql);
      $queryRows = $query->num_rows;
      if ($queryRows < 1) {
        $_SESSION['errMessage'] = 'Admin was not found';
        header('Location: index.php');
        exit();
      } else {
        if ($rows = $query->fetch_assoc()) {
          // dehash the password
          $hashedPwdCheck = password_verify($pwd, $rows['pwd']);
          if ($hashedPwdCheck === false) {
            $_SESSION['errMessage'] = 'Incorrect password or username';
            header('Location: index.php');
            exit();
          } elseif ($hashedPwdCheck === true) {
            $_SESSION['admin_user'] = $rows['user_name'];
            header('Location: admin-users.php');
            exit();
          } else {
            $_SESSION['errMessage'] = 'Internal error occurred';
            header('Location: index.php');
            exit();
          }
        }
      }
    }

  } else {
    header('Location: index.php');
    exit();
  }
  $conn->close();
  
?>