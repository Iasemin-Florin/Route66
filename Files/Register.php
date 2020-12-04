<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSS/Register.css">
    <title>Register</title>
</head>
<body>
    <div class="login">
        <form action="../inc/Register.inc.php" class="login-form" method="post">
            <h1>Register</h1>
            <?php 
                if (isset($_GET['error'])) {
                    if ($_GET["error"] == "empty") {
                        echo '<h2>Fill in all the fields</h2>';
                    }
                    elseif ($_GET['error'] == "invaliduid") {
                        echo '<h2>The username is invalid</h2>';
                    }
                    elseif ($_GET['error'] == "invalidemail") {
                        echo '<h2>The email is invalid</h2>';
                    }
                    elseif ($_GET['error'] == "passworddontmatch") {
                        echo '<h2>The passwords dont match</h2>';
                    }
                    elseif ($_GET['error'] == "usernametaken") {
                        echo '<h2>The username is taken</h2>';
                    }
                    elseif ($_GET['error'] == "emailtaken") {
                        echo '<h2>The eail is taken</h2>';
                    }
                    elseif ($_GET['error'] == "none") {
                        echo '<h2>You have signed up</h2/';
                    }
                }
            ?>
            <label for="username">Insert Username</label>
            <input type="text" name="username" id="username">

            <label for="email">Insert Email</label>
            <input type="email" name="email" id="email">

            <label for="password">Insert Password</label>
            <input type="password" name="password" id="password">

            <label for="password">Repeat Password</label>
            <input type="password" name="passwordRepeat" id="passwordRepeat">

            <input type="submit" name="submit" value="Register">
            <link rel="stylesheet" href="Login.php"><a href="Login.php">Already got an account? Login</a>
        </form>
    </div>
</body>
</html>