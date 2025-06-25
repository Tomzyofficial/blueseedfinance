<?php
  require_once('session.inc.php');
  if (!isset($_SESSION['admin_user'])) {
    $_SESSION['succMessage'] = 'Login to continue';
    header('Location: index.php');
    exit();
  } 
  // get user id for editing
  if (isset($_GET['id'])) {
    $searchParam = $_GET['id'];
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
<body>
  <!-- main -->
  <main>
    <div class="bg-white relative mx-auto w-[90%] h-[fit-content] my-[150px] pb-10 ring-1 ring-gray-300 md:w-[65%]">
      <div class="flex flex-col text-center py-5">
        <h3 class="text-slate-600 font-extrabold pt-5 capitalize">Delete User Information</h3>
      </div>
      <?php
        // fetch user details for delete
        $sql = "SELECT * FROM user_details WHERE id = '$searchParam'";
        $query = $conn->query($sql);
        while ($row = $query->fetch_assoc()) {
          $id = $row['id'];
          $firstName = $row['first_name'];
          $middleName = $row['middle_name'];
          $lastName = $row['last_name'];
          $userName = $row['user_name'];
          $email = $row['email'];
          $ssn = $row['ssn'];
          $dob = $row['dob'];
          $phone = $row['phone'];
          $password = $row['pwd'];
          $checking = $row['checking_account'];
          $savings = $row['savings_account'];
          $date = $row['date_time'];
        }
        // delete user information 
        if (isset($_POST['submit'])) {
          $deleteQuery = "DELETE FROM user_details WHERE id = '$searchParam'";
          $stmt = $conn->query($deleteQuery);
          header('Location: admin-users.php');
          exit();
        }
      ?>
      
      <!-- input field -->
      <form action="delete-user.php?id=<?= $searchParam;?>" method="POST">
        <div class="mx-5 space-y-4 grid grid-cols-1 md:grid-cols-2 md:space-y-0">
          <!-- firstname input field -->
          <div class="relative md:mr-2">
            <label for="firstname">First Name</label>
            <input type="text" id="firstname" name="first_name" disabled value="<?= htmlentities($firstName); ?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- middle name input field -->
          <div class="relative md:ml-2">
            <label for="middle_name">Middle Name (Optional)</label>
            <input type="text" id="middle_name" name="middle_name" disabled value="<?= htmlentities($middleName);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- lastname input field -->
          <div class="relative md:mr-2">
            <label for="lastname">Last Name</label>
            <input type="text" id="lastname" name="last_name" disabled value="<?= htmlentities($lastName);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- username input field -->
          <div class="relative md:ml-2">
            <label for="username">Username</label>
            <input type="text" id="username" name="username" disabled value="<?= htmlentities($userName);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- email input field -->
          <div class="relative md:mr-2">
            <label for="email">Email</label>
            <input type="text" id="email" name="email" disabled value="<?= htmlentities($email);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- SSN -->
          <div class="relative md:ml-2">
            <label for="ssn">Social Security Number</label>
            <input type="text" id="ssn" name="ssn" disabled value="<?= htmlentities($ssn);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- DOB -->
          <div class="relative md:mr-2">
            <label for="dob">Date of Birth</label>
            <input type="date" id="dob" name="dob" disabled value="<?= htmlentities($dob);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
          <!-- phone input field -->
          <div class="relative  md:ml-2">
            <label for="phone">Phone <span class="text-sm"></span></label>
            <input type="tel" name="phone" disabled id="phone" value="<?= htmlentities($phone);?>" class="caret-blue-300 w-[100%] rounded-sm ring-1 ring-gray-300 p-2 outline-none focus:ring-2 focus:ring-blue-300">
          </div>
        </div>
        <div class="flex mx-5 mt-5 lg:mx-auto lg:w-1/2">
          <button type="submit" name="submit" class="w-[100%] p-2 bg-red-500 text-white font-bold text-lg hover:bg-red-600 rounded-md"><i class="fa fa-trash"></i> Delete</button>
        </div>
      </form>
    </div>
  </main>
</body>
</html>