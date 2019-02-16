<?php	
	session_start();	
	$con = mysqli_connect("localhost", "root", "qwerqwer","test");	
	if(mysqli_connect_errno()){
			echo "연결 실패 <br> 이유:" . mysqli_connect_error();			
	}
	$userID=$_SESSION['userID'];
	$pre_total=0;
	if(!isset($_POST['submit'])) {
		//$query = "SELECT * FROM test_join";
		$item = $_POST['item'];
		$Price= $_POST['price'];
		$password= $_POST['password'];
		
		$result1 = mysqli_query($con,"SELECT * FROM test_join where userID='$userID'");
		$row = mysqli_fetch_array($result1);
		$uid = $row['uid'];
		
		$query = "select * from test_trade where uid like '$uid';";
			
		$result =mysqli_query($con,$query);
		
		$row = mysqli_num_rows($result);
		
		mysqli_data_seek($result,$row-1);
		
		$data = mysqli_fetch_array($result);
		
		$pre_total = $data['total'];
		
		$modi_total = $pre_total-$Price;
		
		
		$pass_check_query = "SELECT * FROM test_join WHERE uid='$uid'";
		$check_result = mysqli_query($con, $pass_check_query);
		$user = mysqli_fetch_assoc($check_result);

		if($user['password'] === $password){
			if($pre_total - $Price >= 0){	
				if($Price != "0"){
					if($item != NULL){
						$mysql_qry2="INSERT INTO `test_trade` (`number`, `uid`, `name`, `userID`, `in`, `out`, `total`, `point_in`, `point_out`, `point_total`, `content_name`, `date`)
						VALUES (NULL, '$uid', '', '$userID', '0', '$Price', '$modi_total', '0', '0', '0', '$item', CURRENT_TIMESTAMP);";				
						mysqli_query($con,$mysql_qry2);
						echo "<script>alert('기부 완료!');
						window.location.replace('members.php');
						</script>";	
					}
					else{
						echo "<script>alert('아이템을 선택해 주세요!');
						window.location.replace('members.php#donation');
						</script>";					
					}
				}
				else{
					echo "<script>alert('금액을 선택해 주세요!');
						window.location.replace('members.php#donation');
						</script>";
				}
			}			
			else {
				echo "<script>alert('금액이 부족합니다!');
				window.location.replace('members.php#donation');
				</script>";
			}
		}
		else{
			echo "<script>alert('비밀번호를 확인해주세요!');
				window.location.replace('members.php#donation');
				</script>";
		}		
		
	}
?>