<?php
    require 'dbconnect.php';
    require 'functions.inc.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        
        $username = $_POST["username"];
        $password = $_POST["password"];

        if (emptyInputLogin($username, $password) !== false) {
            header("location: ../Files/Login.php?error=emptyinput");
            exit();
        }

        loginUser($conn, $username, $password);

    }
    else {
        header("location: ..Files/Login.php");
        exit();
    }


?>