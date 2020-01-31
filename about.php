<?php
@ob_start();
session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>LCC Device Data| About</title>
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

  <!-- SUBHEADER -->
  <section id="subheader">
    <div class="container">
      <div class="row" data-aos="zoom-in">

        <div class="about-paragraph-icon"><img src="images/about-icon.png" alt=""></div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1>About Device & Website</h1>
        </div>
      </div>
    </div>
  </section>

  <!-- MAIN PAGE -->
  <section id="page" class="about">
    <div class="container">
      <div class="row center-xs center-sm center-md center-lg">        
        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h2><span class="primary-text">What</span> is LCC Device</h2>
          <p><div><img src="images/device.png" alt="">
            The Leaf Color Chart (LCC) is usually a plastic, ruler-shaped strip containing four or
            more panels that range in color from yellowish green to dark green that is cost-effective,
            visual and subjective indicator of plant nitrogen deficiency and is a simple alternative to
            expensive chlorophyll meter/SPAD meter (Soil Plant Analysis Development) and it is
            also suitable for Maize and Wheat providing Farmers with a good diagnostic tool for
            detecting N deficiency. Using LCC will better Crops, avoid diseases of the Crops, ensure 
            fertilizer consumption at right time and at right quantity, save money for Farmers,
            increase profits for Farmers, huge subsidy savings on Urea fertilizer for Government,
            reduce Greenhouse Gas emission. According to Statistics and Research, if 100% Farmers
            use LCC in Bangladesh, India, Indonesia, Philippines, Thailand and Vietnam then there
            will be saving in Urea 3,48,800 ton, 1,66,88,000 ton, 6,32,000 ton, 22,48,000 ton,
            1,96,000 ton, 3,98,000 ton and 3,99,88,000 ton per year in these countries respectively.
            But there are rules and regulations that have to be followed to use LCC for detecting
            nitrogen deficiency and to measure required amount of Urea for Paddy, Wheat, and Maize
            and there is calculation process also which seems difficult for Farmers to memorize all
            the rules and regulations and calculation processes. To help the Farmers to get rid of this
            problem, a Device is built based on LCC for measuring Urea consumption in Rice, Maize,
            and Wheat. 
          </div></p>
          <p>
            <div>
              The Device is built for the Bengali Farmers to help them to ensure either specific amount
              of lands requires Urea or not and if it requires then measure required amount of Urea for
              Rice, Maize, and Wheat without memorizing the whole processes and without calculating
              the amount of Urea. The Device uses an 8-bit AVR microcontroller as the processing unit,
              an LCD display and a speaker for audiovisual output and user instructions of the Device,
              a Micro SD Card for data storage, rechargeable battery, and push-buttons for user input.
              The Device is portable, rechargeable and it has a feature to use an external speaker or
              headphone and volume control. Also, there is a feature to undo a step using a back button,
              if a user makes any mistake then he can undo the step and redo the proper step again. The
              LCC value for Sugarcane, Potato, Cotton, Cassava, Vegetables, Mustard, Oil palm etc.
              are under Research and Development and the Device can be implemented for these Crops
              after the Development is done.
            </div>
          </p>
          <hr>
          <h2><span class="primary-text">What</span> is this website for</h2>
          <p>
            <div>
              The ‘LCC Device Data’ is a web-based application. The main objective of this website is helping Bangladesh Agriculture Ministry to manage, analysis and research urea consumption by four major harvesting crops of Bangladesh. The website will be also an indicator of the greenness of these four crops in the whole country. It will also prove the effectiveness of the Device throughout the country.
            </div>
          </p>
          <hr>
          <h3>Website <span class="primary-text">functions</span></h3>
          <p>
            <div>
              <i class="fa fa-check"></i>  Shows Device’s Core Features.
              <i class="fa fa-check"></i> Shows the sent data from the Device as a table format.
              <i class="fa fa-check"></i> Users can search for data from the table. 
              <i class="fa fa-check"></i> Users can search the individual column also.
              <i class="fa fa-check"></i> Users can copy the data from table.
            </div> 
            <div>
              <i class="fa fa-check"></i> Users can download all or filtered data as csv or excel or pdf file format.<br>
              <i class="fa fa-check"></i> Users can print all or filtered data.
              <i class="fa fa-check"></i> Shows heatmap representing number of uses of the device from a particular area
            </div>
            <div>
              <i class="fa fa-check"></i> Shows bar chart representing greenness comparison of different location of Bangladesh<br>
              <i class="fa fa-check"></i> Shows bar chart representing total urea requirement for different location of Bangladesh
              <i class="fa fa-check"></i> Contact Form
            </div>
          </p>
        </div>
      </div>
    </div>
  </section>

  <!-- SUBHEADER -->
  <section id="subheader">
    <div class="container">
      <div class="row" data-aos="zoom-in-down">

        <div class="about-paragraph-icon"><img src="images/about-icon.png" alt=""></div>

        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
          <h1>Some Websites About LCC</h1>
        </div>
      </div>
    </div>

  </section>


  <div class="row end-sm end-md end-lg center-xs middle-xs middle-sm middle-md middle-lg" data-aos="flip-up">
    <div class="col-xs-12 col-sm-10 col-md-10 col-lg-10" id="lcc-websites">
      <ul>
        <li><a href="http://www.nitrogenparameters.com" target="_blank">nitrogenparameters.com</a></li>
        <li><a href="http://www.knowledgebank.irri.org/step-by-step-production/growth/soil-fertility/leaf-color-chart" target="_blank">knowledgebank.irri.org</a></li>
        <li><a href="http://knowledgebank-brri.org/?s=lcc" target="_blank">knowledgebank.brri.org</a></li>
      </ul>
    </div>
  </div>
  
  <?php include 'footer.php' ?>

</body>
</html>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.6.0/js/mdb.min.js"></script>

<script type="text/javascript" src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>

<script type="text/javascript" src="js/initialize_and_login.js"></script>




