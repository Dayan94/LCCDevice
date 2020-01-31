<?php
ob_start();
session_start();

include 'connectdb.php';

if(isset($_POST['id_contact']))
{

	$id = $_POST['id_contact'];

	$sql = "DELETE FROM users where ID = '$id';";
	$sql .= "ALTER TABLE users DROP ID;";
	$sql .= "ALTER TABLE users ADD ID int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";
	if(mysqli_multi_query($conn, $sql))
	{
		do {
			if($result = mysqli_store_result($conn))
			{
				while ($row = mysqli_fetch_row($result)) 
				{
					printf("%s\n", $row[0]);
				}
				mysqli_free_result($result);
			}
		} while (mysqli_next_result($conn));
	}
	mysqli_close($conn);
}
else if(isset($_POST['id_device_data']))
{
	$id = $_POST['id_device_data'];

	$sql = "DELETE FROM lcc_device_data WHERE ID = '$id';";
	$sql .= "ALTER TABLE lcc_device_data DROP ID;";
	$sql .= "ALTER TABLE lcc_device_data ADD ID int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";

	if(mysqli_multi_query($conn, $sql))
	{
		do {
			if($result = mysqli_store_result($conn))
			{
				while ($row = mysqli_fetch_row($result)) 
				{
					printf("%s\n", $row[0]);
				}
				mysqli_free_result($result);
			}
		} while (mysqli_next_result($conn));
	}
	mysqli_close($conn);
}
else if(isset($_POST['delete_admin_account']))
{
	$sql = "DELETE FROM users WHERE Email = '".$_POST['email']."';";
	$sql .= "ALTER TABLE users DROP ID;";
	$sql .= "ALTER TABLE users ADD ID int NOT NULL AUTO_INCREMENT PRIMARY KEY FIRST";

	if(mysqli_multi_query($conn, $sql))
	{
		$id = 0;
		do {
			if($result = mysqli_store_result($conn))
			{
				while ($row = mysqli_fetch_row($result)) 
				{
				}
				mysqli_free_result($result);
				$id++;
			}
		} while (mysqli_next_result($conn));
		echo "success";
		unset($_SESSION["admin"]);
		unset($_SESSION["admin_email"]);
		unset($_SESSION["admin_privilege"]); 
		mysqli_close($conn);
	}
	else echo "wrong data";
	

}
?>
