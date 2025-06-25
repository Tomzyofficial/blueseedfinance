<?php
  require_once('dashboard/user/session.inc.php');
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="Author" content="bank, online banking, online transaction" />
  <meta name="description" content="bank, online banking, online transaction" />
  <meta name="keywords" content="bank, online banking, online transaction" />
  <meta name="robots" content="nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="./src/image/logo.jpg">
  <script src="./jquery-3.6.0.js"></script>
   <!-- google translator -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <title>Blueseedfinance | Loan</title>
    <style>
    .skiptranslate {
      display: none
    }
    .goog-te-gadget {
      display: block;
      overflow: hidden;
      height: 30px
    }
    #google_translate_element {
      margin-top: 1rem;
    }
  </style>
</head>
<body class="bg-[#fafaf9]">
  <!-- header -->
  <header>
    <nav
      class="fixed top-0 z-10 font-bold text-slate-500 flex justify-between items-center uppercase ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <div class="logo"><a href="index.php"><img src="./src/image/logo.jpg" class="w-[40px] h-[40px]"></a></div>
      <div class="navigation fixed left-0 top-[-100%] bg-white w-[85%] h-[100dvh] p-5 lg:relative lg:w-[70%] lg:h-[0] lg:top-[-10px]">
        <!-- navigation links -->
        <ul class="nav_links lg:flex lg:justify-between lg:gap-4 list-none">
          <li class="pt-5 lg:pt-0">
            <a href="index.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500 max-w-16"><i class="fa fa-home fa-sm"></i>
              </span> home
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="about.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-phone fa-sm"></i>
              </span>About us
              </span>
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="banking.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-bank fa-sm"></i>
              </span>banking
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="loan.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa-brand fa fa-hand-holding-dollar fa-sm"></i>
              </span>loan
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="contact.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100   p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-phone fa-sm"></i>
              </span>
              contact
            </a>
          </li>
          <!-- logout button -->
          <div class="text-red-500 mt-[4rem] font-bold lg:mt-0">
            <?php
              if(isset($_SESSION['u_id'])){
                echo '<form action="dashboard/user/logout.inc.php" method="POST">
                <button type="submit" name="submit" id="logout"><span><i class="fa fa-right-from-bracket fa-sm"></i></span>Logout</button>
                </form>';
              }
            ?>
          </div>
          <li class="pt-6 lg:pt-0">
            <a href="./accounts.auth/signin.php"
              class="hover:bg-blue-600 transition py-3 px-3 bg-blue-500 text-white font-normal block w-[100%] text-center rounded-md lg:inline lg:rounded-none">sign
              in
            </a>
          </li>
        </ul>
      </div>
        <!-- google translator -->
      <div id="google_translate_element"></div>
      <!-- menubar toggler -->
      <div class="menu-btn-burger lg:hidden">
        <div class="menu-icon"></div>
      </div>
    </nav>
    <!-- header hero section -->
    <div class="hero_section relative h-[70dvh]"
      style="background-image: url('./src/image/9.PNG'); width: 100%; background-repeat: no-repeat; background-size: 100% 100%; ">
      <div class="site_hero flex h-[70dvh] items-center w-[90%] md:w-[45%] lg:w-[40%] mx-5">
        <div class="flex flex-col items-start bg-white rounded-md bg-opacity-60 text-slate-900 p-5">
          <h2 class="font-bold text-[25px]">Loans for your goals</h2>
          <p class="font-normal">Whether you are looking to renovate your home, buy a new car or you need a quick fix in an emergency, there’s a loan for you.</p>
          <div class="mt-4">
            <a href="./accounts.auth/signin.php"
              class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max text-start rounded-md hover:bg-blue-600">Let's
              Connect
              <span><i class="fa fa-arrow-right"></i></span> 
            </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <main>
    <div>
      <div class="mt-20 flex flex-col mx-5  lg:flex-row lg:mx-20">
        <div class="lg:w-[50%]">
          <img src="./src/image/52.PNG">
        </div>
        <div class="lg:w-1/2 lg:pt-10 lg:pl-10">
          <h2 class="underline underline-offset-8 decoration-red-500 font-bold text-[25px] text-slate-900 pb-10">Enough money
            for your dream life</h2>
          <p>With the Blueseedfinance Personal Loan, you can get up to $10 million, to help you live your dreams. You also enjoy a
            flexible repayment period of 48 months at a highly competitive interest rate.</p>
          <a href="#" class="text-red-500 font-bold">Get started <i class="fa fa-chevron-right"></i></a>
        </div>
      </div>
      <div class="flex flex-col mx-5  lg:flex-row lg:mx-20">
        <div class="lg:w-1/2 lg:pt-10 lg:pr-10">
          <h2 class="underline underline-offset-8 decoration-red-500 font-bold text-[25px] text-slate-900 pb-10">Personal Loan-Direct</h2>
          <p>Salary earners who do not have Blueseedfinance account can get up to $10 million at 22% per annum to meet their financial needs. Access to finance to help federal and state civil servants meet their financial needs in times of stiff cash flow.</p>
          <a href="#" class="text-red-500 font-bold">Learn More <i class="fa fa-chevron-right"></i></a>
        </div>
        <div class="lg:w-[50%]">
          <img src="./src/image/53.PNG">
        </div>
      </div>
    </div>
  </main>
  <section>
    <div class="pt-16 mt-[100px] bg-white text-slate-900">
      <h2 class="uppercase text-center text-[16px] font-bold pb-5">lending benefits at a glance</h2>
      <div
        class="space-y-10 p-10 grid grid-cols-1 md:grid-cols-2 md:space-y-0 lg:flex lg:justify-around lg:place-items-center lg:space-y-0 lg:space-x-10">
        <div>
          <img src="./src/image/54.PNG" class="pb-5">
          <h3 class="text-[20px] font-bold">Automatic Payments</h3>
          <p class="font-normal">Easily set up automatic payments from your business checking account.</p>
        </div>
        <div>
          <img src="./src/image/55.PNG" class="pb-5">
          <h3 class="text-[20px] font-bold">Banker Access</h3>
          <p class="font-normal">Get access to dedicated business bankers to support your individual needs.</p>
        </div>
        <div>
          <img src="./src/image/56.PNG" class="pb-5">
          <h3 class="text-[20px] font-bold">Flexible Lending</h3>
          <p class="font-normal">Our flexible terms and structure help you figure out your right payment schedule.</p>
        </div>
      </div>
      <div class="mt-4 flex justify-center pb-5">
        <a href="./accounts.auth/signin.php"
          class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max text-start rounded-md hover:bg-blue-600">Let's
          Connect
          <span><i class="fa fa-arrow-right"></i></span>
        </a>
      </div>
    </div>
  </section>
  <footer>
    <div class="relative mt-[100px] text-slate-500 bg-slate-900 h-[fit-content] pb-10 pt-[50px]">
      <div class="pb-5 flex flex-col gap-4 ps-5 md:flex-row md:justify-around lg:flex-row lg:justify-evenly">
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Connect with us</h2>
          <ul class="list-none">
            <li><a href="javascrip:void(0)" class="text-slate-500 text-2xl rounded-md"><i
                  class="fa-brands fa-square-facebook"></i></a></li>
            <li><a href="javascript:void(0)" class="text-slate-500 text-2xl rounded-md"><i
                  class="fa-brands fa-square-instagram"></i></a></li>
            <li><a href="javascript:void(0)" class="text-slate-500 text-2xl rounded-md"><i
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
            <li><a href="about.php" class="capitalize text-slate-500">about us</a></li>
            <li><a href="banking.php" class="capitalize text-slate-500">banking</a></li>
            <li><a href="contact.php" class="capitalize text-slate-500">contact us</a></li>
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
        <div class="logo"><a href="index.php"><img src="./src/image/logo.jpg" class="mt-5 w-[40px] h-[40px]"></a></div>
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
  <script src="./app.js"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</body>
</html>