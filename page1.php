<!DOCTYPE html>
<html lang="en">

<head>
    <title>home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    


    <link rel="stylesheet" href="page2.css">
    <style>
    
    </style>
</head>

<body>
    <?php
  session_start();

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
    $content = $_POST["content"]; // Add content column value

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
    $sql = "INSERT INTO posts (venue, date, limit1, email, content, photo) VALUES ('$venue', '$date', '$limit', '$email', '$content', '$targetFilePath')";
    if ($conn->query($sql) === TRUE) {
      $_SESSION['message'] = "Post created successfully";
    } else {
      $_SESSION['error'] = "Error: " . $sql . "<br>" . $conn->error;
    }

    // Redirect to avoid form resubmission when refreshing the page
    header("Location: " . $_SERVER['REQUEST_URI']);
    exit();
  }

  // Retrieve and display posts from the database
  $sql = "SELECT * FROM posts ORDER BY id DESC";
  $result = $conn->query($sql);
?>
    <nav class="navbar navbar-expand-sm ">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <p style="color:black"> SERVIT</p>
                <ul class="navbar-nav ml-auto">
                    
                    <?php
      if(isset($_SESSION["posts"])){
        echo '<li class="nav-item1">
                <a class="nav-link text-black" href="logout.php">Logout</a>
              </li>';
      } else { 
        echo '<li class="nav-item1">
                <a class="nav-link text-black" href="logout.php">Logout</a>
              </li>';
             echo '<li class="nav-item1">
                <a class="nav-link text-black" href="detail.php">details</a>
              </li>';
      }
      ?>
                </ul>
        </div>
    </nav>
    <style>
    #name {
        padding-left: 500px;
        padding-top: 30px
    }

    #name1 {
        padding-left: 618px;
        padding-top: 17px
    }
    </style>
    <div class="top">
        <h1 id="name">WELCOME TO SERVIT </h1>
        <h4 id="name1">Create Room</h4>
        <form method="POST" enctype="multipart/form-data">
            <div class="mb-3">
                <label for="photo" class="form-label" >Photo:</label>
                <input type="file" class="form-control" id="photo" name="photo" onchange="previewImage(event)" style=" height: 60px;max-width: 648px; margin: auto; padding: 20px; border-radius: 1px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">
                <img id="imagePreview" src="#" alt="Preview"
                    style="display: none; max-width: 50%; height: auto; margin-top: 10px;">
                <script>
                function previewImage(event) {
                    var input = event.target;
                    var preview = document.getElementById('imagePreview');

                    if (input.files && input.files[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
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
            <style>
            .mb-3 {
                padding-left: 350px;
                padding-right: 350px;
            }

            #btn {
                margin-left: 618px
            }

           
           
            .container {
                display: flex;
                flex-direction: column;
                align-items: flex-start;
            }

           

            .mb-3 {
                padding-left: 350px;
                padding-right: 350px;
            }

            #btn {
                margin-left: 618px;
            }

            .card-img-top {
                width: 100%;
            }

            .custom-button {
                background-color: black;
                border-color: black;
            }


            .container {
                display: flex;
                flex-direction: row;
                flex-wrap: wrap;
                align-items: flex-start;
            }

            .post {
                padding-right: 0px;
                margin-top: 94px;
                border: 1px solid #ccc;
                border-radius: 10px;
                padding: 20px;
                margin-bottom: 20px;
                width: 30%;
                margin-right: 1.5%;
                /* to create some space between columns */
                box-sizing: border-box;
                /* to include padding and border into width */
            }

            .post img {
                max-width: 100%;
                height: auto;
            }

            .navbar {
                background-color:#DFDFDF; }

            .nav-item {

              

              font-family: Helvetica , Helvetica , Helvetica, Arial, sans-serif;
            }

            .nav-item1 {
                padding-top: 10px;
                padding-right: 55px;
            }

            .navbar-brand {
                display: flex;
                align-items: center;
                font-family: unset;
                padding-left: 55px;
            }

            .button{
                font-color: red;
                background: #E48586;
                backdrop-filter: blur(5px);
                border-radius: 22px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                padding: 10px 20px;
                color: white;
                transition: all 0.3s ease;
                font-size: 15px;
                height: 42px;
            }


            .button:hover {
                background: red;
                transform: scale(1.05);
            }
            .button1{
            
                background: #916DB3;
                margin-left: 590px;
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
            </style>
            <form action="organiser.php" method="post"
                style="max-width: 500px; margin: auto; padding: 20px; border-radius: 10px; background: rgba(255, 255, 255, 0.1); backdrop-filter: blur(10px); border: 1px solid rgba(255, 255, 255, 0.3);">
                <div class="mb-3">
                    <label for="venue" class="form-label">Venue:</label>
                    <input type="text" class="form-control glass-input" id="venue" name="venue">
                </div>
                <div class="mb-3">
                    <label for="date" class="form-label">Date:</label>
                    <input type="date" class="form-control glass-input" id="date" name="date">
                </div>
                <div class="mb-3">
                    <label for="limit1" class="form-label">Volunteer Limit:</label>
                    <input type="number" class="form-control glass-input" id="limit1" name="limit">
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Email:</label>
                    <input type="email" class="form-control glass-input" id="email" name="email">
                </div>
                <div class="mb-3">
                    <label for="content" class="form-label">content</label>
                    <input type="text" class="form-control glass-input" id="content" name="content">
                </div>
                <button type="submit"  class="button1" >Create Room</button>
            </form>

            <style>
            .glass-input {
                background: rgba(255, 255, 255, 0.1);
                border: 3px solid rgba(255, 255, 255, 0.2);
                backdrop-filter: blur(5px);
                border-radius: 10px;
                color: black;
            }

           
           
            </style>
        </form>
    </div>

    <div class="container mt-4">
        <?php
  if (isset($_SESSION['message'])) {
    echo '<div class="alert alert-success">' . $_SESSION['message'] . '</div>';
    unset($_SESSION['message']);
  }

  if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
  }
//fetch code
if ($result->num_rows > 0) {
  while ($row = $result->fetch_assoc()) {
      echo '<div class="post">';
      echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" width="200px">';
      echo '<p>Venue: ' . $row['venue'] . '</p>';
      echo '<p>Date: ' . $row['date'] . '</p>';
      echo '<p>Volunteer Limit: ' . $row['limit1'] . '</p>';
      echo '<p>Email: ' . $row['email'] . '</p>';
      echo '<p>Content: ' . $row['content'] . '</p>';

      // Add the join button and form to submit the post details to page1.php
      echo '<form method="POST" action="page1.php">';
      echo '<input type="hidden" name="p" value="' . $row['id'] . '">';
      echo '<input type="hidden" name="venue" value="' . $row['venue'] . '">';
      echo '<input type="hidden" name="date" value="' . $row['date'] . '">';
      echo '<input type="hidden" name="limit1" value="' . $row['limit1'] . '">';
      echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
      echo '<input type="hidden" name="photo" value="' . $row['photo'] . '">';
      echo '</form>';

      // Add a delete button and form to submit the post ID to delete_post.php
      echo '<form method="POST" action="delete.php" onsubmit="return confirm(\'Are you sure you want to delete this room?\');">';
      echo '<input type="hidden" name="postId" value="' . $row['id'] . '">';
      echo '<button  class="button"  type="submit" name="delete">Delete</button>';
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