<?php
  require_once('../dashboard/user/session.inc.php');

  if (isset($_POST['submit'])) {
    $username = mysqli_real_escape_string($conn, $_POST['username']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    //error handler 
    if (empty($username) || empty($password)) {
      $_SESSION['errMessage'] = 'All inputs must be filled, try again.';
      header("Location: signin.php");
      exit();
    } else {
      $sql = "SELECT * FROM users_details WHERE user_name = '$username' OR email = '$username'";
      $result = mysqli_query($conn, $sql); 
      $resultCheck = mysqli_num_rows($result);
      // if user is not found, try error
      if ($resultCheck < 1) {
        $_SESSION['errMessage'] = 'Account not found on our record.';
        header("Location: signin.php");
        exit();
      } else {
        if ($row = mysqli_fetch_assoc($result)) {
          if ($password !== $row['pwd']) {
            $_SESSION['errMessage'] = 'Incorrect username or password';
            header("Location: signin.php");
            exit();
          } elseif ($password === $row['pwd']) {
            $_SESSION['u_id'] = $row['id'];
            $_SESSION['firstName'] = $row['first_name'];
            $_SESSION['email'] = $row['email'];
            $_SESSION['checkingAccount'] = $row['checking_account'];
            $_SESSION['savingsAccount'] = $row['saving_account']; 
            header('Location: ../dashboard/user/dashboard.php');
            exit();
          } else {
            $_SESSION['errMessage'] = 'Internal error occurred';
            header('Location: signin.php');
            exit();
          }
        }
      }
    }
  } else {
      header("Location: signin.php");
      exit();
  }

  mysqli_close($conn);