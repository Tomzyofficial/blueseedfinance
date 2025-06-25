<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception; 
  // use PHPMailer\PHPMailer\SMTP;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php'; 

  ob_start(); 
  if (isset($_POST['submit'])) {
    require_once('session.inc.php');
    $loggedInId = $_SESSION['u_id'];
    $transferFrom = filter_input(INPUT_POST, 'debit_account', FILTER_SANITIZE_STRING);
    $bankName = ucwords(mysqli_real_escape_string($conn, $_POST['bankName']));
    $accountNumber = mysqli_real_escape_string($conn, $_POST['accountNumber']);
    $accountName = ucwords(mysqli_real_escape_string($conn, $_POST['accountName']));
    $amount = mysqli_real_escape_string($conn, floatval($_POST['amount']));
    // $amountDollar = floatval($amount); 
    $narration = ucfirst(mysqli_real_escape_string($conn, $_POST['narration']));
    $date = date('F j Y');
    $time = date('H:i:s');
    // error handlers
    if (empty($transferFrom) || empty($bankName) || empty($accountNumber) || empty($accountName) || empty($amount) || empty($narration)) {
      $_SESSION['errMessage'] = 'All input fields are required';
      header('Location: transfer.php');
      exit();
    } elseif (strlen($narration) > 20) {
      $_SESSION['errMessage'] = 'Narration must not exceed 20 characters';
      header('Location: transfer.php');
      exit();
    } elseif ($transferFrom === 'Checking account') {
      // to be sure there is money in checking account before proceeding
      $selectQuery = "SELECT total_checking FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";

      $selectResult = $conn->query($selectQuery);
      if ($selectResult) {
        $insufficientFunds = true;
        while ($row = $selectResult->fetch_assoc()) {
          $checkingValue = str_replace('$', '', $row['total_checking']);
          if ($checkingValue >  0 AND $amount < $checkingValue) {
            // restrict user from sending money where rows with the transfer_status = PENDING in the transaction_debit table per user exceeds 3
            $limitSql = "SELECT * FROM transaction_debit WHERE sending_from = 'Checking account' AND transfer_status = 'PENDING' AND transaction_id = '$loggedInId'";

            $limitQuery = $conn->query($limitSql);
            $DataRows = $limitQuery->num_rows; 
            if ($DataRows == 3) {
              // email sending part
              // Server settings
              $mail = new PHPMailer(true); 
              $mail->SMTPDebug = 2; // Enable verbose debugging
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'chukwuebuka.ibeh54@gmail.com';
              $mail->Password = 'kymawybrqflisrdo';
              $mail->SMTPSecure = 'ssl';
              $mail->Port = 465;

              // fetch user details from the database
              $sql = "SELECT * FROM users_details WHERE id = '$loggedInId'";
              $queryResult = $conn->query($sql);
              while ($rows = $queryResult->fetch_assoc()) {
                $firstName = $rows['first_name'];
                $email = $rows['email'];
              } 

              // Recipients
              $mail->setFrom('chukwuebuka.ibeh54@gmail.com', 'No Reply');
              $mail->addAddress($email, $firstName); 

              // Content
              $mail->isHTML(true);
              $mail->Subject = 'ACCOUNT TEMPORARILY BANNED';
              $mail->Body = 'Hello ' . $firstName . ' our automated system has detected an unusual activities on your ' . $transferFrom . ' thus, we have temporarily banned your account from making transfers. As a financial institution, safety is our top priority as we ensure to serve you better while safeguarding your funds. Contact support to recover your account.';

              $headers = "MIME-Version: 1.0\r\n";
              $headers .= "Content-type: text/html; charset=UTF-8\r\n";
              $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
              
              $mail->send(); 
              
              if ($mail) {
                // log an account banned error to the user
                $_SESSION['errMessage'] = 'Account temporarily banned, unusual activities detected. Contact our support center to regain your account.';
                header('Location: transfer.php');
                exit();
              } else {
                $_SESSION['errMessage'] = 'Internal error occurred';
                header('Location: transfer.php');
                exit();
              }
            } 
            $insufficientFunds = false;
            break;
          }
        }
        /*  if there is no money or amount user is trying to send is higher than the amount in our total checking column throw an error */
        if ($insufficientFunds) {
          $_SESSION['errMessage'] = 'Insufficient balance';
          header('Location: transfer.php');
          exit();
        } else {
          /*  else, if there was money inside and amount user is sending is below what is inside our total checking column go ahead, deduct and update the total checking column */
          /* $updateQuery = "UPDATE transaction_credit SET total_checking = CONCAT('$', CAST(CASE WHEN CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) > $amount
          THEN CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) - $amount
          ELSE CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) END AS CHAR))
          WHERE transaction_id = $loggedInId AND CAST(SUBSTRING_INDEX(REPLACE(total_checking, '$', ''), '.', 1) AS UNSIGNED) > $amount"; */

          $updateQuery = "UPDATE transaction_credit SET total_checking = total_checking - '$amount' WHERE transaction_id = '$loggedInId' AND total_checking > '$amount'";

          $updateResult = $conn->query($updateQuery);
          if ($updateResult) {
            // email sending part
            $mail = new PHPMailer(true); 
            // Server settings
            $mail->SMTPDebug = 2; // Enable verbose debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'chukwuebuka.ibeh54@gmail.com';
            $mail->Password = 'kymawybrqflisrdo';
            $mail->SMTPSecure = 'ssl'; 
            $mail->Port = 465;  

            // fetch user details from the database
            $sql = "SELECT * FROM users_details WHERE id = '$loggedInId'";
            $queryResult = $conn->query($sql);
            while ($rows = $queryResult->fetch_assoc()) {
              $firstName = $rows['first_name'];
              $middleName = $rows['middle_name'];
              $lastName = $rows['last_name'];
              $email = $rows['email'];
              $checkingAccount = $rows['checking_account'];
              $checkingMaskedStart = 8;
              $checkingMaskedLength = 4;
              $replacement = str_repeat('*', $checkingMaskedLength);
              $checkingMasked = substr_replace($checkingAccount, $replacement, $checkingMaskedStart, $checkingMaskedLength);
            }
            // Recipients
            $mail->setFrom('chukwuebuka.ibeh54@gmail.com', 'No Reply');
            $mail->addAddress($email, $firstName); 

            // Content
            $mail->isHTML(true);
            $mail->Subject = 'DEBIT ALERT';
            $mail->Body = "Hello " . $firstName . " this is to notify you that a debit  transaction has occurred in your " . $transferFrom . " with the details below.<br><br><br>
              <table style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">
              <tbody>
                <tr>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Name</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$firstName $middleName $lastName</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Type</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">DEBIT ALERT</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Amount</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$$amount</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Currency</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">USD</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Account Number</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$checkingMasked</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Date and Time</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$date $time</td>
                </tr>
              </tbody>
              </table>
              <br><br><br>
              To view your full account history, sign up or sign into your account at 
              <a href='https://blueseedfinance.com'>https://blueseedfinance.com</a> <br><br><br>
              Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
            " ;

            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
            $mail->send();

            if ($mail) {
             // insert into the transaction debit table
              $insertTransferIntoDb = "INSERT INTO transaction_debit (sending_from, recipient_bank_name, recipient_account_number, recipient_account_name, amount, narration, transfer_status, date_time, time_date, transaction_id) VALUES ('$transferFrom', '$bankName', '$accountNumber', '$accountName', '$amount', '$narration', 'PENDING', '$date', '$time', '$loggedInId')";
              $insertQuery = $conn->query($insertTransferIntoDb);

              if ($insertQuery) {
                $_SESSION['succMessage'] = 'Your transfer was successful';
                header('Location: transfer.php');
                exit();
              } else {
                $_SESSION['errMessage'] = 'Your transfer was unsuccessful.';
                header('Location: transfer.php');
                exit();
              }
            } else {
              $_SESSION['errMessage'] = 'Internal error occurred';
              header('Location: transfer.php');
              exit();
            }

          } else {
            $_SESSION['errMessage'] = 'Internal error. Timeout!';
            header('Location: transfer.php');
            exit();
          }
        }
      } else {
        $_SESSION['errMessage'] = 'Internal error occurred';
        header('Location: transfer.php');
        exit();
      }
    } elseif ($transferFrom === 'Savings account') {
      // to be sure there is money in the savings account before proceeding
      $selectQuery = "SELECT total_savings FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";

      $selectResult = $conn->query($selectQuery);
      if ($selectResult) {
        $insufficientFunds = true;
        while ($row = $selectResult->fetch_assoc()) {
          $savingsValue = str_replace('$', '', $row['total_savings']);

          if ($savingsValue >  0 AND $amount < $savingsValue) {
            // restrict user from sending money where rows with the transfer_status = PENDING in the transaction_debit table per user exceeds 3
            $limitSql = "SELECT * FROM transaction_debit WHERE sending_from = 'Savings account' AND transfer_status = 'PENDING' AND transaction_id = '$loggedInId'";

            $limitQuery = $conn->query($limitSql);
            $DataRows = $limitQuery->num_rows;
            if ($DataRows == 3) {
              // email sending part
              $mail = new PHPMailer(true); 
              // Server settings
              $mail->SMTPDebug = 2; // Enable verbose debugging
              $mail->isSMTP();
              $mail->Host = 'smtp.gmail.com';
              $mail->SMTPAuth = true;
              $mail->Username = 'chukwuebuka.ibeh54@gmail.com';
              $mail->Password = 'kymawybrqflisrdo';
              $mail->SMTPSecure = 'ssl';
              $mail->Port = 465;  

              // fetch user details from the database
              $sql = "SELECT * FROM users_details WHERE id = '$loggedInId'";
              $queryResult = $conn->query($sql);

              while ($rows = $queryResult->fetch_assoc()) {
                $firstName = $rows['first_name'];
                $email = $rows['email'];
              } 

              // Recipients
              $mail->setFrom('chukwuebuka.ibeh54@gmail.com', 'No Reply');
              $mail->addAddress($email, $firstName); 

              // Content
              $mail->isHTML(true);
              $mail->Subject = 'ACCOUNT TEMPORARILY BANNED';
              $mail->Body = 'Hello ' . $firstName . ' our automated system has detected an unusual activities on your ' . $transferFrom . ' thus, we have temporarily banned your account from making transfers. As a financial institution, safety is our top priority as we ensure to serve you better while safeguarding your funds.';
              $mail->send(); 

              if ($mail) {
                $_SESSION['errMessage'] = 'Account temperarily banned, unusual activities detected. Contact our support center to regain your account.';
                header('Location: transfer.php');
                exit();
              } else {
                $_SESSION['errMessage'] = 'Internal error occurred';
                header('Location: transfer.php');
                exit();
              }
            } 
            $insufficientFunds = false;
            break;
          }
        }
        // if total savings account does not have money iinside throw an error
        if ($insufficientFunds) {
          $_SESSION['errMessage'] = 'Insufficient balance';
          header('Location: transfer.php');
          exit();
        } else {
          /*  else, if there was money inside and amount user is sending is below what is inside our total savings column go ahead, deduct and update the total savings column */

          /* $updateQuery = "UPDATE transaction_credit SET total_savings = CONCAT('$', CAST(CASE WHEN CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) > $amount 
          THEN CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) - $amount
          ELSE CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) END AS CHAR))
          WHERE transaction_id = $loggedInId AND CAST(SUBSTRING_INDEX(REPLACE(total_savings, '$', ''), '.', 1) AS UNSIGNED) > $amount"; */
          
          $updateQuery = "UPDATE transaction_credit SET total_savings = total_savings - '$amount' WHERE transaction_id = '$loggedInId' AND total_savings > '$amount'";

          $updateResult = $conn->query($updateQuery); 
          if ($updateResult) {
            
            // email sending part
            $mail = new PHPMailer(true); 
            // Server settings
            $mail->SMTPDebug = 2; // Enable verbose debugging
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'chukwuebuka.ibeh54@gmail.com';
            $mail->Password = 'kymawybrqflisrdo';
            $mail->SMTPSecure = 'ssl'; 
            $mail->Port = 465;  

            // fetch user details from the database
            $sql = "SELECT * FROM users_details WHERE id = '$loggedInId'";
            $queryResult = $conn->query($sql);
            while ($rows = $queryResult->fetch_assoc()) {
              $firstName = $rows['first_name'];
              $middleName = $rows['middle_name'];
              $lastName = $rows['last_name'];
              $email = $rows['email'];
              $savingsAccount = $rows['savings_account'];
              $savingsMaskedStart = 8;
              $savingsMaskedLength = 4;
              $replacement = str_repeat('*', $savingsMaskedLength);
              $savingsMasked = substr_replace($savingsAccount, $replacement, $savingsMaskedStart, $savingsMaskedLength);
            }

            // Recipients
            $mail->setFrom('chukwuebuka.ibeh54@gmail.com', 'No Reply');
            $mail->addAddress($email, $firstName); 

            // Content
           $mail->isHTML(true);
            $mail->Subject = 'DEBIT ALERT';
            $mail->Body = "Hello " . $firstName . " this is to notify you that a debit  transaction has occurred in your " . $transferFrom . " with the details below.<br><br><br>
              <table style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">
              <tbody>
                <tr>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Name</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$firstName $middleName $lastName</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Type</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">DEBIT ALERT</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Amount</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$$amount</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Transaction Currency</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">USD</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Account Number</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$savingsMasked</td>
                </tr>
                <tr>
                  <td style=\"border: 1px solid black; font-weight: 400; padding: 5px; border-collapse: collapse;\">Date and Time</td>
                  <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$date $time</td>
                </tr>
              </tbody>
              </table>
              <br><br><br>
              To view your full account history, sign up or sign into your account at 
              <a href='https://blueseedfinance.com'>https://blueseedfinance.com</a> <br><br><br>
              Your account information is private. Please do not disclose your login credentials to anyone. Avoid clicking on suspicious links in email. If in doubt, kindly contact our contact support at <a href='mailto:contact@blueseedfinance.com'>contact@blueseedfinance.com</a>
            " ;
            $headers = "MIME-Version: 1.0\r\n";
            $headers .= "Content-type: text/html; charset=UTF-8\r\n";
            $headers .= "From: $mail->setFrom <$mail->setFrom>\r\n";
            $mail->send();
 
            if ($mail) {
              // inside into the transaction debit table
              $insertTransferIntoDb = "INSERT INTO transaction_debit (sending_from, recipient_bank_name, recipient_account_number, recipient_account_name, amount, narration, transfer_status, date_time, time_date, transaction_id) VALUES ('$transferFrom', '$bankName', '$accountNumber', '$accountName', '$amount', '$narration', 'PENDING', '$date', '$time', '$loggedInId')";

              $insertQuery = $conn->query($insertTransferIntoDb);
              if ($insertQuery) {
                $_SESSION['succMessage'] = 'Your transfer was successful';
                header('Location: transfer.php');
                exit();
              } else {
                $_SESSION['errMessage'] = 'Your transfer was unsuccessful.';
                header('Location: transfer.php');
                exit();
              }
            } else {
              $_SESSION['errMessage'] = 'Internal error occurred';
              header('Location: transfer.php');
              exit();
            }

          } else {
            $_SESSION['errMessage'] = 'Internal error. Timeout!';
            header('Location: transfer.php');
            exit();
          }
        }
      } else {
        $_SESSION['errMessage'] = 'Internal error occurred';
        header('Location: transfer.php');
        exit();
      }
    } else {
      $_SESSION['errMessage'] = 'System shut down, try again!';
      header('Location: transfer.php');
      exit();
    }
  } else {
    header('Location: ../../accounts.auth/signin.php');
    exit();
  }

  $conn->close();