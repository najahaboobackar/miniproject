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
      max-width: 100%;
      height: auto;
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
      if(isset($_SESSION["user"])){
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
  <form action="create-room.php" method="POST" enctype="multipart/form-data">
    <div class="mb-3">
      <label for="photo" class="form-label">Photo:</label>
      <input type="file" class="form-control" id="photo" name="photo">
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
      <label for="limit" class="form-label">Volunteer Limit:</label>
      <input type="number" class="form-control" id="limit" name="limit">
    </div>
    <button type="submit" class="btn btn-primary">Create Room</button>
  </form>
</div>

<div class="container mt-4">
  <h2>Recent Posts</h2>
  <?php
  // Retrieve and display posts from the database
  // Replace with your database connection code and query to fetch posts
  $posts = [
    ['photo' => 'path-to-photo1.jpg', 'venue' => 'Venue 1', 'date' => '2023-06-07', 'limit' => 10],
    ['photo' => 'path-to-photo2.jpg', 'venue' => 'Venue 2', 'date' => '2023-06-08', 'limit' => 5],
    // Add more posts as needed
  ];

  foreach ($posts as $post) {
    echo '<div class="post">';
    echo '<img src="' . $post['photo'] . '" alt="Post Photo">';
    echo '<p>Venue: ' . $post['venue'] . '</p>';
    echo '<p>Date: ' . $post['date'] . '</p>';
    echo '<p>Volunteer Limit: ' . $post['limit'] . '</p>';
    // Add any other information you want to display for each post
    echo '</div>';
  }
  ?>
</div>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
