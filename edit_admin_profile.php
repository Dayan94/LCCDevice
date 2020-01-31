<?php 
include 'connectdb.php';

$name = test_input($_POST["name"]);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phone']);
$password = test_input($_POST['password']);

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = preg_replace('/\s+/', ' ', $data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['edit_admin_profile'])) {
	$sql ="UPDATE users SET Name='$name', Address='$address', Phone='$phone', Password ='$password' WHERE Email = '".$_POST["email"]."'"; 
	$result = mysqli_query($conn, $sql);
			// $row = mysqli_fetch_assoc($result);
	echo 'success';
	die();		// mysqli_close($conn);
} 
?>