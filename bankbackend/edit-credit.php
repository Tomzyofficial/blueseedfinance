<?php
  require_once('session.inc.php');
  if (!isset($_SESSION['admin_user'])) {
    $_SESSION['succMessage'] = 'Login to continue';
    header('Location: index.php');
    exit();
  } 
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
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="src/image/logo.jpg">
  <script src="jquery-3.6.0.js"></script>
  <title>Blueseedfinance Admin</title>
</head>
<body>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Edit Credit Information</h3>
      </div>
      <!-- fetch credit transactions for edit -->
      <?php
        $sql = "SELECT * FROM transaction_credit WHERE id = '$searchParam'";
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            $checking = $row['checking'];
            $savings = $row['savings'];
            $credit = $row['credit'];
            $total_checking = $row['total_checking'];
            $total_savings = $row['total_savings'];
            $slip = $row['deposit_confirm_slip'];
            $date = $row['date_time'];
            $time = $row['time_date'];
            
        }
      ?>
      <!-- input field -->
      <form action="edit-credit.inc.php?id=<?= $searchParam;?>" method="POST">
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- checking input field -->
          <div class="relative md:mr-2">
            <label for="checking">Checking</label>
            <input type="text" id="checking" name="checking" value="<?= htmlentities($checking); ?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- savings input field -->
          <div class="relative md:ml-2">
            <label for="savings">Savings</label>
            <input type="text" id="savings" name="savings" value="<?= htmlentities($savings);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- credit input field -->
          <div class="relative md:mr-2">
            <label for="credit">Credit</label>
            <input type="text" id="credit" name="credit" value="<?= htmlentities($credit);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- total checking input field -->
          <div class="relative md:ml-2">
            <label for="total_checking">Total Checking</label>
            <input type="text" id="total_checking" name="total_checking" value="<?= htmlentities($total_checking);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- total savings -->
          <div class="relative md:mr-2">
            <label for="total_savings">Total Savings</label>
            <input type="text" id="total_savings" name="total_savings" value="<?= htmlentities($total_savings);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- credit slip -->
          <div class="relative md:ml-2">
            <label for="slip">Slip</label>
            <a href="../dashboard/user/transaction/<?= htmlentities($slip);?>" target="_blank"><img src="../dashboard/user/transaction/<?= htmlentities($slip); ?>" style="max-width: 200px;  max-height:100px"></a>
          </div>
          <!-- date -->
          <div class="relative md:mr-2">
            <label for="date_time">Date</label>
            <input type="text" id="date_time" name="date_time" value="<?= htmlentities($date);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- time -->
          <div class="relative  md:ml-2">
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