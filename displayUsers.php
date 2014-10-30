<html>	
	
	<a href = "displayUser.php"> Check All Database Records </a> |
	<a href = "deleteUser.html"> Delete User from Database </a> |
	<a href = "passwordUpdate.html"> Change Login Password of a User </a> | 
	<a href = "updateSkill.html"> Change My Phone Number </a> | 
	<a href = "logout.php"> Logout </a> 

    <?php
    	error_reporting(1);
    
    	echo "<br />";
    	include('connection.php');
    	echo "<br />";
    	
    	echo "<h3> All registered users: </h3>";
    
    	$result = mysqli_query($dbc,"SELECT * FROM user");
    
    	echo "<table border='1'>";
    	echo "<tr><th>First Name</th><th>Last Name</th><th>Email</th><th>Phone</th></tr>";
    	
		while($row = mysqli_fetch_array($result))
    	{
    		echo "<tr>" . "<td>" . $row['fName'] . "</td>" . "<td>" . $row['lName'] . "</td>" . 
    		"<td>" . $row['email']. "</td>" . "<td>" . $row['phone'] . "</td>" . "<td>" . $row['username'] . "</td>" . "</tr>"; 
    	}
    	echo "</table>";
    	echo "<br /> <a href = 'loggedIn.html'> Control Panel </a> <br />";
    
    	mysqli_close($dbc);
    ?>

</html>