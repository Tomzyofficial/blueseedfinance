<?php
  require_once('session.inc.php');
  // $adminLoggedIn = $_SESSION['admin_user'];
  if (!isset($_SESSION['admin_user'])) {
    $_SESSION['succMessage'] = 'Login to continue';
    header('Location: index.php');
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
  <link rel="stylesheet" href="dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="src/image/logo.jpg">
  <script src="jquery-3.6.0.js"></script>
  <title>Blueseedfinance Admin</title>
  <style>
    .table_contents {
      overflow: auto;
      scrollbar-width: none; /* for firefox */
      -ms-overflow-style: none;  /* for IE and Edge */
    }
    .table_contents::-webkit-scrollbar {display: none;} /* for chrome */
  </style>
</head>
<body class="bg-black text-white">
  <header>
    <nav class="fixed top-0 z-10 font-lighter text-slate-500 flex justify-between items-center capitalize ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <!-- logo -->
      <div class="logo">
        <a href="admin-users.php"><img src="src/image/logo.jpg" class="w-[40px] h-[40px]"></a>
      </div>
      <!-- navigation links -->
      <div class="navigation fixed left-0 top-[-100vh] bg-[#000] w-[80%] h-[100dvh] p-5 lg:relative lg:w-[70%] lg:h-[0] lg:top-[-10px] lg:bg-inherit">
        <ul class="relative nav_links lg:flex lg:justify-between lg:gap-4 list-none">
          <li class="pt-4 lg:pt-0">
            <a href="admin-users.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500">
                <i class="fa fa-home fa-sm"></i>
              </span> users
            </a>
          </li>
          <li class="pt-10 lg:pt-0">
            <a href="admin-deb-cred.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500">
                <i class="fa fa-dollar fa-sm"></i>
              </span> transactions
            </a>
          </li>
          <li class="pt-10 lg:pt-0">
            <a href="admin-kyc.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
                  class="fa-brand fa fa-hand-holding-dollar fa-sm"></i>
              </span>kyc
            </a>
          </li>
          <li class="pt-10 relative lg:pt-0">
            <a href="admin-loan.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
                class="fa-solid fa-ellipsis fa-sm"></i>
              </span>loan
            </a>
          </li>
          <!-- logout button -->
          <div class="text-red-500 mt-[4rem] font-bold lg:mt-0">
            <?php
              if(isset($_SESSION['admin_user'])){
                echo ' <form action="admin-logout.inc.php" method="POST">
                <button type="submit" name="submit" id="logout"><span><i class="fa fa-right-from-bracket fa-sm"></i></span>Logout</button>
                </form>';
              }
            ?>
          </div>
        </ul>
      </div>
      <!-- menubar toggler -->
      <div class="menu-btn-burger lg:hidden">
        <div class="menu-icon"></div>
      </div>
    </nav>
  </header>
  <!-- all credit transaction -->
  <main class="mt-[100px] text-sm">
    <div class="table_contents">
      <table class="table table-auto border-separate border border-slate-500 mx-auto w-[90%] overflow-auto">
        <caption class="pb-5">ALL CREDIT TRANSACTIONS</caption>
        <thead class="bg-white text-slate-900">
          <tr>
            <th class="p-2">Id</th>
            <th class="p-2">Checking</th>
            <th class="p-2">Savings</th>
            <th class="p-2">Credit</th>
            <th class="p-2">Total Checking</th>
            <th class="p-2">Total Savings</th>
            <th class="p-2">Slip</th>
            <th class="p-2">Date</th>
            <th class="p-2">Time</th>
            <th class="p-2">Credit id</th>
            <th class="p-2">Edit</th>
            <th class="p-2">Delete</th>
          </tr>
        </thead>
        <!-- fetch transaction credit from our table -->
        <?php 
          $sql = "SELECT * FROM transaction_credit";
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            $checking = $row['checking'];
            $checkingDollar = '$' . $checking;
            $savings = $row['savings'];
            $savingsDollar = '$' . $savings;
            $credit = $row['credit'];
            $total_checking = $row['total_checking'];
            $total_savings = $row['total_savings'];
            $slip = $row['deposit_confirm_slip'];
            $date = $row['date_time'];
            $time = $row['time_date'];
            $transaction_id = $row['transaction_id'];
        ?>
        <tbody>
          <tr>
            <td class="border border-slate-500"><?= htmlentities($id); ?></td>
            <td class="border border-slate-500"><?= htmlentities($checkingDollar); ?></td>
            <td class="border border-slate-500"><?= htmlentities($savingsDollar); ?></td>
            <td class="border border-slate-500"><?= htmlentities($credit); ?></td>
            <td class="border border-slate-500"><?= htmlentities($total_checking); ?></td>
            <td class="border border-slate-500"><?= htmlentities($total_savings); ?></td>
            <td class="border border-slate-500"><img src="../dashboard/user/transaction/<?= htmlentities($slip); ?>" style="max-width: 100px; max-height: 50px;"></td>
            <td class="border border-slate-500"><?= htmlentities($date); ?></td>
            <td class="border border-slate-500"><?= htmlentities($time); ?></td>
            <td class="border border-slate-500"><?= htmlentities($transaction_id);?></td>
            <td class="border border-slate-500 text-center"><a href="edit-credit.php?id=<?= $id; ?>" class="underline decoration-white"><i class="fa-regular fa-pen-to-square"></i></a></td>
            <td class="border border-slate-500 text-center"><a href="delete-credit.php?id=<?= $id; ?>" class="underline decoration-white"><i class="fa-solid fa-trash"></i></a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>        
  </main>
  <!-- all debit transaction -->
  <main class="mt-10 text-sm">
    <div class="table_contents pb-[100px]">
      <table class="table table-auto border-separate border border-slate-500 mx-auto w-[90%] overflow-auto">
        <caption class="pb-5">ALL DEBIT TRANSACTIONS</caption>
        <thead class="bg-white text-slate-900">
          <tr>
            <th class="p-2">Id</th>
            <th class="p-2">Account</th>
            <th class="p-2">Bank</th>
            <th class="p-2">Account No</th>
            <th class="p-2">Account Name</th>
            <th class="p-2">Amount</th>
            <th class="p-2">Narration</th>
            <th class="p-2">Status</th>
            <th class="p-2">Date</th>
            <th class="p-2">Time</th>
            <th class="p-2">Debit id</th>
            <th class="p-2">Edit</th>
            <th class="p-2">Delete</th>
          </tr>
        </thead>
        <!-- fetch transaction debit from our table -->
        <?php 
          $sql = "SELECT * FROM transaction_debit";
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            $send_from = $row['sending_from'];
            $recipient_bank = $row['recipient_bank_name'];
            $recipient_acct_no = $row['recipient_account_number'];
            $recipient_account_name = $row['recipient_account_name'];
            $amount = $row['amount'];
            $amountDollar = '$' . $amount;
            $narration = $row['narration'];
            $status = $row['transfer_status'];
            $date = $row['date_time'];
            $time = $row['time_date'];
            $transaction_id = $row['transaction_id'];
        ?>
        <tbody>
          <tr>
            <td class="border border-slate-500"><?= htmlentities($id); ?></td>
            <td class="border border-slate-500"><?= htmlentities($send_from); ?></td>
            <td class="border border-slate-500"><?= htmlentities($recipient_bank); ?></td>
            <td class="border border-slate-500"><?= htmlentities($recipient_acct_no); ?></td>
            <td class="border border-slate-500"><?= htmlentities($recipient_account_name); ?></td>
            <td class="border border-slate-500"><?= htmlentities($amountDollar); ?></td>
            <td class="border border-slate-500"><?= htmlentities($narration); ?></td>
            <td class="border border-slate-500"><?= htmlentities($status); ?></td>
            <td class="border border-slate-500"><?= htmlentities($date); ?></td>
            <td class="border border-slate-500"><?= htmlentities($time); ?></td>
            <td class="border border-slate-500"><?= htmlentities($transaction_id); ?></td>
            <td class="border border-slate-500 text-center"><a href="edit-debit.php?id=<?= $id; ?>"><i class="fa-regular fa-pen-to-square"></i></a></td>
            <td class="border border-slate-500 text-center"><a href="delete-debit.php?id=<?= $id; ?>"><i class="fa-solid fa-trash"></i></a></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
      <!-- pagination -->
      <?php
        $itemsPerPage = ;
        $page = isset($_GET['page']) ? $_GET['page'] : 1;
        $offset = ($page - 1) * $itemsPerPage;

        $sql = "SELECT * FROM transaction_debit LIMIT $offset, $itemsPerPage";
        $result = $conn->query($sql);

        $items = [];
        if ($result->num_rows > 0) {
          while ($row = $result->fetch_assoc()) {
            $items[] = $row;
          }
        }

        $totalItemsSql = "SELECT COUNT(id) AS total FROM transaction_debit";
        $totalItemsResult = $conn->query($totalItemsSql);
        $totalItems = $totalItemsResult->fetch_assoc()['total'];

        $totalPages = ceil($totalItems / $itemsPerPage);

        foreach ($items as $item) {
          echo $item['id'] . ": " . $item['sending_from'] . "<br>";
        }
        for ($i = 1; $i <= $totalPages; $i++) {
          echo "<a href='?page=$i'>$i</a>";
        }
      ?> 
    </div>        
  </main>
  <script src="app.js"></script>
</body>
</html>