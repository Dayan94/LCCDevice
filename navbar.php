  <!-- HEADER -->
  <header id="main-header">
    <div class="container">
      <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg">
        <div class="col-xs-12 col-sm-2 col-md-2 col-lg-2">
          <div class="logo"><img src="images/logo.png"></div>
        </div>
        <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10">
         <!--Navbar -->
         <nav class="mb-1 navbar navbar-expand-lg navbar-dark info-color lighten-1" id="navbar">
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent-555"
          aria-controls="navbarSupportedContent-555" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent-555">
          <ul class="navbar-nav mr-auto" id="nav_list_for_all">
            <li id="navbar_list_home" <?php if ($parent_file == 'index.php') echo "class = 'current active'"; ?>><a class="nav-link" href="index.php" ><i class="fas fa-home"></i> Home </a></li>
            <li id="navbar_list_about" <?php if ($parent_file == 'about.php') echo "class = 'current active'"; ?>><a class="nav-link" href="about.php"><i class="fas fa-pen-alt"></i> About </a></li>
            <li id="navbar_list_device_data" <?php if ($parent_file == 'device_data.php') echo "class = 'current active'"; ?>><a class="nav-link" href="device_data.php"><i class="fas fa-table"></i> Device Data </a></li>
            <li id="navbar_list_contact" <?php if ($parent_file == 'contact.php') echo "class = 'current active'"; ?>><a class="nav-link " href="contact.php"><i class="fas fa-file-signature"></i> Contact </a></li>
          </ul>
          <ul class="navbar-nav ml-auto nav-flex-icons" id="nav_list_for_admin">
           <?php  
           if(isset($_SESSION['admin']))  
           {  
            ?>  
            <li class="nav-item dropdown">
              <a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink-333" data-toggle="dropdown" aria-haspopup="true"
              aria-expanded="false">
              <i class="fas fa-user"></i><small><?php echo $_SESSION['admin_privilege'] . ' : ' . $_SESSION['admin']; ?></small> 
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-default" aria-labelledby="navbarDropdownMenuLink-333">
              <a class="dropdown-item" data-toggle="modal" data-target="#verify_admin_modal"><i class="fas fa-edit"></i> Edit Profile</a>
              <a class="dropdown-item" id="logout"><i class="fas fa-sign-out-alt"></i> Log out</a>
              <?php if($_SESSION['admin_privilege'] == 'admin') {?> <a class="dropdown-item" data-toggle="modal" data-target="#account_delete_modal"><i class="fas fa-trash-alt"></i> Delete Account</a> <?php } ?>
            </div>
          </li>
          
          <?php  
        }  
        else  
        {  
          ?>  
          <li><a name="login" id="login" class="btn btn-default btn-rounded" data-toggle="modal" data-target="#login_or_signup_modal"><i class="fas fa-unlock-alt"></i>  Admin Login/Sign Up </a></li>


          <?php  
        }
        ?> 
      </ul>
    </div>
  </nav>
  <!--/.Navbar -->
</div>
</div>
</div>
</header>

<div class="modal fade" id="account_delete_modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
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
      <input type="hidden"  value="<?php echo $_SESSION['admin_email']?>" class="hidden_input" />  
      <i class="fas fa-times fa-4x animated rotateIn"></i>

    </div>

    <!--Footer-->
    <div class="modal-footer flex-center">
      <a id="delete_admin" class="btn  btn-outline-danger">Yes</a>
      <a type="button" class="btn  btn-danger waves-effect" data-dismiss="modal">No</a>
    </div>
  </div>
  <!--/.Content-->
</div>
</div>

<!--Modal: Login / Register Form-->
<div class="modal fade" id="login_or_signup_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!--Content-->
    <div class="modal-content">

      <!--Modal cascading tabs-->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-3 light-blue darken-3" role="tablist">
          <li class="nav-item">
            <a class="nav-link btn btn-info active" data-toggle="tab" href="#panel7" role="tab" style="float: left;"><i class="fas fa-user mr-1"></i>Login as Admin</a>
          </li>
          <li class="nav-item">
            <a class="nav-link btn btn-info" data-toggle="tab" href="#panel8" role="tab" style="float: right;"><i class="fas fa-user-plus mr-1"></i>Register as Admin</a>
          </li>
        </ul>

        <!-- Tab panels -->
        <div class="tab-content">
          <!--Panel 7-->
          <div class="tab-pane fade in show active" id="panel7" role="tabpanel">

            <!--Body-->
            <form method="POST" id="loginModal">
              <div class="modal-body mb-1">
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="email" class="email form-control form-control-sm validate" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" required>
                  <label data-error="wrong" data-success="right">Admin email</label>
                </div>

                <div class="md-form form-sm mb-4">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" class="password form-control form-control-sm validate" required>
                  <label>Admin password</label>
                </div>
                
                <div class="alert alert-danger" role="alert"></div>
                <div class="alert alert-success" role="alert"></div>
                
                <div class="text-center mt-2">
                  <button type="submit" value="submit" class="btn btn-info" name="login_button" id="login_button">Log in <i class="fas fa-sign-in ml-1"></i></button>
                </div>
              </div>
            </form>
            <!--Footer-->
            <div class="modal-footer">
              <div class="options text-center text-md-right mt-1">
                <p>Forgot <a class="blue-text" id="forget_password" data-toggle="modal" data-target="#get_password_by_mail_modal">Password?</a></p>
              </div>
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>

          </div>
          <!--/.Panel 7-->

          <!--Panel 8-->
          <div class="tab-pane fade" id="panel8" role="tabpanel">

            <!--Body-->
            <form method='POST' id="admin_request_modal">
              <div class="modal-body">
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-user prefix"></i>
                  <input type="text" pattern="[a-zA-Z\s]{3,}" title="Name should be consists of Three or more letters only" class="name form-control form-control-sm validate" required>
                  <label data-error="wrong" data-success="right">Your name</label>
                </div>
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-map-marker-alt prefix"></i>
                  <input type="text" pattern="[///0-9/,/a-zA-Z\s]{3,}" title="You can use upper or lower case letters, digits, '/' and ',' only" class="address form-control form-control-sm validate" required>
                  <label data-error="wrong" data-success="right">Your address</label>
                </div>
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-phone prefix"></i>
                  <input type="text" pattern="[0-9]{11}" title="Mobile number should be consists of 11 digits" class="phone form-control validate" required>
                  <label data-error="wrong" data-success="right">Your phone</label>
                </div>
                <div class="md-form form-sm mb-5">
                  <i class="fas fa-envelope prefix"></i>
                  <input type="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" class="email form-control form-control-sm validate" required>
                  <label data-error="wrong" data-success="right">Your email</label>
                </div>

                <div class="md-form form-sm mb-5">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="password1 form-control form-control-sm validate" required>
                  <label data-error="wrong" data-success="right">Your password</label>
                </div>

                <div class="md-form form-sm mb-4">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="password2 form-control form-control-sm validate" required>
                  <label data-error="wrong" data-success="right">Repeat password</label>
                </div>

                <div class="alert alert-danger" role="alert"></div>
                <div class="alert alert-success" role="alert"></div>


                <div class="text-center form-sm mt-2">
                  <button type="submit" name="submit" class="btn btn-info">Send Request <i class="fas fa-sign-in ml-1"></i></button>
                </div>
              </div>
            </form>
            <!--Footer-->
            <div class="modal-footer">
              <button type="button" class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
            </div>
          </div>
          <!--/.Panel 8-->
        </div>

      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!--Modal: Login / Register Form-->

<!-- Modal: verifcation Form -->
<div class="modal fade" id="verify_admin_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog cascading-modal" role="document">
    <!-- Content -->
    <div class="modal-content">

      <!-- Modal cascading tabs -->
      <div class="modal-c-tabs">

        <!-- Nav tabs -->
        <div class="nav nav-tabs md-tabs tabs-3 white darken-3 justify-content-center" role="tablist">
          <h2><span class="badge badge-warning"><i class="fas fa-unlock-alt"></i> Ensure that you are the Admin</span></h2>
        </div>

        <!-- Tab panels -->
        <form method="post">
          <div class="tab-content">
            <div class="tab-pane fade in show active" id="panel7" role="tabpanel">
              <!-- Body -->
              <div class="modal-body mb-1">

                <div class="text-center mt-2">
                  <h3> Hi! <?php echo $_SESSION['admin'] ?></h3>
                  <h4> Email ID: <span class="admin_email"><?php echo $_SESSION['admin_email'] ?></span></h4>
                  <label> To continue, first verify it's you</label>
                </div>

                <div class="md-form form-sm mb-4">
                  <i class="fas fa-lock prefix"></i>
                  <input type="password" class="password form-control form-control-sm validate" required="">
                  <label data-error="wrong" data-success="right" for="modalLRInput11">Your password</label>
                </div>
                <div class="text-center mt-2">
                  <div class="alert alert-danger" role="alert"></div>
                  <div class="alert alert-success" role="alert"></div>
                  <button  class="btn btn-info" name="login_button">verify</button>
                </div>

              </div>
              <!-- Footer -->
              <div class="modal-footer">
                <button class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
        </form>

      </div>
    </div>
    <!-- /.Content -->
  </div>
</div>
<!-- Modal: verification Form -->

<div class="modal fade" id="modal_edit_admin_profile" tabindex="-1" data-backdrop="static" data-keyboard="false" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
  <div class="modal-dialog cascading-modal" role="document">
    <!-- Content -->
    <div class="modal-content">

      <!-- Modal cascading tabs -->
      <div class="modal-c-tabs">          

        <!-- Nav tabs -->
        <div class="nav nav-tabs md-tabs tabs-3 white darken-3 justify-content-center" role="tablist">
          <h2><span class="badge badge-success"><i class="fas fa-unlock-alt"></i> Edit Admin Profile</span></h2>

        </div>
        <div class="text-center mt-2">
          <h6> Email ID: <span class="admin_email"><?php echo $_SESSION['admin_email'] ?></span></h6>
        </div>
        <!-- Tab panels -->
        <form method='POST'  id="edit_admin_profile_form">
          <div class="modal-body">
            <div class="md-form form-sm mb-5">
              <i class="fas fa-user prefix"></i>
              <input type="text" pattern="[a-zA-Z\s]{3,}" title="Name should be consists of Three or more letters only" class="name form-control form-control-sm validate" required>
              <label data-error="wrong" data-success="right">Your name</label>
            </div>
            <div class="md-form form-sm mb-5">
              <i class="fas fa-map-marker-alt prefix"></i>
              <input type="text" pattern="[///0-9/,/a-zA-Z\s]{3,}" title="You can use upper or lower case letters, digits, '/' and ',' only" class="address form-control form-control-sm validate" required>
              <label data-error="wrong" data-success="right">Your address</label>
            </div>
            <div class="md-form form-sm mb-5">
              <i class="fas fa-phone prefix"></i>
              <input type="text" class="phone form-control validate" pattern="[0-9]{11}" title="Mobile number should be consists of 11 digits" required>
              <label data-error="wrong" data-success="right">Your phone</label>
            </div>

            <div class="md-form form-sm mb-5">
              <i class="fas fa-lock prefix"></i>
              <input type="password" class="password1 form-control form-control-sm validate" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" required>
              <label data-error="wrong" data-success="right">New password</label>
            </div>

            <div class="md-form form-sm mb-4">
              <i class="fas fa-lock prefix"></i>
              <input type="password" name="password2" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Must contain at least one number and one uppercase and lowercase letter, and at least 8 or more characters" class="password2 form-control form-control-sm validate" required>
              <label data-error="wrong" data-success="right">Repeat password</label>
            </div>
            <input type="hidden" class="email" value="<?php if(isset($_SESSION['admin_email'])) echo $_SESSION['admin_email'] ?>">

            <div class="alert alert-danger" role="alert"></div>
            <div class="alert alert-success" role="alert"></div>


            <div class="text-center form-sm mt-2">
              <button type="submit" name="submit" class="btn btn-info">Edit<i class="fas fa-sign-in ml-1"></i></button>
            </div>
          </div>

          <div class="modal-footer">
            <button class="btn btn-outline-info waves-effect ml-auto" data-dismiss="modal">Close</button>
          </div>
        </form>

      </div>
    </div>
    <!-- /.Content -->
  </div>
</div>



<!-- start of mail admin password modal -->
<div class="modal fade" id="get_password_by_mail_modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<div class="modal-dialog" role="document">
  <div class="modal-content">
    <div class="modal-header text-center">
      <h4 class="modal-title w-100 font-weight-bold">Send Password To Admin Mail ID</h4>
      <button type="button" id="close_get_password_by_mail_modal" class="close" data-dismiss="modal" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
    </div>
    <form method="post">
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <i class="fas fa-envelope grey-text prefix"></i>
          <input type="email" name="email" class="email form-control validate" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address"  required="">
          <label data-error="wrong" data-success="right" for="defaultForm-email">Admin Email</label>
        </div>
      </div>

      <div class="alert alert-danger" role="alert"></div>
      <div class="alert alert-success" role="alert"></div>

      <div class="modal-footer d-flex justify-content-center">
        <button type="submit" name="send_password" class="btn btn-warning">Send</button>
      </div>
    </form>
  </div>
</div>
</div>
<!-- end of mail admin password modal -->



<!-- start of modal edit admin profile --> 


</div>

<div class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
aria-hidden="true">
<form method="post" id="insert_form">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h4 class="modal-title w-100 font-weight-bold">Edit Admin Profile</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body mx-3">
        <div class="md-form mb-5">
          <label><i class="fas fa-user grey-text"></i>  Name</label>
          <input type="text" name="name" id="name" pattern="[a-zA-Z\s]{3,}" title="Name should be consists of Three or more letters only" class="form-control validate" required>                             
        </div>
        <div class="md-form mb-5">
          <label><i class="fas fa-envelope grey-text"></i>  Email</label>                     
          <input type="email" name="email" id="email" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$" title="Please enter a valid email address" class="form-control validate" required>               
        </div>

        <input type="hidden" name="id_contact" id="id_contact" />  


        <span class="d-flex justify-content-center"><button type="submit" id="btn_edit_contact" class="btn btn-default" name="btn_edit_contact"></button></span>            
      </div>            
    </div>
  </div>           
</form>       
</div>
<!-- end of modal edit admin profile -->
