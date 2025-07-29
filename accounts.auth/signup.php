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
 
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../src/image/logo.jpg">
  <script src="../jquery-3.6.0.js"></script>
  <title>Secured sign up | Blueseedfinance</title>
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
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Please provide your valid information</h3>
      </div>
      <!-- input field -->
      <form action="signup.inc.php" method="POST">
        <div class="mx-5 my-4">
          <!-- message report -->
          <?php
            echo errorMessage();
            echo successMessage();
          ?>
        </div>
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- firstname input field -->
          <div class="relative md:mr-2">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" autocomplete="on" name="first_name" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- middle name input field -->
          <div class="relative md:ml-2">
            <label for="middle_name">Middle Name (Optional)</label>
            <input type="text" id="middle_name" autocomplete="on" name="middle_name" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- lastname input field -->
          <div class="relative md:mr-2">
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" autocomplete="on" name="last_name" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- username input field -->
          <div class="relative md:ml-2">
            <label for="username">Username</label>
            <input type="text" id="username" autocomplete="on" name="username" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- email input field -->
          <div class="relative md:mr-2">
            <label for="email">Email</label>
            <input type="text" id="email" autocomplete="on" name="email" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- SSN -->
          <div class="relative md:ml-2">
            <label for="ssn">Social Security Number</label>
            <input type="text" id="ssn" autocomplete="on" name="ssn" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- DOB -->
          <div class="relative md:mr-2">
            <label for="dob">Date of Birth</label><br>
            <input type="date" id="dob" autocomplete="off" name="dob" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- phone input field -->
          <div class="relative  md:ml-2">
            <label for="phone">Phone</label>
            <!-- <span class="absolute top-[36%] left-0 bg-gray-200 p-2 text-slate-900">+1</span> -->
            <input type="tel" name="phone" autocomplete="on" id="phone" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- password -->
          <div class="relative md:mr-2">
            <label for="password">Password</label>
            <input type="password" name="password" autocomplete="off" id="password" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
          <!-- confirm password -->
          <div class="relative md:ml-2">
            <label for="confirm_password">Confirm Password</label>
            <input type="password" name="confirm_password" autocomplete="off" id="confirm_password" class="caret-blue-300 w-[100%] rounded-sm border-[1px] border-gray-300 focus:outline-none focus:border-lime-300 p-2">
          </div>
        </div>
        <div class="flex mx-5 mt-5 lg:mx-auto lg:w-1/2">
          <button type="submit" name="submit" class="w-[100%] p-2 bg-blue-500 text-white font-bold text-lg hover:bg-blue-600 rounded-md">Sign Up</button>
        </div>
      </form>
      <span class="flex w-2/3 mx-auto mt-5">Have an account? <a href="signin.php" class="pl-1 underline underline-offset-2 decoration-blue-700 font-bold text-blue-700">Sign In</a></span>
    </div>
  </main>
</body>
</html>