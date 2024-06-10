
<?php 

include ('../DBConnect.php');
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

$errors = array(); // Initialize error array.

// Validate the email address:
if (empty($_POST['username'])){
    $errors[] = 'You forgot to enter your username.';
} else {
    $e = mysqli_real_escape_string($conn, trim($_POST['username']));
}

// Validate the password:
if (empty($_POST['password'])) {
    $errors[] = 'You forgot to enter your password.';
} else {
    $p = mysqli_real_escape_string($conn, trim($_POST['password']));
}



    if (empty($errors)) { // If everything's OK.
        if($_POST['username'] == 'admin' && $_POST['password'] == 'admin123') {
            header('location: ../admin/admin_user.php');
        } else {
            $errors[] = 'The email address and password entered do not match those on file.';
                
        }
    }


// Return false and the errors:

} // End of check_login() function.
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
        <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&family=Special+Elite&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="../styles/styles.css" />
      
    </head>
    <body>
        <div class="shop-details">
<!--            <h1>The Music Alley</h1>-->
<!--            <h2 class="shop-motto">Good music only in Music Alley</h2>-->
            <div class="logo">
<!--                <img src="../imgs/logo.png" width="270" height="270"/>-->
                <img src="../imgs/music alley logo.png" width="300" height="180"/>
            </div>
            <h2 class="shop-motto">Good music only in Music Alley</h2>
            
        </div>

        <h1>Login</h1>
    
        <div class="error"> <?php if (!empty($errors)) {
                        echo '<h1>Errors!</h1>';
                        foreach ($errors as $error) {
                            echo $error . "<br>";
                        }
                    } ?>
                    </div>
        
        <div class="form-elements">
        
            <div class="container">
                <form action="adminLogin.php" method="post">


                <h3>Username: </h3>
                <input type="text" name="username" size="45" maxlength="20" value="<?php if (isset($_POST['username']))
                    echo $_POST['username']; ?>" />
                <h3>Password: </h3>
                <input type="text" name="password" size="15" maxlength="40" value="<?php if (isset($_POST['password']))
                    echo $_POST['password']; ?>" />
        
                <button id="submit" type="submit" value="Login">Login</button>
                    <!-- <button id="submit" type="submit">Login</button> CHANGE TO THIS ONCE 
                        PHP/DATABASE HANDLING IS OK-->
                   
                </form>
                <p>Username: admin</p><br>
                <p>Password: admin123</p>
            </div>
        </div>
    </body>
</html>
