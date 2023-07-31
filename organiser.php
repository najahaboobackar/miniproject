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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
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

                <input type="email" placeholder="Enter Email:" name="email" class="form-control">
            </div>

            <div class="form-group">

                <input type="password" placeholder="Enter Password:" name="password" class="form-control">
            </div>

            <div class="form-btn">

                <input type="submit" value="Login" name="login" class="button">

            </div>
        </form>
        <div>
            <p>Not registered yet? <a href="reg1.php" class="register-link">Register here</a></p>
        </div>
        <style>
        .container {
            max-width: 400px;
            margin: 110px auto;
            padding: 50px;
            box-shadow: 0px 8px 15px rgba(0, 0, 0, 0.1);
            border-radius: 20px;
            background: rgba(255, 255, 255, 0.1);
            backdrop-filter: blur(5px);
            border: 1px solid rgba(255, 255, 255, 0.3);
            display: flex;
            flex-direction: column;
            align-items: center;
            justify-content: center;
        }

        .form-group {
            width: 100%;
            margin-bottom: 20px;
        }

       
        .form-control {
            background: rgba(255, 255, 255, 0.5) !important;
            border: none !important;
            border-radius: 4px !important;
            box-shadow: 0 8px 6px -6px #555 !important;
            width: 265px;
        }

        body {
            background-color: #DFDFDF;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            font-family: Arial, sans-serif;
        }

        a {
            color: #000;
            text-decoration: none;
        }

        

        p {
            text-align: center;
            margin-top: 21px;
        }

        
        .button{
                
                background: #916DB3;
                backdrop-filter: blur(5px);
                border-radius: 22px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                padding: 10px 20px;
                color: black;
                transition: all 0.3s ease;
                font-size: 15px;
                height: 42px;
    
            }


            .button:hover {
                background: rgba(255, 255, 255, 0.2);
                transform: scale(1.05);
            }
            .register-link {
            background: #916DB3;
                backdrop-filter: blur(5px);
                border-radius: 22px;
                border: 1px solid rgba(255, 255, 255, 0.2);
                padding: 10px 16px;
                color: black;
                transition: all 0.3s ease;
                font-size: 15px;
                height: 42px;
                text-decoration:none;
        }

        .register-link:hover {
            background: rgba(255, 255, 255, 0.2);
                transform: scale(1.05);
        }

        </style>

    </div>
</body>

</html>