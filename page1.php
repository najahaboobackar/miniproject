<!DOCTYPE html>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <style>
    .post {
      border: 1px solid #ccc;
      border-radius: 10px;
      padding: 20px;
      margin-bottom: 20px;
    }
    .post img {
      max-width: 40%;
      height: 300px;
    }
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-white">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
    </a>
    <h2 id="servit">SERVIT</h2>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-dark" href="#head">About Us</a>
      </li>
      <?php
      session_start();
      if(isset($_SESSION["posts"])){
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      } 
      ?>
    </ul>
  </div>
</nav>
<div class="top">
  <h1>Welcome to SERVIT</h1>
  <h4>Create Room</h4>
  <form action="page1.php" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label for="photo" class="form-label">Photo:</label>
<input type="file" class="form-control" id="photo" name="photo" onchange="previewImage(event)">
<img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; height: auto; margin-top: 10px;">

<script>
function previewImage(event) {
  var input = event.target;
  var preview = document.getElementById('imagePreview');

  if (input.files && input.files[0]) {
    var reader = new FileReader();

    reader.onload = function (e) {
      preview.src = e.target.result;
      preview.style.display = 'block';
    }

    reader.readAsDataURL(input.files[0]);
  } else {
    preview.src = '#';
    preview.style.display = 'none';
  }
}
</script>

    </div>
    <div class="mb-3">
      <label for="venue" class="form-label">Venue:</label>
      <input type="text" class="form-control" id="venue" name="venue">
    </div>
    <div class="mb-3">
      <label for="date" class="form-label">Date:</label>
      <input type="date" class="form-control" id="date" name="date">
    </div>
    <div class="mb-3">
      <label for="limit1" class="form-label">Volunteer Limit:</label>
      <input type="number" class="form-control" id="limit1" name="limit">
    </div>
    <button type="submit" class="btn btn-primary">Create Room</button>
  </form>
</div>

<div class="container mt-4">
  <h2>Recent Posts</h2>
  
  <?php

  // Database connection
  $servername = "localhost";
  $username = "root";
  $password = "";
  $dbname = "login_register";

  $conn = new mysqli($servername, $username, $password, $dbname);

  if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
  }

  // Check if the form is submitted
  if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $photo = $_FILES["photo"]["name"];
      $venue = $_POST["venue"];
      $date = $_POST["date"];
      $limit1 = $_POST["limit"];

      // Upload the photo file
      $targetDirectory = "uploads/"; // Specify the directory where you want to save the uploaded files
      $targetFile = $targetDirectory . basename($photo);
      move_uploaded_file($_FILES["photo"]["tmp_name"], $targetFile);

      // Prepare and execute the SQL query to insert the form data into the database
      $sql = "INSERT INTO posts (photo, venue, date, `limit1`) VALUES ('$photo', '$venue', '$date', $limit1)";
      if ($conn->query($sql) === TRUE) {
          echo "Post created successfully";
      } else {
          echo "Error creating post: " . $conn->error;
      }
  }

  // Retrieve and display posts from the database
  $sql = "SELECT * FROM posts";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo '<div class="post">';
          echo '<img src="uploads/' . $row['photo'] . '" class="card-img-top" alt="Post Photo"." width:50px">';

          echo '<p>Venue: ' . $row['venue'] . '</p>';
          echo '<p>Date: ' . $row['date'] . '</p>';
          echo '<p>Volunteer Limit: ' . $row['limit1'] . '</p>';
          // Add any other information you want to display for each post
          echo '</div>';
      }
  } else {
      echo "No posts found";
  }

  // Close the database connection
  $conn->close();
  ?>

</div>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
