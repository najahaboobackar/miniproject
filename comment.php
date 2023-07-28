<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <!-- Style and other head elements... -->
    
    <style>
      @import url("https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap");
* {
  font-family: "Saira Semi Condensed", sans-serif;
  transition: all 0.5s ease;
}

body {
  background: #dfdfdf;
}

.container {
  width: 100%;
  height: 100%;
  padding: 0 16px;
  display: flex;
  flex-flow: row nowrap;
  align-items: center;
  justify-content: center;
}

form {
  width: 400px;
  display: flex;
  flex-flow: column wrap;
  align-items: center;
  justify-content: center;
}
form div,
form label,
form input,
form textarea {
  width: 100%;
}

.field:nth-of-type(2) {
  margin: 16px 0;
}

label,
input,
textarea {
  padding: 8px;
}

label,
[placeholder] {
  color: #555;
}

label i {
  margin: 0 10px 0 0;
}

.field:focus-within label {
  color: #000;
  letter-spacing: 2px;
}

input,
textarea {
  background: rgba(255, 255, 255, 0.5);
  border: none;
  border-radius: 4px;
  box-shadow: 0 8px 6px -6px #555;
}
input:focus,
textarea:focus {
  background: white;
  box-shadow: none;
}

textarea {
  resize: none;
}
textarea::-webkit-scrollbar {
  width: 0;
}

button {
  background: #2f4ad0;
  margin: 16px 0 50px 0;
  padding: 8px 16px;
  color: #fff;
  border: none;
  border-radius: 4px;
  cursor: pointer;
  box-shadow: 0 8px 6px -6px #555;
}
button:hover {
  letter-spacing: 2px;
  box-shadow: none;
}

.social-media {
  display: flex;
  flex-flow: row wrap;
  justify-content: space-around;
}
:not(.social-media) {
  font-size: 14px;
}
.social-media span {
  font-size: 16px;
}
.social-media span .fas {
  margin: 0 0 0 10px;
}
.social-media a {
  color: #000;
  font-size: 20px;
}

@media (max-width: 425px) {
  form {
    width: 100%;
  }
}
 .team-boxed {
  color:#313437;
  background-color:#eef4f7;
}

.team-boxed p {
  color:#7d8285;
}

.team-boxed h2 {
  font-weight:bold;
  margin-bottom:40px;
  padding-top:40px;
  color:inherit;
}
.team-boxed .item {
    text-align:center;
    margin-bottom: 10px; /* Add this line */
}
.team-boxed .item {
    text-align: center;
    margin-bottom: 10px;
    border: 1px solid black; /* This line adds the border */
    border-radius: 10px; /* This line rounds the corners */
}


@media (max-width:767px) {
  .team-boxed h2 {
    margin-bottom:25px;
    padding-top:25px;
    font-size:24px;
  }
}

.team-boxed .intro {
  font-size:16px;
  max-width:500px;
  margin:0 auto;
}

.team-boxed .intro p {
  margin-bottom:0;
}

.team-boxed .people {
  padding:50px 0;
}

.team-boxed .item {
  text-align:center;
}





.team-boxed .item .name {
  font-weight:bold;
  margin-top:28px;
  margin-bottom:8px;
  color:inherit;
}


.team-boxed .item .description {
  font-size:15px;
  margin-top:15px;
  margin-bottom:20px;
}

.team-boxed .item img {
  max-width:160px;
}

.team-boxed .social {
  font-size:18px;
  color:#a2a8ae;
}

.team-boxed .social a {
  color:inherit;
  margin:0 10px;
  display:inline-block;
  opacity:0.7;
}

.team-boxed .social a:hover {
  opacity:1;
}

.box{
    padding-left:10px;
    margin-right:10px;
}
.item {
    margin-bottom: 10px; /* This adds 10px margin at the bottom of each item */
}


</style>

</head>
<body>
    <?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "login_register";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        if(isset($_POST['username']) && isset($_POST['email']) && isset($_POST['message'])) {
            $name = $_POST['username'];
            $email = $_POST['email'];
            $comment = $_POST['message'];
    
            $sql = "INSERT INTO comments (name, email, comment) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param("sss", $name, $email, $comment);
            $stmt->execute();
            $stmt->close();
        }
    }
    

    $sql = "SELECT * FROM comments ORDER BY id DESC";
    $result = $conn->query($sql);
    ?>

    <div class="for">
        <section class="content-item" id="comments">
            <div class="container">   
                <div class="row">
                    <div class="container">
                        <form method="POST" action="">
                            <div class="field" tabindex="1">
                                <label for="username">
                                    <i class="far fa-user"></i>Your Name
                                </label>
                                <input name="username" type="text" placeholder="e.g. john doe" required>
                            </div>
                            <div class="field" tabindex="2">
                                <label for="email">
                                    <i class="far fa-envelope"></i>Your Email
                                </label>
                                <input name="email" type="text" placeholder="email@domain.com" required>
                            </div>
                            <div class="field" tabindex="3">
                                <label for="message">
                                    <i class="far fa-edit"></i>Your Message
                                </label>
                                <textarea name="message" placeholder="type here" required></textarea>
                            </div>
                            <button type="submit">Send Me Message</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>

    <div class="team-boxed">
        <div class="container">
             <div class="row people">
                <?php
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                ?>
                       <div class="col-md-6 col-lg-3 item m-2" style="float: left; width:200px!important">


                            <div class="box">
 
                                <h3 class="name"><?php echo $row['name']; ?></h3>
                                <p class="title"><?php echo $row['email']; ?></p>
                                <p class="description"><?php echo $row['comment']; ?></p>
                                <div class="social"><a href="#"><i class="fa fa-facebook-official"></i></a><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-instagram"></i></a></div>
                            </div>
                        </div>
                <?php
                    }
                }
                ?>
            </div>
        </div>
    </div>

    <!-- Your script tags here... -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
