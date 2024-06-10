<?php
    session_start();
    require('../DBConnect.php');


function showUserList() {
    require('../DBConnect.php');
        // Number of records to show per page:
        $display = 10;

        // Determine how many pages there are...
        if (isset($_GET['p']) && is_numeric($_GET['p'])) { // Already been determined.
            $pages = $_GET['p'];
        } else { // Need to determine.
            // Count the number of records:
            $q = "SELECT COUNT(id_user) FROM entity_user"; //counts the total number of users 
            //echo "q is ". $q;
            $r = $conn->query($q);

            $row = mysqli_fetch_array($r, MYSQLI_NUM);

            $records = $row[0]; //The total amount of records in entity_user
            // echo "records is " . $records;
            // Calculate the number of pages...
            if ($records > $display) { // More than 1 page.
                $pages = ceil($records / $display);
            } else {
                $pages = 1;
            }
        }

        if (isset($_GET['s']) && is_numeric($_GET['s'])) {//This is commonly used for 
            //pagination, where 's' might represent the starting index of records to display on a page.
            $start = $_GET['s'];
        } else {
            $start = 0;
        }

        // Determine the sort...
        // Default is by registration date.
        $sort = (isset($_GET['sort'])) ? $_GET['sort'] : 'rd';

        // Determine the sorting order:
        switch ($sort) {
            case 'ln':
                $order_by = 'last_name ASC';
                break;
            case 'fn':
                $order_by = 'first_name ASC';
                break;
            case 'rd':
                $order_by = 'registration_date ASC';
                break;
            default:
                $order_by = 'registration_date ASC';
                $sort = 'rd';
                break;
        }

        // Define the query:
        $q = "SELECT last_name, first_name, DATE_FORMAT(registration_date, '%M %d, %Y') AS dr, id_user FROM entity_user ORDER BY $order_by LIMIT $start, $display";		
        $r = $conn->query($q);// Run the query.

       echo '<table align="center" cellspacing="0" cellpadding="5" width="900px">
            <tr class="table-header">
                <td align="left"><b>Edit</b></td>
                <td align="left"><b>Delete</b></td>
                <td align="left"><b><a href="admin_user.php?sort=ln">Last Name</a></b></td>
                <td align="left"><b><a href="admin_user.php?sort=fn">First Name</a></b></td>
                <td align="left"><b><a href="admin_user.php?sort=rd">Date Registered</a></b></td>
            </tr>';
    
    $bg = '#EEEBE5'; 
    while ($row = mysqli_fetch_array($r, MYSQLI_ASSOC)) {
        $bg = ($bg=='#EEEBE5' ? '#ffffff' : '#EEEBE5');
            echo '<tr bgcolor="' . $bg . '">
            <td align="left"><a href="edit_user.php?id=' . $row['id_user'] . '">Edit</a></td>
            <td align="left"><a href="delete_user.php?id=' . $row['id_user'] . '">Delete</a></td>
            <td align="left">' . $row['last_name'] . '</td>
            <td align="left">' . $row['first_name'] . '</td>
            <td align="left">' . $row['dr'] . '</td>
        </tr>
        ';
    } // End of WHILE loop.
    echo '</table>';
   

    userPages($start, $display, $pages, $sort);
        mysqli_free_result ($r);
        mysqli_close($conn);
}

function userPages($start, $display, $pages, $sort) {

    echo '<div class="pagination">';
    if ($pages > 1) {
	
        echo '<br /><p>';
        $current_page = ($start/$display) + 1;
        if ($current_page != 1) {
            echo '<a href="admin_user.php?s=' . ($start - $display) . '&p=' . $pages . '&sort=' . $sort . '">Previous</a>';
        }
        
            // If it's not the first page, make a Previous button:
           
            
            // Make all the numbered pages:
            for ($i = 1; $i <= $pages; $i++) {
                if ($i != $current_page) {
                    echo '<a href="admin_user.php?s=' . (($display * ($i - 1))) . '&p=' . $pages . '&sort=' . $sort . '">' . $i . '</a>';
                } else {
                    echo $i . ' ';
                }
            } // End of FOR loop.
            
            // If it's not the last page, make a Next button:
            if ($current_page != $pages) {
                echo '<a href="admin_user.php?s=' . ($start + $display) . '&p=' . $pages . '&sort=' . $sort . '">Next</a>';
            }
            
            echo '</p>'; // Close the paragraph.
            
        } // End of links section.
    echo '</div>';

}

