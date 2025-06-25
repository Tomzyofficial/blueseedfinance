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
  <title>Blueseedfinance | Contact</title>
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
<body class="bg-white">
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
            <a href="loan.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa-brand fa fa-hand-holding-dollar fa-sm"></i>
              </span>loan
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="contact.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
  </header>
  <!-- body first section -->
  <section>
    <div class="mt-[150px] flex flex-col">
      <div class="text-center mx-[30px] lg:mx-[200px]">
        <h3 class="font-bold text-[40px] lg:text-[55px] text-lime-500">Get in touch with us</h3>
        <P class="py-10">Our goal is to provide our customers with a reliable source of high savings, while minimizing any possible risks
          and offering a high-quality services, allowing us to automate and simplify the relations between the customers and
          the trustees.
        </P>
      </div>
    </div>
  </section>
  <!-- body sec section -->
  <section>
    <div class="mt-[100px] bg-[#f9f9f9] py-[100px] px-[20px] lg:py-[100px] lg:px-[100px]">
      <div class="grid grid-cols-1 bg-white rounded-lg md:grid-cols-2">
        <div class="p-5">
          <!-- error reports -->
          <div class="my-4">
            <?php
              echo errorMessage();
              echo successMessage();
            ?>
          </div>
          <form action="dashboard/user/message.inc.php" method="POST">
            <label class="text-[10px]" for="fullName">FULL NAME*</label>
            <input type="text" name="name" id="fullName" autocomplete="on" class="p-2 caret-lime-300 w-full border-[1px] border-gray-300 rounded-md focus:outline-none focus:border-lime-300">
            <label class="text-[10px]" for="email">EMAIL ADDRESS*</label>
            <input type="text" name="email" id="email" autocomplete="on" class="p-2 caret-lime-300 w-full border-[1px] border-gray-300 rounded-md focus:outline-none focus:border-lime-300">
            <label class="text-[10px]" for="message">MESSAGE*</p>
            <textarea name="message" id="message" autocomplete="on" cols="50" class="p-2 caret-lime-300 w-full border-[1px] border-gray-300 rounded-md focus:outline-none focus:border-lime-300" rows="5"></textarea>
            <button class="block rounded-md text-white w-1/2 py-3 px-3 bg-blue-500 hover:bg-blue-600" name="submit">Send</button>
          </form>
        </div>
        <div class="bg-gradient-to-r from-lime-400 to-lime-600 py-[20px] px-[20px] rounded-lg text-white">
          <h3 class="text-[25px] lg:text-[30px] font-normal">Contact Information</h3>
          <p>Everyone wants to be heard and understood. At Blueseedfinance, our core goal is to easily connect with people and understand their preferences.</p>
          <div class="end_contact_info pt-[100px]">
            <p><i class="fa fa-envelope"></i> contact@blueseedfinance.com</p>
            <p><i class="fa fa-phone"></i> +1 (352) 575 - 9978</p>
            <p><i class="fa fa-map-marker"></i>102 Grand St., LA USA </p>
          </div>
        </div>
      </div>
    </div>
  </section>
  <article>
    <!-- faq -->
    <div class="questions mt-[100px] pb-10">
      <h2 class="flex justify-center text-[25px] lg:text-[30px] text-slate-500 font-bold">FAQ</h2>
      <div class="card shadow h-[fit-content] mx-5 p-4 md:w-[50%] md:mx-auto lg:mx-auto w-[90%] lg:w-[50%]">
        <a href="#banknamef&q/frequently-asked-questions/1" class="first font-bold block w-[100%] h-[100%]">What do I need
          to open an account?
          <span class="float-right"><i class="fa fa-caret-right" id="caret"></i></span>
        </a>
        <span class="first-answer" style="display: none;">
          <p class="ps-4 text-sm">All you need are;
          </p>
          <ul class="list-disc ps-4 text-sm list-none">
            <li>A working phone number, and email address</li>
            <li>A smart device that can connect to the internet</li>
            <li>A valid form of identification</li>
          </ul>
        </span>
      </div>
      <div class="card shadow h-[fit-content] mx-5 p-4 md:w-[50%] md:mx-auto lg:mx-auto w-[90%] lg:w-[50%]">
        <a href="#banknamef&q/frequently-asked-questions/2" class="second font-bold block w-[100%] h-[100%]">How long would it take to get an account number?
          <span class="float-right"><i class="fa fa-caret-right" id="caret"></i></span>
        </a>
        <p class="second-answer ps-4 text-sm" style="display: none;">Your account number is created instantly upon successful registration.</p>
      </div>
      <div class="card shadow h-[fit-content] mx-5 p-4 md:w-[50%] md:mx-auto lg:mx-auto w-[90%] lg:w-[50%]">
        <a href="#banknamef&q/frequently-asked-questions/3" class="third font-bold block w-[100%] h-[100%]">How to register on this platform?
          <span class="float-right"><i class="fa fa-caret-right" id="caret"></i></span>
        </a>
        <p class="third-answer ps-4 text-sm" style="display: none;">Kindly click on the sign in button to get started</p>
      </div>
      <div class="card shadow h-[fit-content] mx-5 p-4 md:w-[50%] md:mx-auto lg:mx-auto w-[90%] lg:w-[50%]">
        <a href="#banknamef&q/frequently-asked-questions/5" class="fourth font-bold block w-[100%] h-[100%]">What can I do if my account is banned?
          <span class="float-right"><i class="fa fa-caret-right" id="caret"></i></span>
        </a>
        <p class="fourth-answer ps-4 text-sm" style="display: none;">Contact our support team and they will help you with any issues</p>
      </div>
    </div>
  </article>
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
  <script src="./app.js"></script>
    <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</body>
</html>