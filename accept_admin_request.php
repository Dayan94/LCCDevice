<?php 
include 'connectdb.php';

if(isset($_POST['accept_admin_request'])) {
	$sql ="UPDATE users SET Privilege = 'admin' WHERE ID = '".$_POST["id_contact"]."'"; 
	$result = mysqli_query($conn, $sql);
			// $row = mysqli_fetch_assoc($result);
	if($result == true)
	{
		$sql ="SELECT Email, Password FROM users WHERE ID = '".$_POST["id_contact"]."'"; 
		$result = mysqli_query($conn, $sql);
		$row = mysqli_fetch_assoc($result);
		$password = $row['Password'];
		$to = $row['Email'];  
		$subject = "Request to become an admin of lccdevice.cf is accepted.";

		$message = "Congratulation! you are accepted as an admin of lccdevice.cf website\nPlease use this password to login in lccdevice.cf: "  .  $password;
		$headers = "From: lccdevice.cf" . "\r\n";

		if(mail($to, $subject, $message, $headers)){
			echo 'success';
		}else{
			echo "Sorry this ";
		}
	}

	
	die();		// mysqli_close($conn);
} 


?>