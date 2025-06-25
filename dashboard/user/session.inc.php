<?php
  session_start();
  require_once('connection.inc.php');
  // display error message if error is present
  function errorMessage() {
    if (isset($_SESSION["errMessage"])) {
      $outPut = "<div class=\"bg-red-500 p-2 transition rounded-sm text-white\">";
      $outPut .= htmlentities($_SESSION["errMessage"]);
      $outPut .= "</div>";
      $_SESSION["errMessage"] = null;
      return $outPut;
    }
  }
  // display success message if no error is found
  function successMessage() {
    if (isset($_SESSION["succMessage"])) {
      $outPut = "<div class=\"bg-green-500 p-2 transition rounded-sm text-white\">";
      $outPut .= htmlentities($_SESSION["succMessage"]);
      $outPut .= "</div>";
      $_SESSION["succMessage"] = null;
      return $outPut;
    }
  }
?>