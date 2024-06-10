<?php

include ('../DBConnect.php');

    session_start();
    session_unset();
    session_destroy();

header('location: menuPage.php');

?>