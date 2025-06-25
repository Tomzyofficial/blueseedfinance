<?php
  require_once('session.inc.php');
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
  <link rel="stylesheet" href="dist/output.css">
  <!-- fontawesome -->
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/fontawesome.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/brands.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/solid.css">
  <link rel="stylesheet" href="fontawesome-6.4.0-web/css/regular.css">
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="src/image/logo.jpg">
  <title>Blueseedfinance Admin</title>
</head>
<body class="bg-[#f9f9f9]">
  <!-- header -->
  <header>
    <nav
      class="fixed top-0 z-10 font-bold text-slate-500 flex justify-between items-center uppercase ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <!-- logo -->
      <div class="logo">
        <a href="admin-signin.php"><img src="src/image/logo.jpg" class="w-[40px] h-[40px]"></a>
      </div>
    </nav>
  </header>
  <!-- main -->
  <main>
    <div class="bg-white mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:mx-auto md:w-[50%] lg:w-[30%] ">
      <div class="flex flex-col text-center py-10">
        <span class="mx-auto">
          <img src="src/image/57.PNG">
        </span>
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">sign in as admin</h3>
      </div>
      <!-- input field -->
      <form action="admin-signin.inc.php" method="POST">
        <!-- message report -->
        <div class="mx-5 my-4">
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div class="mx-5 space-y-4">
          <!-- username input field -->
          <div class="relative">
            <label for="userName">Username</label>
              <span class="absolute top-1/2 left-3 text-gray-300"><i class="fa-solid fa-user"></i></span>
              <input type="text" autocomplete="on" name="userName" id="userName" class="caret-blue-300 pl-8 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
            </span>
          </div>
          <!-- password input field -->
          <div class="relative">
            <label for="pwd">Password</label>
            <span class="absolute top-1/2 left-3 text-gray-300">
              <i class="fa-solid fa-lock"></i>
            </span>
              <input type="password" autocomplete="off" name="pwd" id="pwd" class="caret-blue-300 pl-8 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
            </span>
          </div>
          <!-- signin button-->
          <div>
            <div class="space-y-4">
              <button name="submit" type="submit" class="w-[100%] p-2 bg-blue-500 text-white font-bold text-lg">Sign In</button>
            </div>
          </div>
        </div>
      </form>
      <div class="flex flex-col text-center py-5">
        <p>Not an admin yet? <a href="admin-signup.php" class="underline underline-offset-2 decoration-blue-700 font-bold text-blue-700">Sign up</a></p>
      </div>
    </div>
  </main>
</body>
</html>