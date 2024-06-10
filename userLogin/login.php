<?php
session_start();
$page_title = 'Login';

//include ('../includes/header.html');
include ('../includes/index.php');
include('../DBConnect.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {

	$errors = array(); // Initialize error array.

	// Validate the email address:
	if (empty($_POST['email'])){
		$errors[] = 'You forgot to enter your email address.';
	} else {
		$e = mysqli_real_escape_string($conn, trim($_POST['email']));
	}

	// Validate the password:
	if (empty($_POST['password'])) {
		$errors[] = 'You forgot to enter your password.';
	} else {
		$p = mysqli_real_escape_string($conn, trim($_POST['password']));
	}

    
    

	if (empty($errors)) { // If everything's OK.
        // echo "errors are empty";
        $q = "SELECT id_user, first_name, last_name, email, password FROM entity_user WHERE email='$e' AND password=SHA1('$p')";		
		$r = @mysqli_query ($conn, $q); // Run the query.
		// Check the result:
        echo SHA1($p);

        // if (!$r) {
        //     // Query execution failed, print error message
        //     echo "Error: " . mysqli_error($conn);
        // } else {
        //     echo "no error here";
        // }
		if (mysqli_num_rows($r) == 1) {

			// Fetch the record:
            
			$row = mysqli_fetch_array ($r, MYSQLI_ASSOC);
           
            $userInfo = array("id"=>$row['id_user'], "fn"=>$row['first_name'], "ln"=>$row['last_name']);
            $userInfo_json = json_encode($userInfo);
            if (!isset($_COOKIE['user'])) {
                setcookie('user', $userInfo_json, time() + 3600, '/', '', 0, 0);
            }
            $_SESSION['user'] = $row['first_name'];
            
                
            
            header("Location: ../shop.php");
			// Return true and the record:
			
		} else { // Not a match!
            $errors[] = 'The email address and password entered do not match those on file.';
            
        }
        
	} else { // Not a match!
        $errors[] = 'The email address and password entered do not match those on file.';
		
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
                <form action="login.php" method="post">

                   

                <h3>Email: </h3>
                <input type="text" name="email" size="45" maxlength="20" value="<?php if (isset($_POST['email']))
                    echo $_POST['email']; ?>" />
                <h3>Password: </h3>
                <input type="text" name="password" size="15" maxlength="40" value="<?php if (isset($_POST['password']))
                    echo $_POST['password']; ?>" />
        
                <button id="submit" type="submit" value="Login">Login</button>
                    <!-- <button id="submit" type="submit">Login</button> CHANGE TO THIS ONCE 
                        PHP/DATABASE HANDLING IS OK-->
                   
                </form>
            </div>
        </div>
    </body>
</html>