<?php 
  //Log the user out and display a confirmation message
  session_start();
  unset($_SESSION['sessionUser']);
  session_destroy();
  echo "<h2> <font face='New Times Roman'> Logout Succesfull! </h2>";
  echo "<br /><a href = 'index.html'> Log in again? </a>"
?>
