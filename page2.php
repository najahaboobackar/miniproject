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
      } else {
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      }
      ?>
    </ul>
  </div>
</nav>

<div class="container mt-4">
  <h2>Join Room</h2>

   
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
  // Retrieve and display posts from the database
  $sql = "SELECT * FROM posts";
  $result = $conn->query($sql);

  
  if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo '<div class="post">';
        echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" width="50px">';
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
        echo '<button type="submit" class="btn btn-primary">Join</button>';
        
      
        
        
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



</div>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
