<?php
  require_once('session.inc.php');
  if (!isset($_SESSION['admin_user'])) {
    $_SESSION['succMessage'] = 'Login to continue';
    header('Location: index.php');
    exit();
  } 
  // get user id for editing
  if (isset($_GET['id'])) {
    $searchParam = $_GET['id'];
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
  <link rel="stylesheet" href="dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <script src="jquery-3.6.0.js"></script>
  <title>Blueseedfinance Admin</title>
</head>
<body>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Edit Debit Information</h3>
      </div>
      <!-- fetch debit transactions for edit -->
      <?php
        $sql = "SELECT * FROM transaction_debit WHERE id = '$searchParam'";
        $query = $conn->query($sql);
        while ($row = $query->fetch_assoc()) {
          $id = $row['id'];
          $send_from = $row['sending_from'];
          $recipient_bank = $row['recipient_bank_name'];
          $recipient_acct_no = $row['recipient_account_number'];
          $recipient_account_name = $row['recipient_account_name'];
          $amount = $row['amount'];
          $narration = $row['narration'];
          $status = $row['transfer_status'];
          $date = $row['date_time'];
          $time = $row['time_date'];
        }
      ?>
      <!-- input field -->
      <form action="edit-debit.inc.php?id=<?= $searchParam;?>" method="POST">
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- send from -->
          <div class="relative md:mr-2">
            <label for="send_from">Transfer From</label>
              <input type="text" id="send_from" name="account" value="<?= $send_from; ?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- receiver bank name-->
          <div class="relative md:ml-2">
            <label for="bank">Recipient Bank</label>
            <input type="text" id="bank" name="bank" value="<?= htmlentities($recipient_bank);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- receiver account number -->
          <div class="relative md:mr-2">
            <label for="recipient_account_no">Recipient Account No</label>
            <input type="text" id="recipient_account_no" name="recipient_account_no" value="<?= htmlentities($recipient_acct_no);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- reciever account name -->
          <div class="relative md:ml-2">
            <label for="recipient_account_name">Recipient Account Name</label>
            <input type="text" id="recipient_account_name" name="recipient_account_name" value="<?= htmlentities($recipient_account_name);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- amount -->
          <div class="relative md:mr-2">
            <label for="amount">Amount</label>
            <input type="text" id="amount" name="amount" value="<?= htmlentities($amount);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- narration -->
          <div class="relative md:ml-2">
            <label for="narration">Narration</label>
            <input type="text" name="narration" value="<?= $narration;?>" id="narration" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- transfer status -->
          <div class="relative md:mr-2">
            <label for="status">Status</label>
            <input type="text" name="status" value="<?= $status;?>" id="status" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- date -->
          <div class="relative md:ml-2">
            <label for="date_time">Date</label>
            <input type="text" id="date_time" name="date_time" value="<?= htmlentities($date);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- time -->
          <div class="relative  md:mr-2">
            <label for="time_date">Time <span class="text-sm"></span></label>
            <input type="text" name="time_date" id="phone" value="<?= htmlentities($time);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
        </div>
        <div class="flex mx-5 mt-5 lg:mx-auto lg:w-1/2">
          <button type="submit" name="submit" class="w-[100%] p-2 bg-green-500 text-white font-bold text-lg hover:bg-green-600 rounded-md"><i class="fa fa-check"></i> Update</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>