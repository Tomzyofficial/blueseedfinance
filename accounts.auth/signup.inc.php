<?php

if (isset($_POST['submit'])) {
  require_once('../dashboard/user/session.inc.php');
  function generateUniqueNumber(int $length = 10): int {
    $min = pow(10, $length - 1);
    $max = pow(10, $length) - 1;
    return random_int($min, $max);
  }

  // Generate two numbers
  $checking = generateUniqueNumber();
  $savings = generateUniqueNumber();

  $firstname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['first_name'])));
  $middleName = trim(ucwords(mysqli_real_escape_string($conn, $_POST['middle_name'])));
  $lastname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['last_name'])));
  $username = trim(ucwords(mysqli_real_escape_string($conn, $_POST['username'])));
  $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
  $ssn = trim(mysqli_real_escape_string($conn, $_POST['ssn']));
  $dob = trim(mysqli_real_escape_string($conn, $_POST['dob']));
  $phone = trim(mysqli_real_escape_string($conn, $_POST['phone']));
  $pwd = trim(mysqli_real_escape_string($conn, $_POST['password']));
  $confirmPwd = trim(mysqli_real_escape_string($conn, $_POST['confirm_password']));
  // error handlers
  if (empty($firstname) || empty($lastname) || empty($username) || empty($email) || empty($ssn) || empty($dob) || empty($phone) || empty($pwd) || empty($confirmPwd)) {
    $_SESSION['errMessage'] = 'All inputs must be filled, try again.';
    header('Location: signup.php');
    exit();
    // invalid firstname and lastname
  } elseif (!preg_match('/^[a-zA-Z]+$/', $firstname) || !preg_match('/^[a-zA-Z]+$/', $lastname)) {
    $_SESSION['errMessage'] = 'Name must contain only alphabets, try again.';
    header('Location: signup.php');
    exit();
    // invalid username
  } elseif (!preg_match('/^[a-zA-Z0-9]+$/', $username)) {
    $_SESSION['errMessage'] = 'Username must contain only alphanumeric, try again.';
    header('Location: signup.php');
    exit();
    // invalid email format
  } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION["errMessage"] = "Invalid Email address, try again";
    header("Location: signup.php");
    exit();
    // invalid password format
  } elseif (!preg_match('/^(?=.*[a-zA-Z])(?=.*\d)(?=.*[@#$%^&!])[A-Za-z\d@#$%^&!]+$/', $pwd)) {
    $_SESSION["errMessage"] = "Password must contain at least one of [A-Za-z1-9@!#$%]";
    header("Location: signup.php");
    exit();
    // password length invalid
  } elseif (strlen($pwd) < 6) {
    $_SESSION["errMessage"] = "Password must exceed 5 characters, try again";
    header("Location: signup.php");
    exit();
    // password match
  } elseif ($confirmPwd !== $pwd) {
    $_SESSION["errMessage"] = "Password mismatched, try again.";
    header("Location: signup.php");
    exit();
  } else {
    // check if email and username already exist
    $sql = "SELECT * FROM users_details WHERE email = '$email' || user_name = '$username'";
    $resultCheck = mysqli_query($conn, $sql);
    $result = mysqli_num_rows($resultCheck);
    if ($result > 0) {
      $_SESSION["errMessage"] = "Some of your information was found in our record, try again.";
      header("Location: signup.php");
      exit();
    } else {
      // inserting into the database
      $sql = "INSERT INTO users_details (first_name, middle_name, last_name, user_name, email, ssn, dob, phone, pwd, checking_account, saving_account, date_time) VALUES ('$firstname', '$middleName', '$lastname', '$username', '$email', '$ssn', '$dob', '$phone', '$pwd', '$checking', '$savings', NOW())";
      if (mysqli_query($conn, $sql)) {
        header("Location: ../dashboard/user/dashboard.php");
        exit();
      } else {
        $_SESSION["errMessage"] = "An error occurred while signing up.";
        header("Location: signup.php");
      }
    }  
  }
} else {
header('Location: signin.php');
}
mysqli_close($conn);