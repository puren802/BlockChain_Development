<?php
   	include("connect.php");

	$uid=$_POST["uid"];
	$money=$_POST["money"];
	$date=$_POST["date"];
	
	$query = "select * from test_trade where uid like '$uid';";
	
	$result =mysqli_query($con,$query);
	
	$row = mysqli_num_rows($result);
	
	mysqli_data_seek($result,$row-1);
	
	$data = mysqli_fetch_array($result);
	
	$userID = $data['userID'];
	
	$pre_total = $data['total'];
	
	$modi_total = $pre_total+$money;
	
	$query2 = "INSERT INTO `test_trade` (`number`, `uid`, `name`, `userID`, `in`, `out`, `total`, `point_in`, `point_out`, `point_total`, `content_name`, `date`)
						VALUES (NULL, '$uid', '', '$userID', '$money', '0', '$modi_total', '0', '0', '0', '', CURRENT_TIMESTAMP);";	
	//mysqli_query($con,"INSERT INTO test3 VALUES(NULL,'$uid','$money','$date')");
	mysqli_query($con,$query2);
	//mysqli_query($con,"INSERT INTO test4 VALUES('$uid','','')"); 
	
	mysqli_close($con);

?>

