<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
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
  <title>Blueseedfinance | Kyc-verification</title>
</head>
<body>
  <header>
    <nav class="fixed top-0 z-10 font-lighter text-slate-500 flex justify-between items-center capitalize ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <!-- logo -->
      <div class="logo">
        <a href="dashboard.php"><img src="../../src/image/logo.jpg" class="w-[40px] h-[40px]"></a>
      </div>
      <!-- navigation links -->
      <div class="navigation fixed left-0 top-[-100%] bg-[#000] w-[80%] h-[100dvh] p-5 lg:relative lg:w-[70%] lg:h-[0] lg:top-[-10px] lg:bg-inherit">
        <ul class="relative nav_links lg:flex lg:justify-between lg:gap-4 list-none">
          <li class="pt-4 lg:pt-0">
            <a href="dashboard.php" class="flex w-[100%] h-[100%] items-center  hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500">
                <i class="fa fa-home fa-sm"></i>
              </span> home
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="deposit.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500">
                <i class="fa fa-dollar fa-sm"></i>
              </span> deposit
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="transfer.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500"><i
                  class="fa fa-money-bill-transfer fa-sm"></i>
              </span>send money
              </span>
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="request-loan.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500"><i
                  class="fa-brand fa fa-hand-holding-dollar fa-sm"></i>
              </span>loan
            </a>
          </li>
          <li class="pt-5 relative lg:pt-0">
            <a href="#" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-900 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500"><i
                class="fa-solid fa-ellipsis fa-sm"></i>
              </span>others
            </a>
            <!-- second inner nav -->
            <ul class="sec_links list-none p-2 ml-2 space-y-4 absolute hidden w-[100%] lg:w-[15vw] lg:bg-white lg:drop-shadow-lg lg:mt-0 lg:ml-2">
              <li>
                <a href="transaction-history.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
                  <span class="lg:hidden bg-slate-900 p-2 mr-2 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500">
                  <i class="fa-regular fa-calendar-days fa-sm"></i>
                  </span>Transaction history
                </a>
              </li>
              <li>
                <a href="net-worth.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 transition duration-150 delay-150">
                  <span class="lg:hidden bg-slate-900 p-2 mr-2 rounded-full flex justify-center items-center w-[40px] h-[40px] text-neutral-500">
                  <i class="fa-solid fa-ellipsis fa-sm"></i>
                  </span>Net worth
                </a>
              </li>
            </ul>
          </li>
          <!-- logout button -->
          <div class="text-red-500 mt-[4rem] mx-5 font-bold lg:mt-0">
            <?php
              if(isset($loggedInId)){
                  echo ' <form action="logout.inc.php" method="POST">
                  <button type="submit" name="submit" id="logout"><span><i class="fa fa-right-from-bracket fa-sm"></i></span>Logout</button>
                </form>';
              }
            ?>
          </div>
        </ul>
      </div>
      <!-- profile icon -->
      <div class="profile">
        <a href="profile.php"><img src="../../src/image/57.PNG" class="w-[60%] h-[60%] lg:w-[80%]"></a>
      </div>
    </nav>
    <!-- header hero section -->
    <div class="hero_section relative h-[40dvh]" style="background-image: url('../../src/image/10.PNG'); width: 100%; background-repeat: no-repeat; background-size: 100% 100%; ">
      <div class="site_hero text-center text-white font-bold text-[25px] flex items-center justify-center h-[40dvh]">
        <h2>KYC Form</h2>
      </div>
    </div>
  </header>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Please provide your valid information</h3>
      </div>
      <!-- input field -->
      <form action="kycVerification.inc.php?a=<?= htmlentities($loggedInId); ?>" method="POST" enctype="multipart/form-data">
        <!-- error reports -->
        <div class="mx-5 my-4">
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div class="mx-5 space-y-4 grid grid-cols-1">
          <!-- firstname input field -->
          <div>
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="first_name" autocomplete="on" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- last name input field -->
          <div>
            <label for="last_name">Last Name</label>
            <input type="text" id="last_name" name="last_name" autocomplete="on" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- mother name input field -->
          <div>
            <label for="mother_name">Mother's Maiden Name</label>
            <input type="text" id="mother_name" name="mother_name" autocomplete="on" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- email input field -->
          <div>
            <label for="email">Email</label>
            <input type="text" id="email" name="email" autocomplete="on" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- POR input field -->
          <div>
            <label for="residence">Proof of Residence</label>
            <input type="file" id="residence" autocomplete="off" name="residence_file" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- passport input field -->
          <div>
            <label for="identity">Proof of Identity</label>
            <input type="file" id="identity" autocomplete="off" name="identity_file" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
        </div>
        <div class="mx-5 mt-5">
          <button type="submit" id="process" name="submit" class="w-[100%] p-2 bg-blue-500 text-white font-bold text-lg hover:bg-blue-600 rounded-sm">Continue</button>
        </div>
      </form>
    </div>
  </main>
  <!-- small screen footer -->
  <footer>
    <div class="fixed bottom-0 bg-white w-[100%] p-4 flex justify-around lg:hidden">
      <div class="text-slate-900 text-center">
        <a href="dashboard.php" class="flex flex-col transition-all hover:text-blue-500">
          <span class="menu-btn-burger">
            <i class="fa fa-home fa-lg"></i>
          </span>Home
        </a>
      </div>
      <div class="text-slate-900 text-center">
        <a href="deposit.php" class="flex flex-col transition-all hover:text-blue-500">
          <span>
            <i class="fa fa-dollar fa-lg"></i>
          </span>Deposit
        </a>
      </div>
      <div class="text-slate-900 text-center">
        <a href="transfer.php" class="flex flex-col transition-all hover:text-blue-500">
          <span>
            <i class="fa fa-money-bill-transfer fa-lg"></i>
          </span>Pay & Transfer
        </a>
      </div>
      <div class="text-slate-900 flex flex-col text-center cursor-pointer menu transition-all hover:text-blue-500">
        <span>
            <i class="fa fa-bars fa-lg"></i>
          </span>Menu
      </div>
    </div>
  </footer>
  <!-- large screen footer -->
  <footer>
    <div class="relative mt-[100px] text-slate-500 bg-slate-900 h-[fit-content] pb-10 pt-[50px] hidden lg:block">
      <div class="pb-5 flex flex-col gap-4 ps-5 md:flex-row md:justify-around lg:flex-row lg:justify-evenly">
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Connect with us</h2>
          <ul class="list-none">
            <li><a href="javascrip:void(0)" class="text-2xl rounded-md"><i
                  class="fa-brands fa-square-facebook"></i></a></li>
            <li><a href="javascript:void(0)" class="text-2xl rounded-md"><i
                  class="fa-brands fa-square-instagram"></i></a></li>
            <li><a href="javascript:void(0)" class="text-2xl rounded-md"><i
                  class="fa-brands fa-square-twitter"></i></a></li>
          </ul>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Head Office</h2>
          <p class="text-slate-500">102 Grand St., LA USA</p>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Company</h2>
          <ul class="list-none">
            <li><a href="../../about.php" class="capitalize text-slate-500">about us</a></li>
            <li><a href="../../banking.php" class="capitalize text-slate-500">banking</a></li>
            <li><a href="../../contact.php" class="capitalize text-slate-500">contact us</a></li>
          </ul>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Our Products</h2>
          <ul class="list-none">
            <li><a href="#" class="capitalize text-slate-500">business account</a></li>
            <li><a href="#" class="
                capitalize text-slate-500">working capital loans</a></li>
          </ul>
        </div>
      </div>
      <div class="mx-5 border-t-[1px] border-slate-500 flex flex-col space-y-4 lg:mx-[100px] lg:flex-row lg:space-x-16">
        <div class="logo">
          <a href="dashboard.php"><img src="../../src/image/logo.jpg" class="mt-5 w-[40px] h-[40px]"></a>
        </div>
        <p class="text-slate-500 text-md md:w-2/3">Flexible and secure checking accounts are the cornerstone of our
          community banking philosophy. With numerous account
          options and plenty of local banking experts, be rest assured your money will be well looked after. Get started
          today and never look back.</p>
          <div class="text-xs">
            &copy;
            <?php
              echo  'Blueseedfinance ' . date('Y') . ' | All right reserved';
            ?>
          </div>
      </div>
    </div>
  </footer>
  <script src="../../processing.js"></script>
  <script src="../../app.js"></script>
</body>
</html>