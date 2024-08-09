<?php
    $username = "root";
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $servername = "localhost";
    $password = "";
    $dbname = "foodcorner";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Sanitize and hash the password
    $username = $conn->real_escape_string($_POST['username']);
    $pword = password_hash($_POST['pword'], PASSWORD_BCRYPT);

    // Insert user into the database
    $sql = "INSERT INTO registerp (username, pword) VALUES ('$username', '$pword')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful";
        header("location: login.php");
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="register.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
<div class="asset"> <a><img src="images1/Asset 2@300x-8 1.png" alt=""></a></div>
   
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="login.php">Login</a>
            </li>
        </ul>
    </div>
</nav>


<div class="cont1">
<div class="log"><h2>Register</h2></div>
<div class="container d-flex justify-content-center">
    <div class="contact px-5 py-5 w-100">
    <form action="register.php" method="post">
    <div class="row">
    <label for="username">Username </label>
    <div class="col-md-6"><input type="text" id="username" name="username" required><br></div></div>
    <div class="row">
    <label for="password">Password </label>
        <div class="col-md-6"><input type="password" id="password" name="pword" required><br></div></div>
        <button class="btn-dark2" type="submit">Register</button>

    </form>
</div>
</div>
</div>




    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
