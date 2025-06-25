<?php
  require_once('session.inc.php');
  if (isset($_POST['submit'])) {
    $loggedInId = $_SESSION['u_id'];
    $firstname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['first_name'])));
    $lastname = trim(ucwords(mysqli_real_escape_string($conn, $_POST['last_name'])));
    $motherName = trim(ucwords(mysqli_real_escape_string($conn, $_POST['mother_name'])));
    $email = trim(mysqli_real_escape_string($conn, $_POST['email']));
    $residenceFile = mysqli_real_escape_string($conn, $_FILES['residence_file']['name']);
    $identityFile = mysqli_real_escape_string($conn, $_FILES['identity_file']['name']);
    $residenceTarget = "proofOfResidence/" . basename($_FILES['residence_file']['name']);
    $identityTarget = "proofOfIdentity/" . basename($_FILES['identity_file']['name']);
   // error handlers
    if (empty($firstname) || empty($lastname) || empty($motherName) || empty($email) || empty($residenceFile) || empty($identityFile)) {
      $_SESSION['errMessage'] = 'All inputs must be filled, try again.';
      header('Location: kyc-verification.php');
      exit();
    } elseif (!preg_match('/^[a-zA-Z]+$/', $firstname) || !preg_match('/^[a-zA-Z]+$/', $lastname) || !preg_match('/^[a-zA-Z]+$/', $motherName)) {
      $_SESSION['errMessage'] = 'You have entered an invalid name format';
      header('Location: kyc-verification.php');
      exit();
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $_SESSION['errMessage'] = 'You have entered an invalid email format';
      header('Location: kyc-verification.php');
      exit();
    } else {
      // check if we have user requesting for loan in our user details table in the database
      $queryUser = "SELECT * FROM users_details WHERE email = '$email' AND id = '$loggedInId'";
      $query = $conn->query($queryUser);
      $resultRow = $query->num_rows;
      if ($resultRow < 1) {
        $_SESSION['errMessage'] = 'Use the same email address you used to register on this platform';
        header('Location: kyc-verification.php');
        exit();
      } else {
        // else we have user requesting for loan in our user details table, then  insert into kyc table
        $sql = "INSERT INTO kyc (first_name, last_name, mother_name, email, proof_of_res, proof_of_iden, kyc_id) VALUES ('$firstname', '$lastname', '$motherName', '$email', '$residenceFile', '$identityFile', '$loggedInId')";

        move_uploaded_file($_FILES["residence_file"]["tmp_name"], $residenceTarget);
        move_uploaded_file($_FILES["identity_file"]["tmp_name"], $identityTarget);

        $_SESSION['kyc_verified'] = true;
        $conn->query($sql);
        header('Location: request-loan.php');
        exit();
      }
    }
  } else {
    header('Location: ../../accounts.auth/signin.php');
    exit();
  }
  $conn->close();
?>