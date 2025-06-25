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
<html>
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
  <title>Blueseedfinance | Transaction-history</title>
</head>
<body class="text-gray-900 bg-white">
  <div class="pb-[100px]">
    <div class="p-4">
      <div class="float-left cursor-pointer" onclick="history.back()">
        <i class="fa fa fa-arrow-left fa-lg"></i>
      </div>
      <div class="text-center text-xl">
        <h3>Transaction History</h3>
      </div>
    </div>
    <!-- fetching all debit transaction history -->
    <div class="mt-10 mx-auto w-[90%]">
      <h2 class="font-bold text-lg mb-5">Debit Transactions</h2>
       <!-- fetching data for pagination -->
       
        <?php
          $records_per_page = 3;
          $page = isset($_GET['page']) ? $_GET['page'] : 1; // get the  current page number

          $start_from = ($page - 1) * $records_per_page;
          $sql = "SELECT * FROM transaction_debit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT $start_from, $records_per_page";
          $result = $conn->query($sql);

          // display data on the frontend
          if ($result->num_rows > 0) {
            
            // fetch data from the database
            while ($row = $result->fetch_assoc()) {
              $sendingFrom = $row['sending_from'];
              $bankName = $row['recipient_bank_name'];
              $accountNumber = $row['recipient_account_number'];
              $accountName = $row['recipient_account_name'];
              $amount = $row['amount'];
              $narration = $row['narration'];
              $dateTime = $row['date_time'];
              $timeDate = $row['time_date'];
              ?>
                <div class="border-b border-slate-500 flex justify-between">
                  <div class="w-[80%] md:w-[100%]">
                    <span>
                      <i class="fa-brands fa-gg"></i>
                    </span>
                    <?= 'Transfer to ' . htmlentities($bankName . ' ' . $accountNumber . ' ' . $accountName . ' ' . $narration . ' from your ' . htmlentities($sendingFrom) . ' at about ' . $dateTime); ?>
                  </div>
                  <div class="text-red-500">
                    <?= '$' . htmlentities($amount); ?>
                  </div>
                </div>
            <?php } ?>
            <?php

            // pagination links
            $sql = "SELECT COUNT(id) AS total FROM transaction_debit";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_records = $row['total'];
            $total_pages = ceil($total_records / $records_per_page);

            echo '<td>';
              if ($page > 1) {
              echo "<a href='?page=".($page-1)."'>Prev</a> ";
              // echo "<td><a href='?page=$i'>$i</a></td>";
              } 
              if ($page < $total_pages) {
                echo "<a href='?page=".($page+1)."'>Next</a>";
              }
            echo "</td>";
          } else {
            echo '<tfoot>';
              echo '<tr>';
                echo '<td>No records found</td>';
              echo '</tr>';
            echo '<tfoot>';
          }
        ?>

    </div>

    <!-- fetching all credit transaction history -->
    <div class="mt-10 mx-auto w-[90%]">
      <h2 class="font-bold text-lg mb-5">Credit Transactions</h2>
       <!-- fetching data for pagination -->
       
        <?php
          $records_per_page = 3;
          $page = isset($_GET['page']) ? $_GET['page'] : 1; // get the  current page number

          $start_from = ($page - 1) * $records_per_page;
          $sql = "SELECT * FROM transaction_credit WHERE transaction_id = '$loggedInId' ORDER BY id ASC LIMIT $start_from, $records_per_page";
          $result = $conn->query($sql);

          // display data on the frontend
          if ($result->num_rows > 0) {
            
            // fetch data from the database
            while ($row = $result->fetch_assoc()) {
              $checkingAccount = $row['checking'];
              $savingsAccount = $row['savings'];
              $dateTime = $row['date_time'];
              $timeDate = $row['time_date'];
              ?>
                <div class="border-b border-slate-500 flex justify-between">
                  <div class="w-[80%] md:w-[90%]">
                    <span>
                      <i class="fa-solid fa-money-bills"></i>
                    </span>
                    <?= 'A credit transaction occurred in your account at about ' . $dateTime . ' ' . $timeDate; ?>
                  </div>
                  <div class="text-green-500">
                    <?= '$' . htmlentities($checkingAccount); ?>
                    <?= htmlentities($savingsAccount); ?>
                  </div>
                </div>
            <?php } ?>
            <?php

            // pagination links
            $sql = "SELECT COUNT(id) AS total FROM transaction_debit";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_records = $row['total'];
            $total_pages = ceil($total_records / $records_per_page);

            echo '<td>';
              if ($page > 1) {
                echo "<a href='?page=".($page-1)."'>Prev</a> ";
              } 
              if ($page < $total_pages) {
                echo "<a href='?page=".($page+1)."'>Next</a>";
              }
            echo "</td>";
          } else {
            echo '<tfoot>';
              echo '<tr>';
                echo '<td>No records found</td>';
              echo '</tr>';
            echo '<tfoot>';
          }
        ?>

    </div>
</body>
</html>
