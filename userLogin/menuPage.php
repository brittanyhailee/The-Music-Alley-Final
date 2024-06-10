<?php
session_start();
include ('../includes/index.php');
//echo "you are in the cart page<br>";
//echo "Welcome, " . $user . "!";
?>


<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template
-->
<html>

<head>
    <title>Music Alley</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Special+Elite&display=swap"
        rel="stylesheet">

    <link rel="stylesheet" href="../styles/menuPage.css" />

</head>

<body>
    <div class="shop-details">
        <!--            <h1>The Music Alley</h1>-->
        <!--            <h2 class="shop-motto">Good music only in Music Alley</h2>-->
        <div class="logo">
            <!--                <img src="../imgs/logo.png" width="270" height="270"/>-->
            <img src="../imgs/music alley logo.png" width="300" height="180" />
        </div>
        <h2 class="shop-motto">Good music only in Music Alley</h2>

    </div>

    <h1>Sign up or Log in</h1>

    <div class="container">

        <div class="choices">
            <a href="register.php"><button>Register</button></a>
            <a href="login.php"><button>Log in</button></a>
            <a href="adminLogin.php">Admin</a>
        </div>
    </div>
</body>

</html>