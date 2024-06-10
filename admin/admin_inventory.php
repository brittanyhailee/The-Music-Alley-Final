<?php

    session_start();
    require('../DBConnect.php');
    include ('adminHeader.html');
    // include('user_inventory_functions.php');

function showProductList() {
    require('../DBConnect.php');
    // Number of records to show per page:
    $display = 10;

    // Determine how many pages there are...
    if (isset($_GET['productP']) && is_numeric($_GET['productP'])) { // Already been determined.
        $pages = $_GET['productP'];
    } else { // Need to determine.
        // Count the number of records:
        $q = "SELECT COUNT(id_product) FROM entity_product"; //counts the total number of users 
        //echo "q is ". $q;
        $r = $conn->query($q);

        $row = mysqli_fetch_array($r, MYSQLI_NUM);

        $records = $row[0]; //The total amount of records in entity_product
        // echo "records is " . $records;
        // Calculate the number of pages...
        if ($records > $display) { // More than 1 page.
            $pages = ceil($records / $display);
        } else {
            $pages = 1;
        }
    }

    if (isset($_GET['productS']) && is_numeric($_GET['productS'])) {//This is commonly used for 
        //pagination, where 's' might represent the starting index of records to display on a page.
        $start = $_GET['productS'];
    } else {
        $start = 0;
    }

    // Determine the sort...
    // Default is by registration date.
    $sort = (isset($_GET['productSort'])) ? $_GET['productSort'] : 'nm';

    // Determine the sorting order:
    switch ($sort) {
        case 'nm':
            $order_by = 'name ASC';
            break;
        case 'at':
            $order_by = 'artist ASC';
            break;
        case 'id':
            $order_by = 'id_product ASC';
            break;
        default:
            $order_by = 'name ASC';
            $sort = 'nm';
            break;
    }
    
    // Define the query:
    $q = "SELECT id_product, name, artist, stock, price FROM entity_product ORDER BY $order_by LIMIT $start, $display";		
    $r = $conn->query($q);

echo '<table align="center" cellspacing="0" cellpadding="5" width="900px">
        <tr class="inventory-header">
            <td align="left"><b>Edit</b></td>
            <td align="left"><b>Delete</b></td>
            <td align="left"><b><a href="admin_inventory.php?productSort=id">ID</a></b></td>
            <td align="left"><b><a href="admin_inventory.php?productSort=nm">Product</a></b></td>
            <td align="left"><b><a href="admin_inventory.php?productSort=at">Artist</a></b></td>
            <td align="left"><b>Price</b></td>
            <td align="left"><b>Stock</b></td>
        </tr>';

$bg = '#EEEBE5'; 
while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
    $bg = ($bg=='#EEEBE5' ? '#ffffff' : '#EEEBE5');
    echo '<tr bgcolor="' . $bg . '">
            <td align="left"><a href="edit_product.php?id=' . $row['id_product'] . '">Edit</a></td>
            <td align="left"><a href="delete_product.php?id=' . $row['id_product'] . '">Delete</a></td>
            <td align="left">' . $row['id_product'] . '</td>
            <td align="left">' . $row['name'] . '</td>
            <td align="left">' . $row['artist'] . '</td>
            <td align="left">' . $row['price'] . '</td>
            <td align="left">' . $row['stock'] . '</td>
        </tr>';
} // End of WHILE loop.

echo'</table>';
    productPages($start, $display, $pages, $sort);

}

function productPages($start, $display, $pages, $sort) {
    $onlyPage = 1;
    echo '<div class="pagination">';
    if ($pages > 1) {
	
        echo '<br /><p>';
        $current_page = ($start/$display) + 1;
        echo $current_page;
        
        // If it's not the first page, make a Previous button:
        if ($current_page != 1) {
            echo '<a href="admin_inventory.php?productS=' . ($start - $display) . '&productP=' . $pages . '&productSort=' . $sort . '">Previous</a>';
        }
        
        // Make all the numbered pages:
        for ($i = 1; $i <= $pages; $i++) {
            if ($i != $current_page) {
                echo '<a href="admin_inventory.php?productS=' . (($display * ($i - 1))) . '&productP=' . $pages . '&productSort=' . $sort . '">' . $i . '</a>';
            } else {
                echo $i . ' ';
            }
        } // End of FOR loop.
        
        // If it's not the last page, make a Next button:
        if ($current_page != $pages) {
            echo '<a href="admin_inventory.php?productS=' . ($start + $display) . '&productP=' . $pages . '&productSort=' . $sort . '">Next</a>';
        }
        
        echo '</p>'; // Close the paragraph.
        
    } else {
        // echo '<a href="admin_inventory.php?productS=' . $start . '&productP=' . $pages . '&productSort=' . $sort . '">'.$pages.'</a>';
    } // End of links section.
    echo '</div>';

}


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
<link rel="stylesheet" href="adminMenu.css"/>
<script src="inventory_functions.js"></script>

</head>

<body>
<div class="welcome-msg"><h1>Hey there, Admin!</h1></div> 

    <div id="add-product">
        <a href="add_product.php"><button class="add">Add Product</button></a>
    </div>

<!-- <section class="table"> -->
    <div class="selection">
        <div><a href="admin_user.php"><button id="users" class="choice">Users</button></a></div>
        <div><button id="inventory" class="choice">Inventory</button></a></div>
    </div>
    <section id="user-list" style='display: none;'>
    
   
    </section>
    <section id="inventory-list">
        
        <?php 
        showProductList(); ?>
        

    </section>
   


</body>

</html>