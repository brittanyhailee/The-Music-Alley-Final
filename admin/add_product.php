<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Add New Music</title>
</head>

<body>
    <?php # Script - add_print.php
// This page allows the administrator to add a print (product).
    
    require ('../DBConnect.php');
    error_reporting(E_ALL);

    if ($_SERVER['REQUEST_METHOD'] == 'POST') { // Handle the form.
    
        // Validate the incoming data...
        $errors = array();

        // Check for a print name:
        if (!empty($_POST['album_name'])) {
            $pName = trim($_POST['album_name']);
        } else {
            $errors[] = 'Please enter the print\'s name!';
        }


        // Check for an image:
        if (!empty($_POST['img_path'])) {
            $pImage = trim($_POST['img_path']);
        } else {
            $errors[] = 'Please enter the image path!';
        }


        // Check for a size (not required):
        if (!empty($_POST['stock'])) {
            $pStock = trim($_POST['stock']);
        } else {
            $errors[] = 'Please enter stock available!';
        }

        // Check for a price:
        if (is_numeric($_POST['price']) && ($_POST['price'] > 0)) {
            $pPrice = (float) $_POST['price'];
        } else {
            $errors[] = 'Please enter the print\'s price!';
        }

        // Check for a description (not required):
        $pDesc = (!empty($_POST['description'])) ? trim($_POST['description']) : NULL;

        // Validate the artist...
        if (!empty($_POST['artist'])) {
            $pArtist = trim($_POST['artist']);
            $pArtist = ucwords($pArtist);
        } else {
            $errors[] = 'Please enter the artist!';
        }


        if (empty($errors)) { // If everything's OK.
            // Add the print to the database:
            $qProduct = 'INSERT INTO entity_product (name, price, stock, description, image, artist) VALUES (?, ?, ?, ?, ?, ?)';
            $stmt = mysqli_prepare($conn, $qProduct);
            if (!$stmt) {
                die('Error: ' . mysqli_error($conn)); // Print error message if prepare fails
            }
            mysqli_stmt_bind_param($stmt, 'sdisss', $pName, $pPrice, $pStock, $pDesc, $pImage, $pArtist);
            mysqli_stmt_execute($stmt);

            // Check the results...
            if (mysqli_stmt_affected_rows($stmt) == 1) {

                // Print a message:
                echo '<p>The print has been added.</p>';

                // Rename the image:
    
                // Clear $_POST:
                $_POST = array();

            } else { // Error!
                echo '<p style="font-weight: bold; color: #C00">Your submission could not be processed due to a system error.</p>';
            }

            mysqli_stmt_close($stmt);

        } // End of $errors IF.
    
        // Delete the uploaded file if it still exists:
        if (isset($temp) && file_exists($temp) && is_file($temp)) {
            unlink($temp);
        }

    } // End of the submission IF.
    
    // Check for any errors and print them:
    if (!empty($errors) && is_array($errors)) {
        echo '<h1>Error!</h1>
	<p style="font-weight: bold; color: #C00">The following error(s) occurred:<br />';
        foreach ($errors as $msg) {
            echo " - $msg<br />\n";
        }
        echo 'Please reselect the print image and try again.</p>';
    }

    // Display the form...
    ?>
    <h1>Add New Music</h1>
    <form enctype="multipart/form-data" action="add_product.php" method="post">

        <input type="hidden" name="MAX_FILE_SIZE" value="4194304" />

        <fieldset>
            <legend>Fill out the form to add a new product to the catalog:</legend>

            <p><b>Album Name:</b> <input type="text" name="album_name" size="30" maxlength="60" value="<?php if (isset($_POST['album_name']))
                echo htmlspecialchars($_POST['album_name']); ?>" />
            </p>

            <p><b>Image path:</b> <input type="text" name="img_path" size="30" maxlength="60" value="<?php if (isset($_POST['img_path']))
                echo htmlspecialchars($_POST['img_path']); ?>" />
                <small>Please include 'products/' in the file path.</small>
            </p>

            <p><b>Artist:</b>
                <input type="text" name="artist" size="30" maxlength="60" value="<?php if (isset($_POST['artist']))
                    echo htmlspecialchars($_POST['artist']); ?>" />
            </p>

            <p><b>Media Type:</b>
                <select name="media">
                    <option>Select One</option>
                    <?php // Retrieve all the artists and add to the pull-down menu.
                    $queryMedia = "SELECT id_type, CONCAT_WS(' ', media) FROM enum_media ORDER BY id_type ASC";
                    $rMedia = mysqli_query($conn, $queryMedia);
                    if (mysqli_num_rows($rMedia) > 0) {
                        while ($row = mysqli_fetch_array($rMedia, MYSQLI_NUM)) {
                            echo "<option value=\"$row[0]\"";
                            // Check for stickyness:
                            if (isset($_POST['media']) && ($_POST['media'] == $row[0]))
                                echo ' selected="selected"';
                            echo ">$row[1]</option>\n";
                        }
                    }
                    mysqli_close($conn); // Close the database connection.
                    ?>
                </select>
            </p>



            <p><b>Price:</b> <input type="text" name="price" size="10" maxlength="10" value="<?php if (isset($_POST['price']))
                echo $_POST['price']; ?>" /> <small>Do not include the
                    dollar sign or commas.</small></p>

            <p><b>Stock:</b> <input type="text" name="stock" size="30" maxlength="60" value="<?php if (isset($_POST['stock']))
                echo htmlspecialchars($_POST['stock']); ?>" />
            </p>

            <p><b>Description:</b> <textarea name="description" cols="40" rows="5"><?php if (isset($_POST['description']))
                echo $_POST['description']; ?></textarea>
                (optional)</p>

        </fieldset>

        <div align="center"><input type="submit" name="submit" value="Submit" /></div>

    </form>

</body>

</html>