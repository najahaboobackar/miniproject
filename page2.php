<?php
session_start();

// page1.php

// Database connection
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Check if a specific join button is clicked
if (isset($_POST['p']) && isset($_POST['join'])) {
    $roomId = $_POST['p'];
    $venue = $_POST['venue'];
    $date = $_POST['date'];
    $limit = $_POST['limit1'];
    $phone = $_POST['phone'];
    $name = $_POST['name'];
    $current_limit = 0;

    // Get the current limit from the database
    $selectQuery = "SELECT limit2, limit1 FROM posts WHERE id = '$roomId'";
    $result = $conn->query($selectQuery);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $current_limit = $row['limit2'];
        $max_limit = $row['limit1'];

        // Check if the current limit is already at the maximum limit
        if ($current_limit < $max_limit) {
            // Increment the limit by 1
            $current_limit++;

            // Update the limit in the posts table
            $updateQuery = "UPDATE posts SET limit2 = '$current_limit' WHERE id = '$roomId'";
            $conn->query($updateQuery);

            // Copy participant details to room_participants table
            $insertQuery = "INSERT INTO room_participants (room_id, name, phone) VALUES ('$roomId', '$name', '$phone')";
            $conn->query($insertQuery);

            // Display a success message
            echo '<div class="container mt-4">';
            echo '<h2>Join Room</h2>';
            echo '<div class="alert alert-success" role="alert">';
            echo 'You have successfully joined the room!';
            echo '</div>';
            echo '</div>';
        } else {
            // Display an error message when the limit is reached
            echo '<div class="container mt-4">';
            echo '<h2>Join Room</h2>';
            echo '<div class="alert alert-danger" role="alert">';
            echo 'Sorry, the room is already full.';
            echo '</div>';
            echo '</div>';
        }
    }
}

// Retrieve and display posts from the database
$sql = "SELECT * FROM posts ORDER BY id DESC";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Join Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style1.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-black">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
    </a>
    <h2 id="servit" style="color:white;">SERVIT</h2>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#head">About Us</a>
      </li>
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
<style>#text{margin-left:0px}</style>
<div id="text" class="container mt-4">
<h2 class="join-room-heading" style="color: black; padding-left: 0;">Join Room</h2>
  <p id="quote" style="font-style: italic; color: black; font-size: 18px; text-align: left;"></p>
</div>

<script>
  // Array of text content to display in a loop
  var textArray = [
    "Join our family",
    "Never doubt that a small group of thoughtful, committed citizens can change the world; indeed, it's the only thing that ever has.....!"
  ];

  var quoteElement = document.getElementById("quote");
  var index = 0;

  // Function to animate and loop through the text content
  function animateText() {
    quoteElement.innerHTML = textArray[index];

    

    // Increment the index for the next text content
    index = (index + 1) % textArray.length;
  }

  // Call the animateText function initially
  animateText();

  // Call the animateText function in a loop with a delay of 5 seconds
  setInterval(animateText, 3000);
</script>

<style>
  /* Add your custom CSS styles here */
  @keyframes textMotion {
    0% { transform: translateY(0); }
    100% { transform: translateY(-10px); }
  }
  .custom-button {
  background-color: black;
  border-color: black;
}

</style>


  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo '<div class="post" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; width: 48%; float: left; margin-right: 2%; margin-bottom: 2%;">';
          if (isset($row['photo'])) { // Check if 'photo' key is set
              echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" style="width: 100%; height: auto;">';
          }
          echo '<p>Venue: ' . $row['venue'] . '</p>';
          echo '<p>Date: ' . $row['date'] . '</p>';
          echo '<p>Volunteer Limit: ' . $row['limit2'] . '/' . $row['limit1'] . '</p>';
          echo '<p>Email: ' . $row['email'] . '</p>';

          // Add the join button and form to submit the post details to page1.php
          echo '<form method="POST">';
          echo '<input type="hidden" name="p" value="' . $row['id'] . '">';
          echo '<input type="hidden" name="venue" value="' . $row['venue'] . '">';
          echo '<input type="hidden" name="date" value="' . $row['date'] . '">';
          echo '<input type="hidden" name="limit1" value="' . $row['limit2'] . '/' . $row['limit1'] . '">';
          echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
          echo '<input type="text" name="name" placeholder="Enter your name" required>'; // Add input field for the name
          echo '<input type="text" name="phone" placeholder="Phone number" required>'; 
          echo '<button type="submit" name="join" class="btn btn-primary custom-button">Join</button>';

          echo '</form>';

          echo '</div>';
      }
  } else {
      echo "No posts found";
  }
  $conn->close();
  ?>
</div>







  

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
