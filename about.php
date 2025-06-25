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
  <!-- Animation on scroll -->
  <script src="./jquery-3.6.0.js"></script>
  <link rel="stylesheet" href="./aos-master/dist/aos.css">
  <script src="./aos-master/dist/aos.js"></script>
  <!-- google translator -->
  <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit"></script>
  <title>Blueseedfinance | About</title>
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
      <div
        class="navigation fixed left-0 top-[-100%] bg-white w-[85%] h-[100dvh] p-5 lg:relative lg:w-[70%] lg:h-[0] lg:top-[-10px]">
        <!-- navigation links -->
        <ul class="nav_links lg:flex lg:justify-between lg:gap-4 list-none">
          <li class="pt-5 lg:pt-0">
            <a href="index.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100 p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500 max-w-16"><i class="fa fa-home fa-sm"></i>
              </span> home
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="about.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
            <a href="contact.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100   p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-phone fa-sm"></i>
              </span>
              contact
            </a>
          </li>
          <li class="pt-6 lg:pt-0">
            <a href="./accounts.auth/signin.php"
              class="hover:bg-blue-600 transition py-3 px-3 bg-blue-500 text-white font-normal block w-[100%] text-center rounded-md lg:inline lg:rounded-none">sign
              in
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
    <div class="mt-[150px]">
      <div class="flex flex-col mx-[25px] items-center md:mx-[100px] lg:space-x-8 lg:flex-row lg:mx-[90px]">
        <div class="w-[90%] lg:w-[80%]">
          <h2 class="text-lime-500 text-center font-bold text-[25px] pb-10 lg:text-[35px]">Get to know us more deeply to help your needs</h2>
          <p>Blueseedfinance is a global banking platform With over 10+ years of experience, meeting the highest expectations of
            our elite clients, our excellent customer care is readily available to assist you. Our Institution provides
            unprecedented level of services, and outstanding benefits for all our esteemed customers.</p>
            <p>We are the partner of choice for over 10,000 businesses of all sizes, individual needs, and powering the dreams by providing them with equal access to the tools they need to grow and scale. Blueseedfinance was founded with the vision to create a society where everyone experiences financial happiness. </p>
        </div>
        <div class="w-[100%] flex justify-center pt-5" data-aos="zoom-in">
          <img src="./src/image/6.PNG" class="rounded-lg h-full w-[80%] md:w-[60%] lg:w-[80%]">
        </div>
      </div>
    </div>
  </header>
  <section>
    <!-- start banner vectorimg -->
    <div class="mt-[50px] mx-auto bg-white drop-shadow-md p-10 w-[90%] md:w-[70%] lg:w-2/3" id="banner-vectorImg" data-aos="slide-up">
      <div class="">
        <div class="flex justify-center gap-6 p-2 text-lime-500 font-bold text-[20px] pb-5 lg:text-[25px]" >
          <h2>Simple</h2>
          <h2>Secure</h2>
          <h2>Seamless</h2>
        </div>
        <p class="good-experience text-center text-slate-500">Blueseedfinance is here to serve you better, feel free and have a nice experience trading
          with us!</p>
      </div>
      <div class="flex flex-col pt-5 space-y-4 lg:flex-row lg:justify-around">
        <div data-aos="fade-down" class="w-[100%]">
          <img class="hover:skew-x-3 hover:scale-110 transition rounded-full mx-auto w-[50%] h-[50%] md:w-[30%] lg:w-[80%] lg:h-[80%]" src="./src/image/cyberSecurity.png">
          <p class="trusted text-blue-500 text-center">__Trusted and Secure</p>
        </div>
        <div data-aos="fade-up" class="w-[100%]">
          <img class="hover:skew-x-3 hover:scale-110 transition rounded-full mx-auto w-[50%] h-[50%] md:w-[30%] lg:w-[80%] lg:h-[80%]" src="./src/image/payment.png">
          <p class="fast text-blue-500 text-center">__Fast Transaction</p>
        </div>
        <div data-aos="fade-down" class="w-[100%]">
          <img class="hover:skew-x-3 hover:scale-110 transition rounded-full mx-auto w-[50%] h-[50%] md:w-[30%] lg:w-[80%] lg:h-[80%]" src="./src/image/beginnerFriend.png">
          <p class="beginner text-blue-500 text-center">__Beginner Friendly</p>
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
  <!-- site app javascript -->
  <script src="./app.js"></script>
  <!-- animation on scroll pluggins -->
  <script>
    AOS.init({
      duration: 1200
    })
  </script>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</body>
</html>