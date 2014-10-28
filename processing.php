<?php
    include('connection.php');
    if ($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        $fName = $_POST['fName'];
        $lName = $_POST['lName'];
        $email = $_POST['email'];
        $phone = $_POST['phone'];
        $skill = $_POST['skill'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        //if values are not empty, proceed to store them in the database
        if(!empty($fName) && !empty($lName) && !empty($email) && !empty($phone) && !empty($skill) && !empty($username) && !empty($password))
    	{
        	mysqli_query($dbc, "INSERT INTO user(fName, lName, email, phone, skill, username, password ) 
        	VALUES ('$fName', '$lName', '$email', '$phone', '$skill', '$username', '$password' )");
        	echo " <br /><br /> Row  inserted, everything worked fine!<br />";	
        	echo "<br /> <a href = 'loggedIn.html'> User Control Panel </a> <br />";
        }
    	else
    	{		
        	echo "ERROR: You left some values empty!";	
        }
    }
    else
    {
       	echo "<strong>Please complete the form...</strong>";
    }
?>