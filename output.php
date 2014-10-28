<?php
	include("connection.php");
	$a = mysqli_query($dbc, "SELECT * FROM user");
	
	while ( $row = mysqli_fetch_array($a))
	{
		echo $row['fName']."/".$row['email'];
		echo "<br>";
	}
    mysqli_close($dbc);
    echo "database connection closed.";
?>