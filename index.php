<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="style1.css">
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"
        integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <style>
    /* Add your custom CSS styles here */
    #head1{
    font-size: 34px;
     font-family: system-ui;
     font-weight: 400;
      
    }
    .navbar {
        background-color: #DFDFDF;
        border-bottom: 1px solid #dee2e6;
        font-family: 'Roboto', sans-serif;
    }


    .navbar-brand {
        display: flex;
        align-items: center;
        font-family: unset;
        padding-left: 55px;
        z-index: 1;

    }

    .nav-item {

        padding-right: 55px;
    }


    .navbar-brand img {
        margin-right: 5px;
        font-family: 'Roboto', sans-serif;
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
        font-family: 'Roboto', sans-serif;
        overflow: hidden;
    }

    .image-container {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
        background-color: #DFDFDF;
        background-repeat: no-repeat;
        background-size: cover;
        background-position: center;



    }


    .bottom {
        text-align: center;
        padding: 20px 0;
        /*Reduced padding to reduce the height of the container*/
        background-color: #DFDFDF;
    }



    .bottom h1 {
        font-size: 35px;
        color: black;
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
        background-color: #DFDFDF;
    }

    
    .quote-text {
      font-family: unset;
     font-weight: 400;
    font-size: 24px;
    color: black;
       
    }

    .footer {
        
        color: #fff;
        padding: 10px 0;
        /* Reduced padding from 20px to 10px */
        text-align: center;
        padding-left: 590px;

    }


    .footer a {
        color: black;
        text-decoration: none;
        margin: 0 10px;
    }

    .footer a:hover {
        color: #007bff;
    }

    /* Animation */
    @keyframes fadeIn {
        0% {
            opacity: 0;
        }

        100% {
            opacity: 1;
        }
    }

    @keyframes slideIn {
        0% {
            transform: translateY(50px);
        }

        100% {
            transform: translateY(0);
        }
    }

    @keyframes arrowBounce {

        0%,
        100% {
            transform: translateY(0);
        }

        50% {
            transform: translateY(-10px);
        }
    }


    /* Add more custom styles as needed */

    .container1 {
        width: 100vw;
        height: 80vh;
        display: flex;
        justify-content: center;
        align-items: center;
        padding-right: 428px;
        padding-left: 43px;
    }

    .slider {
        height: 750px;
        width: 100vw;
        display: flex;
        perspective: 1000px;
        position: relative;
        align-items: center;
    }

    .box1 {
        background: url('https://media.istockphoto.com/id/1206536806/photo/support-worker-with-client.jpg?s=612x612&w=0&k=20&c=pY32VbWmisP43IPB0c2KgP6FIg3LEODabgVt8YbQl7c=');
        background-size: cover;
        background-position: center center;
    }

    .box2 {
        background: url('https://okcredit-blog-images-prod.storage.googleapis.com/2021/01/socialservice3.jpg');
        background-size: cover;
        background-position: center center;
    }

    .box3 {
        background: url('https://content.jdmagicbox.com/comp/bhubaneshwar/i9/0674px674.x674.220130230648.x4i9/catalogue/jazba-humanity-first-bhubaneswar-bhubaneshwar-social-service-organisations-ko2898jnsp.jpg');
        background-size: cover;
        background-position: center center;
    }

    .box4 {
        background: url('https://www.educationworld.in/wp-content/uploads/2021/07/Untitled-design-45.jpg');
        background-size: cover;
        background-position: center center;
    }

    .box5 {
        background: url('https://www.deccanherald.com/sites/dh/files/styles/article_detail/public/articleimages/2021/10/19/file7hoeog0pcitjkmccenq-1042012-1634629503.jpg?itok=PgO1LNqA');
        background-size: cover;
        background-position: center center;
    }

    .box6 {
        background: url('https://s3.youthkiawaaz.com/wp-content/uploads/2020/04/17155139/imig1_custom-b2b0f63f411fb6f3dabd3105d9555419d88ddafb-s800-c85.jpg');
        background-size: cover;
        background-position: center center;
    }

    .box7 {
        background: url('https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcTar5XRbcGjsrc4uK9p19yfS8kaDVzZTbu49w&usqp=CAU');
        background-size: cover;
        background-position: center center;
    }

    .slider [class*="box"] {
        /*   float: left; */
        overflow: hidden;
        border-radius: 20px;
        transition: all 1s cubic-bezier(0.68, -0.6, 0.32, 1.6);
        position: absolute;
        padding-left: 50px;
        /* Add padding to the left */
        padding-right: 50px;
        /* Add padding to the right */
    }

    .slider [class*="box"]:nth-child(7),
    .slider [class*="box"]:nth-child(1) {
        width: 100vh;
        height: 60vh;
        transform: scale(0.2) translate(-50%, -50%);
        top: 10%;
        z-index: 1;
    }

    .slider [class*="box"]:nth-child(2),
    .slider [class*="box"]:nth-child(6) {
        width: 100vh;
        height: 60vh;
        transform: scale(0.4) translate(-50%, -50%);
        top: 20%;
        z-index: 2;
    }

    .slider [class*="box"]:nth-child(3),
    .slider [class*="box"]:nth-child(5) {
        width: 100vh;
        height: 60vh;
        transform: scale(0.6) translate(-50%, -50%);
        top: 30%;
        z-index: 3;
    }

    .slider [class*="box"]:nth-child(4) {
        width: 60vw;
        height: 60vh;
        border-color: #c92026;
        color: #fff;
        transform: scale(1) translate(-50%, -50%);
        top: 50%;
        z-index: 4;

    }

    .slider [class*="box"]:nth-child(1) {
        left: -13%;
    }

    .slider [class*="box"]:nth-child(2) {
        left: -5%;
    }

    .slider [class*="box"]:nth-child(3) {
        left: 10%;
    }

    .slider [class*="box"]:nth-child(4) {
        left: 50%;
    }

    .slider [class*="box"]:nth-child(5) {
        left: 71%;
    }

    .slider [class*="box"]:nth-child(6) {
        left: 85%;
    }

    .slider [class*="box"]:nth-child(7) {
        left: 100%;
    }

    .slider .firstSlide {
        -webkit-animation: firstChild 1s;
        animation: firstChild 1s;
    }

    .comment {
        color: black;
        text-decoration: none;
        font-family: unset;
        font-size: 34px;
        font-weight: 400;
        
        
    }

    /*Animation for buyers landing page slider*/
    @-webkit-keyframes firstChild {
        0% {
            left: 100%;
            transform: scale(0.2) translate(-50%, -50%);
        }

        100% {
            left: -13%;
            transform: scale(0.2) translate(-50%, -50%);
        }
    }

    @keyframes firstChild {
        0% {
            left: 100%;
            transform: scale(0.2) translate(-50%, -50%);
        }

        100% {
            left: -13%;
            transform: scale(0.2) translate(-50%, -50%);
        }
    }

    .glassmorphism {
        background: rgba(255, 255, 255, 0.1);
        backdrop-filter: blur(5px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 20px;
    }

    .button1 {
        
        background: #916DB3;
        text-decoration:none;
        backdrop-filter: blur(5px);
        border-radius: 22px;
        border: 1px solid rgba(255, 255, 255, 0.2);
        padding: 10px 20px;
        color: black;
        transition: all 0.3s ease;
        font-size: 15px;
        height: 42px;
    }


    .button1:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }
    #description{
       font-size:18px;
    }
    </style>
</head>

<body>

    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <!-- <img src="project-logo-final-1@2x.png" height="43px" alt="Logo"> -->
                <p style="color:black " margin-top: 5px;> SERVIT</p>
            </a>
            <ul class="navbar-nav ml-auto">
                <li class="nav-item">
                    <a class="nav-link " href="#head1" >About Us</a>
                </li>
                <?php
    
      if(isset($_SESSION["user"])){
        echo '<li class="nav-item">
                <a class="nav-link text-dark" href="logout.php">Logout</a>
              </li>';
      } else {
        echo '<li class="nav-item dropdown">
        <a class="nav-link text-dark dropdown-toggle" href="login.php" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
        Login
        </a>
        <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li><a class="dropdown-item" href="volunteer.php">Volunteer</a></li>
          <li><a class="dropdown-item" href="organiser.php">Organizer</a></li>
        </ul>
      </li>
      <li class="nav-item">
      <a class="button1"  href="registration.php">Sign Up</a>
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

    <div class="glassmorphism">>
        <h1 id="head1">
            ABOUT US
        </h1>
        <p id=description>
            Welcome to SERVIT, a dedicated platform for volunteering and making a positive impact on communities. Our
            mission is to connect passionate individuals with meaningful volunteer opportunities. We believe in the
            power of collective action and strive to create a world where everyone has the chance to contribute their
            time and skills for the betterment of society. Through our user-friendly platform, we aim to inspire and
            empower individuals to take part in various volunteer projects, ranging from environmental conservation and
            education to humanitarian aid and community development. Join us in making a difference and be a part of the
            change!
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
                <p class="step-description">Browse available volunteer opportunities and click the "Join" button to
                    participate.</p>
            </div>
        </div>
    </div>

    <div class="quote-container">
        <h1 class="quote-text">"The best way to find yourself is to lose yourself in the service of others."</h1>
        <h1><a class="comment" href="comment.php">REVIEW</a></h1>
    </div>

    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col">

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

    window.setInterval(function() {
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
    arrow.animate([{
            transform: 'translateY(0)'
        },
        {
            transform: 'translateY(-10px)'
        },
        {
            transform: 'translateY(0)'
        }
    ], {
        duration: 1000,
        easing: 'ease-in-out',
        iterations: Infinity
    });
    </script>
</body>

</html>