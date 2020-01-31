<?php 
include 'Geocoding.php';
use myPHPnotes\Geocoding;
$geo = new Geocoding("AIzaSyCfBld4sCBbaJlPRZ9hEQmh6JAmbzWXVvE");
/*$lat_long = $geo->getCoordinates("Bagdha, Barisal, Bangladesh");

echo 'Geocoding: latitude = '. $lat_long['latitude'] ." longitude = ". $lat_long['longitude'] . "<br>";*/

$latitude = "24.897799";   // 24.911076
$longitude = "91.868497";  // 91.854851  88.745812

 $array_address = $geo->getAddress($latitude, $longitude);



echo 'Reverse Geocoding of (' . $latitude . ', '. $longitude . ') = ';


$address = '';
foreach ($array_address as $key => $value) {
  $address .= $value .= ', ';
}
echo $address;
 // var_dump($address);

/*  $password = '1';
  $to = 'abudayansiddik1234@gmail.com';  
  $subject = "Your Recovered Admin login Password in lccdevice.cf";

  $message = "Please use this password to login in lccdevice.cf: " . $password;
  $headers = "From: dayan_siddik@yahoo.com" . "\r\n";

  if(mail($to, $subject, $message, $headers)){
    echo "Your Password has been sent to your Email id";
  }else{
    echo "Sorry this ";
  }*/
  
/*include 'connectdb.php';
$query = "  
  SELECT * FROM users  
  WHERE Email = 'dayansiddik94@gmail.com';";  

  $result = mysqli_query($conn, $query);
  $count = mysqli_num_rows($result);
  if($result){
    print_r (mysqli_fetch_assoc($result));
  }else{
    echo 'No result found';
  }
  
  $r = mysqli_fetch_array($result);*/


/*use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require $_SERVER['DOCUMENT_ROOT'] . '/lcc/mail/Exception.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lcc/mail/PHPMailer.php';
require $_SERVER['DOCUMENT_ROOT'] . '/lcc/mail/SMTP.php';

$mail = new PHPMailer;
// $mail->isSMTP(); 
$mail->SMTPDebug = 2; // 0 = off (for production use) - 1 = client messages - 2 = client and server messages
$mail->Host = "smtp.gmail.com"; // use $mail->Host = gethostbyname('smtp.gmail.com'); // if your network does not support SMTP over IPv6
$mail->Port = 587; // TLS only
$mail->SMTPSecure = 'tls'; // ssl is deprecated
$mail->SMTPAuth = true;
$mail->Username = 'dayansiddik2ndmail@gmail.com'; // email
$mail->Password = 'Qurantime1'; // password
$mail->setFrom('dayan_siddik@yahoo.com', 'CKSoftwares System'); // From email and name
$mail->addAddress('abudayansiddik1234@gmail.com', 'MD Abu Dayan Siddik'); // to email and name
$mail->Subject = 'Your Recovered Admin login Password in lccdevice.cf';

$password = '1';
$message = "Please use this password to login in lccdevice.cf: " . $password;

$mail->msgHTML($message); //$mail->msgHTML(file_get_contents('contents.html'), __DIR__); //Read an HTML message body from an external file, convert referenced images to embedded,
$mail->AltBody = $message . 'HTML messaging not supported'; // If html emails is not supported by the receiver, show this body
// $mail->addAttachment('images/phpmailer_mini.png'); //Attach an image file

if(!$mail->send()){
    echo "Mailer Error: " . $mail->ErrorInfo;
}else{
    echo "Message sent!";
}*/






// date_default_timezone_set('Asia/Dhaka');

// echo strtotime("now"), "\n";
// echo date("Y-m-d", strtotime("now"))."\n";

// $d=strtotime("tomorrow");
// echo date("Y-m-d h:i:sa", $d) . "<br>";

// $d=strtotime("next Saturday");
// echo date("Y-m-d h:i:sa", $d) . "<br>";

// $d=strtotime("+3 Months");
// echo date("Y-m-d h:i:sa", $d) . "<br>";


// $url = "https://www";

// // Remove all illegal characters from a url
// $url = filter_var($url, FILTER_SANITIZE_URL);

// // Validate url
// if (!filter_var($url, FILTER_VALIDATE_URL) === false) {
//     echo("$url is a valid URL");
// } else {
//     echo("$url is not a valid URL");
// }

// echo "The Time is ". date("h:i:s A");

// $d=mktime(11, 14, 54, 8, 12, 2014);
// echo "Created date is " . date("Y-m-d h:i:sa", $d);

// $d=strtotime("15 April 2014 10:30pm");
// echo "Created date is " . date("Y-m-d h:i:sa", $d);


/*$str = "This is some <b>  \t  bold</b> text.";
echo $str;
echo $_SERVER['PHP_SELF'];
echo "<br>";
echo $_SERVER['SERVER_NAME'];
echo "<br>";
echo $_SERVER['HTTP_HOST'];
echo "<br>";
echo $_SERVER['HTTP_REFERER'];
echo "<br>";
echo $_SERVER['HTTP_USER_AGENT'];
echo "<br>";
echo $_SERVER['SCRIPT_NAME'];*/


/*    $acre = 0.0;
    $land_str = "3 Bigha 15 Katha";
    $land_substrings_array = explode(" ", $land_str);
                            // var_dump($land_substrings_array);
    $l = count($land_substrings_array);
    for($i=1; $i< $l; $i+=2) // as in even index there will be urea amount string so we can skip the index and compare with unit
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
    echo "$acre Acre";*/

/*    $mon = 0.0;
    $urea_str = "9 KG";
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
    echo "$mon Mon";*/



    ?> 

 <!-- <?php  
 $connect = mysqli_connect("localhost", "root", "", "testing");  
 $query = "SELECT * FROM tbl_employee ORDER BY id DESC";  
 $result = mysqli_query($connect, $query);  
 ?>  
 <!DOCTYPE html>  
 <html>  
      <head>  
           <title>Webslesson Tutorial | PHP Ajax Update MySQL Data Through Bootstrap Modal</title>  
           <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>  
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
      </head>  
      <body>  
           <br /><br />  
           <div class="container" style="width:700px;">  
                <h3 align="center">PHP Ajax Update MySQL Data Through Bootstrap Modal</h3>  
                <br />  
                <div class="table-responsive">  
                     <div align="right">  
                          <button type="button" name="add" id="add" data-toggle="modal" data-target="#add_data_Modal" class="btn btn-warning">Add</button>  
                     </div>  
                     <br />  
                     <div id="employee_table">  
                          <table class="table table-bordered">  
                               <tr>  
                                    <th width="70%">Employee Name</th>  
                                    <th width="15%">Edit</th>  
                                    <th width="15%">View</th>  
                               </tr>  
                               <?php  
                               while($row = mysqli_fetch_array($result))  
                               {  
                               ?>  
                               <tr>  
                                    <td><?php echo $row["name"]; ?></td>  
                                    <td><input type="button" name="edit" value="Edit" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs edit_data" /></td>  
                                    <td><input type="button" name="view" value="view" id="<?php echo $row["id"]; ?>" class="btn btn-info btn-xs view_data" /></td>  
                               </tr>  
                               <?php  
                               }  
                               ?>  
                          </table>  
                     </div>  
                </div>  
           </div>  
      </body>  
 </html>  
 <div id="dataModal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">Employee Details</h4>  
                </div>  
                <div class="modal-body" id="employee_detail">  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <div id="add_data_Modal" class="modal fade">  
      <div class="modal-dialog">  
           <div class="modal-content">  
                <div class="modal-header">  
                     <button type="button" class="close" data-dismiss="modal">&times;</button>  
                     <h4 class="modal-title">PHP Ajax Update MySQL Data Through Bootstrap Modal</h4>  
                </div>  
                <div class="modal-body">  
                     <form method="post" id="insert_form">  
                          <label>Enter Employee Name</label>  
                          <input type="text" name="name" id="name" class="form-control" />  
                          <br />  
                          <label>Enter Employee Address</label>  
                          <textarea name="address" id="address" class="form-control"></textarea>  
                          <br />  
                          <label>Select Gender</label>  
                          <select name="gender" id="gender" class="form-control">  
                               <option value="Male">Male</option>  
                               <option value="Female">Female</option>  
                          </select>  
                          <br />  
                          <label>Enter Designation</label>  
                          <input type="text" name="designation" id="designation" class="form-control" />  
                          <br />  
                          <label>Enter Age</label>  
                          <input type="text" name="age" id="age" class="form-control" />  
                          <br />  
                          <input type="hidden" name="employee_id" id="employee_id" />  
                          <input type="submit" name="insert" id="insert" value="Insert" class="btn btn-success" />  
                     </form>  
                </div>  
                <div class="modal-footer">  
                     <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div>  
           </div>  
      </div>  
 </div>  
 <script>  
 $(document).ready(function(){  
      $('#add').click(function(){  
           $('#insert').val("Insert");  
           $('#insert_form')[0].reset();  
      });  
      $(document).on('click', '.edit_data', function(){  
           var employee_id = $(this).attr("id");  
           $.ajax({  
                url:"fetch.php",  
                method:"POST",  
                data:{employee_id:employee_id},  
                dataType:"json",  
                success:function(data){  
                     $('#name').val(data.name);  
                     $('#address').val(data.address);  
                     $('#gender').val(data.gender);  
                     $('#designation').val(data.designation);  
                     $('#age').val(data.age);  
                     $('#employee_id').val(data.id);  
                     $('#insert').val("Update");  
                     $('#add_data_Modal').modal('show');  
                }  
           });  
      });  
      $('#insert_form').on("submit", function(event){  
           event.preventDefault();  
           if($('#name').val() == "")  
           {  
                alert("Name is required");  
           }  
           else if($('#address').val() == '')  
           {  
                alert("Address is required");  
           }  
           else if($('#designation').val() == '')  
           {  
                alert("Designation is required");  
           }  
           else if($('#age').val() == '')  
           {  
                alert("Age is required");  
           }  
           else  
           {  
                $.ajax({  
                     url:"insert.php",  
                     method:"POST",  
                     data:$('#insert_form').serialize(),  
                     beforeSend:function(){  
                          $('#insert').val("Inserting");  
                     },  
                     success:function(data){  
                          $('#insert_form')[0].reset();  
                          $('#add_data_Modal').modal('hide');  
                          $('#employee_table').html(data);  
                     }  
                });  
           }  
      });  
      $(document).on('click', '.view_data', function(){  
           var employee_id = $(this).attr("id");  
           if(employee_id != '')  
           {  
                $.ajax({  
                     url:"select.php",  
                     method:"POST",  
                     data:{employee_id:employee_id},  
                     success:function(data){  
                          $('#employee_detail').html(data);  
                          $('#dataModal').modal('show');  
                     }  
                });  
           }            
      });  
 });  
 </script> -->