<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (isset($_POST['postId'])) {
        $postId = $_POST['postId'];

        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "login_register";

        $conn = new mysqli($servername, $username, $password, $dbname);
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // Use a prepared statement to prevent SQL injection
        $stmt = $conn->prepare("DELETE FROM posts WHERE id = ?");
        $stmt->bind_param('s', $postId);
        $stmt->execute();

        // Delete related entries from room_participants table
        $stmt = $conn->prepare("DELETE FROM room_participants WHERE room_id = ?");
        $stmt->bind_param('s', $postId);
        $stmt->execute();

        header('Location: page1.php');
        exit();
    }
}
?>
