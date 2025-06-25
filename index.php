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
  <title>Blueseedfinance | Home</title>
  <style>
    .skiptranslate {
      display: none
    }
    .goog-te-gadget {
      display: block;
      overflow: hidden;
      height: 30px;
    }
    #google_translate_element {
      margin-top: 1rem;
    }
  </style>
</head>
<body class="bg-[#fafaf9]">
  <!-- header -->
  <header>
    <nav class="fixed top-0 z-10 font-bold text-slate-500 flex justify-between items-center uppercase ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <div class="logo"><a href="index.php"><img src="./src/image/logo.jpg" class="w-[40px] h-[40px]"></a></div>
      <div class="navigation fixed left-0 top-[-100%] bg-white w-[85%] h-[100dvh] p-5 lg:relative lg:bg-inherit lg:w-[70%] lg:h-[0] lg:top-[-10px]">
        <!-- navigation links -->
        <ul class="nav_links lg:flex lg:justify-between lg:gap-4 list-none">
          <li class="pt-5 lg:pt-0">
            <a href="index.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 visited:text-blue-500 transition duration-150 delay-150">
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
            <a href="contact.php" class="flex w-[100%] h-[100%] items-center hover:text-blue-500 transition duration-150 delay-150">
              <span class="lg:hidden bg-slate-100   p-2 mr-4 rounded-full flex justify-center items-center w-[40px] h-[40px] text-blue-500"><i
              class="fa fa-phone fa-sm"></i>
              </span>
              contact
            </a>
          </li>
          <li class="pt-5 lg:pt-0">
            <a href="./accounts.auth/signin.php" class="hover:bg-blue-600 transition py-3 px-3 bg-blue-500 text-white font-normal block w-[100%] text-center rounded-md lg:inline lg:rounded-none">sign in
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
    <div class="hero_section relative h-[70dvh] lg:h-[100dvh]" style="background-image: url('./src/image/42.jpg'); width: 100%; background-repeat: no-repeat; background-size: 100% 100%; ">
      <div class="site_hero flex h-[70dvh] lg:h-[100dvh] items-center w-2/3 mx-auto text-white">
        <div class="flex flex-col items-start">
          <h2 class="font-bold text-[25px] lg:font-extrabold lg:text-[50px]">Business account</h2>
          <p class="font-normal lg:font-bold">We understand the complexity of global market. Our Products and Services have being
            designed to ease your banking needs.</p>
          <div class="mt-4">
            <a href="./accounts.auth/signin.php" class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max text-start rounded-md duration-300 delay-150 ease-in-out hover:bg-blue-600 hover:-translate-y-1 hover:scale-110">Open an Account
              <span><i class="fa fa-arrow-right"></i></span> </a>
          </div>
        </div>
      </div>
    </div>
  </header>  
  <!-- main -->
  <main>
    <div class="ps-10 pe-10 mx-auto mt-[100px]">
      <div class="main_wrapper space-y-10  grid grid-cols-1 md:grid-cols-1 lg:grid-cols-2">
        <div class="guides space-y-16 w-[90%]" data-aos="slide-up">
          <h3 class="text-slate-700 font-bold text-[25px] lg:text-[30px]">A business bank that works for you</h3>
          <div>
            <p class="font-bold text-slate-500"><i class="fa fa-briefcase"></i> Open an account for free </p>
          </div>
          <div>
            <p class="font-bold text-slate-500"><i class="fa fa-check-to-slot"></i> Get verified within a few minutes</p>
          </div>
          <div>
            <p class="font-bold text-slate-500"><i class="fa fa-hand-holding-dollar"></i> No hidden fees</p>
          </div>
          <div>
            <p class="font-bold text-slate-500"><i class="fa fa-check"></i> Complete control over your account</p>
          </div>
          <div>
            <a href="./accounts.auth/signin.php" class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max text-start rounded-md duration-300 delay-150 ease-in-out hover:bg-blue-600 hover:-translate-y-1 hover:scale-110">Get your Account
            <span><i class="fa fa-arrow-right"></i></span> </a>
          </div>
        </div>
        <div class="bg-gradient-to-r from-cyan-300 to-emerald-300 h-[100%] w-[100%] rounded-md" data-aos="zoom-in">
          <img decoding="async" src="https://library.uicore.co/wp-content/uploads/2022/06/Mobile-App-Hero-Image.webp"
            class="w-[100%] h-[100%]" loading="lazy">
        </div>
      </div>
    </div>
  </main>
  <!-- section about us-->
  <section>
    <div class="relative mt-[10rem] h-[fit-content] end_wrapper" style="background-image: url(./src/image/7.PNG); width: 100%; background-repeat: no-repeat; background-size: cover;">
      <div class="text-neutral-800 lg:w-2/3 ps-5 pe-5 py-10" data-aos="fade-up">
        <h3 class="font-bold text-[25px] lg:text[-40px]">Why choose us?</h3>
        <h2 class="font-bold text-[30px] text-lime-500 lg:text-[45px]">we don't just help you reach financial milestones, we build lasting relationships</h2>
        <p class="font-normal">As digital pioneers, we integrate innovative technological advancements, and
        prioritise safety and security with cutting-edge infrastructure. Our global presence over numerous expertise, attracts an expanding customer base as we provide superior and sustainable
        financial services.</p>
        <div class="flex mt-5 space-x-4 pb-4">
          <a href="about.php" class="py-2 px-2 uppercase border-2 border-white focus:ring-2 text-white font-bold block max-w-max rounded-md ">find out why</a>
        </div>
      </div>
    </div>
  </section>
  <article>
    <div class="mt-[100px]" data-aos="slide-up">
      <h3 class="ps-5 pe-5 flex justify-center mb-4 font-bold text-slate-700 text-[25px] lg:text-[30px]">Open a business account in 4 steps</h3>
      <!-- steps toggler -->
      <div class="grid grid-cols-2 lg:flex lg:justify-center gap-4 mx-10">
        <button type="buttton" id="fill_details">1. Fill in your details</button>
        <button type="button" id="get_verified">2. Get verified</button>
        <button type="button" id="fund_account">3. Fund your account</button>
        <button type="button" id="done">4. You are done</button>
      </div>
      <!-- steps displayer -->
      <div class="bg-white p-5 mx-10 drop-shadow-md mt-10 max-h-screen lg:mx-[150px]">
        <div class="flex flex-col lg:flex-row">
          <!-- first step -->
          <div class="first_step flex flex-col lg:flex-row lg:justify-between" id="first_step">
            <img src="./src/image/43.PNG" class="w-2/3 h-[40dvh]">
            <p class="pt-5 lg:w-1/2">We strive to know our customers so we can serve you better, kindly fill in your details. Blueseedfinance Account is recommended if you have a specific goal in mind or you just want to start setting money
            aside.</p>
          </div>
          <!-- sec step -->
          <div class="sec_step flex flex-col hidden lg:flex-row lg:justify-between" id="sec_step">
            <img src="./src/image/44.PNG" class="w-2/3 h-[40dvh]">
            <p class="pt-5 lg:w-1/2">Select your username & password. Provide your KYC details & get verified. At Blueseedfinance, we are aware of issues like security, protection from fraud and personal privacy, we make sure to
            take extra steps by verifying customer identities.</p>
          </div>
          <!-- third step -->
          <div class="third_step flex flex-col hidden lg:flex-row lg:justify-between" id="third_step">
            <img src="./src/image/24.PNG" class="w-2/3 h-[40dvh]">
            <p class="pt-5 lg:w-1/2">Top up to start making transfers. Blueseedfinance is designed to facilitate financial inclusion, permitting individuals with minimal amount of income to
            enjoy all benefits we offer. Enjoy a value adding banking relationship with us.</p>
          </div>
          <!-- fourth step -->
          <div class="fourth_step flex flex-col hidden lg:flex-row lg:justify-between" id="fourth_step">
            <img src="./src/image/25.PNG" class="w-2/3 h-[40dvh]">
            <p class="pt-5 lg:w-1/2">Login to your dashboard, and take control of your account</p>
          </div>
        </div>
      </div>
      <div class="mt-10 flex justify-center">
        <a href="./accounts.auth/signin.php" class="py-3 px-3 bg-blue-500 text-white font-bold block max-w-max rounded-md transition duration-300 delay-150 ease-in-out hover:bg-blue-600 hover:-translate-y-1 hover:scale-110">Get Started Now
          <span><i class="fa fa-arrow-right"></i></span> </a>
      </div>
    </div>
  </article>
  <article>
    <div class="mt-[100px] bg-gray-200 p-10">
      <div data-aos="zoom-in" class="py-10">
        <h2 class="flex justify-center pb-10 font-bold text-[25px] lg:text-[30px] text-lime-500 text-center mx-5 lg:mx-24">Join 10,000+ successful business owners who trust Blueseedfinance for all their financial needs</h2>
        <ul class="grid grid-cols-3 gap-4 mx-10 lg:mx-24 list-none">
          <li><img src="./src/image/46.PNG" class="w-5/6 lg:w-1/2"></li>
          <li><img src="./src/image/47.PNG" class="w-5/6 lg:w-1/2"></li>
          <li><img src="./src/image/48.PNG" class="w-5/6 lg:w-1/2"></li>
          <li><img src="./src/image/49.PNG" class="mt-5 w-5/6 lg:w-1/2"></li>
          <li><img src="./src/image/50.PNG" class="mt-5 w-5/6 lg:w-1/2"></li>
          <li><img src="./src/image/51.PNG" class="mt-5 w-5/6 lg:w-1/2"></li>
        </ul>
      </div>
    </div>
    <!-- faq -->
    <div class="questions mt-[50px] pb-10" data-aos="slide-up">
      <h2 class="flex justify-center text-[25px] lg:text-[30px] text-slate-500 font-bold">FAQ</h2>
      <div class="card shadow h-[fit-content] mx-5 p-4 md:w-[50%] md:mx-auto lg:mx-auto w-[90%] lg:w-[50%]">
        <a href="#banknamef&q/frequently-asked-questions/1" class="first font-bold block w-[100%] h-[100%]">What do I need to open an account?
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
    <div class="mt-[100px] text-slate-500 bg-slate-900 h-[fit-content] pb-10 pt-[50px]">
      <div class="pb-5 flex flex-col gap-4 ps-5 md:flex-row md:justify-around lg:flex-row lg:justify-evenly">
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Connect with us</h2>
          <ul class="list-none">
            <li><a href="javascrip:void(0)" class="text-2xl rounded-md"><i class="fa-brands fa-square-facebook"></i></a></li>
            <li><a href="javascript:void(0)" class="text-2xl rounded-md"><i class="fa-brands fa-square-instagram"></i></a></li>
            <li><a href="javascript:void(0)" class="text-2xl rounded-md"><i class="fa-brands fa-square-twitter"></i></a></li>
          </ul>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Head Office</h2>
          <p>102 Grand St., LA USA</p>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Company</h2>
          <ul class="list-none">
            <li><a href="about.php" class="capitalize">about us</a></li>
            <li><a href="banking.php" class="capitalize">banking</a></li>
            <li><a href="contact.php" class="capitalize">contact us</a></li>
          </ul>
        </div>
        <div>
          <h2 class="font-bold text-[20px] lg:text-[25px] pb-5">Our Products</h2>
          <ul class="list-none">
            <li><a href="#" class="capitalize">business account</a></li>
            <li><a href="#" class="
              capitalize">working capital loans</a></li>
          </ul>
        </div>
      </div>
      <div class="mx-5 border-t-[1px] border-slate-500 flex flex-col space-y-4 lg:mx-[100px] lg:flex-row lg:space-x-16">
        <div class="logo"><a href="index.php"><img src="./src/image/logo.jpg" class="mt-5 w-[40px] h-[40px]"></a></div>
        <p class="text-slate-500 text-md md:w-2/3">Flexible and secure checking accounts are the cornerstone of our community banking philosophy. With numerous account
        options and plenty of local banking experts, be rest assured your money will be well looked after. Get started today and never look back.</p>
        <div class="text-xs">
          &copy;
          <?php
            echo  'Blueseedfinance ' . date('Y') . ' | All right reserved';
          ?>
        </div>
      </div>
    </div>
  </footer>
  <!-- animation on scroll pluggins -->
  <script>
    AOS.init({
      duration: 1200
    })
  </script>
  <!-- site app javascript -->
  <script src="./app.js"></script>
  <script src="./stepsToggler.js"></script>
  <script type="text/javascript">
    function googleTranslateElementInit() {
      new google.translate.TranslateElement({pageLanguage: 'en'}, 'google_translate_element');
    }
  </script>
</body>
</html>