<?php
include ('../DBConnect');
?>

<!DOCTYPE html>
<!--
Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/ClientSide/html.html to edit this template
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
    <link rel="stylesheet" href="menuStyles.css" />

</head>

<body>
    <header class="nav-bar">
        <div class="shop-name">The Music Alley</div>
        <div class="bar-content">

            <a href="index.php?page=shop">Home</a>
            <a href="index.php?page=check_cart"><img src="imgs/cart.svg" width="30" height="30" />Cart</a>
            <a href="userLogin/menuPage.php"> Logout</a>

            <!-- <a href="#contact">Contact</a> -->
        </div>
    </header>
</body>

</html>