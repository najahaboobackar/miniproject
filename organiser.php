<?php
session_start();
if(isset($_SESSION["user"])){
    header("Location:page1.php");
}




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
<link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
<?php

if (isset($_POST["login"])) {

$email = $_POST["email"];


$password= $_POST["password"]; require_once "database.php";

$sql = "SELECT * FROM users1 WHERE email = '$email'";

$result = mysqli_query($conn, $sql);

$user = mysqli_fetch_array($result, MYSQLI_ASSOC);

if ($user) {

if (password_verify($password, $user["password"])){
    session_start();
    $_SESSION["user"]="yes";
header("Location:page1.php");
die();
}else{

    echo "<div class='alert alert-danger'>password does not match</div>";
}}
else{

echo "<div class='alert alert-danger'>Email does not match</div>";
}}
?>
<form action="organiser.php" method="post">

<div class="form-group">

<input type="email" placeholder="Enter Email:" name="email" class="form-control"> </div>

<div class="form-group">

<input type="password" placeholder="Enter Password:" name="password" class="form-control"> </div>

<div class="form-btn">

<input type="submit" value="Login" name="login" class="btn btn-primary custom-button">

</div> </form>
<div>
    <p> not registered yet<a href="reg1.php"> register here</a></p>
</div>
<style>.container {
    max-width: 600px;
    background-color: #E48586;
    margin: 110px auto;
    padding: 50px;
    box-shadow: -4px 3px 14px 3px;
    
}
.custom-button {
    background-color: black;
    border-color: black;
    text :white;
  }
.form-control {
      background: rgba(255, 255, 255, 0.5)!important;
    border: none !important;
    border-radius: 4px !important;
    box-shadow: 0 8px 6px -6px #555 !important;
    }
    body {
        background-color:#FDE5EC ;
    }
    </style>

</div>
</body>
</html>