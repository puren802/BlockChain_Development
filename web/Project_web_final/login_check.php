<?php
session_start();
$con = mysqli_connect('localhost', "root", "qwerqwer","test");	


if(isset($_POST['submit'])) {
	$userID = $_POST['userID'];
	$password = $_POST['password'];
	
	$query = "SELECT userID, password FROM test_join
	WHERE userID='$userID' AND password='$password'";
	
	$result = mysqli_query($con, $query);
	if(mysqli_num_rows($result) > 0) {
		$_SESSION['userID'] = $_POST['userID'];
		echo "<script>
		alert(\"로그인 되었습니다.\");
		window.location.replace('members.php');
		</script>";		
	}
	else {
		echo "<script>
		alert(\"로그인 정보가 잘못 되었습니다.\");
		window.location.replace('ex.php');
		</script>";
	}
}
?>