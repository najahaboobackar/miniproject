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
        $experience = $_POST['experience'];

        $current_limit = 0;

        $checkSql = $conn->prepare("SELECT * FROM room_participants WHERE phone = ?");
        $checkSql->bind_param('s', $phone);
        $checkSql->execute();

        $checkResult = $checkSql->get_result();

        if ($checkResult->num_rows > 0) {
            $_SESSION["error"] = "A user with this phone number already exists.";
            header("Location: " . $_SERVER['REQUEST_URI']);
            exit();
        }

        $selectQuery = "SELECT limit2, limit1 FROM posts WHERE id = ?";
        $stmt = $conn->prepare($selectQuery);
        $stmt->bind_param('s', $roomId);
        $stmt->execute();

        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $current_limit = $row['limit2'];
            $max_limit = $row['limit1'];

            if ($current_limit < $max_limit) {
                $current_limit++;
            
                $updateQuery = "UPDATE posts SET limit2 = ? WHERE id = ?";
                $updateStmt = $conn->prepare($updateQuery);
                $updateStmt->bind_param('ss', $current_limit, $roomId);
                $updateStmt->execute();
            
                $insertQuery = "INSERT INTO room_participants (room_id, name, phone, content) VALUES (?, ?, ?, ?)";
                $insertStmt = $conn->prepare($insertQuery);
                $insertStmt->bind_param('ssss', $roomId, $name, $phone, $experience);
                $insertStmt->execute();
            
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

// Rest of your PHP and HTML code


$current_date = date("Y-m-d");

$deleteRoomParticipantsQuery = "DELETE rp FROM room_participants rp INNER JOIN posts p ON p.id = rp.room_id WHERE STR_TO_DATE(p.date, '%Y-%m-%d') <= STR_TO_DATE('$current_date', '%Y-%m-%d')";

if ($conn->query($deleteRoomParticipantsQuery) === TRUE) {
    echo "";
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
    
    
</head>

<body>
    <style>
        @keyframes textMotion {
    0% { transform: translateY(0); }
    100% { transform: translateY(-10px); }
  }
 

  body {
    background-color:#DFDFDF;
  background-repeat: no-repeat;
  background-size: cover;
  background-position: center;
  background-attachment: fixed;
  font-family: 'Roboto', sans-serif;
}
.navbar{
    background-color:#DFDFDF;
    
  }
  .nav-item{
      
    padding-right: 55px;
    font-family: 'Roboto', sans-serif;
  }
    .glassmorphism {
        background: rgba(255, 255, 255, 0.25);
        box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
        backdrop-filter: blur(4px);
        -webkit-backdrop-filter: blur(4px);
        border-radius: 10px;
        border: 1px solid rgba(255, 255, 255, 0.18);
    }

    .navbar-brand {
        display: flex;
        align-items: center;
        font-family: unset;
        padding-left: 55px;
    }

    .fname {

        width: 79%;
        padding: 5px 10px;
        margin: 2px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    .button {
    margin-top: 12px;
    background: #916DB3;
    backdrop-filter: blur(5px);
    border-radius: 22px;
    border: 1px solid rgba(255, 255, 255, 0.2);
    padding: 4px 16px;
    color: black;
    transition: all 0.3s ease;
    font-size: 15px;
    margin-left: 208px;
}


    .button:hover {
        background: rgba(255, 255, 255, 0.2);
        transform: scale(1.05);
    }
    </style>

    <nav class="navbar navbar-expand-sm">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <p style="color:black"> SERVIT</p>
            </a>
            <ul class="navbar-nav ml-auto">

                <?php
      if (isset($_SESSION["posts"])) {
          echo '<li class="nav-item">
                <a class="nav-link text-black" href="logout.php">Logout</a>
              </li>';
      } else {
          echo '<li class="nav-item">
                <a class="nav-link text-black" href="logout.php">Logout</a>
              </li>';
      }
      ?>
            </ul>
        </div>
    </nav>
    <style>
    #text {
        margin-left: 0px
    }

    #head1 {
        font-size: 34px;
        font-family: system-ui;
        font-weight: 350;
        margin-left: 63px;
        color: black;
    }
    .card-img-top{
        width: 288px;
        height: 277px;
    }
   
  .post img {
    max-width: 100%;
    height: 300px;
  }
  
    
    </style>
    <div id=head1>
        <p>JOIN ROOM</p>

    </div>



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
  // Your PHP code
  
  $i = 0; // Initialize counter
  
  if ($result->num_rows > 0) {
      while ($row = $result->fetch_assoc()) {
          $i++; // Increment counter for each room
          echo '<div class="post glassmorphism" style="border: 6px solid #ccc;   width: 23%; padding: 4px;; margin-bottom: 20px; ;float: left; margin-right: 0%; margin-left: 58px; margin-bottom: 2%;">';
          if (isset($row['photo'])) {
              echo '<img src="' . $row['photo'] . '" class="card-img-top" alt="Post Photo" >';
          }
          echo '<p>Venue: ' . $row['venue'] . '</p>';
          echo '<p>Date: ' . $row['date'] . '</p>';
          echo '<p>Volunteer Limit: ' . $row['limit2'] . '/' . $row['limit1'] . '</p>';
          echo '<p>Email: ' . $row['email'] . '</p>';
          echo '<p>Content: ' . $row['content'] . '</p>';
  
          // Form and inputs
          echo '<form method="POST" class="post" >';
          echo '<input type="hidden" name="p" value="' . $row['id'] . '">';
          echo '<input type="hidden" name="venue" value="' . $row['venue'] . '">';
          echo '<input type="hidden" name="date" value="' . $row['date'] . '">';
          echo '<input type="hidden" name="limit1" value="' . $row['limit2'] . '/' . $row['limit1'] . '">';
          echo '<input type="hidden" name="email" value="' . $row['email'] . '">';
          echo '<input type="text" name="name" placeholder="Enter your name" required class="fname" ><br>';
          echo '<input type="text" name="phone" placeholder="Phone number" class="fname" required><br>'; 
          echo '<p>Previous experience:</p>';
          echo '<input type="radio" id="option1_' . $i . '" name="radiobutton_' . $i . '" value="option1">';
          echo '<label for="option1_' . $i . '">YES</label>';
          echo '<input type="radio" id="option2_' . $i . '" name="radiobutton_' . $i . '" value="option2">';
          echo '<label for="option2_' . $i . '">NO</label><br>';
          echo '<input type="text" name="experience_' . $i . '" placeholder="Enter your experience" required id="experience_' . $i . '" class="fname" style="visibility:hidden;"><br>';
          echo '<button type="submit" name="join" class="button" onclick="return confirm(\'Terms and Conditions  \n\n By using this website, you hereby acknowledge and agree to abide by our policies, including our Privacy Policy, and agree not to misuse this website for any fraudulent or malicious activities. Any content found on this site is our exclusive property and should not be used without explicit permission. We reserve the right to terminate access for users found violating these terms. All disputes arising from the use of our website will be governed by the laws of our jurisdiction.\');">Join</button>';
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
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script>
    $(document).ready(function() {
        for (let i = 1; i <= <?php echo $i; ?>; i++) {
            $("input[name='radiobutton_" + i + "']").click(function() {
                if ($(this).val() == 'option1') {
                    $("#experience_" + i).css('visibility', 'visible');
                    $("#experience_" + i).prop('required',true);
                }
                else {
                    $("#experience_" + i).css('visibility', 'hidden');
                    $("#experience_" + i).prop('required',false);
                }
            });
        }
    });
    </script>
    
    
    
    
    
    
    

</body>

</html>