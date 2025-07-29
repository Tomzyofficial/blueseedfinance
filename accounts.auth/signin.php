<?php
  require_once('../dashboard/user/session.inc.php');
?>
<!DOCTYPE html>
<html lang="en" xml:lang="en" xmlns="http://www.w3.org/1999/xhtml">
<head>
  <!-- meta tags -->
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta http-equiv="Content-Language" content="en" />
  <meta name="robots" content="noindex, nofollow" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="../dist/output.css">
  <!-- fontawesome -->
  <script src="https://kit.fontawesome.com/c91674d225.js" crossorigin="anonymous"></script>
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../src/image/logo.jpg">
  <script src="../jquery-3.6.0.js"></script>
  <title>Secured sign in | Blueseedfinance</title>
</head>
<body class="bg-[#f9f9f9]">
  <!-- header -->
  <header>
    <nav
      class="fixed top-0 z-10 font-bold text-slate-500 flex justify-between items-center uppercase ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <div class="logo">
        <a href="../index.php"><img src="../src/image/logo.jpg" class="w-[40px] h-[40px]"></a>
      </div>
    </nav>
  </header>
  <!-- main -->
  <main>
    <div class="bg-white mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:mx-auto md:w-[50%] lg:w-[30%] ">
      <div class="flex flex-col text-center py-10">
        <span class="mx-auto">
          <img src="../src/image/57.PNG">
        </span>
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">sign in</h3>
      </div>
      <!-- input field -->
      <form action="signin.inc.php" method="POST">
        <div class="mx-5 my-4">
          <!-- message report -->
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div class="mx-5 space-y-4">
          <!-- username input field -->
          <div class="relative">
            <label for="username">Username</label>
              <span class="absolute top-1/2 left-3 text-gray-300"><i class="fa-solid fa-user"></i></span>
              <input type="text" name="username" autocomplete="on" id="username" class="caret-blue-300 pl-8 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
            </span>
          </div>
          <!-- password input field -->
          <div class="relative">
            <label for="pwd">Password</label>
            <span class="absolute top-1/2 left-3 text-gray-300">
              <i class="fa-solid fa-lock"></i>
            </span>
              <input type="password" id="pwd" autocomplete="off" name="password" class="caret-blue-300 pl-8 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
            </span>
          </div>
          <!-- remember me, forgotten password -->
          <div>
            <div class="space-y-4">
              <span>
                <label for="checkbox">
                  <input type="checkbox" id="checkbox" name="remember">Remember Me</label>
              </span>
              <button name="submit" type="submit" class="w-[100%] p-2 bg-blue-500 text-white font-bold text-lg">Sign In</button>
            </div>
            <!-- forgotten password link -->
            <div class="flex flex-col mt-5 text-sm">
              <a href="#" class="text-blue-700">Forgotten Password?</a>
              <span>Don't have account? <a href="./signup.php" class="underline decoration-blue-700 underline-offset-2 text-blue-700 font-bold">Signup</a></span>
            </div>
          </div>
        </div>
      </form>
    </div>
  </main>
</body>
</html>