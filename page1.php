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
      session_start();
      if(isset($_SESSION["posts"])){
        echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
      } else { 
        echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
             echo '<li class="nav-item">
                <a class="nav-link text-white" href="detail.php">details</a>
              </li>';
      }
      ?>
    </ul>
  </div>
</nav>
<style>#name{padding-left: 500px;padding-top: 30px}
#name1{padding-left: 618px;padding-top: 17px}
</style>
<div class="top">
  <h1 id="name">WELCOME TO SERVIT </h1>
  <h4 id="name1">Create Room</h4>
  <form method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="photo" class="form-label">Photo:</label>
      <input type="file" class="form-control" id="photo" name="photo" onchange="previewImage(event)">
      <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 50%; height: auto; margin-top: 10px;">
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
    <style>.mb-3{
    padding-left: 350px;
    padding-right: 350px;
    }
    #btn{margin-left:618px}
    .post{margin-left:;
    margin-right: 450px;}
    .card-img-top{
      width:500px;
    }
    </style>
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
    <div class="mb-3">
      <label for="email" class="form-label">Email:</label>
      <input type="email" class="form-control" id="email" name="email">
    </div>
    <button type="submit" class="btn btn-primary custom-button" id="btn">Create Room</button>
<style> .custom-button {
  background-color: black;
  border-color: black;
}
</style>
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

  // Handle form submission
  if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $venue = $_POST["venue"];
    $date = $_POST["date"];
    $limit = $_POST["limit"];
    $email = $_POST["email"];

    // Retrieve the uploaded photo details
    $photo = $_FILES["photo"];
    $photoName = $photo["name"];
    $photoTmpName = $photo["tmp_name"];
    $photoError = $photo["error"];

    // Move the uploaded photo to the uploads directory
    $targetDirectory = "uploads/";
    $targetFilePath = $targetDirectory . basename($photoName);
    move_uploaded_file($photoTmpName, $targetFilePath);

    // Insert the post details and photo path into the database
    $sql = "INSERT INTO posts (venue, date, limit1, email, photo) VALUES ('$venue', '$date', '$limit', '$email', '$targetFilePath')";
    if ($conn->query($sql) === TRUE) {
      echo "Post created successfully";
    } else {
      echo "Error: " . $sql . "<br>" . $conn->error;
    }
  }

  // Retrieve and display posts from the database
  $sql = "SELECT * FROM posts ORDER BY id DESC";
  $result = $conn->query($sql);

  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
      echo '<div class="post">';
      echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" width="200px">';
      echo '<p>Venue: ' . $row['venue'] . '</p>';
      echo '<p>Date: ' . $row['date'] . '</p>';
      echo '<p>Volunteer Limit: ' . $row['limit1'] . '</p>';
      echo '<p>Email: ' . $row['email'] . '</p>';
      

      // Add the join button and form to submit the post details to page1.php
      echo '<form method="POST">';
      echo '<input type="hidden" name="p" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="venue" value="' . $row['venue'] . '">';
      echo '<input type="hidden" name="date" value="' . $row['date'] . '">';
      echo '<input type="hidden" name="limit1" value="' . $row['limit1'] . '">';
      echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
      echo '<input type="hidden" name="photo" value="' . $row['photo'] . '">';
      echo '</form>';

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