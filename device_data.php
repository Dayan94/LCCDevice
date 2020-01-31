<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>LCC Device Data| Device Data Table</title>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">

	<link rel="icon" type="image/png" href="images/favicon.png" sizes="16x16">

	<link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css">

	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css">


	<link rel="stylesheet" href="css/flexboxgrid.css">
	<link rel="stylesheet" href="css/style-website.css">
  <link rel="stylesheet" href="css/style-table.css">
</head>

<body>

	<div class = "cover"></div>

	<?php 
	$parent_file = basename(__FILE__);
	include 'navbar.php';
	?>
	<div id="snackbar"><i class='fas fa-comment'> </i>  New Data Inserting...</div>

	<script type="text/javascript">
		document.getElementById("snackbar").style.visibility = "hidden";
	</script>

	<div class="tableWrapper"  style="overflow-x:auto;position:relative;">
		<div class="tableAreaWrapper">
			<div class="data-table">
				<h1 data-aos="flip-down" id="table_headline">LCC Device Data Table</h1>      
				<table class = "device-data-table display table table-striped table-bordered dt-responsive">
					<thead>
						<tr>
							<th>ID</th>
							<th>Location</th> 
							<th>Date & Time</th> 
							<th>Crop</th> 
							<th>Type</th>
							<th>Irrigation</th> 
							<th>Land Size</th> 
							<th>Total Leaf</th>
							<th>Average Color</th>
							<th>Urea</th>
							<?php 
							if(isset($_SESSION["admin"]))
							{
								echo "<th>Delete</th>";
							}

							?>
						</tr>
					</thead>

					<tbody>
						<?php 
						include 'connectdb.php';
						$sql = "SELECT ID, Location, Date_Time, Crop, Type, Irrigation_Time, Land_Size, Total_Leaf, Average_Leaf_Color, Urea FROM lcc_device_data";
						$result = $conn->query($sql);
						$rowcount=mysqli_num_rows($result);
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
							}
							echo "</tr>";
						} 						
						?>
					</tbody>

          <tfoot>       
            <tr>
             <th>ID</th>
             <th>Location</th>
             <th>Date & Time</th> 
             <th>Crop</th> 
             <th>Type</th>
             <th>Irrigation</th> 
             <th>Land Size</th> 
             <th>Total Leaf</th>
             <th>Average Color</th>
             <th>Urea</th>
             <?php 
             if(isset($_SESSION["admin"]))
             {
              echo "
              <th>Delete</th>";
            }
            ?>
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>	

<hr>

<!-- <div id="heatmapArea" style="width:1024px;padding:0;height:768px;cursor:pointer;position:relative;"></div> -->


<div class="analysis-part">

  <h1>Analysis from Data Table</h1> 
  <br> 
  <label class="wrapper" for="states">Select an option below to display Comparison Bar Chart of All Areas</label>

  <div class="barchart-analysis">
   <div class="selection-area">
    <div class="button dropdown"> 
     <span>Analysis Selection: </span>
     <select id="barchart-analysis-selector">   
      <option value="Urea Requirement" selected="">Urea Requirement Analysis</option>
      <option  value="Greenness">Greenness Analysis</option>
      <option value="Device Usage Counts" >Device Used Analysis</option>
    </select>
  </div>
  <div class="button dropdown"> 
   <span>Crop Selection: </span>
   <select id="barchart-crop-selector">   
    <!-- <option disabled="" selected="" style="color: grey">Select All or any Crop &#8595;</option> -->
    <option  value="All Crops" selected="">All Crops</option>
    <option value="Aman Paddy">Aman Paddy</option>
    <option value="Boro Paddy">Boro Paddy</option>
    <option  value="Wheat">Wheat</option>
    <option  value="Maize">Maize</option>
  </select>
</div>
<?php  
include 'connectdb.php';
$sql = "SELECT EXTRACT(YEAR FROM Date_Time) AS year FROM lcc_device_data"; 
if(isset($_POST['crop_selector_for_color'])) $sql .= "WHERE Crop = '".$_POST['crop_selector_for_color']."'";
$sql .= " GROUP BY EXTRACT(YEAR FROM Date_Time) ORDER BY EXTRACT(YEAR FROM Date_Time) DESC";
$result = $conn->query($sql);
?>
<div class="button dropdown"> 
 <span>Year Selection: </span>
 <select id="barchart-year-selector">   
  <option value="All Years" selected="" style="color: grey">All Years</option>
  <?php while ($row = mysqli_fetch_array($result)):?>
   <option value="<?php echo $row["year"] ?>"><?php echo $row["year"] ?></option>
 <?php endwhile?><?php echo $row["year"] ?>
</select>
</div>
</div>
<hr>

<!-- start chart for greennes of lands for various crops   -->
<div class="container chartWrapper" style="overflow-x:auto;position:relative;"> 
  <div class="chart-container chartAreaWrapper" id="area_of_bar_chart">     
   <canvas id="bar_chart"></canvas>
 </div>
</div>
</div>

<hr>
<label class="wrapper" for="states">Select an option below to display Google Heat Map Comparison of All Areas</label>

<div class="heatmap-analysis">
 <div class="selection-area">
  <div class="button dropdown"> 
   <span>Analysis Selection: </span>
   <select id="heatmap-analysis-selector">   
    <option value="Urea Requirement" selected="">Urea Requirement Analysis</option>
    <option  value="Greenness" >Greenness Analysis</option>
    <option value="Device Usage Counts">Device Used Analysis</option>
  </select>
</div>
<div class="button dropdown"> 
 <span>Crop Selection: </span>
 <select id="heatmap-crop-selector">   
  <option  value="All Crops" selected="">All Crops</option>
  <option value="Aman Paddy">Aman Paddy</option>
  <option value="Boro Paddy">Boro Paddy</option>
  <option  value="Wheat">Wheat</option>
  <option  value="Maize">Maize</option>
</select>
</div>
<?php  
include 'connectdb.php';
$sql = "SELECT EXTRACT(YEAR FROM Date_Time) AS year FROM lcc_device_data"; 
if(isset($_POST['crop_selector_for_color'])) $sql .= "WHERE Crop = '".$_POST['crop_selector_for_color']."'";
$sql .= " GROUP BY EXTRACT(YEAR FROM Date_Time) ORDER BY EXTRACT(YEAR FROM Date_Time) DESC";
$result = $conn->query($sql);
?>
<div class="button dropdown"> 
 <span>Year Selection: </span>
 <select id="heatmap-year-selector">   
  <option value="All Years" selected="" style="color: grey">All Years</option>
  <?php while ($row = mysqli_fetch_array($result)):?>
   <option value="<?php echo $row["year"] ?>"><?php echo $row["year"] ?></option>
 <?php endwhile?><?php echo $row["year"] ?>
</select>
</div>
</div>
<hr>
<!-- heat map for greennes of lands for various crops   -->
<div class="container chartWrapper" style="overflow-x:auto;position:relative;"> 
  <div class="chart-container chartAreaWrapper">     
   <div id="heatmapArea" style="width: 80vw ;padding:0;height:80vh;"></div>
 </div>
</div>
</div>


</div>

<?php include 'footer.php'; ?>

<!--Modal: modalConfirmDelete-->
<div class="modal fade" id="modalConfirmDelete" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
aria-hidden="true">
<div class="modal-dialog modal-sm modal-notify modal-danger" role="document">
  <!--Content-->
  <div class="modal-content text-center">
    <!--Header-->
    <div class="modal-header d-flex justify-content-center">
      <p class="heading">Are you sure?</p>
    </div>

    <!--Body-->
    <div class="modal-body">
      <input type="hidden" name="id_device_data" id="id_device_data" />  
      <i class="fas fa-times fa-4x animated rotateIn"></i>

    </div>

    <!--Footer-->
    <div class="modal-footer flex-center">
      <a name="delete_row" id="delete_row" value = "yes" class="btn  btn-outline-danger">Yes</a>
      <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
    </div>
  </div>
  <!--/.Content-->
</div>
</div>
<!--Modal: modalConfirmDelete-->
</body>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>

<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>

<!-- script required with jquery and datatables script for copy, csv, excel, pdf, print etc  -->
<script src="https://cdn.datatables.net/buttons/1.5.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.flash.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.36/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.2/js/buttons.print.min.js"></script>

<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.6.4/js/bootstrap-datepicker.js"></script> -->


<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.min.js"></script>

<script type="text/javascript" src="charts_js/heat_map.js"></script>
<script type="text/javascript" src="charts_js/bar_chart.js"></script>


<script type="text/javascript" src="js/initialize_and_login.js"></script>

<script  src="js/script_device_data_table.js"></script>

<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCfBld4sCBbaJlPRZ9hEQmh6JAmbzWXVvE"></script>

<script src="heatmap.js-master/build/heatmap.js"></script>
<script src="heatmap.js-master/plugins/gmaps-heatmap/gmaps-heatmap.js"></script>

<script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

</html>


<script type="text/javascript">

	$(document).ready(function() {

      // show total urea chart according to selected option in #selector select element
      $('#crop-selector-for-urea').change(function(){
      	$('.urea').hide();
      	$('#' + $(this).val()).show();
      });

      $(document).on('click', '.delete_device_data', function(){  
      	var id_device_data = $(this).attr("id"); 
      // console.log(id_device_data); 
      $.ajax({  

      	success:function(){ 
      		$('[ name = "id_device_data"]').val(id_device_data); 
      		$('#modalConfirmDelete').modal('show');  
      	}  
      });  
    }); 


      $('#delete_row').click(function(event){  
      	event.preventDefault(); 
      	var id_device_data = $('[ name = "id_device_data"]').val();  
      	$.ajax({  
      		url:"delete_table_row.php",  
      		method:"POST",  
      		data: {id_device_data: id_device_data},  
      		beforeSend:function(){  
      			$('#delete').html("Deleting");  
      		},  
      		success:function(data){   
      			$('#modalConfirmDelete').modal('hide');  
      			$('#contact_form_table').html(data); 
      			location.reload(); 
      		}  
      	});  
      });

    }); 

     // this is declared at the last so that after all js and css files inclusion cover div will be hidden
     $(window).on('load', function() 
     {
     	$(".cover").hide();
     });

     last_row = <?php echo $rowcount; ?>;
     setInterval(function(){
     	$.ajax({
     		url: "check_last_row.php",
     		success: function(data){


     			if(parseInt(data) != last_row) {
     				$("#snackbar").css('visibility', 'visible');
     				if(parseInt(data) <= last_row) $("#snackbar").html('Selected Data is Deleting');
     				setTimeout(function(){
     					location.reload();
     				}, 2000);
     			}
     		}

     	});
     }, 1000);
   </script>

