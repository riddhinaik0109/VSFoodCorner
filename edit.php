<?php
session_start();
if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}

if (isset($_GET['id']) && isset($_GET['type'])) {
    $id = $_GET['id'];
    $type = $_GET['type'];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "foodcorner";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Process form data
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $mobile = $_POST['mobile'];
        $email = $_POST['email'];

        if ($type == 'contact') {
            $messages = $_POST['messages'];
            $sql = "UPDATE contact SET fname='$fname', lname='$lname', mobile='$mobile', email='$email', messages='$messages' WHERE id=$id";
        } elseif ($type == 'franchise') {
            $nationality = $_POST['nationality'];
            $firstname = $_POST['firstname'];
            $city = $_POST['city'];
            $country = $_POST['country'];
            $notes = $_POST['notes'];
            $sql = "UPDATE franchise SET fname='$fname', lname='$lname', nationality='$nationality', mobile='$mobile', email='$email', firstname='$firstname', city='$city', country='$country', notes='$notes' WHERE id=$id";
        }

        if ($conn->query($sql) === TRUE) {
            header('Location: dashboard.php');
        } else {
            echo "Error updating record: " . $conn->error;
        }
    } else {
        // Fetch data
        if ($type == 'contact') {
            $sql = "SELECT * FROM contact WHERE id=$id";
        } elseif ($type == 'franchise') {
            $sql = "SELECT * FROM franchise WHERE id=$id";
        }
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    }

    $conn->close();
} else {
    header('Location: dashboard.php');
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Record</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="edit.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

</head>
<body>
    <div class="cont1">
    <h2>Edit Record</h2>
    <form method="post">
        <label>First Name:</label><br>
        <input type="text" name="fname" value="<?php echo $row['fname']; ?>"><br>
        <label>Last Name:</label><br>
        <input type="text" name="lname" value="<?php echo $row['lname']; ?>"><br>
        <label>Mobile:</label><br>
        <input type="text" name="mobile" value="<?php echo $row['mobile']; ?>"><br>
        <label>Email:</label><br>
        <input type="text" name="email" value="<?php echo $row['email']; ?>"><br>
        <?php if ($type == 'contact'): ?>
            <label>Message:</label><br>
            <textarea name="messages"><?php echo $row['messages']; ?></textarea><br>
        <?php elseif ($type == 'franchise'): ?>
            <label>Nationality:</label><br>
            <input type="text" name="nationality" value="<?php echo $row['nationality']; ?>"><br>
            <label>First Name:</label><br>
            <input type="text" name="firstname" value="<?php echo $row['firstname']; ?>"><br>
            <label>City:</label><br>
            <input type="text" name="city" value="<?php echo $row['city']; ?>"><br>
            <label>Country:</label><br>
            <input type="text" name="country" value="<?php echo $row['country']; ?>"><br>
            <label>Notes:</label><br>
            <textarea name="notes"><?php echo $row['notes']; ?></textarea><br>
        <?php endif; ?>
        <button class="btn-dark2" type="submit">Edit</button>
    </form>
        </div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body>
</html>
