<?php
  error_reporting(0);
  include("connection.php");
  //grab values email and password from login form
  
  $login_email = $_POST['login_email']; //must match with the name in the login form
  $login_password = $_POST['login_password'];
  
  //create the query and number of rows returned from the query
  $query = mysqli_query($dbc, "SELECT * FROM user WHERE email='".$login_email."'");
  $numrows = mysqli_num_rows($query);
  // if user clicked submit
  if($_SERVER['REQUEST_METHOD'] == 'POST')
  {
      //create condition to check if there is 1 row with that email
      if($numrows != 0)
      {
      //grab the email and password from that row returned before
      	while($row = mysqli_fetch_array($query))
      	{	
      		$dbemail = $row['email']; //must matching with the field name in your database table;
      		$dbpass = $row['password'];
      		$dbfirstname = $row['fName'];		
      	}
      	
      //create condition to check if email and password are equal to the returned row	
      	
      	if($login_email==$dbemail)
      	{
      		if($login_password==$dbpass)
      		{		
      			echo "<h3><br /> Welcome, ".$dbfirstname.", you are in Freelancer! </h3>";	
      			echo "<br /> <a href = 'loggedIn.html'> User Control Panel </a> <br />";
      		}
      		else
      		{
      			echo "<br /> Please enter a valid email address!";
      		}
      	}
      	else
      	{
      		echo "Please enter a valid email address!";
      	}
      	
      }
      else
      {
       	echo "<br />Invalid credentials! If you are not registered, click <a href = 'newUser.html'>here</a> to register.";
      }
  }
  else
  {
  	echo "Please log in.";
  }

?>
