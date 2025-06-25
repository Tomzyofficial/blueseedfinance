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
  <script src="jquery-3.6.0.js"></script>
  <title>Blueseedfinance Admin</title>
</head>
<body class="bg-[#f9f9f9]">
  <!-- header -->
  <header>
    <nav
      class="fixed top-0 z-10 font-bold text-slate-500 flex justify-between items-center uppercase ps-10 pe-10 bg-white h-[10vh] w-[100%]">
      <!-- logo -->
      <div class="logo">
        <a href="admin-signup.php"><img src="src/image/logo.jpg" class="w-[40px] h-[40px]"></a>
      </div>
    </nav>
  </header>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Signup as admin</h3>
      </div>
      <!-- input field -->
      <form action="admin-signup.inc.php" method="POST">
        <!-- message report -->
        <div class="mx-5 my-4">
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div class="mx-5 space-y-4 grid grid-cols-1 md:space-y-0">
          <!-- username input field -->
          <div>
            <label for="username">Username
            </label>
            <input type="text" id="username" autocomplete="on" name="userName" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- password -->
          <div>
            <label for="pwd">Password
            </label>
            <input type="password" autocomplete="off" name="pwd" id="pwd" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- confirm password -->
          <div>
            <label for="confirm_pwd">Confirm Password
            </label>
            <input type="password" autocomplete="off" name="confirm_pwd" id="confirm_pwd" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
        </div>
        <div class="flex mx-5 mt-5 lg:mx-auto lg:w-1/2">
          <button type="submit" name="submit" class="w-[100%] p-2 bg-blue-500 text-white font-bold text-lg hover:bg-blue-600 rounded-md">Sign Up</button>
        </div>
      </form>
      <div class="flex flex-col text-center py-5">
        <p>Already an admin? <a href="index.php" class="underline underline-offset-2 decoration-blue-700 font-bold text-blue-700">Sign in</a></p>
      </div>
    </div>
  </main>
</body>
</html>