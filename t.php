<?php 
include 'connectdb.php';
$sql = "SELECT ID, Location, Date_Time, Crop, Type, Irrigation_Time, Land_Size, Total_Leaf, Average_Leaf_Color, Urea FROM lcc_device_data";
$result = $conn->query($sql);

$total_bigha = $total_katha = $total_acre = $total_decimal = 0;

$total_mon = $total_kg = $total_gm = 0;

if ($result->num_rows > 0) {



                        // output data of each row
	while($row = $result->fetch_assoc()) {                      

		echo "<tr>
		<td>" . $row["ID"]. "</td>
		<td>" . $row["Location"]. "</td>
		<td>" . date('l\| jS F\, Y\| h:i A', strtotime($row["Date_Time"])) . "</td>
		<td>" . $row["Crop"] . "</td>
		<td>". $row["Type"]. "</td>
		<td>". $row["Irrigation_Time"]. "</td>
		<td>". $row["Land_Size"]. "</td>
		<td>". $row["Total_Leaf"]. "</td>
		<td>". $row["Average_Leaf_Color"]. "</td>
		<td>". $row["Urea"]. "</td>";
		if(isset($_SESSION["admin"]))
		{
			echo '<td>
			<button  name = "confirm_delete"  id= "'.$row["ID"].'"  class="delete_device_data btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button>
			</td>';
		}

		echo "</tr>";

	}

} 
?>