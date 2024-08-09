<?php

error_reporting(0);
require_once('dbconfig.php');

$fname =  $_REQUEST['fname'];
$lname =  $_REQUEST['lname'];
$mobile =  $_REQUEST['mobile'];
$email =  $_REQUEST['email'];
$messages =  $_REQUEST['messages'];

$sql = "INSERT INTO contact(fname,lname,mobile,email,messages) VALUES('$fname','$lname','$mobile','$email','$messages')";

// Check if all required fields are filled
if (!empty($fname) && !empty($lname) && !empty($mobile) && !empty($email) && !empty($messages)) {

  // Create a database connection
  $conn = mysqli_connect($servername, $username, $password, $dbname);

  // Check if the connection is successful
  if ($conn === false) {
      die("ERROR: Could not connect. " . mysqli_connect_error());
  }

  // Escape user inputs to prevent SQL injection
  $fname = mysqli_real_escape_string($conn, $fname);
  $lname = mysqli_real_escape_string($conn, $lname);
  $mobile = mysqli_real_escape_string($conn, $mobile);
  $email = mysqli_real_escape_string($conn, $email);
  $messages = mysqli_real_escape_string($conn, $messages);

  // Attempt to insert data
  $sql = "INSERT INTO contact (fname, lname, mobile, email, messages) VALUES ('$fname', '$lname', '$mobile', '$email', '$messages')";
  if (mysqli_query($conn, $sql)) {
      echo "Records inserted successfully.";
  } else {
      echo "ERROR: Could not execute $sql. " . mysqli_error($conn);
  }

  // Close the connection
  mysqli_close($conn);
} else {
  echo "Please fill all the fields.";
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="contact.css" />
  <title>Contact</title>
  <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

</head>
<body>

<div class="cont1">

      <nav class="navbar navbar-expand-sm navbar-light">
  <div class="container-fluid">
    <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
    
      <ul id="nav" class="navbar-nav">
       <div class="asset"> <a><img src="images1/Asset 2@300x-8 1.png" alt=""></a></div>
<div class="cont0">
        <li class="active nav-item">
          <a class="nav-link" href="index.php">HOME</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="who.php">WHO WE ARE</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="location.php">OUR LOCATIONS</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="gallery.php">GALLERY</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="founder.php">FOUNDER DESK</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="franchise.php">FRANCHISE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contact.php">CONTACT US</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="login.php">LOGIN</a>
          </li>
          <div class="social">
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="images1/Vector.png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="images1/Vector (1).png"></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><img src="images1/Group 481.png"></a>
          </li> 
        </div>
    </div>
      </ul>
</nav>

<div class="cont2">
<h1>Contact Us</h1>
<p>We’re Easy To Get In Touch With</p>
</div>
</div>

<div class="cont03">
<div class="cont3">

<div class="cont3a">
<h3>Get Into Touch</h3>
<hr>
<p><b>Address :</b><br>
4<br>New York, New York 1111<br>
<b>Phone :</b> +1 800 000 111<br>
<b>Email :</b> contact@example.com</p>
</div>

<div class="cont3b">

<div class="container d-flex justify-content-center">
    <div class="contact px-5 py-5 w-100">
        <form action="contact.php" method='post'>
        <div class="row">
            <div class="col-md-6"> <input type="text" name="fname" class="form-control" placeholder="Enter your First Name" /> </div>
            <div class="col-md-6"> <input type="text" name="lname" class="form-control" placeholder="Enter Your Last Name" /> </div>
        </div>
        <div class="row">
            <div class="col-md-6"> <input type="text" name="mobile" class="form-control" placeholder="Phone Number" /> </div>
            <div class="col-md-6"> <input id="date" type="text" name="email" class="form-control" placeholder="Email Address" /> </div>
        </div>
        <div class="row mt-3">
            <div class="col-md-12"> 
                <textarea rows="6" name="messages" class="form-control" placeholder="Your Message"></textarea> </div>
            
        </div>
        <div class="pull-left">
           <button class="btn-dark2" type="submit">Send Message</button>

        </div>
</form>
    </div>
</div>
</div>
</div>
</div>

<div class="ratio">
  <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d96714.68291250926!2d-74.05953969406828!3d40.75468158321536!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x89c2588f046ee661%3A0xa0b3281fcecc08c!2sManhattan%2C%20Nowy%20Jork%2C%20Stany%20Zjednoczone!5e0!3m2!1spl!2spl!4v1672242259543!5m2!1spl!2spl"  
    allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
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
          <a href="farnchise.php" class="link-light">Franchise</a>
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