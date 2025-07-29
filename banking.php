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
  <meta name="description" content="investments, investment sites, investment companies" />
  <meta name="keywords" content="bank, online banking, online transaction" />
  <meta name="robots" content="nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="./dist/output.css">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="./src/image/logo.jpg">
  <script src="./jquery-3.6.0.js"></script>
  <script src="https://code.jquery.com/jquery-1.12.4.min.js"></script>
  <!-- google translator -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <title>Blueseedfinance | Banking</title>
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
            <a href="banking.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-bank fa-sm"></i>
              </span>banking
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="loan.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
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
      style="background-image: url('./src/image/8.PNG'); width: 100%; background-repeat: no-repeat; background-size: 100% 100%; ">
      <div class="site_hero flex h-[70dvh] items-center w-[90%] md:w-[45%] lg:w-[40%] mx-5">
        <div class="flex flex-col items-start bg-white rounded-md bg-opacity-60 text-slate-900 p-5">
          <h2 class="font-bold text-[25px]">Simple solutions to power your business</h2>
          <p class="font-normal">Work with a business banking partner for financial advice, resources and services based on the needs of your business.</p>
          <div class="mt-4">
            <a href="./accounts.auth/signin.php"
              class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max text-start rounded-md hover:bg-blue-600">Let's Connect
              <span><i class="fa fa-arrow-right"></i></span> </a>
          </div>
        </div>
      </div>
    </div>
  </header>
  <section>
    <div class="relative -translate-y-6 bg-white p-5 mx-5 md:mx-20 lg:mx-20">
      <div class="flex flex-col justify-center lg:flex-row lg:space-x-24">
        <div class="w-[90%] pb-5 text-slate-500 font-bold text-[20px] md:text-[25px]">
          <h2>Banking made easier by caring for your needs</h2>
        </div>
        <div class="text-slate-900">
          <p>At Blueseedfinance, we are constantly thinking about you! We create accounts tailored to your individual needs as a valued customer
          and are constantly developing new products and services to help make banking and life easier for you.</p>
        </div>
      </div>
      <div class="pt-[30px] grid grid-cols-1 space-y-4 place-items-center md:grid-cols-2 lg:grid-cols-3 lg:space-y-0">
        <div class="gallery bg-white drop-shadow-md w-full lg:w-[100%] lg:-translate-y-4 group">
          <span class=" group-hover:opacity-60 transition-opacity">
            <img src="./src/image/1.PNG" class="w-[100%] h-[40dvh]">
          </span>
          <div class="desc p-5 flex flex-wrap">We create accounts tailored to your individual needs as a valued customer and are constantly developing new products and services.
          </div>
        </div>
        <div class="gallery bg-white drop-shadow-md w-full lg:w-[100%] group">
          <span class="group-hover:opacity-60 transition-opacity">
            <img src="./src/image/2.PNG" class="w-[100%] h-[40dvh]">
          </span>
          <div class="desc p-5">
            We understand the complexities of global market. Our products and services have been designed to ease your needs.
          </div>
        </div>
        <div class="gallery bg-white drop-shadow-md w-full lg:w-[100%] lg:-translate-y-4 group">
          <span class="group-hover:opacity-60 transition-opacity">
            <img src="./src/image/58.PNG" class="w-[100%] h-[40dvh]">
          </span>
          <div class="desc p-5">Embrace the warmth and adventure of the summer with our amazing offerings. Get an account, and get your journey started.
          </div>
        </div>
      </div>
      <!-- service rating and transaction count -->
      <div class="mt-20 grid grid-cols-2 space-y-4 text-center lg:space-y-0 lg:grid-cols-4">
        <div class="counter-box">
          <div class="counter-icon text-[30px] text-yellow-500 rotate-30 ">
            <i class="fa fa-briefcase"></i>
          </div>
          <p class="font-bold text-[30px] text-lime-500"><span class="counter">50</span>M</p>
          <p class="text-slate-500 font-normal ">Monthly TRANSACTIONS</p>
        </div>
        <div class="counter-box">
          <div class="counter-icon text-[30px] text-yellow-500 rotate-30">
            <i class="fa-regular fa-handshake"></i>
          </div>
          <p class="font-bold text-[30px] text-lime-500"><span class="counter">100</span>%</p>
          <p class="text-slate-500 font-normal">SUPPORT</p>
        </div>
        <div class="counter-box">
          <div class="counter-icon text-[30px] text-yellow-500 rotate-30">
            <i class="fa-regular fa-smile"></i>
          </div>
          <p class="font-bold text-[30px] text-lime-500"><span class="counter">99</span>%</p>
          <p class="text-slate-500 font-normal">Customer Retention</p>
        </div>
        <div class="counter-box">
          <div class="counter-icon text-[30px] text-yellow-500 rotate-30">
            <i class="fa fa-globe"></i>
          </div>
          <p class="font-bold text-[30px] text-lime-500"><span class="counter">98</span>%</p>
          <p class="text-slate-500 font-normal">Positive Feedback</p>
        </div>
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
        <p class="text-slate-500 text-md md:w-2/3">Flexible and secure checking accounts are the cornerstone of our community banking philosophy. With numerous account options and plenty of local banking experts, be rest assured your money will be well looked after. Get started today and never look back.</p>
        <div class="text-xs">
          &copy;
          <?php
            echo  'Blueseedfinance ' . date('Y') . ' | All right reserved';
          ?>
        </div>
      </div>
    </div>
  </footer>
  <!-- counter pluggins -->
  <script src="./counter/jquery.counterup.min.js"></script>
  <script src="http://cdnjs.cloudflare.com/ajax/libs/waypoints/2.0.3/waypoints.min.js"></script>
  <script src="./counter/counter.js"></script>
  <!-- site app javascript -->
  <script src="./app.js"></script>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</body>
</html>