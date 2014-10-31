<?php
	//avoid error notices, display only warnings:
	error_reporting(1);
	//check if user submitted form:
	if($_SERVER['REQUEST_METHOD'] == 'POST')
	{
		//connect to database
		include('connection.php');
		echo "<br />";
	
		//get input email value from form:	
		//check for email:
		
		if(isset($_POST['email']))
		{
			$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
			{
				// Not a valid email
				echo 'The email address you entered is not valid';
			}
			else
			{
        		if (mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE email = '" . $email . "' LIMIT 1")) == 0) 
				{
					//Email does not exist!
					echo 'No user with the email address ' . $email . ' exists! Try again.';
				}
				else
				{
					//delete the user with given email
					mysqli_query($dbc, "DELETE FROM users WHERE email = '" . $email . "'");
				}
			}
		}
		else
		{
		echo 'You must enter an email!';
		}
		/*	
			
			
		
		
		
		
		if (empty($_POST['email']))
		{
			echo 'You forgot to enter a email!';
		}
		else
		{
			$e = mysqli_real_escape_string($dbc, trim($_POST['email'])); //escape is to have input such as O’Hara; trim removes the space, return etc.
		}
		
		//if the database contains the requested email, save it in a variable.
		$queryMatch = mysqli_query($dbc, "SELECT email FROM user WHERE (email ='$e') ");
	
		//check if the email matches one in the database
		//if a match exists, delete the user.
		if (mysqli_num_rows($queryMatch) != 0)
		{
			//delete user where email = $email_from_form_input: 
			mysqli_query($dbc, "DELETE FROM user WHERE email = '$e' ");		
			echo "The user has been successfully deleted!";
			echo "<br /> <a href = 'loggedIn.html'> Control Panel </a> <br />";
		}
		else
		{
			echo 'User with that email does not exist in the database';
			echo "<br /> <a href = 'deleteUser.html'> Try Again? </a> <br />";
		}	
		*/
	}
	else
	{
		echo "failed to retrieve form data!";
	}
?>