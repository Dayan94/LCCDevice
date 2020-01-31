<?php
@ob_start();
session_start();

include 'connectdb.php';

if(isset($_POST["admin_login"]))  
{  
	$sql = 
	"SELECT ID, Privilege, Name, Email, Password FROM users 
	WHERE Email = '".$_POST["email"]."' AND Password = '".$_POST["password"]."' AND (Privilege = 'admin' OR Privilege = 'super-admin')";  
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result); 
	if($count > 0)
	{
		$row = mysqli_fetch_assoc($result);
		$_SESSION['admin_id'] = $row["ID"];  
		$_SESSION['admin'] = $row["Name"];  
		$_SESSION['admin_email'] = $row["Email"];  
		$_SESSION['admin_privilege'] = $row["Privilege"];  
		echo 'success';
	} 
	else
	{
		$sql = "  
		SELECT Email, Password FROM users  
		WHERE Email = '".$_POST["email"]."' AND Password = '".$_POST["password"]."' AND Privilege = 'requested'" ;

		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		if($count > 0){
			echo "Sorry! you are not an Admin yet. You will be mailed if Super Admin accept your request.";
		}
		else {
			echo 'Email ID or Password does not match with any account';
		}
	}
}  
if(isset($_POST["verify_admin"]))  
{  
	$sql = 
	"SELECT Email, Password FROM users 
	WHERE Email = '".$_POST["email"]."' AND Password = '".$_POST["password"]."' AND (Privilege = 'admin' OR Privilege = 'super-admin')";  
	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result); 
	if($count > 0)
	{  
		echo 'success';
	} 
	else
	{

			echo 'Wrong Password!';

	}
}  
if(isset($_POST["logout"]))  
{  
	unset($_SESSION["admin"]);
	unset($_SESSION["admin_email"]);
	unset($_SESSION["admin_privilege"]);  
}

if(isset($_POST["send_password"]))  
{

	$sql = "  
	SELECT Email, Password FROM users  
	WHERE Email = '".$_POST["email"]."' AND (Privilege = 'admin' OR Privilege = 'super-admin')" ;

	$result = mysqli_query($conn, $sql);
	$count = mysqli_num_rows($result);
	if($count > 0){
		$row = mysqli_fetch_assoc($result);
		$password = $row['Password'];
		$to = $row['Email'];
		$subject = "Your Recovered Admin login Password in lccdevice.cf";

		$message = "Please use this password to login in lccdevice.cf: " . $password;
		$headers = "From : lccdevice.cf";

		if(mail($to, $subject, $message, $headers)){
			echo "success";
		}else{
			echo "Sorry, The Mail can not be sent now, try again later.";
		}
	}
	else{
		$sql = "  
		SELECT Email FROM users  
		WHERE Email = '".$_POST["email"]."' AND Privilege = 'requested'" ;

		$result = mysqli_query($conn, $sql);
		$count = mysqli_num_rows($result);
		if($count > 0){
			echo "Sorry! you are not an Admin yet. You will be mailed if Super Admin accept your request.";
		}
		else
		{
			echo "This Email does not exist in the Database as Admin";
		}
	}	
}
?>

