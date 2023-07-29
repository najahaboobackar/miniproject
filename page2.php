<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "login_register";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['p']) && isset($_POST['join'])) {
        $roomId = $_POST['p'];
        $venue = $_POST['venue'];
        $date = $_POST['date'];
        $limit = $_POST['limit1'];
        $phone = $_POST['phone'];
        $name = $_POST['name'];
        $current_limit = 0;

        $selectQuery = "SELECT limit2, limit1 FROM posts WHERE id = '$roomId'";
        $result = $conn->query($selectQuery);

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_limit = $row['limit2'];
            $max_limit = $row['limit1'];

            if ($current_limit < $max_limit) {
                $current_limit++;

                $updateQuery = "UPDATE posts SET limit2 = '$current_limit' WHERE id = '$roomId'";
                $conn->query($updateQuery);

                $insertQuery = "INSERT INTO room_participants (room_id, name, phone) VALUES ('$roomId', '$name', '$phone')";
                $conn->query($insertQuery);

                $_SESSION["success"] = "You have successfully joined the room!";

                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            } else {
                $_SESSION["error"] = "Sorry, the room is already full.";

                header("Location: " . $_SERVER['REQUEST_URI']);
                exit();
            }
        }
    }
}

$current_date = date("Y-m-d");

$deleteRoomParticipantsQuery = "DELETE rp FROM room_participants rp INNER JOIN posts p ON p.id = rp.room_id WHERE STR_TO_DATE(p.date, '%Y-%m-%d') <= STR_TO_DATE('$current_date', '%Y-%m-%d')";

if ($conn->query($deleteRoomParticipantsQuery) === TRUE) {
    echo "Participant Records were deleted successfully.";
} else {
    echo "ERROR: Could not able to execute $deleteRoomParticipantsQuery. " . mysqli_error($conn);
}

$sql = "SELECT * FROM posts WHERE STR_TO_DATE(date, '%Y-%m-%d') > STR_TO_DATE('$current_date', '%Y-%m-%d') ORDER BY id DESC";
$result = $conn->query($sql);

if ($result === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>Join Room</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet"  href="style1.css">
  <link rel="stylesheet"  href="page2.css">
</head>
<body>

<nav class="navbar navbar-expand-sm bg-black">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">
      <img src="project-logo-final-1@2x.png" height="43px" alt="Logo">
    </a>
    <h2 id="servit" style="color:white;">SERVIT</h2>
    <ul class="navbar-nav ml-auto">
      
      <?php
      if (isset($_SESSION["posts"])) {
          echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
      } else {
          echo '<li class="nav-item">
                <a class="nav-link text-white" href="logout.php">Logout</a>
              </li>';
      }
      ?>
    </ul>
  </div>
</nav>
<style>#text{margin-left:0px}</style>
<div id="text" class="container mt-4">
<h2 class="join-room-heading" style="color: black; padding-left: 0;">Join Room</h2>
  <p id="quote" style="font-style: italic; color: black; font-size: 18px; text-align: left;"></p>
</div>

<script>
  var textArray = [
    "Join our family",
    "Never doubt that a small group of thoughtful, committed citizens can change the world; indeed, it's the only thing that ever has.....!"
  ];

  var quoteElement = document.getElementById("quote");
  var index = 0;

  function animateText() {
    quoteElement.innerHTML = textArray[index];

    quoteElement.style.animation = 'textMotion 0.5s ease-in-out';

    setTimeout(function () {
      quoteElement.style.animation = '';
    }, 500);

    index = (index + 1) % textArray.length;
  }

  animateText();

  setInterval(animateText, 3000);
</script>

<?php
if (isset($_SESSION['success'])) {
    echo '<div class="alert alert-success">' . $_SESSION['success'] . '</div>';
    unset($_SESSION['success']);
}

if (isset($_SESSION['error'])) {
    echo '<div class="alert alert-danger">' . $_SESSION['error'] . '</div>';
    unset($_SESSION['error']);
}
?>

  <?php
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          echo '<div class="post" style="border: 1px solid #ccc; padding: 10px; margin-bottom: 20px; width: 48%; float: left; margin-right: 2%; margin-bottom: 2%;">';
          if (isset($row['photo'])) {
              echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" style="width: 100%; height: auto;">';
          }
          echo '<p>Venue: ' . $row['venue'] . '</p>';
          echo '<p>Date: ' . $row['date'] . '</p>';
          echo '<p>Volunteer Limit: ' . $row['limit2'] . '/' . $row['limit1'] . '</p>';
          echo '<p>Email: ' . $row['email'] . '</p>';
          echo '<p>Content: ' . $row['content'] . '</p>';

          echo '<form method="POST">';
          echo '<input type="hidden" name="p" value="' . $row['id'] . '">';
          echo '<input type="hidden" name="venue" value="' . $row['venue'] . '">';
          echo '<input type="hidden" name="date" value="' . $row['date'] . '">';
          echo '<input type="hidden" name="limit1" value="' . $row['limit2'] . '/' . $row['limit1'] . '">';
          echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
          echo '<input type="text" name="name" placeholder="Enter your name" required><br>';
          echo '<input type="text" name="phone" placeholder="Phone number" required>'; 
          echo '<button type="submit" name="join" class="btn btn-primary custom-button">Join</button>';

          echo '</form>';

          echo '</div>';
      }
  } else {
      echo "No posts found";
  }
  $conn->close();
  ?>

<!-- Add Bootstrap JavaScript links if needed -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>
