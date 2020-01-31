<?php 
include 'connectdb.php';

$name = test_input($_POST["name"]);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phone']);
$email = test_input($_POST['email']);
$password = test_input($_POST['password']);

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = preg_replace('/\s+/', ' ', $data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit_admin_request'])) {
	$sql = "SELECT Email FROM users WHERE Email = '$email' AND (Privilege = 'admin' OR Privilege = 'super-admin')";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_num_rows($result); 
	if($row > 0) {
		echo json_encode("Sorry! This is another Admin's Email ID");
		die();
	} 
	else {
		$sql = "SELECT Email FROM users WHERE (Email = '$email' AND Privilege = 'requested')";  
		$result = mysqli_query($conn, $sql);  
		$row = mysqli_num_rows($result); 
		if($row > 0) {
			echo json_encode('A request is previously sent by this mail ID. You will be mailed about your request is accepted or not. Thank You!');
			die();
		} 
		else {
			$sql ="INSERT INTO users (Privilege, Name, Address, Phone, Email, Password) VALUES ('requested', '$name','$address', '$phone','$email', '".$_POST["password"]."')"; 

			$result = mysqli_query($conn, $sql);
			// $row = mysqli_fetch_assoc($result);
			echo 'success';
			die();
			// mysqli_close($conn);

		}

	}

} 

 ?>