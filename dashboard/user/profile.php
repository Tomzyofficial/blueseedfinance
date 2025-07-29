<?php
require_once('session.inc.php');
// fetch loggedin user
$loggedInId = $_SESSION['u_id'];
if (!isset($loggedInId)) {
  $_SESSION["succMessage"] = "Login to continue";
  header("Location: ../../accounts.auth/signin.php");
  exit();
} 
$fetchDataFromDb = "SELECT * FROM users_details WHERE id = '$loggedInId'";
$stmt = mysqli_query($conn, $fetchDataFromDb);
while ($row = mysqli_fetch_assoc($stmt)) {
  $id = $row['id'];
  $firstname = $row['first_name'];
  $middleName = $row['middle_name'];
  $lastName = $row['last_name'];
  $username = $row['user_name'];
  $email = $row['email'];
  $ssn = $row['ssn'];
  $dob = $row['dob'];
  $phone = $row['phone'];
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
  <!-- site logo -->
  <link rel="icon" type="image/x-icon" href="../../src/image/logo.jpg">
  <script src="../../jquery-3.6.0.js"></script>
  <script src="../../profileImageSelector.js" defer></script>
  <title>Blueseedfinance | Profile</title>
</head>
<body class="bg-white">
  <header>
    <!-- back arrow -->
    <div class="p-4 flex">
      <span class="cursor-pointer" onclick="history.back()"><i class="fa fa-arrow-left fa-lg"></i></span>
      <h3 class="mx-auto capitalize text-black font-bold">my profile</h3>
    </div>
    <div class="flex space-x-16 ps-4 pe-4 mt-2">
      <div class="relative cursor-pointer w-[100px] h-[100px]" id="userIcon">
        <img src="../../src/image/male-avater.PNG" class="absolute w-[100%] h-[100%] object-cover rounded-full" id="userImage">
      </div>
      <input type="file" accept="image/*" id="image" class="hidden">
      <div class="">
        <h5 class="text-slate-600">Full Name</h5>
        <h4 class="text-black text-[15px] font-normal"><?= "$firstname $middleName $lastName"; ?></h4>
        <h5 class="text-slate-600">Mobile Number</h5>
        <h4  class="text-black text-[15px] font-normal"><?= $phone; ?></h4>
      </div>
    </div>
  </header>
  <main class="mt-4">
    <div class="flex flex-col md:flex-row">
      <div class="md:w-1/2">
        <h3 class="bg-[#ddd] p-2 uppercase text-black text-[14px] font-normal">basic information</h3>
        <div class="ps-4 pe-4 mt-2">
          <div>
            <h3 class="text-slate-600 capitalize text-[13px]">first name</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities($firstname); ?></h4>
          </div>
          <div class="mt-2">
            <h3 class="text-slate-600 capitalize text-[13px]">middle name</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities($middleName); ?></h4>
          </div>
          <div class="mt-2">
            <h3 class="text-slate-600 capitalize text-[13px]">last name</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities($lastName); ?></h4>
          </div>
          <div class="mt-2">
            <h3 class="text-slate-600 capitalize text-[13px]">full name</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities("$firstname $middleName $lastName"); ?></h4>
          </div>
        </div>
      </div>
      <div class="md:w-1/2">
        <h3 class="bg-[#ddd] p-2 uppercase text-black text-[14px] font-normal">contact information</h3>
        <div class="ps-4 pe-4 mt-2">
          <div>
            <h3 class="text-slate-600 capitalize text-[13px]">email</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities($email); ?></h4>
          </div>
          <div class="mt-2">
            <h3 class="text-slate-600 capitalize text-[13px]">mobile number</h3>
            <h4 class="text-black text-[15px] font-normal"><?= htmlentities($phone); ?></h4>
          </div>
        </div>
      </div>
    </div>
  </main>
</body>
</html>

