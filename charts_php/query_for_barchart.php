<?php
//setting header to json
header('Content-Type: application/json');

include '../connectdb.php';

if(!$conn){
	die("Connection failed: " . $conn->error);
}

$sql = '';

if($_POST['analysis_selector'] == 'Greenness')
{
		//query to get data from the table
	$sql = "SELECT Location, SUM(Average_Leaf_Color)/COUNT(Average_Leaf_Color) as Value FROM lcc_device_data WHERE Total_Leaf != 0 "; 

	if($_POST['crop_selector'] != "All Crops") $sql .= "AND Crop = '".$_POST['crop_selector']."' ";

	if($_POST['year_selector'] != "All Years") $sql .= "AND EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector']."' ";
}
else if($_POST['analysis_selector'] == 'Urea Requirement')
{
	$sql = "SELECT Location, SUM(Urea_Mon) as Value FROM lcc_device_data WHERE Urea != 'Not Required' ";

	if($_POST['crop_selector'] != "All Crops") $sql .= "AND Crop = '".$_POST['crop_selector']."' ";

	if($_POST['year_selector'] != "All Years") $sql .= "AND EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector']."' ";

}
else if($_POST['analysis_selector'] == 'Device Usage Counts')
{
	$sql .= "SELECT Location, COUNT(Location) AS Value FROM lcc_device_data ";

	if($_POST['crop_selector'] != "All Crops" || $_POST['year_selector'] != "All Years") $sql .= "WHERE ";

	if($_POST['crop_selector'] != "All Crops") $sql .= "Crop = '".$_POST['crop_selector']."' ";

	if($_POST['crop_selector'] != "All Crops" && $_POST['year_selector'] != "All Years") $sql .= "AND ";

	if($_POST['year_selector'] != "All Years") $sql .= "EXTRACT(YEAR FROM Date_Time) = '".$_POST['year_selector']."' ";
}

$sql .= "GROUP BY Location ORDER BY Value DESC";

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





?>
