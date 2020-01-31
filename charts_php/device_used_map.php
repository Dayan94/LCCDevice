<?php  
//setting header to json
header('Content-Type: application/json');

include '../connectdb.php';

if(!$conn){
  die("Connection failed: " . $conn->error);
}
$sql = '';

$sql .= "SELECT GSM_Location_Latitude AS latitude, GSM_Location_Longitude AS longitude, COUNT(Location) AS weight FROM lcc_device_data ";
if($_POST['crop_selector_for_used'] != "All" || $_POST['year_selector_for_used'] != "All") 
{
  $sql .= "WHERE ";
  if($_POST['crop_selector_for_used'] != "All") $sql .= "Crop = '".$_POST['crop_selector_for_used']."' ";

  if($_POST['crop_selector_for_used'] != "All" && $_POST['year_selector_for_used'] != "All") $sql .= "AND ";
  
  if($_POST['year_selector_for_used'] != "All") $sql .= "EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector_for_used']."' "; 
}

$sql .= "GROUP BY Location"; 

try {
  $result = $conn->query($sql);
  while ( $row = $result->fetch_array(MYSQLI_ASSOC) ) {
    $data[] = $row;
  }
  $db = NULL;
  echo json_encode($data);

} catch(PDOException $e) {
  echo '{"error":{"text":'. $e->getMessage() .'}}';
}
?> 