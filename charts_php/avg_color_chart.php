<?php
//setting header to json
header('Content-Type: application/json');

include '../connectdb.php';

if(!$conn){
	die("Connection failed: " . $conn->error);
}

$sql = '';

if($_POST['crop_selector_for_color'] != null)
{
		//query to get data from the table
	$sql = "SELECT Location, SUM(Average_Leaf_Color)/COUNT(Average_Leaf_Color) as 'Value' FROM lcc_device_data WHERE Total_Leaf != 0 "; 
	if($_POST['crop_selector_for_color'] != "All") $sql .= "AND Crop = '".$_POST['crop_selector_for_color']."' ";
	if($_POST['year_selector_for_color'] != "All") $sql .= "AND EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector_for_color']."' "; 
	$sql .= "GROUP BY Location ORDER BY SUM(Average_Leaf_Color)/COUNT(Average_Leaf_Color) DESC";

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
