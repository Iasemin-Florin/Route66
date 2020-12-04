<?php 

//Admin Registration
function emptyInputString($username, $password, $passwordRepeat, $email) {
    if (empty($username) || empty($password) || empty($passwordRepeat) || empty($email)) {
        return true;
    }
    else {
        return false;
    }
}

function invalidUid($username) {
    if (!preg_match("/^[a-zA-Z0-9]*$/", $username)) {
        return true;
    }
    else {
        return false;
    }
}

function invalidEmail($email) {
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    }
    else {
        return false;
    }

}

function pwdMatch($password, $passwordRepeat) {
    if ($password !== $passwordRepeat) {
        return true;
    }
    else {
        return false;    
    }
    
}

function uidExists($conn, $username) {
    $sql = "SELECT * FROM `adminusers`  WHERE `username` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../files/Register.php?error=usernamexists");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $username);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
        return $row;
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function emailExists($conn, $email) {
    $sql = "SELECT * FROM `adminusers`  WHERE `email` = ?;";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../files/Register.php?error=emailexists");
        exit();
    }
    mysqli_stmt_bind_param($stmt, "s", $email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);

    if ($row = mysqli_fetch_assoc($resultData)) {
       
    }
    else {
        $result = false;
        return $result;
    }
    mysqli_stmt_close($stmt);
}

function createUser($conn, $username, $password, $email) {
    $sql = "INSERT INTO `adminusers` (`username`, `password`, `email`) VALUES (?, ?, ?)";
    $stmt = mysqli_stmt_init($conn);
    if (!mysqli_stmt_prepare($stmt, $sql)) {
        header("location: ../files/Register.php?error=failedcreation");
        exit();
    }

    $hashedPwd = password_hash($password, PASSWORD_DEFAULT);

    mysqli_stmt_bind_param($stmt, "sss", $username, $hashedPwd, $email);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);
    header("location: ../files/Register.php?error=none");
    exit();
}


//Admin login
function emptyInputLogin($username, $password){
    if (empty($username) || empty($password)){ 
        return true;
    }
    else {
        return false;
    }
}


function loginUser($conn, $username, $password){
    $uidExists = uidExists($conn, $username);

    if ($uidExists === false) {
        header("location: ../Files/Login.php?error=wronglogin");
        exit();
    }
    
    $hashedPwd = $uidExists["password"]; 
    $checkPwd = password_verify($password, $hashedPwd);

    if ($checkPwd === false) {
        header("location: ../Files/Login.php?error=wronglogin");
        exit();
    }
    elseif ($checkPwd === true) {
        session_start();
        $_SESSION["userID"] = $uidExists["ID"];
        $_SESSION["username"] = $uidExists["username"];
        header("location: ../Files/Administration.php");
        exit();
     }
}


