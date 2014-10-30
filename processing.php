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
           if(!SELECT username FROM users WHERE username == $username){  //create a username/database checker
    		  if(!SELECT email FROM users WHERE email == $email){  // creat a email/database checker
    		    if($email == $email_2){
            		if($password == $password_2){
                		if(!empty($fName) && !empty($lName) && !empty($email) && !empty($email_2) && !empty($phone) &&
                		 !empty($skill) && !empty($username) && !empty($password) && !empty($password_2))
                    	{
                        	mysqli_query($dbc, "INSERT INTO user(fName, lName, email, phone, skill, username, password ) 
                        	VALUES ('$fName', '$lName', '$email', '$phone', '$skill', '$username', '$password' )");
                        	echo " <br /><br /> Row  inserted, everything worked fine!<br />";	
                        	echo "<br /> <a href = 'loggedIn.html'> User Control Panel </a> <br />";
                        }
                    	else
                    	{		
                        	echo "ERROR: You left some values empty!";
							<a href = "newUser.html">Back</a>	
                        }
        			else
        			{
        			 	echo "ERROR: Passwords do not match!";
						<a href = "newUser.html">Back</a>
        			}
        		else
        		{
        			 echo "ERROR: emails do not match!";
					 <a href = "newUser.html">Back</a>
        		}
        	else
    		{
    		 	echo "ERROR: User already exists in the database!";
				<a href = "login.php">Back</a>
    		}
		else
		{
		 	echo "ERROR: Username already taken!";
			<a href = "newUser.html">Back</a>
		}
	}
    else
    {
       	echo "<strong>Please complete the form...</strong>";
		<a href = "newUser.html">Sign Up</a>
    }
?>