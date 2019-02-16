<?php
	include("connect.php"); 	
	$uid=$_POST["uid"];
	$query = "SELECT * FROM test_join where uid like '$uid';";
	$result = mysqli_query($con, $query);
	//$result=mysqli_query($con,"SELECT * FROM test_join where uid in (SELECT uid FROM test3 where uid='$uid');");
	$row = mysqli_fetch_array($result);
	if($row!=0)
	{
		$userID = $row['userID'];
		echo "Hello, ".$userID."!";
	}
	else echo "Not Registered.";
?>

