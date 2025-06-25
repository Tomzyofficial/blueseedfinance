<?php
  use PHPMailer\PHPMailer\PHPMailer;
  use PHPMailer\PHPMailer\Exception; 
  // use PHPMailer\PHPMailer\SMTP;

  require 'PHPMailer/src/Exception.php';
  require 'PHPMailer/src/PHPMailer.php';
  require 'PHPMailer/src/SMTP.php'; 

  ob_start(); 
  require_once('session.inc.php');
  if (isset($_POST['submit'])) {
    $loggedInId = $_SESSION['u_id'];
    $paymentMethod = mysqli_real_escape_string($conn, $_POST['payment_method']);
    $amount = mysqli_real_escape_string($conn, $_POST['amount']);
    // $amountDollar = "$" . $amount;
    $depositAccount = filter_input(INPUT_POST, 'deposit_account', FILTER_SANITIZE_STRING);
    $depositFile = mysqli_real_escape_string($conn, $_FILES['deposit_file']['name']);
    $target = "transaction/" . basename($_FILES["deposit_file"]['name']);
    $date = date('F j Y');
    $time = date('H:i:s');
    // error handlers
    if (empty($paymentMethod) || empty($amount) || empty($depositAccount) || empty($depositFile)) {
      $_SESSION['errMessage'] = 'All input field must be filled';
      header('Location: deposit.php');
      exit();
    } elseif (!is_numeric($amount)) {
      $_SESSION['errMessage'] = 'You have entered a wrong input';
      header('Location: deposit.php');
      exit();
    } else {
      // if user selected a checking account, insert and credit checking account
      if ($depositAccount === 'Checking account') {
        // insert into transaction_credit table
        $insert_query = "INSERT INTO transaction_credit (checking, credit, deposit_confirm_slip, date_time, time_date, transaction_id) VALUES ('$amount', 'CREDIT', '$depositFile', '$date', '$time', '$loggedInId')";

        $insert_into_db = $conn->query($insert_query);

        try {
          if ($insert_into_db) {
            move_uploaded_file($_FILES["deposit_file"]["tmp_name"], $target);
            // Retrieve last deposit amount
            $retrieve_query = "SELECT checking FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id DESC LIMIT 1";

            $result = $conn->query($retrieve_query);
            $last_deposit_amount = $result->fetch_assoc()["checking"];

            if (!$last_deposit_amount) {
              throw new Exception("Error retrieving last deposit amount: " . mysqli_error($conn));
            }
      
            // Update total_checking in our transaction_credit table
            $update_query = "UPDATE transaction_credit SET total_checking = total_checking + '$last_deposit_amount' WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";
          
            $queryResult = $conn->query($update_query);
           
            if (!$queryResult) {
              throw new Exception("Error updating total checking account: " . mysqli_error($conn));
            }

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
            $mail->Subject = 'CREDIT ALERT';
            $mail->Body = "Hello " . $firstName . " this is to notify you that a credit transaction has occurred in your " . $depositAccount . " with the details below.<br><br><br>
              <table style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">
                <tbody>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Name</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$firstName $middleName $lastName</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Type</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">CREDIT ALERT</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Amount</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$$amount</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Currency</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">USD</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Number</td>
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
              $_SESSION['succMessage'] = 'Your checking account has been credited';
              header('Location: deposit.php');
              exit(); 
            } else {
              $_SESSION['errMessage'] = 'An error occurred while depositing into your checking account. Please try again.';
              header('Location: deposit.php');
              exit();
            }
          } 
          
        } catch (Exception $e) {
          $_SESSION['errMessage'] = $e->getMessage();
        }
      
      } else {
        // if user selected saving account, insert and credit savings account
         
        // insert into transaction_credit table
        $insert_query = "INSERT INTO transaction_credit (savings, credit, deposit_confirm_slip, date_time, time_date, transaction_id) VALUES ('$amount', 'CREDIT', '$depositFile', '$date', '$time', '$loggedInId')";
        
        $insert_into_db = $conn->query($insert_query);
        
        try {
          if ($insert_into_db) {
            move_uploaded_file($_FILES["deposit_file"]["tmp_name"], $target);
            // Retrieve last deposit amount
            $retrieve_query = "SELECT savings FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id DESC LIMIT 1";
            
            $result = $conn->query($retrieve_query);
            $last_deposit_amount = $result->fetch_assoc()["savings"];

            if (!$last_deposit_amount) {
              throw new Exception("Error retrieving last deposit amount: " . mysqli_error($conn));
            }
            
            // Update total_savings in our transaction_credit table
            $update_query = "UPDATE transaction_credit SET total_savings = total_savings + '$last_deposit_amount' WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";

            $queryResult = $conn->query($update_query);
           
            if (!$queryResult) {
              throw new Exception("Error updating total checking account: " . mysqli_error($conn));
            }
            
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
              $savingsAccount = $rows['saving_account'];
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
            $mail->Subject = 'CREDIT ALERT';
            $mail->Body = "Hello " . $firstName . " this is to notify you that a credit   transaction has occurred in your " . $depositAccount . " with the details below.<br><br><br>
              <table style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">
                <tbody>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Name</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$firstName $middleName $lastName</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Type</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">CREDIT ALERT</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Amount</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$$amount</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Transaction Currency</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">USD</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Account Number</td>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">$savingsMasked</td>
                  </tr>
                  <tr>
                    <td style=\"border: 1px solid black; padding: 5px; border-collapse: collapse;\">Date and Time</td>
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
              $_SESSION['succMessage'] = 'Your savings account has been credited.';
              header('Location: deposit.php');
              exit(); 
            } else {
              $_SESSION['errMessage'] = 'An error occurred while depositing into your savings account. Please try again.';
              header('Location: deposit.php');
              exit();
            }
          }
        } catch (Exception $e) {
          $_SESSION['errMessage'] = $e->getMessage();
        }
      }
    }
  } else {
    header('Location: deposit.php');
    exit();
  }
  $conn->close();