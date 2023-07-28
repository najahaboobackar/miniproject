<?php
session_start();

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Logout logic
if (isset($_GET['logout'])) {
    session_destroy();
    header("Location: page1.php");
    exit();
}

// Retrieve room participants data with name, phone, venue, and corresponding posts data
$sql = "SELECT rp.name, rp.phone, rp.room_id, p.photo, p.date as post_date, p.venue as post_venue
        FROM room_participants rp
        LEFT JOIN posts p ON rp.room_id = p.id";
$result = $conn->query($sql);

$currentDate = date("Y-m-d");
$displayedPhotos = []; // Array to track the displayed photos

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Details</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-black">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
    </a>
    <h2 id="servit" style="color:white;">SERVIT</h2>
    <ul class="navbar-nav ml-auto">
      
      <?php
      if (isset($_SESSION["posts"])) {
          echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
      } else {
          echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
      }
      ?>
    </ul>
  </div>
</nav>

<div class="container mt-4">
    <h2>Participant Details</h2>

    <?php
    if ($result && $result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            $roomId = $row['room_id'];
            $displayPhoto = !in_array($roomId, $displayedPhotos); // Check if photo should be displayed

            echo '<div class="post">';
            if ($displayPhoto && isset($row['photo'])) { // Display photo only once for each room_id
                echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" width="50px">';
                $displayedPhotos[] = $roomId; // Add room_id to displayed photos
            }
            echo '<table class="table">';
            echo '<thead class="thead-dark">
                    <tr>
                        <th>Name</th>
                        <th>Phone</th>
                        <th>Date</th>
                        <th>Venue</th>
                    </tr>
                </thead>';
            echo '<tbody>';
            echo '<tr>';
            echo '<td>' . $row['name'] . '</td>';
            echo '<td>' . $row['phone'] . '</td>';
            echo '<td>' . $row['post_date'] . '</td>';
            echo '<td>' . $row['post_venue'] . '</td>';
            echo '</tr>';
            echo '</tbody>';
            echo '</table>';
            echo '</div>';
        }
    } else {
        echo "No participants found";
    }

    // Close the database connection
    $conn->close();
    ?>
<style>
.post {
    border: 1px solid #ccc;
    border-radius: 10px;
    padding: 20px;
    margin-bottom: 20px;
    background-color: #ecf0f5;
    BOX-SHADOW: 2px 10px 10px;
}
body{
    margin:0px
}

    </style>

    <!-- Add Bootstrap JavaScript links if needed -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
