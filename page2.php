<!DOCTYPE html>
<html lang="en">
<head>
  <title>home</title>
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
      if(isset($_SESSION["user"])){
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      } 
      ?>
    </ul>
  </div>
</nav>

<div class="body">
  <img src="helpingyourcommunity1024x674-1@2x.png" style="height: 741px;" width="1349px" alt="Image">
</div>

<div class="bottom">
  <h1 id="head">
    About Us
  </h1>
  <p id="about">
    Welcome to SERVIT, a dedicated platform for volunteering and making a positive impact on communities. Our mission is to connect passionate individuals with meaningful volunteer opportunities. We believe in the power of collective action and strive to create a world where everyone has the chance to contribute their time and skills for the betterment of society. Through our user-friendly platform, we aim to inspire and empower individuals to take part in various volunteer projects, ranging from environmental conservation and education to humanitarian aid and community development. Join us in making a difference and be a part of the change!
  </p>
</div>

<div class="work">
  <div class="card" style="width: 21rem;">
    <img src="helpingyourcommunity1024x674-1@2x.png" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div class="card" style="width: 21rem;">
    <img src="" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div></div>
  <div class="card" style="width: 21rem;">
    <img src="" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
  <div class="card" style="width: 21rem;">
    <img src="" class="card-img-top" alt="...">
    <div class="card-body">
      <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
    </div>
  </div>
</div>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
