<?php
  require_once('session.inc.php');
  $loggedInId = $_SESSION['u_id'];
  $checkingAccount = $_SESSION['checkingAccount'];
  $savingsAccount = $_SESSION['savingsAccount'];
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
  <title>Blueseedfinance | Deposit</title>
</head>
<body style="background-image: url('../../src/image/deposit_bg.PNG'); background-size: 100% 100%;">
  <header>
    <nav
      class="fixed top-0 z-10 font-lighter text-slate-500 flex justify-between items-center capitalize ps-10 pe-10 bg-white h-[10vh] w-[100%]">
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
            <a href="deposit.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
    <div class="hero_section relative h-[40dvh]" style="background-image: url('../../src/image/22.jpg'); width: 100%; background-repeat: no-repeat; background-size: 100% 100%; ">
      <div class="site_hero text-center text-white font-bold text-[25px] flex items-center justify-center h-[40dvh]">
        <h2>Fund your account with ease</h2>
      </div>
    </div>
  </header>
  <!-- main -->
  <main>
    <div class="p-5 pb-10">
      <div class="flex flex-col mt-10 p-5 mx-auto lg:flex-row  lg:w-[90%] lg:space-x-16">
        <!-- step one -->
        <div class="space-y-2 w-[100%]">
          <div>
            <span class="bg-[#ddd] p-5 relative rounded-full"> 
              <i class="fa-regular fa-hand-pointer" aria-hidden="true"><strong class="absolute text-[10px] bg-[#e67e22] text-[#535c68] p-2 border-2 border-white rounded-md top-1 w-[100%]">step 1</strong></i>
            </span>
            <h6 class="text-[14px] italic capitalize pt-[20px] text-slate-500">Select means of payment</h6>   
            <span id="bitcoin" class="text-[14spanx] hidden">
              <img src="../../src/image/38.PNG" class="w-[100px] rounded-lg">
              <p>Bitcoin payment</p>
            </span>
            <span id="cashapp" class="text-[14px] hidden">
              <img src="../../src/image/cashapp.PNG" class="w-[100px] rounded-lg">
              <p>Cashapp payment</p>
            </span>
            <sapn id="usdt" class="text-[14px] hidden">
              <img src="../../src/image/usdt.PNG" class="w-[100px] rounded-lg">
              <p>USDT payment</p>
            </span>
          </div>
          <div class="space-y-2">
            <button onclick="document.getElementById('bitcoin').style.display = 'block'" id="btn-btc" class="bg-white w-2/3 md:w-[30%] lg:w-[100%] p-2 transition text-black border border-black hover:bg-black hover:text-white hover:border-[#e67e22]">Show BTC Address</button>
            <button onclick="document.getElementById('cashapp').style.display = 'block' "id="btn-cashapp"  class="bg-white w-2/3 md:w-[30%] lg:w-[100%] p-2 transition text-black border border-black hover:bg-black hover:text-white hover:border-[#e67e22]">Show Cashapp</button>
            <button onclick="document.getElementById('usdt').style.display = 'block'" id="btn-usdt" class="bg-white w-2/3 md:w-[30%] lg:w-[100%] p-2 transition text-black border border-black hover:bg-black hover:text-white hover:border-[#e67e22]">Show USDT Address</button>
          </div>
        </div>
        <!-- step two -->
        <div class="space-y-2 w-[100%] mt-10 lg:mt-0">
          <span class="bg-[#ddd] p-5 relative rounded-full"> 
            <i class="fa-regular fa-hand-pointer " aria-hidden="true"><strong class="absolute text-[10px] bg-[#e67e22] text-[#535c68] p-2 border-2 border-white rounded-md top-1 w-[100%]">step 2</strong></i>
          </span>
          <h6 class="text-[14px] italic pt-[20px] text-slate-500">Transfer</h6>
          <p><i>Fund your account by transfering the amount you want.</i></p>
        </div>
        <!-- step three -->
        <div class="space-y-2 w-[100%] mt-10 lg:mt-0">
          <span class="bg-[#ddd] p-5 relative rounded-full"> 
            <i class="fa-regular fa-hand-pointer " aria-hidden="true"><strong class="absolute text-[10px] bg-[#e67e22] text-[#535c68] p-2 border-2 border-white rounded-md top-1 w-[55px]">step 2</strong></i>
          </span>
          <h6 class="text-[14px] italic capitalize pt-[20px] text-slate-500">input your details</h6>
          <p><i>Fill up the form below and upload confirmation screenshot.</i></p>
        </div>
      </div>
    </div>
  </main>
  <article class="mx-auto w-[90%] pb-[10rem] p-5">
    <!-- fund account form -->
    <form action="deposit.inc.php?a=<?= htmlentities($loggedInId); ?>" method="POST" enctype="multipart/form-data">
      <!-- error reports -->
      <div class="my-4">
        <?php
          echo errorMessage();
          echo successMessage();
        ?>
      </div>
      <div class="grid grid-cols-1 space-y-2 md:grid-cols-2 md:space-y-0 md:w-[100%] lg:space-y-0 lg:grid-cols-3">
        <div class="payment_method_section">
          <label for="payment_method">Payment method<span
          class="text-red-500">*</span></label><br>
          <select name="payment_method" id="payment_method" class="w-[100%] md:w-[95%] bg-white p-2 transition drop-shadow focus:outline-none focus:border focus:border-[#060818]">
            <option disabled selected>Payment method</option>
            <option value="Bitcoin payment">Bitcoin payment</option>
            <option value="Cashapp payment">Cashapp payment</option>
            <option value="Usdt payment">Usdt payment</option>
          </select>
        </div>
        <div>
          <label for="amount">Amount to be paid<span class="text-red-500">*</span></label><br>
          <input type="text" name="amount" id="amount" placeholder="Eg. 1000" class="w-[100%] md:w-[95%] bg-wgite p-2 transiton drop-shadow focus:outline-none focus:border focus:border-[#060818]" autocomplete="off">
        </div>
        <div>
          <label for="deposit_account">Account to fund<span class="text-red-500">*</span></label><br>
          <select name="deposit_account" id="deposit_account" class="w-[100%] md:w-[95%] bg-white p-2 transition drop-shadow focus:outline-none focus:border focus:border-[#060818]">
            <option disabled selected>Select account</option>
            <option value="Checking account"><?= htmlentities('Checking '. $checkingAccount); ?> </option>
            <option value="Savings account"><?= htmlentities('Savings '. $savingsAccount); ?> </option>
          </select>
        </div>
        <div>
          <label for="file_upload">Upload screenshot<span class="text-red-500">*</span></label><br>
          <input type="file" name="deposit_file" id="file_upload" class="w-[100%] md:w-[95%] p-[3px] drop-shadow focus:outline-none border focus:border-[#060818] bg-white" autocomplete="off">
        </div>
      </div>
      <div class="flex justify-center mt-10">
        <button type="submit" id="deposit" class="bg-blue-500 p-2 w-[40%] text-white transition hover:bg-blue-600 rounded-sm" name="submit">Deposit</button>
      </div>
    </form>
  </article>
  <!-- small screen footer -->
  <footer>
    <div class="fixed bottom-0 bg-white w-[100%] p-4 flex justify-around lg:hidden">
      <div class="text-slate-900 text-center">
        <a href="dashboard.php" class="flex flex-col transition-all hover:text-blue-500">
          <span>
            <i class="fa fa-home fa-lg"></i>
          </span>Home
        </a>
      </div>
      <div class="text-slate-900 text-center">
        <a href="deposit.php" class="flex flex-col transition-all hover:text-blue-500 visited:text-blue-500">
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
        <span class="menu-btn-burger">
            <i class="fa fa-bars fa-lg"></i>
          </span>Menu
      </div>
    </div>
  </footer>
  <!-- large screen footer -->
  <footer>
    <div class="relative mt-[50px] text-slate-500 bg-slate-900 h-[fit-content] pb-10 pt-[50px] hidden lg:block">
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
  <script src="../../app.js"></script>
  <script src="../../depositToggler.js"></script>
</body>
</html>