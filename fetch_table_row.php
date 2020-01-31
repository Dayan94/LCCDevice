<?php 
//setting header to json
header('Content-Type: application/json');

include 'connectdb.php';

if(isset($_POST["fetch_admin_profile"]))
{
	$query = "SELECT Name, Address, Phone, Email, Password FROM users WHERE Email = '".$_POST["admin_email"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_assoc($result);  
      echo json_encode($row);  
}
else if(isset($_POST["id_contact"]))  
{  
      $query = "SELECT Name, Address, Phone, Email, Comment FROM users WHERE ID = '".$_POST["id_contact"]."'";  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_assoc($result);  
      echo json_encode($row);  
} 
else if(isset($_POST["id_device_data"]))  
{  
      $query = sprintf("SELECT ID, Location, Crop, Type, Irrigation_Time, Land_Size FROM lcc_device_data WHERE ID = '".$_POST["id_device_data"]."'");  
      $result = mysqli_query($conn, $query);  
      $row = mysqli_fetch_assoc($result);  
      print json_encode($row);  
} 

?>