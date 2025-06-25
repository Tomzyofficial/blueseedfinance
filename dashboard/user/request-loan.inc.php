<?php
require_once('session.inc.php');
if (isset($_POST['submit'])) {
  $loggedInId = $_SESSION['u_id'];
  $typeOfLoan = mysqli_real_escape_string($conn, $_POST['typeOfLoan']);
  $duration = mysqli_real_escape_string($conn, $_POST['duration']);
  $amount = mysqli_real_escape_string($conn, $_POST['amount']);
  $amountDollar = '$' . $amount;
  $purpose = ucfirst(mysqli_real_escape_string($conn, $_POST['purpose']));
  // error handler
  if (empty($typeOfLoan) || empty($duration) || empty($amountDollar) || empty($purpose)) {
    $_SESSION['errMessage'] = 'All inputs must be filled, try again.';
    header('Location: request-loan.php');
    exit();
  } elseif (strlen($purpose) > 20) {
    $_SESSION['errMessage'] = 'Purpose for loan should not exceed 20 characters';
    header('Location: request-loan.php');
    exit();
  } else {
    $sql = "INSERT INTO loan (type_of_loan, duration, amount, purpose, loan_id) VALUES ('$typeOfLoan', '$duration', '$amountDollar', '$purpose', '$loggedInId')";
    $query = $conn->query($sql);
    if ($query) {
      $_SESSION['succMessage'] = 'Your application was successful, we will contact you within 48 working hours';
      header('Location: request-loan.php');
      exit();
    } else {
      $_SESSION['errMessage'] = 'Your application was unsuccessful';
      header('Location: request-loan.php');
      exit();
    }
  }
} else {
  header('Location: ../../accounts.auth/signin.php');
  exit();
}
$conn->close();