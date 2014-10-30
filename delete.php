<?php
	//avoid error notices, display only warnings:
	error_reporting(1);
	//check if user submitted form:
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//connect to database
		include('connection.php');
		echo "<br />";
	
		//get input username value from form:	
		//check for username:
		if (empty($_POST['username']))
		{
			echo 'You forgot to enter a username!';
		}
		else
		{
			$e = mysqli_real_escape_string($dbc, trim($_POST['username'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
		}
		
		//if the database contains the requested email, save it in a variable.
		$queryMatch = mysqli_query($dbc, "SELECT email FROM user WHERE (username ='$e') ");
	
		//check if the email matches one in the database
		//if a match exists, delete the user.
		if (mysqli_num_rows($queryMatch) != 0)
		{
			//delete user where email = $email_from_form_input: 
			mysqli_query($dbc, "DELETE FROM user WHERE username='$e' ");		
			echo "The user has been successfully deleted!";
			echo "<br /> <a href = 'loggedIn.html'> Control Panel </a> <br />";
		}
		else
		{
			echo 'User with that email does not exist in the database.';
			echo "<br /> <a href = 'deleteUser.html'> Try again? </a> <br />";
		}	
	}
	else
	{
		echo "Failed to retrieve form data!";
	}
?>