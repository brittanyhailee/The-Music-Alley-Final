<?php

    session_start();
    require_once('DBConnect.php');
    
    $page = isset($_GET['page']) && file_exists($_GET['page'] . '.php') ? $_GET['page'] : 'shop';
    include $page . '.php';
?>



<!--<!DOCTYPE html>

Click nbfs://nbhost/SystemFileSystem/Templates/Licenses/license-default.txt to change this license
Click nbfs://nbhost/SystemFileSystem/Templates/Other/html.html to edit this template

<html>
    <head>
        <title>Music Alley</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:ital,wght@0,400..900;1,400..900&family=Ubuntu:ital,wght@0,300;0,400;0,500;0,700;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="styles.css"/>
      
    </head>
    <body>
        <div class="shop-details">
            <h1>The Music Alley</h1>
            <h2 class="shop-motto">Login or Signup to Start Shopping Happily!</h2>
            <div class="logo">
                <img src="imgs/logo.svg" width="180" height="180"/>
            </div>
            
        </div>
        
        <form>
            <div class="container">
                <label for ="username"><b>Username</b></label>
                <input type="text" placeholder="Enter Username" name="username" required>
                <label for="psw"><b>Password</b></label>
                <input type="password" placeholder="Enter Password" name="psw" required>
                <button id="submit" type="button">Login</button>
                 <button id="submit" type="submit">Login</button> CHANGE TO THIS ONCE 
                      PHP/DATABASE HANDLING IS OK
                <script type="text/javascript">
                    document.getElementById("submit").onclick = function () {
                        location.href = "menu.html";
                    };
                </script>
            </div>
            
            
            
        </form>
    </body>
</html>
-->
