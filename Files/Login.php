<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Login.css">
    <title>Login</title>
</head>
<body>
    <div class="login">
        <form action="../inc/Login.inc.php" class="login-form" method="post">
            <h1>Login</h1>

            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET["error"] == "empty") {
                        echo '<h2>Fill in all the fields</h2>';
                    }
                    elseif ($_GET['error'] == "wronglogin") {
                        echo '<h2>The username or password was incorrect</h2>';
                    }
                }
            ?>
            <label for="username">Username</label>
            <input type="text" name="username" id="username">

            <label for="password">Password</label>
            <input type="password" name="password" id="password">

            <input type="submit" value="Login">
            <link rel="stylesheet" href="Register.php"><a href="Register.php">Don't have an account ? Register</a>
        </form>
    </div>
</body>
</html>