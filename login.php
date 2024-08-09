<?php
// Start the session
session_start();

// Enable error reporting
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check if the user is already logged in
if (isset($_SESSION['username'])) {
    header("location: dashboard.php");
    exit;
}

// Include the database configuration file
require_once "dbconfig.php";

$username = $pword = "";
$err = "";

// If request method is post
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    // Check if username and password are empty
    if (empty(trim($_POST['username'])) || empty(trim($_POST['pword']))) {
        $err = "Please enter username and password.";
    } else {
        $username = trim($_POST['username']);
        $pword = trim($_POST['pword']);
    }

    // If no errors, proceed with login
    if (empty($err)) {
        $sql = "SELECT id, username, pword FROM registerp WHERE username = ?";
        if ($stmt = $conn->prepare($sql)) {
            $stmt->bind_param("s", $username);
            
            if ($stmt->execute()) {
                $stmt->store_result();
                if ($stmt->num_rows == 1) {
                    $stmt->bind_result($id, $username, $hashed_password);
                    if ($stmt->fetch()) {
                        if (password_verify($pword, $hashed_password)) {
                            // Password is correct, start a new session
                            session_start();
                            $_SESSION["username"] = $username;
                            $_SESSION["id"] = $id;
                            $_SESSION["loggedin"] = true;
                            $sql = "INSERT INTO login (username, pword) VALUES ('$username', '$pword')";

                            // Redirect user to dashboard
                            header("location: dashboard.php");

                            exit;
                        } else {
                            // Invalid password
                            $err = "Invalid password.";
                        }
                    }
                } else {
                    // No account found with that username
                    $err = "No account found with that username.";
                }
            } else {
                // Statement execution failed
                $err = "Something went wrong. Please try again later.";
            }

            $stmt->close();
        } else {
            // Statement preparation failed
            $err = "Something went wrong. Please try again later.";
        }
    }

    // Display error if any
    if (!empty($err)) {
        echo "<div class='alert alert-danger' role='alert'>$err</div>";
    }

    $conn->close();
}
?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="login.css">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <title>PHP Login System!</title>
</head>
<body>
<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
   <div class="asset"> <a><img src="images1/Asset 2@300x-8 1.png" alt=""></a></div>

    <div class="collapse navbar-collapse" id="navbarNavDropdown">
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="register.php">Register</a>
            </li>
          
        </ul>
    </div>
</nav>
<div class="cont1">
<div class="container">
    <h3>Please Login Here:</h3>
    <hr>
    <form action="login.php" method="post">
        <div class="form-group">
            <label for="exampleInputEmail1">Username</label>
            <input type="text" name="username" class="form-control" placeholder="Enter Username" required>
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" name="pword" class="form-control" id="exampleInputPassword1" placeholder="Enter Password" required>
        </div>
        <button class="btn-dark2" type="submit">Login</button>
    </form>
</div>
</div>
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>
