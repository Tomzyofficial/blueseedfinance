<?php
  require_once('session.inc.php');
  // if no user is loggedin, redirect to signin page
  $loggedInId = $_SESSION['u_id'];
  if (!isset($loggedInId)) {
    $_SESSION["succMessage"] = "Login to continue";
    header("Location: ../../accounts.auth/signin.php");
    exit();
    // if user does not have kyc pass session, redirect to the kyc-verification page
  } 

  $checkKyc = "SELECT * FROM kyc WHERE kyc_id = '$loggedInId'";
  $queryKyc = $conn->query($checkKyc);
  $resultRowKyc = $queryKyc->num_rows;
  if ($resultRowKyc < 1) {
    // if user does not have kyc pass session, redirect to the kyc-verification page
    $_SESSION['errMessage'] = 'You need to complete the kyc form';
    header('Location: kyc-verification.php');
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
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>  
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../../src/image/logo.jpg">
  <script src="../../jquery-3.6.0.js"></script>
  <title>Blueseedfinance | Request-loan</title>
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
            <a href="request-loan.php" class="flex w-[100%] items-center h-[100%] hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
      <!-- profile image -->
      <div class="profile">
        <a href="profile.php">
          <img alt="Profile image" id="userImage" class="w-[40px] h-[40px] object-cover rounded-full cursor-pointer" src="">
        </a>
        <script>
          const getImage = localStorage.getItem('userImage');
          const userImage = document.getElementById('userImage');
          if (getImage) {
            userImage.src = getImage;
          } else {
            userImage.src = "../../src/image/57.PNG"
          }
        </script>
      </div>
    </nav>
  </header>
  <main class="mt-[150px]">
    <form action="request-loan.inc.php?id=<?= htmlentities($loggedInId); ?>" method="POST">
      <div class="space-y-4 mx-auto bg-white p-4 w-[90%] pb-[100px] md:w-[80%] lg:w-[60%] text-slate-500">
        <!-- error reports -->
        <div class="my-4">
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div>
          <label for="typeOfLoan">Type of loan<span class="text-red-500">*</span></label><br>
          <select name="typeOfLoan" autocomplete="off" id="typeOfLoan" class="pl-3 w-[100%] p-2 caret-white bg-[#0e1726] transition rounded-sm focus:outline-none focus:ring focus:ring-[#1b2e4b] md:w-[100%]">
            <option disabled selected>Choose one</option>
            <option value="Short term">Short term</option>
            <option value="Long term">Long term</option>
          </select>
        </div>
        <div>
          <label for="duration">Duration<span class="text-red-500">*</span></label><br>
          <select name="duration" autocomplete="off" id="duration" class="pl-3 w-[100%] p-2 caret-white bg-[#0e1726] transition rounded-sm focus:outline-none focus:ring focus:ring-[#1b2e4b] md:w-[100%]">
            <option selected disabled>Choose one</option>
            <option value="Two months">2 Months</option>
            <option value="Four months">4 Months</option>
            <option value="Six months">6 Months</option>
          </select>
        </div>
        <div>
          <label for="amount">Amount<span class="text-red-500">*</span></label>
          <input type="number" name="amount" autocomplete="off" placeholder="1000" class="pl-3 w-[100%] p-2 caret-white bg-[#0e1726] transition rounded-sm focus:outline-none focus:ring focus:ring-[#1b2e4b] md:w-[100%]">
        </div>
        <div>
          <label for="purpose">Purpose<span class="text-red-500">*</span></label><br>
          <textarea name="purpose" autocomplete="on" id="purpose" placeholder="Purpose for loan"  class="pl-3 w-[100%] p-2 caret-white bg-[#0e1726] transition rounded-sm focus:outline-none focus:ring focus:ring-[#1b2e4b] md:w-[100%]" style="resize: none;"></textarea>
        </div> 
        <div>
          <button type="submit" name="submit" class="font-bold bg-[#1b2e4b] border-[1px] border-[#0e1726] block w-full h-[100%] p-2 md:w-[100%] active:animation rounded-sm" id="process">Submit</button>
        </div>
      </div>
    </form>
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
  <script src="../../app.js"></script>
  <script src="../../processing.js"></script>
</body>
</html>