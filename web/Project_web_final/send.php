<?php
session_start();
$con = mysqli_connect('localhost', "root", "qwerqwer","test");	

if(isset($_POST['submit2'])) {
$name = mysqli_real_escape_string($con, $_POST['name']);
$email = mysqli_real_escape_string($con, $_POST['email']);
$comment = mysqli_real_escape_string($con, $_POST['comments']);
	
	if(empty($name) || empty($email) || empty($comment)){
		echo "<script>alert(\"빈칸을 채워 주세요.\");
		window.location.replace('ex.php')
		</script>";
		}
		
	$query="INSERT INTO `test_mail` (`num`, `name`, `email`, `comment`, `time`)
	VALUES (NULL, '$name', '$email', '$comment', CURRENT_TIMESTAMP);";		
	
	if($con->query($query)===TRUE){
		echo "<script>alert('전송되었습니다.')
		window.location.replace('ex.php');
		</script>";
	}
}
?>