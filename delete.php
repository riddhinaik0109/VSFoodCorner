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

    if ($type == 'contact') {
        $sql = "DELETE FROM contact WHERE id=$id";
    } elseif ($type == 'franchise') {
        $sql = "DELETE FROM franchise WHERE id=$id";
    }

    if ($conn->query($sql) === TRUE) {
        header('Location: dashboard.php');
    } else {
        echo "Error deleting record: " . $conn->error;
    }

    $conn->close();
} else {
    header('Location: dashboard.php');
}
?>
