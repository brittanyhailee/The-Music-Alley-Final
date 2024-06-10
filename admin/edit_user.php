<?php # Script 10.3 - edit_user.php
// This page is for editing a user record.
// This page is accessed through view_users.php.


// include ('includes/header.html');
include ('adminHeader.html');
error_reporting(E_ALL);
ini_set('display_errors', 1);

// Check for a valid user ID, through GET or POST:
if ((isset($_GET['id'])) && (is_numeric($_GET['id']))) { // From view_users.php
    $id = $_GET['id'];
    // echo 'the id is '.$id;

} elseif ((isset($_POST['id'])) && (is_numeric($_POST['id']))) { // Form submission.
    $id = $_POST['id'];
} else { // No valid ID, kill the script.
    echo '<p class="error">This page has been accessed in error.</p>';
    exit();
}

require ('../DBConnect.php');

// Check if the form has been submitted:
if ($_SERVER['REQUEST_METHOD'] == 'POST') {

    $errors = array();

    // Check for a first name:
    if (empty($_POST['first_name'])) {
        $errors[] = 'You forgot to enter your first name.';
    } else {
        $fn = mysqli_real_escape_string($conn, trim($_POST['first_name']));
    }

    // Check for a last name:
    if (empty($_POST['last_name'])) {
        $errors[] = 'You forgot to enter your last name.';
    } else {
        $ln = mysqli_real_escape_string($conn, trim($_POST['last_name']));
    }

    // Check for an email address:
    if (empty($_POST['email'])) {
        $errors[] = 'You forgot to enter your email address.';
    } else {
        $e = mysqli_real_escape_string($conn, trim($_POST['email']));
    }

    if (empty($errors)) { // If everything's OK.

        //  Test for unique email address:
        $q = "SELECT id_user FROM entity_user WHERE email='$e' AND id_user != $id";

        $r = @mysqli_query($conn, $q);
        if (mysqli_num_rows($r) == 0) {

            // Make the query:
            $q = "UPDATE entity_user SET first_name='$fn', last_name='$ln', email='$e' WHERE id_user=$id LIMIT 1";
            $r = @mysqli_query($conn, $q);
            if (mysqli_affected_rows($conn) == 1) { // If it ran OK.

                // Print a message:
                echo '<div id="status">The user has been edited.</div>';

            } else { // If it did not run OK.
                echo '<div id="status" class="error">The user could not be edited due to a system error. We apologize for any inconvenience.</div>'; // Public message.
                echo '<div id="status">' . mysqli_error($conn) . '<br />Query: ' . $q . '</div>'; // Debugging message.
            }

        } else { // Already registered.
            echo '<div id="status" class="error">The email address has already been registered.</div>';
        }

    } else { // Report the errors.

        echo '<div id="status" class="error">The following error(s) occurred:<br />';
        foreach ($errors as $msg) { // Print each error.
            echo " - $msg<br />\n";
        }
        echo '</div><div id="status">Please try again.</div>';

    } // End of if (empty($errors)) IF.

} // End of submit conditional.

// Always show the form...

// Retrieve the user's information:
$q = "SELECT first_name, last_name, email FROM entity_user WHERE id_user=$id";
$r = @mysqli_query($conn, $q);


if (mysqli_num_rows($r) == 1) { // Valid user ID, show the form.

    // Get the user's information:
    $row = mysqli_fetch_array($r, MYSQLI_NUM);

    // Create the form:
//     echo '<form action="edit_user.php" method="post">
// <p>First Name: <input type="text" name="first_name" size="15" maxlength="15" value="' . $row[0] . '" /></p>
// <p>Last Name: <input type="text" name="last_name" size="15" maxlength="30" value="' . $row[1] . '" /></p>
// <p>Email Address: <input type="text" name="email" size="20" maxlength="60" value="' . $row[2] . '"  /> </p>
// <p><input type="submit" name="submit" value="Submit" /></p>
// <input type="hidden" name="id" value="' . $id . '" />
// </form>';

} else { // Not a valid user ID.
    echo '<p class="error">This page has been accessed in error.</p>';
}

mysqli_close($conn);
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
    <link rel="stylesheet" href="adminMenu.css" />

</head>

<body>
    <div class="welcome-msg">
        <h1>Hey there, Admin!</h1>
    </div>

    <section class="form-container">
        <div class="selection">
            <div><a href="admin_user.php"><button id="backBtn" class="choice"><img src="../imgs/backButton.svg"
                            height='30px' width='30px'></button></a></div>
            <div><button id="editUser" class="choice">Editing User</button></div>

        </div>

        <form action="edit_user.php" method="post">
            <div class="edit-input">First Name: <input type="text" name="first_name" size="15" maxlength="15"
                    value="<?= $row[0] ?>" /></div>
            <div class="edit-input">Last Name: <input type="text" name="last_name" size="15" maxlength="30"
                    value="<?= $row[1] ?>" /></div>
            <div class="edit-input">Email Address: <input type="text" name="email" size="20" maxlength="60"
                    value="<?= $row[2] ?>" /> </div>
            <div class="submit-edit"><input type="submit" name="submit" value="Submit" /></div>
            <input type="hidden" name="id" value=" <?= $id ?> " />
        </form>
    </section>





</body>

</html>