<!DOCTYPE html>
<html lang="en">
<head>
  <title>home</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="style1.css">
  <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
  <style>
    /* Add your custom CSS styles here */
    .navbar {
      background-color: #f8f9fa;
      border-bottom: 1px solid #dee2e6;
    }

    .navbar-brand {
      display: flex;
      align-items: center;
      font-weight: bold;
      color: #343a40;
    }

    .navbar-brand img {
      margin-right: 5px;
    }

    .navbar-nav .nav-link {
      color: #343a40;
    }

    .navbar-nav .nav-link:hover {
      color: #007bff;
    }

    .dropdown-menu {
      background-color: #f8f9fa;
    }

    .dropdown-item {
      color: #343a40;
    }

    .dropdown-item:hover {
      background-color: #007bff;
      color: #fff;
    }

    .body {
      position: relative;
      
      overflow: hidden;
    }

    .image-container {
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      
      background-repeat: no-repeat;
      background-size: cover;
      background-position: center;
    }

    
.bottom {
  text-align: center;
  padding: 20px 0; /*Reduced padding to reduce the height of the container*/
}



    .bottom h1 {
      font-size: 40px;
      font-weight: bold;
      color: #343a40;
    }

    .bottom p {
      font-size: 18px;
      color: #343a40;
      line-height: 1.6;
    }

    .steps-container {
      display: flex;
      justify-content: center;
      align-items: center;
      margin-top: 50px;
    }

    .step {
      text-align: center;
      margin: 0 30px;
      opacity: 0;
      transform: translateY(50px);
      transition: opacity 0.5s ease-in-out, transform 0.5s ease-in-out;
    }

    .step.visible {
      opacity: 1;
      transform: translateY(0);
    }

    .step-icon {
      font-size: 48px;
      color: #007bff;
      margin-bottom: 10px;
    }

    .step-title {
      font-size: 24px;
      font-weight: bold;
      margin-bottom: 10px;
    }

    .step-description {
      font-size: 18px;
      margin-bottom: 20px;
    }

    .quote-container {
      
      text-align: center;
      padding: 70px 0;
      background-color: #f8f9fa;
    }

    .quote-container::after {
      content: "";
      position: absolute;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url('background-image.jpg');
      background-repeat: no-repeat;
      background-size: cover;
      opacity: 0.8;
      z-index: -1;
    }

    .quote-text {
      font-size: 24px;
      color: black;
      animation: slideIn 1s ease-in-out;
      animation-delay: 0.5s;
      animation-fill-mode: forwards;
    }

    .footer {
  background-color: #343a40;
  color: #fff;
  padding: 10px 0; /* Reduced padding from 20px to 10px */
  text-align: center;

}


    .footer a {
      color: #fff;
      text-decoration: none;
      margin: 0 10px;
    }

    .footer a:hover {
      color: #007bff;
    }

    /* Animation */
    @keyframes fadeIn {
      0% { opacity: 0; }
      100% { opacity: 1; }
    }

    @keyframes slideIn {
      0% { transform: translateY(50px); }
      100% { transform: translateY(0); }
    }

    @keyframes arrowBounce {
      0%, 100% { transform: translateY(0); }
      50% { transform: translateY(-10px); }
    }


    /* Add more custom styles as needed */

    .container1{
  width:100vw;
  height:80vh;
  display:flex;
  justify-content:center;
  align-items:center;
}
.slider {
  height: 750px;
  width:100vw;
  display: flex;
  perspective: 1000px;
  position: relative;
  align-items:center;
}
.box1{      background:url('https://images.pexels.com/photos/842711/pexels-photo-842711.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box2{
background:url('https://images.pexels.com/photos/2559941/pexels-photo-2559941.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box3{
background:url('https://images.pexels.com/photos/2356059/pexels-photo-2356059.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box4{
background:url('https://images.pexels.com/photos/3274903/pexels-photo-3274903.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box5{
background:url('https://images.pexels.com/photos/3618162/pexels-photo-3618162.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box6{
background:url('https://images.pexels.com/photos/4256852/pexels-photo-4256852.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}
.box7{
background:url('https://images.pexels.com/photos/1891234/pexels-photo-1891234.jpeg?auto=compress&cs=tinysrgb&w=1260&h=750&dpr=1');
  background-size:cover;
  background-position:center center;}

.slider [class*="box"] {
/*   float: left; */
  overflow: hidden;
  border-radius:20px;
  transition: all 1s cubic-bezier(0.68, -0.6, 0.32, 1.6);
    position:absolute;
}
.slider [class*="box"]:nth-child(7),
.slider [class*="box"]:nth-child(1) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.2) translate(-50%,-50%);
  top: 10%;
  z-index:1;
}
.slider [class*="box"]:nth-child(2),
.slider [class*="box"]:nth-child(6) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.4) translate(-50%,-50%);
  top: 20%;
  z-index:2;
}
.slider [class*="box"]:nth-child(3),
.slider [class*="box"]:nth-child(5) {
  width: 100vh;
  height: 60vh;
  transform: scale(0.6) translate(-50%,-50%);
  top: 30%;
  z-index:3;
}
.slider [class*="box"]:nth-child(4) {
  width: 60vw;
  height: 60vh;
  border-color: #c92026;
  color: #fff;
  transform: scale(1) translate(-50%,-50%);
  top: 50%;
  z-index:4;
}
.slider [class*="box"]:nth-child(1){
  left:-13%;}
.slider [class*="box"]:nth-child(2){
  left:-5%;}
.slider [class*="box"]:nth-child(3){
  left:10%;}
.slider [class*="box"]:nth-child(4){
  left:50%;}
.slider [class*="box"]:nth-child(5){
  left:71%;}
.slider [class*="box"]:nth-child(6){
  left:85%;}
.slider [class*="box"]:nth-child(7){
  left:100%;}
.slider .firstSlide {
    -webkit-animation:  firstChild 1s;
    animation:  firstChild 1s;
}
/*Animation for buyers landing page slider*/
@-webkit-keyframes firstChild {
    0% {left:100%; transform: scale(0.2) translate(-50%,-50%);}
    100% {left: -13%; transform: scale(0.2) translate(-50%,-50%);}
}
@keyframes firstChild {
   0% {left:100%; transform: scale(0.2) translate(-50%,-50%);}
    100% {left: -13%; transform: scale(0.2) translate(-50%,-50%);}
}
  </style>
</head>
<body>

<nav class="navbar navbar-expand-sm bg-dark">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
     <b style="color:white"> SERVIT</b>
    </a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a class="nav-link text-white" href="#head">About Us</a>
      </li>
      <?php
      session_start();
      if(isset($_SESSION["user"])){
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      } else {
        echo '<li class="nav-item dropdown">
        <a class="nav-link text-white dropdown-toggle" href="login.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Login
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
          <li><a class="dropdown-item" href="organiser.php">Organizer</a></li>
        </ul>
      </li>
      <li class="nav-item">
      <a class="nav-link text-black btn btn-primary bg-white" href="registration.php">Sign Up</a>
    </li>';
    
      }
      ?>
    </ul>
  </div>
</nav>

<div class="body">
  <div class="image-container">
  <div class="container1">
  <div class="slider">
    <div class="box1">
    </div>
    <div class="box2">
    </div>
    <div class="box3">
    </div>
    <div class="box4">
    </div>
    <div class="box5">
    </div>
    <div class="box6">
    </div>
    <div class="box7">
    </div>
  </div>
</div>
<div id="test"></div>
  </div>
  <div class="container1 text-center">
   
  </div>
</div>

<div class="bottom">
  <h1 id="head">
    About Us
  </h1>
  <p>
    Welcome to SERVIT, a dedicated platform for volunteering and making a positive impact on communities. Our mission is to connect passionate individuals with meaningful volunteer opportunities. We believe in the power of collective action and strive to create a world where everyone has the chance to contribute their time and skills for the betterment of society. Through our user-friendly platform, we aim to inspire and empower individuals to take part in various volunteer projects, ranging from environmental conservation and education to humanitarian aid and community development. Join us in making a difference and be a part of the change!
  </p>

  <div class="steps-container">
    <div class="step">
      <i class="step-icon fas fa-registered"></i>
      <h3 class="step-title">Step 1: Register as a Volunteer</h3>
      <p class="step-description">Create an account on our platform to become a registered volunteer.</p>
    </div>
    <div class="step">
      <i class="step-icon fas fa-user"></i>
      <h3 class="step-title">Step 2: Provide Your Name and Phone Number</h3>
      <p class="step-description">Enter your name and phone number to complete your volunteer profile.</p>
    </div>
    <div class="step">
      <i class="step-icon fas fa-handshake"></i>
      <h3 class="step-title">Step 3: Click Join Button</h3>
      <p class="step-description">Browse available volunteer opportunities and click the "Join" button to participate.</p>
    </div>
  </div>
</div>

<div class="quote-container">
  <h1 class="quote-text">"The best way to find yourself is to lose yourself in the service of others."</h1>
  <h1><a href="comment.php" >review</a></h1>
</div>

<footer class="footer">
  <div class="container">
    <div class="row">
      <div class="col">
        <a href="https://www.instagram.com/"><i class="fab fa-instagram"></i></a>
        <a href="https://www.facebook.com/"><i class="fab fa-facebook"></i></a>
        <a href="https://www.twitter.com/"><i class="fab fa-twitter"></i></a>
        <a href="mailto:servit@gmail.com"><i class="fas fa-envelope"></i> servit@gmail.com</a>
      </div>
    </div>
  </div>
</footer>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="https://kit.fontawesome.com/your-fontawesome-kit.js" crossorigin="anonymous"></script>

<script>
  function rotate() {
  var lastChild = $('.slider div:last-child').clone();
  /*$('#test').html(lastChild)*/
  $('.slider div').removeClass('firstSlide')
  $('.slider div:last-child').remove();
  $('.slider').prepend(lastChild)
  $(lastChild).addClass('firstSlide')
}

window.setInterval(function(){
  rotate()
}, 3000);

  // Animation for the steps
  const steps = document.querySelectorAll('.step');
  const observer = new IntersectionObserver((entries) => {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('visible');
      }
    });
  }, {
    threshold: 0.2
  });

  steps.forEach((step) => {
    observer.observe(step);
  });

  // Animation for bouncing arrow
  const arrow = document.querySelector('.fa-chevron-down');
  arrow.animate([
    { transform: 'translateY(0)' },
    { transform: 'translateY(-10px)' },
    { transform: 'translateY(0)' }
  ], {
    duration: 1000,
    easing: 'ease-in-out',
    iterations: Infinity
  });
</script>
</body>
</html>
