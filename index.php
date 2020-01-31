<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>LCC Device Data| Home</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  
  <link rel="icon" type="image/png" href="images/favicon.png" sizes="16x16">

  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
  
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/css/mdb.min.css">

  <link rel="stylesheet" href="css/flexboxgrid.css">
  <link rel="stylesheet" href="css/style-website.css">
  
</head>
<body>

  <?php 
  $parent_file = basename(__FILE__);
  include 'navbar.php';
  ?>
  
  <!-- SHOWCASE -->
  <section id="showcase">
    <div class="container">
      <div class="row center-xs center-sm center-md center-lg middle-xs middle-sm middle-md middle-lg">
        <div class="col-xs-10 col-sm-10 col-md-10 col-lg-7 showcase-content" data-aos="flip-down">
          <div class="headline"><img src="images/headline.png" alt=""></div>
          <p>A website built to store & analysis Data of Smart LCC Device</p>
        </div>
      </div>
    </div>
  </section>

  <!-- FEATURES -->
  <section id="features" data-aos="flip-down">
    <div class="container">
      <div class="row center-xs center-sm center-md center-lg">
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2 >Core Features of The Device</h2>
          <p>What's Included</p>
          <!-- ICON ROW 1 -->
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fas fa-weight"></i><br>
              <h4>Measure Urea</h4>
              <p>The Device can measure Urea for Aman & Boro Paddy, Wheat & Maize for Bigha, Katha, Acre & Decimal Unit Lands</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fas fa-wifi"></i><br>
              <h4>IoT(Internet of Things)</h4>
              <p>The Device can store the Data in this website</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fas fa-headset"></i><br>
              <h4>Audio-Visual Facility</h4>
              <p>Displays every step on LCD Screen & tells through Speaker</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fas fa-chalkboard-teacher"></i><br>
              <h4>Vocal Instructions</h4>
              <p>Guides users how & when to use the Device</p>
            </div>
          </div>

          <!-- ICON ROW 2 -->
          <div class="row center-xs center-sm center-md center-lg">
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fa fa-undo"></i><br>
              <h4>Undo & Redo Facility</h4>
              <p>Users can undo any step using back button and redo from any previous step </p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fa fa-palette"></i><br>
              <h4>Embedded Leaf Color Chart</h4>
              <p>Leaf Color Chart is embedded with the device, so that farmers no need to buy a seperate Chart</p>
            </div>
            <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
              <i class="fa fa-plug"></i><br>
              <h4>Portable & Rechargeable</h4>
              <p>The Device is portable and it can also be used through battery and the battery is rechargeable</p>
            </div>
          </div>
        </div>
      </div>
    </section>

    <hr>

    <section id="features" data-aos="flip-down">
      <div class="container">
        <div class="row center-xs center-sm center-md center-lg">
          <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
            <h2 >Core Features of The Website</h2>
            <p>What's Included</p>
            <!-- ICON ROW 1 -->
            <div class="row center-xs center-sm center-md center-lg">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <i class="fas fa-table"></i><br>
                <h4>Device Data Table</h4>
                <p>Device Data displayed as a tabular format</p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <i class="fas fa-file-download"></i><br>
                <h4>Data Copy & Download Options</h4>
                <p>Data can be copied and downloaded as csv,excel & pdf file format</p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <i class="fas fa-search"></i><br>
                <h4>Data Searching Options</h4>
                <p>One overall data searching input field and individual column searching input fields in Data Table</p>
              </div>
            </div>

            <!-- ICON ROW 2 -->
            <div class="row center-xs center-sm center-md center-lg">
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <i class="fa fa-map-marked-alt"></i><br>
                <h4>Google Heat Map</h4>
                <p>Heat Map represents how many times the device is used from where, greenness and urea requirement comparison of different areas of Bangladesh</p>
              </div>
              <div class="col-xs-12 col-sm-4 col-md-4 col-lg-4">
                <i class="fa fa-chart-bar"></i><br>
                <h4>Bar Chart</h4>
                <p>Bar Chart represents how many times the device is used from where, greenness and urea requirement comparison of different areas of Bangladesh</p>
              </div>
            </div>
          </div>
        </div>
      </section>



      <!-- INFO SECTION -->
      <section id="info">
        <div class="container">
          <div class="row center-xs center-sm center-md center-lg middle-xs middle-sm middle-md middle-lg">
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" data-aos="fade-right">
              <img src="images/device.png" alt="">
            </div>
            <div class="col-xs-12 col-sm-6 col-md-6 col-lg-6" data-aos="fade-left">
              <h2>Core Features</h2>
              <ul>
                <li><i class="fa fa-check"></i> IoT(Internet of Things)</li>
                <li><i class="fa fa-check"></i> Audio-Visual Facility</li>
                <li><i class="fa fa-check"></i> Vocal Instructions</li>
                <li><i class="fa fa-check"></i> Undo & Redo Facility</li>
                <li><i class="fa fa-check"></i> Embedded Leaf Color Chart</li>
                <li><i class="fa fa-check"></i> Portable & Rechargeable</li>
              </ul>
            </div>
          </div>
        </div>
      </section>

      <?php include 'footer.php' ?>

    </body>
    </html>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>

    <script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

    <script type="text/javascript" src="js/initialize_and_login.js"></script>
