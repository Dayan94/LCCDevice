<?php
//setting header to json
header('Content-Type: application/json');

include '../connectdb.php';

if(!$conn){
	die("Connection failed: " . $conn->error);
}

$sql = '';

if($_POST['crop_selector_for_urea'] != null)
{

//query to get data from the table
	$sql = "SELECT Location, SUM(Urea_Mon) as 'Value' FROM lcc_device_data WHERE Urea != 'Not Required' ";
	if($_POST['crop_selector_for_urea'] != "All") $sql .= "AND  Crop = '".$_POST['crop_selector_for_urea']."' ";
	if($_POST['year_selector_for_urea'] != "All") $sql .= "AND EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector_for_urea']."' ";
	$sql .= "GROUP BY Location ORDER BY SUM(Urea_Mon) DESC";

	//execute query
	$result = $conn->query($sql);


//loop through the returned data
	$data = array();
	foreach ($result as $row) {
		$data[] = $row;
	}

//free memory associated with result
	$result->close();

//close connection
	$conn->close();

//now print the data
	print json_encode($data);

}



?>
