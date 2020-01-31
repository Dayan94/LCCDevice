<?php  
	//                     server/host    dbusername         password              db_name
// $conn = mysqli_connect("localhost", "id7774048_dayan", "qurantime", "id7774048_lcc_device_data");
$conn = mysqli_connect("localhost", "root", "", "lcc_device_data");

// Check connection
if (mysqli_connect_errno())
{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

?>