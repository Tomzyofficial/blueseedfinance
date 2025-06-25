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
            <a href="admin-users.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
  <main class="mt-[100px] text-sm">
    <div class="table_contents">
      <table class="table table-auto border-separate border border-slate-500 mx-auto w-[90%] overflow-auto">
        <caption class="pb-5">ALL USERS</caption>
        <thead class="bg-white text-slate-900">
          <tr>
            <th class="p-2">Id</th>
            <th class="p-2">Firstname</th>
            <th class="p-2">Middlename</th>
            <th class="p-2">Lastname</th>
            <th class="p-2">Username</th>
            <th class="p-2">Email</th>
            <th class="p-2">Ssn</th>
            <th class="p-2">Dob</th>
            <th class="p-2">Phone</th>
            <th class="p-2">Password</th>
            <th class="p-2">Checking</th>
            <th class="p-2">Savings</th>
            <th class="p-2">Date</th>
            <th class="p-2">Edit</th>
            <th class="p-2">Delete</th>
          </tr>
        </thead>
        <!-- fetch users details from our table -->
        <?php
          $records_per_page = 10;
          $page = isset($_GET['pages']) ? $_GET['pages'] : 1; // get the  current page number

          $start_from = ($page - 1) * $records_per_page;
          $sql = "SELECT * FROM user_details LIMIT $start_from, $records_per_page";
          $result = $conn->query($sql);

          // display data on the frontend
          if ($result->num_rows > 0) {

            // fetch data from the database
            while ($row = $result->fetch_assoc()) {
              echo '<tbody>';
                echo '<tr>';
                  echo '<td class="border border-slate-500">' . $row["id"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row['first_name'] . '</td>';
                  echo '<td class="border border-slate-500">' . $row['middle_name'] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["last_name"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["user_name"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row['email'] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["ssn"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["dob"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["phone"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["pwd"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["checking_account"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["savings_account"] . '</td>';
                  echo '<td class="border border-slate-500">' . $row["date_time"] . '</td>';
                  echo "<td class='border border-slate-500 text-center'><a href='edit-user.php?id=" . $row["id"] . "' class='underline decoration-white'><i class='fa-regular fa-pen-to-square'></i></a></td>";
                  echo "<td class='border border-slate-500 text-center'><a href='delete-user.php?id=" . $row["id"] . "'  class='underline decoration-white'><i class='fa-solid fa-trash'></i></a></td>";
                echo '</tr>';
              echo '</tbody>';
            }

            // pagination links
            $sql = "SELECT COUNT(id) AS total FROM user_details";
            $result = $conn->query($sql);
            $row = $result->fetch_assoc();
            $total_records = $row['total'];
            $total_pages = ceil($total_records / $records_per_page);

            echo '<td>';
              if ($page > 1) {
                echo "<a href='?pages=".($page-1)."'>Prev</a> ";
                // echo "<td><a href='?page=$i'>$i</a></td>";
              } 
              if ($page < $total_pages) {
                echo "<a href='?pages=".($page+1)."'>Next</a>";
              }
            echo "</td>";
          } else {
            echo '<tfoot>';
              echo '<tr>';
                echo '<td>No records found</td>';
              echo '</tr>';
            echo '<tfoot>';
          }
          $conn->close();
        ?>
      </table>
    </div>        
  </main>
  <script src="app.js"></script>
</body>
</html>