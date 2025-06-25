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
            <a href="admin-deb-cred.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500">
                <i class="fa fa-dollar fa-sm"></i>
              </span> Transactions
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
            <a href="admin-loan.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
  <main class="mt-[100px] text-sm">
    <div>
      <table class="table table-auto border-separate border border-slate-500 mx-auto w-[90%] overflow-auto">
        <caption class="pb-5">ALL LOAN APPLICATION</caption>
        <thead class="bg-white text-slate-900">
          <tr>
            <th class="p-2">Id</th>
            <th class="p-2">Type of loan</th>
            <th class="p-2">Duration</th>
            <th class="p-2">Amount</th>
            <th class="p-2">Purpose</th>
            <th class="p-2">Date</th>
            <th>Loan Id</th>
          </tr>
        </thead>
        <!-- fetch users details from our table -->
        <?php 
          $sql = "SELECT * FROM loan";
          $query = $conn->query($sql);
          while ($row = $query->fetch_assoc()) {
            $id = $row['id'];
            $typeOfLoan = $row['type_of_loan'];
            $duration = $row['duration'];
            $amount = $row['amount'];
            $purpose = $row['purpose'];
            $date = $row['date_time'];
            $loan_id = $row['loan_id'];
        ?>
        <tbody>
          <tr>
            <td class="border border-slate-500"><?= htmlentities($id); ?></td>
            <td class="border border-slate-500"><?= htmlentities($typeOfLoan); ?></td>
            <td class="border border-slate-500"><?= htmlentities($duration); ?></td>
            <td class="border border-slate-500"><?= htmlentities($amount); ?></td>
            <td class="border border-slate-500"><?= htmlentities($purpose); ?></td>
            <td class="border border-slate-500"><?= htmlentities($date); ?></td>
            <td class="border border-slate-500"><?= htmlentities($loan_id); ?></td>
          </tr>
        </tbody>
        <?php } ?>
      </table>
    </div>        
  </main>
  <script src="app.js"></script>
</body>
</html>