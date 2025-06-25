<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
     $_SESSION["succMessage"] = "Login to continue";
    header("Location: ../../accounts.auth/signin.php");
    exit();
  }
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../../dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="../../fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../../src/image/logo.jpg">
  <script src="../../jquery-3.6.0.js"></script>
  <title>Blueseedfinance | Net-worth</title>
</head>
<body class="bg-gray-900">
  <header>
    <div class="p-4">
      <div class="float-left cursor-pointer text-white" onclick="history.back()">
        <i class="fa fa fa-arrow-left fa-lg"></i>
      </div>
      <div class="text-center text-xl text-white">
        <h3>Net Worth</h3>
      </div>
    </div>
  </header>
  <main class="mt-10 p-4">
    <div class="flex flex-col space-y-4 lg:flex-row lg:justify-around lg:space-y-0 mb-[5rem]">
      <!-- net worth for checking account -->
      <div class="bg-gradient-to-r from-white to-gray-500 p-4 rounded-sm lg:w-1/2">
        <div class="text-center">
          <h4 class="text-lg">Checking Account Net Worth</h4>
          <?php 
            $sql = "SELECT total_checking FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";
            $stmt = $conn->query($sql);
            $sum = 0;
            while ($row = $stmt->fetch_assoc()) {
              $checkingValue = floatval(str_replace('$', '', $row['total_checking']));
              $sum += $checkingValue;
            }
            if ($sum > 0) {
              // add comma separator
              if (strlen($sum) > 3) {
                $formatedComma = number_format($sum, 2, '.', ',');
                echo '$' . $formatedComma;
              } else {
                echo '$' . number_format($sum, 2);
              }
            } else {
              echo "$" . number_format($sum, 2);
            }
          ?>
        </div>
        <div class="space-y-4 pt-4 text-center">
          <img src="../../src/image/chart-img.PNG" class="rounded-full mx-auto max-w-[100px] md:max-w-md lg:max-w-sm">
          <p class="bg-gradient-to-r from-gray-500 to-white p-1">
            <?php 
              $sql = "SELECT total_checking FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";
              $stmt = $conn->query($sql);
              $sum = 0;
              while ($row = $stmt->fetch_assoc()) {
                $checkingValue = floatval(str_replace('$', '', $row['total_checking']));
                $sum += $checkingValue;
              }
              if ($sum > 0) {
                // if money is more than 6 figues add comma separator
                if (strlen($sum) > 3) {
                  $formatedComma = number_format($sum, 2, '.', ','); 
                  echo '$' . $formatedComma . ' US Dollar';
                } else {
                  echo '$' . number_format($sum, 2) . ' US Dollar' ;
                }
              } else {
                echo '$' . number_format($sum, 2) . ' US Dollar';
              }
            ?> 
            <br>Assets
          </p>  
        </div>
      </div>
      <!-- net worth for  savings account -->
      <div class="bg-gradient-to-r from-white to-gray-500 p-4 rounded-sm lg:w-1/2">
        <div class="text-center">
          <h4 class="text-lg">Savings Account Net Worth</h4>
          <?php 
            $sql = "SELECT total_savings FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";
            $stmt = $conn->query($sql);
            $sum = 0;
            while ($row = $stmt->fetch_assoc()) {
              $savingValue = floatval(str_replace('$', '', $row['total_savings']));
              $sum += $savingValue;
            }
            if ($sum > 0) {
              // if money is more than 6 figues add comma separator
              if (strlen($sum) > 3) {
                $formatedComma = number_format($sum, 2, '.', ','); 
                echo '$' . $formatedComma;
              } else {
                echo '$' . number_format($sum, 2) ;
              }
            } else {
              echo '$' . number_format($sum, 2);
            }
          ?>
        </div>
        <div class="space-y-4 pt-4 text-center">
          <img src="../../src/image/chart-img.PNG" class="rounded-full mx-auto max-w-[100px] md:max-w-md lg:max-w-sm">
          <p class="bg-gradient-to-r from-gray-500 to-white p-1">
            <?php 
              $sql = "SELECT total_savings FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT 1";
              $stmt = $conn->query($sql);
              $sum = 0;
              while ($row = $stmt->fetch_assoc()) {
                $savingValue = floatval(str_replace('$', '', $row['total_savings']));
                $sum += $savingValue;
              }
              if ($sum > 0) {
                // if money is more than 6 figues add comma separator
                if (strlen($sum) > 3) {
                  $formatedComma = number_format($sum, 2, '.', ','); 
                  echo '$' . $formatedComma . ' US Dollar';
                } else {
                  echo '$' . number_format($sum, 2) . ' US Dollar' ;
                }
              } else {
                echo '$' . number_format($sum, 2) . ' US Dollar';
              }
            ?> 
            <br>Assets
          </p>  
        </div>
      </div>
    </div>
  </main>
</body>
</html>