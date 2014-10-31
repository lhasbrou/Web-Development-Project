<?php
    include('connection.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $email_2 = $_POST['email_2'];
        $phone = $_POST['phone'];
        $skill = $_POST['skill'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $password_2 = $_POST['password_2'];
        //if values are not empty, and not already in database proceed to store them in the database
			//create a username/database checker
			if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE username = '" . $username . "' LIMIT 1")) == 1)
			{  
				echo 'ERROR: Username already exists!
				<br /><a href = "newUser.html"</a>';
				}
				else
				{
				 // creat a email/database checker
    		    if(mysqli_num_rows(mysqli_query($dbc, "SELECT * FROM users WHERE email = '" . $email . "' LIMIT 1")) == 1)
			    { 
				echo 'ERROR: Email already exists!
				<br /><a href="newUser.html"</a>';
				}
				else
				{
    		    if($email == $email_2){
            		if($password == $password_2){
                		if(!empty($fName) && !empty($lName) && !empty($email) && !empty($email_2) && !empty($phone) &&
                		 !empty($skill) && !empty($username) && !empty($password) && !empty($password_2))
                    	{
                        	mysqli_query($dbc, "INSERT INTO users(fName, lName, email, phone, skill, username, password) 
                        	VALUES ('$fName', '$lName', '$email', '$phone', '$skill', '$username', '$password')");
                        	echo ' <br /><br /> Row  inserted, everything worked fine!<br />';	
                        	echo '<br /> <a href = "loggedIn.html"> User Control Panel </a> <br />';
                        }
                    	else
                    	{		
                        	echo 'ERROR: You left some values empty!
							<br /><a href = "newUser.html">Back</a>';
                        }
						}
        			else
        			{
        			 	echo 'ERROR: Passwords do not match!
						<br /><a href = "newUser.html">Back</a>';
        			}
					}
        		else
        		{
        			 echo 'ERROR: emails do not match!
					 <br /><a href = "newUser.html">Back</a>';
        		}
	}
	}
	}
?>