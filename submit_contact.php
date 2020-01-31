<?php
include 'connectdb.php';

$name = test_input($_POST["name"]);
$address = test_input($_POST['address']);
$phone = test_input($_POST['phone']);
$email = test_input($_POST['email']);
$comment = test_input($_POST['comment']);

function test_input($data) {
	$data = trim($data);
	$data = stripslashes($data);
	$data = preg_replace('/\s+/', ' ', $data);
	$data = htmlspecialchars($data);
	return $data;
}

if(isset($_POST['submit_contact']))
{
	$sql = "SELECT Email FROM users WHERE Email = '$email' AND (Privilege = 'admin' OR Privilege = 'super-admin')";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_num_rows($result); 
	if($row > 0) {
		echo json_encode("Sorry! This is another Admin's Email ID");
		die();
	} 
	else {
		$sql = "SELECT Email FROM users WHERE Email = '$email' AND Privilege = 'requested'";  
	$result = mysqli_query($conn, $sql);  
	$row = mysqli_num_rows($result); 
	if($row > 0) {
		echo json_encode("Sorry! This Email ID requested to become Admin.");
		die();
	} 
	else {
		$sql ="INSERT INTO users (Privilege, Name, Address, Phone, Email, Comment) VALUES ('non-admin', '$name','$address', '$phone','$email','$comment');"; 
		mysqli_query($conn, $sql);
		echo "success";
	}
		

	}
} 

/*else if(isset($_POST['id_contact']))
{
	$sql = "UPDATE users SET Name='$name', Address='$address', Phone='$phone', Email = '$email', Comment = '$comment' WHERE ID ='".$_POST["id_contact"]."'"; 

	mysqli_query($conn, $sql);
	header('Location: contact.php');
	mysqli_close($conn);
}*/

?>