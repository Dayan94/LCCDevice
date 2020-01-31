<?php
@ob_start();
session_start();
?>

<!DOCTYPE html>
<html>
<head>
  <title>LCC Device Data| Contact</title>
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
  
  <?php  
  if(isset($_SESSION['admin_privilege']))
  {
    if($_SESSION['admin_privilege'] == 'super-admin')
    {
      ?>
      <div class="tableWrapper" style="overflow-x:auto;position:relative;">
        <div class="tableAreaWrapper">
          <div class="data-table" id="">
            <h1 data-aos="flip-down">Admin Request</h1>      
            <table id = "admin_request_table" class="display table table-striped table-bordered dt-responsive">
              <thead>
                <tr>
                  <th>ID</th>
                  <th>Name</th>
                  <th>Address</th> 
                  <th>Phone</th> 
                  <th>Email</th>
                  <th>Accept</th>
                  <th>Delete</th>
                </tr>
              </thead>

              <tbody>

                <?php
                include 'connectdb.php';
                $sql = "SELECT ID, Name, Address, Phone, Email FROM users WHERE Privilege = 'requested'";
                $result = $conn->query($sql);


                if ($result->num_rows > 0)
                {
                  $id = 1;
                  while ($row = $result->fetch_assoc()) {
                   ?>

                   <tr>
                    <td><?php echo $id ?></td>             
                    <td><?php echo $row["Name"] ?></td>             
                    <td><?php echo $row["Address"] ?></td>
                    <td><?php echo $row["Phone"] ?></td>
                    <td><?php echo $row["Email"] ?></td>
                    <!--             <td><button name="btn_open_edit_modal" value= "<?php echo $row["ID"]; ?>" class='btn_open_edit_modal btn btn-default btn-rounded btn-sm my-0'> <i class='fas fa-edit'></i></button></td> -->
                    <td><button class='btn btn-default btn-rounded btn-sm my-0' id="open_accept_modal" value= "<?php echo $row["ID"]; ?>" data-toggle="modal"  data-target="#accept_admin_request_modal"><i class="fas fa-check"></i></button></td>
                    <td>
                      <button  name = "confirm_delete"  value= "<?php echo $row["ID"]; ?>"  class="delete_contact delete_admin_request btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button>
                    </td>
                  </tr> 

                  <div class="modal fade" id="accept_admin_request_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
                        <input type="text" name="id_contact"/>  
                        <i style="color: green" class="fas fa-check fa-4x animated rotateIn"></i>

                      </div>

                      <!--Footer-->
                      <div class="modal-footer flex-center">
                        <a class="accept btn  btn-outline-danger">Yes</a>
                        <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
                      </div>
                    </div>
                    <!--/.Content-->
                  </div>
                </div>


                <div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog cascading-modal" role="document">
                    <!-- Content -->
                    <div class="modal-content">

                      <!-- Modal cascading tabs -->
                      <div class="modal-c-tabs">

                        <!-- Nav tabs -->
                        <div class="nav nav-tabs md-tabs tabs-3 white darken-3 justify-content-center" role="tablist">
                          <h2><span class="badge badge-warning"><i class="fas fa-unlock-alt"></i> Comment</span></h2>
                        </div>

                        <!-- Tab panels -->
                        <div class="tab-content">
                          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                            <!-- Body -->
                            <div class="modal-body mb-1">

                              <div class="text-center mt-2">
                                <div class="alert alert-danger" role="alert"></div>
                                <div class="alert alert-success" role="alert"></div>
                              </div>

                            </div>
                            <!-- Footer -->
                            <div class="modal-footer">
                              <button class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                            </div>
                          </div>
                        </div>

                      </div>
                    </div>
                    <!-- /.Content -->
                  </div>
                </div>

                <?php
                $id++;
              }
            }
            ?>


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
                  <input type="hidden" name="id_contact"/>  
                  <i class="fas fa-times fa-4x animated rotateIn"></i>

                </div>

                <!--Footer-->
                <div class="modal-footer flex-center">
                  <a name="delete_row" class="btn  btn-outline-danger">Yes</a>
                  <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
                </div>
              </div>
              <!--/.Content-->
            </div>
          </div>
          <!--Modal: modalConfirmDelete-->   



          <?php
          $conn->close();
          ?>






        </tbody>
        <tfoot>       
          <tr> 
            <th>ID</th>
            <th>Name</th>
            <th>Address</th> 
            <th>Phone</th> 
            <th>Email</th>
            <th>Accept</th> 
            <th>Delete</th> 
          </tr>
        </tfoot>
      </table>
    </div>
  </div>
</div>

<?php  
}
}
if(isset($_SESSION['admin']))  
{  
  ?>    
  

  <div class="tableWrapper" style="overflow-x:auto;position:relative;">
    <div class="tableAreaWrapper">
      <div class="data-table" id="contact_form_table">
        <h1 data-aos="flip-down">Admin Information</h1>      
        <table id = "admin_information_table" class="display table table-striped table-bordered dt-responsive">
          <thead>
            <tr>
              <th>ID</th>
              <th>Privilege</th>
              <th>Name</th>
              <th>Address</th> 
              <th>Phone</th> 
              <th>Email</th>
              <?php if($_SESSION['admin_privilege'] == 'super-admin') {?> <th>Delete</th> <?php }?>
            </tr>
          </thead>

          <tbody>

            <?php
            include 'connectdb.php';
            $sql = "SELECT ID, Privilege, Name, Address, Phone, Email, Comment FROM users WHERE (Privilege  = 'admin' OR Privilege  = 'super-admin')";
            $result = $conn->query($sql);


            if ($result->num_rows > 0)
            {
              $id = 1;
              while ($row = $result->fetch_assoc()) {
               ?>

               <tr>
                <td><?php echo $id ?></td>             
                <td><?php echo $row["Privilege"] ?></td>             
                <td><?php echo $row["Name"] ?></td>             
                <td><?php echo $row["Address"] ?></td>
                <td><?php echo $row["Phone"] ?></td>
                <td><?php echo $row["Email"] ?></td>
                <?php if($_SESSION['admin_privilege'] == 'super-admin') {
                 if($row["Privilege"] == 'super-admin'){ ?>
                  <td>Super Admin Can not be Deleted</td>
                  <?php 
                }
                else { ?>
                 <td>
                  <button  name = "confirm_delete"  value= "<?php echo $row["ID"]; ?>"  class="delete_contact btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button>
                </td>
                <?php
              }
            }?>
          </tr> 


          <div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
            <div class="modal-dialog cascading-modal" role="document">
              <!-- Content -->
              <div class="modal-content">

                <!-- Modal cascading tabs -->
                <div class="modal-c-tabs">

                  <!-- Nav tabs -->
                  <div class="nav nav-tabs md-tabs tabs-3 white darken-3 justify-content-center" role="tablist">
                    <h2><span class="badge badge-warning"><i class="fas fa-unlock-alt"></i> Comment</span></h2>
                  </div>

                  <!-- Tab panels -->
                  <div class="tab-content">
                    <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                      <!-- Body -->
                      <div class="modal-body mb-1">

                        <div class="text-center mt-2">
                          <div class="alert alert-danger" role="alert"></div>
                          <div class="alert alert-success" role="alert"></div>
                        </div>

                      </div>
                      <!-- Footer -->
                      <div class="modal-footer">
                        <button class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                      </div>
                    </div>
                  </div>

                </div>
              </div>
              <!-- /.Content -->
            </div>
          </div>

          <?php
          $id++;
        }
      }
      ?>


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
            <input type="hidden" name="id_contact"/>  
            <i class="fas fa-times fa-4x animated rotateIn"></i>

          </div>

          <!--Footer-->
          <div class="modal-footer flex-center">
            <a name="delete_row" class="btn  btn-outline-danger">Yes</a>
            <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
          </div>
        </div>
        <!--/.Content-->
      </div>
    </div>
    <!--Modal: modalConfirmDelete-->   



    <?php
    $conn->close();
    ?>






  </tbody>
  <tfoot>       
    <tr> 
      <th>ID</th>
      <th>Privilege</th> 
      <th>Name</th>
      <th>Address</th> 
      <th>Phone</th> 
      <th>Email</th>
      <?php if($_SESSION['admin_privilege'] == 'super-admin') {
        ?>
        <th>Delete</th> 
        <?php  
      }?>

    </tr>
  </tfoot>
</table>
</div>
</div>
</div>

<div class="tableWrapper" style="overflow-x:auto;position:relative;">
  <div class="tableAreaWrapper">
    <div class="data-table">
      <h1 data-aos="flip-down">User Information</h1>      
      <table id = "contact-table" class="display table table-striped table-bordered dt-responsive">
        <thead>
          <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Address</th> 
            <th>Phone</th> 
            <th>Email</th>
            <th>Comment</th>
            <th>Delete</th>
          </tr>
        </thead>

        <tbody>

          <?php
          include 'connectdb.php';
          $sql = "SELECT ID, Name, Address, Phone, Email, Comment FROM users WHERE Privilege = 'non-admin'";
          $result = $conn->query($sql);


          if ($result->num_rows > 0)
          {
            $id = 1;
            while ($row = $result->fetch_assoc()) {
             ?>

             <tr>
              <td><?php echo $id ?></td>             
              <td><?php echo $row["Name"] ?></td>             
              <td><?php echo $row["Address"] ?></td>
              <td><?php echo $row["Phone"] ?></td>
              <td><?php echo $row["Email"] ?></td>
              <!--             <td><button name="btn_open_edit_modal" value= "<?php echo $row["ID"]; ?>" class='btn_open_edit_modal btn btn-default btn-rounded btn-sm my-0'> <i class='fas fa-edit'></i></button></td> -->
              <td><button class='btn btn-default btn-rounded btn-sm my-0' id="open_comment_modal" value= "<?php echo $row["Comment"]; ?>" data-toggle="modal"  data-target="#comment_modal"> <i class='fas fa-comment'></i></button></td>
              <td>
                <button  name = "confirm_delete"  value= "<?php echo $row["ID"]; ?>"  class="delete_contact btn btn-danger btn-rounded btn-sm my-0"><i class="fas fa-trash-alt"></i></button>
              </td>
            </tr> 


            <div class="modal fade" id="comment_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
              <div class="modal-dialog cascading-modal" role="document">
                <!-- Content -->
                <div class="modal-content">

                  <!-- Modal cascading tabs -->
                  <div class="modal-c-tabs">

                    <!-- Nav tabs -->
                    <div class="nav nav-tabs md-tabs tabs-3 white darken-3 justify-content-center" role="tablist">
                      <h2><span class="badge badge-warning"><i class="fas fa-unlock-alt"></i> Comment</span></h2>
                    </div>

                    <!-- Tab panels -->
                    <div class="tab-content">
                      <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
                        <!-- Body -->
                        <div class="modal-body mb-1">

                          <div class="text-center mt-2">
                            <div class="alert alert-danger" role="alert"></div>
                            <div class="alert alert-success" role="alert"></div>
                          </div>

                        </div>
                        <!-- Footer -->
                        <div class="modal-footer">
                          <button class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
                        </div>
                      </div>
                    </div>

                  </div>
                </div>
                <!-- /.Content -->
              </div>
            </div>

            <?php
            $id++;
          }
        }
        ?>


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
              <input type="hidden" name="id_contact"/>  
              <i class="fas fa-times fa-4x animated rotateIn"></i>

            </div>

            <!--Footer-->
            <div class="modal-footer flex-center">
              <a name="delete_row" class="btn  btn-outline-danger">Yes</a>
              <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
            </div>
          </div>
          <!--/.Content-->
        </div>
      </div>
      <!--Modal: modalConfirmDelete-->   



      <?php
      $conn->close();
      ?>






    </tbody>
    <tfoot>       
      <tr> 
        <th>ID</th>
        <th>Name</th>
        <th>Address</th> 
        <th>Phone</th> 
        <th>Email</th>
        <th>Comment</th> 
        <th>Delete</th> 
      </tr>
    </tfoot>
  </table>
</div>
</div>
</div>


<?php  
}  
else  
{



  ?>  
  <!-- SUBHEADER -->
  <section id="subheader">
    <div class="container" data-aos="flip-down">
      <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1>Contact Form</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN PAGE -->
  <section id="page">
    <div class="container">
      <!-- Grid row -->
      <div class="row d-flex justify-content-center align-items-center">

        <!-- Grid column -->
        <div class="col-md-9 col-lg-7 col-xl-5">  
          <br>     

          <div data-aos = "flip-down">
            <div id="contact-icon" data-aos="flip-left"><img src="images/contact-icon.png"></div>
            <form id="contact-form-fillup" class="border border-light p-5" method="post">
              <label><i class="fas fa-user green-text"></i> Name: </label><input type="text" name="name" pattern="[a-zA-Z\s]{3,}" title="Name should be consists of Three or more letters only" class="name form-control mb-4 validate" required> 
              <label><i class="fas fa-map-marker-alt green-text"></i> Address: </label><input type="text" name="address" pattern="[///0-9/,/a-zA-Z\s]{3,}" title="You can use upper or lower case letters, digits, '/' and ',' only" class="address form-control mb-4 validate" required>
              <label><i class="fas fa-phone green-text"></i> Phone NO: </label><input type="text" name="phone" pattern="[0-9]{11}" title="Mobile number should be consists of 11 digits" class="phone form-control mb-4" required>
              <label><i class="fas fa-envelope green-text"></i> Email: </label> <input type="email" name="email" title="Please enter a valid email address" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" class="email form-control mb-4 validate" required>

              <label><i class="fas fa-comment green-text"></i> Comment: </label> <textarea type="textarea" name="comment" class="comment form-control mb-4"></textarea> 
              <div class="alert alert-danger" role="alert"></div>
              <div class="alert alert-success" role="alert"></div>
              <input type = "submit" name="submit_contact" value="Submit" class="btn blue-gradient btn-block btn-rounded z-depth-1a">
            </form>
          </div>
        </div>
        <!--/Form without header-->

      </div>
    </section>
    <?php  
    
  }  
  ?> 

  <?php include 'footer.php' ?>

</body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

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

<script type="text/javascript" src="js/initialize_and_login.js"></script>

<script src="js/script_contact_table.js"></script>
<script src="js/script_admin_request_table.js"></script>
<script src="js/script_admin_information_table.js"></script>


<script type="text/javascript">
  $(document).ready(function() {

/*    $(document).on('click', '.btn_open_edit_modal', function(){  
      var id_contact = $(this).val(); 
      console.log(id_contact); 
      $.ajax({  
        url:"fetch_table_row.php",  
        method:"POST",  
        data:{id_contact:id_contact}, 
        success:function(data){ 
          // console.log(data);
          $('#modalInsert  [name = "name"]').val(data.Name);  
          $('#modalInsert [name = "address"]').val(data.Address);  
          $('#modalInsert [name = "phone"]').val(data.Phone);  
          $('#modalInsert [name = "email"]').val(data.Email);  
          $('#modalInsert [name = "comment"]').val(data.Comment);
          $('[ name = "id_contact"]').val(data.ID); 
          // console.log($('[ name = "id_contact"]').val());  
          $('#btn_edit_contact').html('Update');
          $('#modalInsert').modal('show');  
        }  
      });  
    }); */ 

    $('#insert_form').on("submit", function(event){  
     event.preventDefault();  
     $.ajax({  
      url:"submit_contact.php",  
      method:"POST",  
      data:$('#insert_form').serialize(),  
      beforeSend: function(){  
        $('#insert').html("Inserting");  
      },  
      success:function(data){  
        $('#insert_form')[0].reset();  
        $('#modalInsert').modal('hide');   
        location.reload(); 
      }  
    });    
   }); 


    $(document).on('click', '.delete_contact', function(){  
      var id_contact = $(this).val(); 
      // console.log(id_contact); 
      $.ajax({  

        success:function(){ 
         $('[ name = "id_contact"]').val(id_contact); 
         $('#modalConfirmDelete').modal('show');  
       }  
     });  
    }); 


    $('#modalConfirmDelete [name = "delete_row"]').click(function(event){  
     event.preventDefault(); 
     var id_contact = $('[ name = "id_contact"]').val();  
     $.ajax({  
      url:"delete_table_row.php",  
      method:"POST",  
      data: {id_contact: id_contact},   
      success:function(data){    
        $('#modalConfirmDelete [name = "delete_row"]').html("Deleting"); 
        window.setTimeout(function(){window.location = window.location},1000);   
      }  
    });  
   });

    $('#open_comment_modal').click(function(){
      var comment = $('#open_comment_modal').val();
      if(comment == '' || comment == null) {
       $('#comment_modal .alert.alert-danger').show();
       $('#comment_modal .alert.alert-danger').html('No Comment to Show');  
     } 
     else {
      $('#comment_modal .alert.alert-success').show();
      $('#comment_modal .alert.alert-success').html(comment);
    }

  });

    $('#contact-form-fillup').submit(function(event){
      event.preventDefault();
      var name = $('#contact-form-fillup .name').val();  
      var address = $('#contact-form-fillup .address').val();  
      var phone = $('#contact-form-fillup .phone').val();  
      var email = $('#contact-form-fillup .email').val();  
      var comment = $('#contact-form-fillup .comment').val();  
      $.ajax({  
       url:"submit_contact.php",  
       method:"POST",  
       data: {submit_contact: 'submit', name: name, address: address, phone: phone, email: email, comment: comment},  
       success:function(data)  
       { 
        var result = $.trim(data);
        if(result == 'success')
        {
          $('#contact-form-fillup .alert.alert-danger').hide();
          $('#contact-form-fillup button[name="submit"]').html('sent');
          $('#contact-form-fillup .alert.alert-success').show();
          $('#contact-form-fillup .alert.alert-success').html('Form Completion Successful!');
          window.setTimeout(function(){window.location = window.location},1000);   

        }
        else 
        {
          $('#contact-form-fillup .alert.alert-danger').show();
          $('#contact-form-fillup .alert.alert-danger').html(result);   

        }
      }  
    }); 
    });

    $('#open_accept_modal').click(function(){
      $('#accept_admin_request_modal [name="id_contact"]').val($(this).val());
    });

    $('#accept_admin_request_modal .accept').click(function(){
      var id_contact =$('#accept_admin_request_modal [name="id_contact"]').val();
      $.ajax({  
        url:"accept_admin_request.php",  
        method:"POST",  
        data: {accept_admin_request: true, id_contact: id_contact},   
        success:function(data){    
          var result = $.trim(data);
          if(result == 'success')
          {
            $('#accept_admin_request_modal .accept').html("Accepted"); 
          // window.setTimeout(function(){window.location = window.location},1000); 
        }

      }  
    }); 
    });

  }); 

      // this is declared at the last so that after all js and css files inclusion cover div will be hidden
      $(window).on('load', function() {
       $(".cover").hide();
     });


   </script>