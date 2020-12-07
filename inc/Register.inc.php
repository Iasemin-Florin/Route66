<?php
    require 'dbconnect.php';
    require 'functions.inc.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {

        $username = $_POST['username'];
        $password = $_POST['password'];
        $passwordRepeat = $_POST['passwordRepeat'];
        $email = $_POST['email'];


        if (emptyInputString($username, $password, $passwordRepeat, $email) !== false) {
            header("location: ../Files/Register.php?error=emptyinputs");
            exit();
        }
        if (invalidUid($username) !== false) {
            header("location: ../Files/Register.php?error=invaliduid");
            exit();
        }
        if (invalidEmail($email) !== false) {
            header("location: ../Files/Register.php?error=invalidemail");
            exit();
        }
        if (pwdMatch($password, $passwordRepeat) !== false) {
            header("location: ../Files/Register.php?error=passworddontmatch");
            exit();
        }
        if (uidExists($conn, $username) !== false) {
            header("location: ../Files/Register.php?error=usernametaken");
            exit();
        }
        if (emailExists($conn, $email) !== false) {
            header("location: ../Files/Register.php?error=emailtaken");
            exit();
        }
        createUser($conn, $username, $password, $email);
    }
    else {
        header("location: ..Files/Register.php");
        exit();
    }
?>
