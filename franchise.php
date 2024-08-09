<?php

error_reporting(0);
require_once('dbconfig.php');

$fname =  $_REQUEST['fname'];
$lname =  $_REQUEST['lname'];
$nationality =  $_REQUEST['nationality'];
$mobile =  $_REQUEST['mobile'];
$email =  $_REQUEST['email'];
$firstname =  $_REQUEST['firstname'];
$city =  $_REQUEST['city'];
$country =  $_REQUEST['country'];
$notes =  $_REQUEST['notes'];


$sql = "INSERT INTO franchise(fname,lname,nationality,mobile,email,firstname,city,country,notes) VALUES('$fname','$lname','$nationality','$mobile','$email','$firstname','$city','$country','$notes')";



  // Escape user inputs to prevent SQL injection
  $fname = mysqli_real_escape_string($conn, $fname);
  $lname = mysqli_real_escape_string($conn, $lname);
  $nationality = mysqli_real_escape_string($conn, $nationality);
  $mobile = mysqli_real_escape_string($conn, $mobile);
  $email = mysqli_real_escape_string($conn, $email);
  $firstname = mysqli_real_escape_string($conn, $firstname);
  $city = mysqli_real_escape_string($conn, $city);
  $country = mysqli_real_escape_string($conn, $country);
  $notes = mysqli_real_escape_string($conn, $notes);


  // Attempt to insert data
  $sql = "INSERT INTO franchise (fname, lname, nationality, mobile, email, firstname, city, country, notes) VALUES ('$fname', '$lname', '$nationality', '$mobile', '$email', '$firstname', '$city', '$country', '$notes')";
  if (mysqli_query($conn, $sql)) {
      echo "Records inserted successfully.";
  } else {
      echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
  }

  // Close the connection
  mysqli_close($conn);

?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Foodie Corner</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="franchise.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-sm  navbar-light">
     
          <a class="navbar-brand" href="#"><img src="images1/Asset 2@300x-8 1.png" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbar1">
              <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbar1">
              <ul class="navbar-nav">
                  <li class="nav-item active">
                      <a class="nav-link" href="index.php">HOME</a>
                  </li>
                  <li class="nav-item">
                      <a class="nav-link" href="who.php">WHO ARE WE</a>
                  </li>
                  <li class="nav-item ">
                    <a class="nav-link" href="location.php">OUR LOCATION</a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link" href="gallery.php">GALLERY</a>
              </li>
              <li class="nav-item ">
                <a class="nav-link" href="founder.php">FOUNDER DESK</a>
            </li>
            <li class="nav-item ">
              <a class="nav-link" href="franchise.php">FRANCHISE</a>
          </li>
          <li class="nav-item ">
            <a class="nav-link" href="contact.php">CONTACT US</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
          </li>
        <li class="nav-item ">
          <a class="nav-link" href="#"><img src="images1/Vector.png" alt=""></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#"><img src="images1/Vector (1).png" alt=""></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="#"><img src="images1/Group 481.png" alt=""></a>
  </li>
              </ul>
          </div>  
  </nav>

  <div class="con1">
    <h1>Be Your Own Boss,<br>Be Our Franchisee</h1>
  </div>


  <div class="con2">

        <div class="con2a">
        <h2>Vs Foodie Corner Franchise Application Form</h2>
        <hr>
        </div>


        <div class="con2b">
        <div class="container d-flex justify-content-center">
    <div class="contact px-5 py-5 w-100">
        
        
        <div class="con2c">
        <p>Personal Details</p>
        </div>
  <form action="franchise.php" method='post'>
        <div class="row">
            <div class="col-md-13"> <input type="text" name="fname" class="form-control" placeholder="First Name" /> </div>
        </div>
        <div class="row">
            <div class="col-md-13"> <input type="text" name="lname" class="form-control" placeholder="Last Name" /> </div>
        </div>
        <div class="row">
            <div class="col-md-13"> <input type="text" name="nationality" class="form-control" placeholder="Nationality" /> </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <input type="text" name="mobile"  class="form-control" placeholder="Mobile" /> </div>
            <div class="col-md-6"> <input type="text" name="email" class="form-control" placeholder="Enter Email" /> </div>
        </div>

        <div class="con2d">
        <p>Franchise Details</p>
        </div>
        <div class="row">
            <div class="col-md-13"> <input type="text" name="firstname" class="form-control" placeholder="First Name" /> </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <input type="text" name="city" class="form-control" placeholder="City" /> </div>
            <div class="col-md-6"> <input type="text" name="country" class="form-control" placeholder="Country" /> </div>
        </div>

        <div class="con2d">
        <p>FOR VS Foodie Corner</p>
        </div>
        <div class="row mt-1">
            <div class="col-md-12"> 
                <textarea rows="3" name="notes" class="form-control" placeholder="Notes"></textarea> 
            </div>
        </div>

        <div class="con5b2">
        <button class="btn-dark2" type="submit">Submit Form</button>
        </div>

    </div>
</div>
</form>

        </div>

        
        <div class="cont8">


<!-- Footer -->
<footer class="text-center text-lg-start">
  <!-- Section: Social media -->

  <!-- Section: Links  -->
  <section class="">
    <div class="container text-center text-md-start mt-5">
      <!-- Grid row -->
      <div class="row mt-3">
        <!-- Grid column -->
        <div class="col-md-3 col-lg-4 col-xl-3 mx-auto mb-4">
          <!-- Content -->
         <img src="images1/Asset 2@300x-8 1.png"><br>
          <p>Satisfy your cravings for <br>deliciousness at VS Foodie Corner 
          <br>- Where every dish is an exquisite <br>skillful creation.
          </p>
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            ADDRESS
          </h6><br>
          <p>
            <a>58 Ralph Ave
New York, New York 1111</a>
          </p>
          <p>
            <a>P: +1 800 000 111
E: contact@example.com</a>
          </p>
         
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">
            QUICK LINKS
          </h6><br>
          <p>
          <a href="index.php" class="link-light">Home</a>
          </p>
          <p>
          <a href="who.php" class="link-light">Who We Are</a>
          </p>
          <p>
          <a href="location.php" class="link-light">Our Locations</a>
          </p>
          <p>
          <a href="gallery.php" class="link-light">Gallery</a>
          </p>
          <p>
          <a href="founder.php" class="link-light">Founders Desk</a>
          </p>
          <p>
          <a href="franchise.php" class="link-light">Franchise</a>
          </p>
          <p>
          <a href="contact.php" class="link-light">Contact Us</a>
          </p>
         
        </div>
        <!-- Grid column -->

        <!-- Grid column -->
        <div class="col-md-4 col-lg-3 col-xl-3 mx-auto mb-md-0 mb-4">
          <!-- Links -->
          <h6 class="text-uppercase fw-bold mb-4">OPEN HOURS</h6><br>
          <p>Monday – Sunday</p>
          <p>Lunch: 12PM – 2PM</p>
          <p>Dinner: 6PM – 10PM</p><br>
          <p>Happy Hours: 4PM – 6PM</p>
        </div>
        <!-- Grid column -->
      </div>
      <!-- Grid row -->
    </div>
  </section>
  <!-- Section: Links  -->
  <!-- Copyright -->

<div class="cont11f">
  <hr>
          <div class="cont11f2">
          2023 © foodie corner.
          </div>
          <div class="cont11f3">
          <a href="#"><img src="images1/Vector.png" alt=""></a>
          <a href="#"><img src="images1/Vector (1).png" alt=""></a>
          <a href="#"><img src="images1/Group 481.png" alt=""></a>
          </div>
      </div>
  <!-- Copyright -->
</footer>
<!-- Footer -->
</div>








<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  
</body>
</html>


