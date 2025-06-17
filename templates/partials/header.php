<?php
    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VoidFox - Main</title>
    <link rel = "stylesheet" href = "../assets/css/style.css">
</head>
<body>
    <div class="head">
        <p style = "font-family: 'CloisterBlack'">VoidFox</p>
        <div>
            <a href="home.php">Main page</a>
            <a href="commissions.php">Commissions</a>
            <a href="3dFin.php">Finished 3D projects</a>
            <a href="3dUnFin.php">Unfinished 3D projects</a>
            <a href="3dOnPause.php">3D projects on pause</a>
            <a href="projectIdea.php">Project ideas</a>
            <a href="projectHalted.php">Stopped projects</a>
            <?php 
                if(isset($_SESSION['loggedIn']) && $_SESSION['loggedIn'] == true){
                    if($_SESSION['role'] == "admin"){
                        echo('<a href="admin.php">admin</a>');
                    }
                    echo($_SESSION['username']);
                    echo('<a href="logOut.php">Log out</a>');
                }
                else{
                    echo('<a href="logIn.php">Log in</a>');
                    echo('<a href="register.php">Register</a>');
                }
            ?>
            
        </div>
    </div>
    <div class="content">