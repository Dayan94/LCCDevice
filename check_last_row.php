<?php 
include 'connectdb.php';
$sql = "SELECT ID FROM lcc_device_data ORDER BY ID DESC LIMIT 1";
$result = $conn->query($sql);

$total_bigha = $total_katha = $total_acre = $total_decimal = 0;

$total_mon = $total_kg = $total_gm = 0;

if ($result->num_rows > 0) {
 $row = $result->fetch_assoc();
 echo $row['ID'];

} 
?>