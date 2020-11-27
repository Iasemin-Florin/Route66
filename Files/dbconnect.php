<?php
    $serverName = "localhost";
    $username = "root";
    $password = "";
    $dbname = "giveaway";

    $conn = new mysqli($serverName, $username, $password, $dbname);
    
    if(!$conn)
    {
        die("Connection failed:". mysqli_connect_error());
    }

    /*CHECK IF DATABASE CONNECTION WORKS
    else {
        echo 'Congratz we connected bois ';
    }*/
?>