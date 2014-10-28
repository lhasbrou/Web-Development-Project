<?php
  //define variables
  $hostname = "localhost";
  $username = "root";
  $password = "Windows7";
  $dbname = "Freelance";
  
  //making the connection to mysql
  $dbc = mysqli_connect($hostname, $username, $password, $dbname) OR die("ERROR: Connection failed" . mysqli_connect_error());
  
  echo "You are currently connected to <strong>" . $dbname . "</strong> Database";
?>
