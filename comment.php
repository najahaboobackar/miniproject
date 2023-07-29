<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Comments</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="php.css">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
    <style>
      @import url("https://fonts.googleapis.com/css?family=Saira+Semi+Condensed&display=swap");
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

            // Implement the PRG pattern
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
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
                       <div class="col-md-6 col-lg-3 item m-2" style="float: left; width: 500px;!important">
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

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/js/bootstrap.bundle.min.js"></script>

</body>
</html>
