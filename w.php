<?php
@ob_start();
session_start();
include 'connectdb.php';

require "Geocoding.php";
use myPHPnotes\Geocoding; 

//     // do this query in phpmyadmin sql so that if any row is deleted then id can be reordered 
// $sql = "SET @count = 0; UPDATE lcc_device_data SET lcc_device_data.ID = @count:= @count + 1;";  
// $result = $conn->query($sql);


if(isset($_GET["crd"]) && isset($_GET["cp"]) && isset($_GET["tp"]) && isset($_GET["it"]) && isset($_GET["ls"]) && isset($_GET["tl"]) && isset($_GET["alc"]) && isset($_GET["u"]))
{

  $sql = "ALTER TABLE lcc_device_data AUTO_INCREMENT = 1";
  $result = $conn->query($sql);



  /* start conversion of land_size to acre */
  $acre = 0.0;
  $land_str = $_GET["ls"];
  $land_substrings_array = explode(" ", $land_str);
                          // var_dump($land_substrings_array);
  $l = count($land_substrings_array);
  for($i=1; $i< $l; $i+=2)
  {
    if($land_substrings_array[$i] == 'BIGHA' || $land_substrings_array[$i] == 'bigha'|| $land_substrings_array[$i] == 'Bigha') 
      $acre += (0.3305785123966942 * (int) $land_substrings_array[$i-1]);
    elseif ($land_substrings_array[$i] == 'KATHA' || $land_substrings_array[$i] == 'katha' || $land_substrings_array[$i] == 'Katha') 
      $acre += (0.01652892561983471 * (int) $land_substrings_array[$i-1]);
    elseif($land_substrings_array[$i] == 'ACRE' || $land_substrings_array[$i] == 'acre'|| $land_substrings_array[$i] == 'Acre')
      $acre += (int) $land_substrings_array[$i-1];
    elseif($land_substrings_array[$i] == 'DECIMAL' || $land_substrings_array[$i] == 'decimal'|| $land_substrings_array[$i] == 'Decimal') 
      $acre += (0.01 * (int) $land_substrings_array[$i-1]);
  }
  // var_dump($acre);
  /* end conversion of land_size to acre */

  /* start conversion of urea to mon */
  $mon = 0.0;
  $urea_str = $_GET["u"];
  $urea_substrings_array = explode(" ", $urea_str);
                            // var_dump($land_substrings_array);
  $l = count($urea_substrings_array);
      for($i=1; $i< $l; $i+=2) // as in even index there will be urea amount string so we can skip the index and compare with unit
      {
        if($urea_substrings_array[$i] == 'MON' || $urea_substrings_array[$i] == 'mon'|| $urea_substrings_array[$i] == 'Mon') 
          $mon += (int) $urea_substrings_array[$i-1];
        elseif ($urea_substrings_array[$i] == 'KG' || $urea_substrings_array[$i] == 'kg') 
          $mon += (0.025 * (int) $urea_substrings_array[$i-1]);
        elseif($urea_substrings_array[$i] == 'GM' || $urea_substrings_array[$i] == 'gm')
          $mon += (0.000025 * (int) $urea_substrings_array[$i-1]);
      }
      // var_dump($mon);
      /* end conversion of urea to mon */

      /* start conversion of gsm_cordinates to location */
//                               longitude  latitude
      $gsm_coordinates = $_GET["crd"];
      $latitude = ""; $longitude = "";

      for($i = 0; ; $i++)
      {
        if($gsm_coordinates[$i] == ',')
        {
          $p = 0;
          $i++;
          while($gsm_coordinates[$i] != ',')
          {
            $longitude[$p] = $gsm_coordinates[$i];
            $p++;
            $i++;
          }
          $p = 0;
          $i++;
          while($i < strlen($gsm_coordinates))
          {
            $latitude[$p] = $gsm_coordinates[$i];
            $p++;
            $i++;
          }
          break;
        }
      }
      /* end conversion of gsm_cordinates to location */

      $geo = new Geocoding("AIzaSyCfBld4sCBbaJlPRZ9hEQmh6JAmbzWXVvE");
 /* $latitude = "22.883333";   // 24.911076
 $longitude = "90.2";  // 91.854851  */

 $address = $geo->getAddress($latitude, $longitude);

 // var_dump($address);

 $datetime = new DateTime('now', new DateTimezone('Asia/Dhaka'));
 $string_datetime = $datetime->format('Y-m-d-H-i-s');

 $sql = "INSERT INTO lcc_device_data (GSM_Location_Latitude, GSM_Location_Longitude, Location, Date_Time, Crop, Type, Irrigation_Time, Land_Size, Total_Leaf, Average_Leaf_Color, Urea, Land_Size_Acre, Urea_Mon) VALUES ('$latitude', '$longitude', '$address', '$string_datetime', '".$_GET["cp"]."', '".$_GET["tp"]."','".$_GET["it"]."','".$_GET["ls"]."','".$_GET["tl"]."','".$_GET["alc"]."','".$_GET["u"]."', $acre, $mon)";
// Execute SQL statement
 if(!mysqli_query($conn, $sql))
 {
  echo("Error description: " . mysqli_error($conn));
}
else 
{
 
 // $result = $conn->query($sql); 

mysqli_close($conn);
echo "inserted";

}

}

?>

