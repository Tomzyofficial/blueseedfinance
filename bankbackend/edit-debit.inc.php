<?php
  require_once('session.inc.php');
  $searchParam = $_GET['id'];
  if (isset($_POST['submit'])) {
    $send_from = mysqli_real_escape_string($conn, filter_input(INPUT_POST, 'account', FILTER_SANITIZE_STRING));
    $bank = ucwords(mysqli_real_escape_string($conn, $_POST['bank']));
    $recipient_account_no = mysqli_real_escape_string($conn, $_POST['recipient_account_no']);
    $recipient_account_name = ucwords(mysqli_real_escape_string($conn, $_POST['recipient_account_name']));
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    $narration = ucfirst(mysqli_real_escape_string($conn, $_POST['narration']));
    $status = strtoupper(mysqli_real_escape_string($conn, $_POST['status']));
    $date_time = ucfirst(mysqli_real_escape_string($conn, $_POST['date_time']));
    $time_date = mysqli_real_escape_string($conn, $_POST['time_date']);
    // update transaction_credit table if account is checking account 
    if ($send_from === 'Checking account') {
      $updateQuery = "UPDATE transaction_credit SET total_checking = CONCAT('$', CAST(CASE WHEN CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) > $amount THEN CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) - $amount ELSE CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) END AS CHAR)) WHERE id = $searchParam AND CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) > $amount";
      $result = $conn->query($updateQuery);
      if ($result) {
        // update transaction_debit table
        $sql = "UPDATE transaction_debit SET recipient_bank_name = '$bank', recipient_account_number = '$recipient_account_no', recipient_account_name = '$recipient_account_name', amount = '$amount', narration = '$narration', transfer_status = '$status', date_time = '$date_time', time_date = '$time_date' WHERE id = '$searchParam'";
        $conn->query($sql);
        header('Location: admin-deb-cred.php');
        exit();
      }
    } elseif ($send_from === 'Savings account') {
      // update transaction_credit table if account is savings account 
      $updateQuery = "UPDATE transaction_credit SET total_savings = CONCAT('$', CAST(CASE WHEN CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) > $amount THEN CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) - $amount ELSE CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) END AS CHAR)) WHERE id = $searchParam AND CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) > $amount";
      $result = $conn->query($updateQuery);
      if ($result) {
        // update transaction_debit table
        $sql = "UPDATE transaction_debit SET recipient_bank_name = '$bank', recipient_account_number = '$recipient_account_no', recipient_account_name = '$recipient_account_name', amount = '$amount', narration = '$narration', transfer_status = '$status', date_time = '$date_time', time_date = '$time_date' WHERE id = '$searchParam'";
        $conn->query($sql);
        header('Location: admin-deb-cred.php');
        exit();
      }
    }
  } else {
    header('Location: index.php');
    exit();
  }
?>