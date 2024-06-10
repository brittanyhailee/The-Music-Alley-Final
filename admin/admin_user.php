<?php
    session_start();
    include ('adminHeader.html');
    include('user_functions.php');
    require_once ('../DBConnect.php');


    // // Number of records to show per page:
    // $display = 10;

    // // Determine how many pages there are...
    // if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
    //     $pages = $_GET['p'];
    // } else { // Need to determine.
    //     // Count the number of records:
    //     $q = "SELECT COUNT(id_user) FROM entity_user"; //counts the total number of users 
    //     //echo "q is ". $q;
    //     $r = $conn->query($q);

    //     $row = mysqli_fetch_array($r, MYSQLI_NUM);

    //     $records = $row[0]; //The total amount of records in entity_user
    //     //echo "records is " . $records;
    //     // Calculate the number of pages...
    //     if ($records > $display) { // More than 1 page.
    //         $pages = ceil($records / $display);
    //     } else {
    //         $pages = 1;
    //     }
    // }

    // if (isset($_GET['s']) && is_numeric($_GET['s'])) {//This is commonly used for 
    //     //pagination, where 's' might represent the starting index of records to display on a page.
    //     $start = $_GET['s'];
    // } else {
    //     $start = 0;
    // }

    // // Determine the sort...
    // // Default is by registration date.
    // $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

    // // Determine the sorting order:
    // switch ($sort) {
    //     case 'ln':
    //         $order_by = 'last_name ASC';
    //         break;
    //     case 'fn':
    //         $order_by = 'first_name ASC';
    //         break;
    //     case 'rd':
    //         $order_by = 'registration_date ASC';
    //         break;
    //     default:
    //         $order_by = 'registration_date ASC';
    //         $sort = 'rd';
    //         break;
    // }

    // // Define the query:
    // $q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, id_user FROM entity_user ORDER BY $order_by LIMIT $start, $display";		
    // $r = $conn->query($q);// Run the query.

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
    <script src="user_functions.js"></script>

</head>

<body>
   <div class="welcome-msg"><h1>Hey there, Admin!</h1></div> 

    <!-- <section class="table"> -->
        <div class="selection">
            <div><button id="users" class="choice">Users</button></div>
            <div><a href="admin_inventory.php"><button id="inventory" class="choice">Inventory</button></a></div>
        </div>
        <section id="user-list">
        <!-- <section id="user-list"> -->
        <!-- <table align="center" cellspacing="0" cellpadding="5" width="900px">
            <tr class="table-header">
                <td align="left"><b>Edit</b></td>
                <td align="left"><b>Delete</b></td>
                <td align="left"><b><a href="admin.php?sort=ln">Last Name</a></b></td>
                <td align="left"><b><a href="admin.php?sort=fn">First Name</a></b></td>
                <td align="left"><b><a href="admin.php?sort=rd">Date Registered</a></b></td>
            </tr> -->
           
            <?php showUserList();
     
            ?>
        </table>
        
       
        </section>

       


</body>

</html>