<?php
session_start();

if (!isset($_SESSION['username'])) {
    header('Location: login.php');
    exit;
}
?>
<?php
// Database credentials
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "foodcorner";

// Create connection for contact query
$conn1 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn1->connect_error) {
    die("Connection failed: " . $conn1->connect_error);
}

// SQL query to fetch contact data
$sql1 = "SELECT id, fname, lname, mobile, email, messages FROM contact";
$result1 = $conn1->query($sql1);
?>

<?php
// Create connection for franchise query
$conn2 = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn2->connect_error) {
    die("Connection failed: " . $conn2->connect_error);
}

// SQL query to fetch franchise data
$sql2 = "SELECT id, fname, lname, nationality, mobile, email, firstname, city, country, notes FROM franchise";
$result2 = $conn2->query($sql2);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="dashboard.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid white;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
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
                <a class="nav-link" href="logout.php">Logout</a>
            </li>
        </ul>
    </div>
</nav>

<div class="cont1">
    <h2>Welcome, <?php echo $_SESSION['username']; ?></h2>

    <div class="con2">
        <h1>Contact List</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>Your Message</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result1->num_rows > 0) {
                // Output data of each row
                while($row = $result1->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["fname"]. "</td>
                            <td>" . $row["lname"]. "</td>
                            <td>" . $row["mobile"]. "</td>
                            <td>" . $row["email"]. "</td>
                            <td>" . $row["messages"]. "</td>
                            <td>
                                <button class='btn btn-warning edit-btn' data-id='" . $row["id"] . "'>Edit</button>
                                <button class='btn btn-warning delete-btn' data-id='" . $row["id"] . "'>Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='7'>No results found</td></tr>";
            }
            $conn1->close();
            ?>
        </table>
    </div>

    <div class="con3">
        <h1>Franchise</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>First Name</th>
                <th>Last Name</th>
                <th>Nationality</th>
                <th>Mobile</th>
                <th>Email</th>
                <th>First Name</th>
                <th>City</th>
                <th>Country</th>
                <th>Notes</th>
                <th>Actions</th>
            </tr>
            <?php
            if ($result2->num_rows > 0) {
                // Output data of each row
                while($row = $result2->fetch_assoc()) {
                    echo "<tr>
                            <td>" . $row["id"]. "</td>
                            <td>" . $row["fname"]. "</td>
                            <td>" . $row["lname"]. "</td>
                            <td>" . $row["nationality"]. "</td>
                            <td>" . $row["mobile"]. "</td>
                            <td>" . $row["email"]. "</td>
                            <td>" . $row["firstname"]. "</td>
                            <td>" . $row["city"]. "</td>
                            <td>" . $row["country"]. "</td>
                            <td>" . $row["notes"]. "</td>
                            <td>
                                <button class='btn btn-warning edit-btn1' data-id='" . $row["id"] . "'>Edit</button>
                                <button class='btn btn-warning delete-btn1' data-id='" . $row["id"] . "'>Delete</button>
                            </td>
                          </tr>";
                }
            } else {
                echo "<tr><td colspan='11'>No results found</td></tr>";
            }
            $conn2->close();
            ?>
        </table>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

<script>
    // Handle delete button click
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = `delete.php?id=${id}&type=contact`;
            }
        });
    });

    // Handle edit button click
    document.querySelectorAll('.edit-btn').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            window.location.href = `edit.php?id=${id}&type=contact`;
        });
    });

    document.querySelectorAll('.delete-btn1').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            if (confirm('Are you sure you want to delete this record?')) {
                window.location.href = `delete.php?id=${id}&type=franchise`;
            }
        });
    });

    // Handle edit button click
    document.querySelectorAll('.edit-btn1').forEach(button => {
        button.addEventListener('click', function() {
            const id = this.getAttribute('data-id');
            window.location.href = `edit.php?id=${id}&type=franchise`;
        });
    });
</script>

</body>
</html>
