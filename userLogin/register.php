<?php
session_start();
$page_title = 'Register';

//include ('../includes/header.html');
include ('../includes/index.php');

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // echo 'server is running<br>';
    require ('../DBConnect.php'); //<- no need to do this bcs we alrdy initialized db in index.php?
    $errors = array();

    if (empty($_POST['first_name'])) {
        $errors[] = 'Please Enter First Name';
    } else {
        $fn = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    }

    if (empty($_POST['last_name'])) {
        $errors[] = 'Please Enter Last Name';
    } else {
        $ln = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    }

    if (empty($_POST['email'])) {
        $errors[] = 'Please Enter Your Email Address';
    } else {
        $e = mysqli_real_escape_string($conn, trim($_POST['email']));
    }

    if (!empty($_POST['pass1'])) {
        if ($_POST['pass1'] != $_POST['pass2']) {
            $errors[] = 'Your Password Does Not Match Confirmed Password';
        } else {
            $pass = mysqli_real_escape_string($conn, trim($_POST['pass1']));
        }
    } else {
        $errors[] = 'Please Enter a Password';
    }

    if (empty($errors)) {
        //$q make the query to insert
        //echo "Okay, no errors, insert to db...<br>";

        //check if user already exists. 
        // $email = "SELECT email FROM entity_user WHERE email='$e' ";
        $q = "INSERT INTO `entity_user`(`first_name`,`last_name`,`email`,`password`,`registration_date`)VALUES('$fn', '$ln', '$e', SHA1('$pass'), NOW() )";

        $r = mysqli_query($conn, $q);//run the $ifexist query

        if ($r) { // If it ran OK.
		
			// Print a message:
			echo '<h1>Thank you!</h1>
		    <p>You are now registered. In</p><p><br /></p>';	
            $qId = "SELECT id_user, first_name, last_name FROM entity_user WHERE email='$e' "; //getting the id of the user
            // echo "Query: $qId<br>";

            $queryId = $conn->query($qId);
            $result = $queryId->fetch_assoc();


        // echo "id: " . $result['id_user'];
           if ($result) { 
                $userInfo = array("id"=>$result['id_user'], "fn"=>$result['first_name'], "ln"=>$result['last_name']);
                $userInfo_json = json_encode($userInfo);
                if (!isset($_COOKIE['user'])) {
                    setcookie('user', $userInfo_json, time() + 3600, '/', '', 0, 0);
                }
                $_SESSION['user'] = $result['first_name'];
           
            }
            
    
            header("Location: ../shop.php");
		
		} else {
            echo '<h1>System Error</h1>';
            echo '<p class="error">You could not be registered due to a system error. We apologize for any inconvenience.</p>'; 
            // // Debugging message:
            // echo '<p>' . mysqli_error($dbc) . '<br /><br />Query: ' . $q . '</p>';
            mysqli_close($conn);
            exit();
        }
        
   
    } 
	
	mysqli_close($conn); // Close the database connection.

} // End of the main Submit conditional.

    



    //        else {
//            echo '<h1>Error! </h1>
//            <p class="error">The following error(s) occurred:<br />';
//		foreach ($errors as $msg) { // Print each error.
//			echo " - $msg<br />\n";
//		}
//            echo '</p><p>Please try again.</p><p><br /></p>';
//            
//        }

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

    <link rel="stylesheet" href="../styles/styles.css" />

</head>

<body>
    <div class="shop-details">
        <!--            <h1>The Music Alley</h1>-->
        <!--            <h2 class="shop-motto">Good music only in Music Alley</h2>-->
        <div class="logo">
            <!--                <img src="../imgs/logo.png" width="270" height="270"/>-->
            <img src="../imgs/music alley logo.png" width="300" height="170" />
        </div>
        <h2 class="shop-motto">Good music only in Music Alley</h2>

    </div>


    <h1>Register</h1>

    <div class="error"> <?php if (!empty($errors)) {
                    echo '<h1>Errors!</h1>';
                    foreach ($errors as $error) {
                        echo $error . "<br>";
                    }
                } ?>
    </div>
    <div class="form-elements">
        <div class="container">
            <form action="register.php" method="post">
                


                <h3>First Name: </h3>
                <input type="text" name="first_name" size="45" maxlength="20" value="<?php if (isset($_POST['first_name']))
                    echo $_POST['first_name']; ?>" />
                <h3>Last Name: </h3>
                <input type="text" name="last_name" size="15" maxlength="40" value="<?php if (isset($_POST['last_name']))
                    echo $_POST['last_name']; ?>" />
                <h3>Email: </h3>
                <input type="text" name="email" size="20" maxlength="60" value="<?php if (isset($_POST['email']))
                    echo $_POST['email']; ?>" />
                <h3>Password: </h3>
                <input type="password" name="pass1" size="10" maxlength="20" value="<?php if (isset($_POST['pass1']))
                    echo $_POST['pass1']; ?>" />
                <h3>Confirm Password: </h3><input type="password" name="pass2" size="10" maxlength="20" value="<?php if (isset($_POST['pass2']))
                    echo $_POST['pass2']; ?>" />
                <button id="submit" type="submit" value="Register">Create an Account</button>
            </form>
            
            <!-- <button id="submit" type="submit">Login</button> CHANGE TO THIS ONCE 
                        PHP/DATABASE HANDLING IS OK-->
            <!--                <script type="text/javascript">
                        document.getElementById("submit").onclick = function () {
                            location.href = "../shop.php";
                        };
                    </script>-->
        </div>
    </div>


</body>

</html>