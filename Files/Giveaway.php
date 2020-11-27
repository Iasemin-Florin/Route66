<?php
    include 'dbconnect.php';
    
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    $email = $_POST['email'];
    $answer = $_POST['answer'];
    

    //$to = $_POST['email'];
    $to = $_POST['email'];
    $subject = 'Giveaway competition';
    $message = "Hello " .$fname." " .$lname." you have succesfully entered the giveaway, you have entered for the month of november, the winner will be announced in the last day of the month";
    $headers = 'From: webmaster@example.com' . "\r\n" .
    'Reply-To: webmaster@example.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();
    
    function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

    $currentTime = microtime(true);
    $fnameERR = $lnameERR = $emailErr = $answerERR = "";
    $sql = "";

    $sql_e = "SELECT * FROM `userdata` WHERE mail = '$email'";
    $res_e = mysqli_query($conn, $sql_e);

    if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        if (empty($fname)) 
        {
            $fnameERR = "First name is required!";
            echo $fnameERR;

            return;
        }
        else 
        {
            $fname = test_input($_POST['fname']);

            if (!preg_match("/^[a-zA-Z-']*$/", $fname)) 
            {
                $fnameERR = "Only letters and white space allowed";
                echo $fnameERR;

                return;
            }
        }
        
        if (empty($lname)) 
        {
            $lnameERR = "Last name is required!";
            echo $lnameERR;

            return;
        }
        else 
        {
            $lname = test_input($_POST['lname']);
            
            if (!preg_match("/^[a-zA-Z]*$/", $lname)) 
            {
                $lnameERR = "Only letters and white space allowed";
                echo $lnameERR;

                return;
            }
        }
        if (empty($email)) 
        {
            $emailErr = "Email is required!";
            echo $emailErr;

            return;
        }
        else 
        {
            $email = test_input($_POST['email']);

            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) 
            {
                $emailErr = "Invalid email format";
                echo $emailErr;

                return;
            }
            else if (mysqli_num_rows($res_e) > 0)
            {
                $emailErr = "Sorry email is already taken";
                echo $emailErr;
                return;
            }
        }
        if (empty($answer)) 
        {
            $answerERR = "An answer is required";
            echo $answerERR;
            return;
        }
        else 
        {
            //NOTE TIL IMORGEN, TJEK HVILKET ID DEN HAR, HVIS DEN HAR DEN RIGTIGT ID SÅ SKAL DEN RETURN TRUE, HVIS DEN HAR FALSE ID SÅ SKAL DEN RETURN FALSE I DATABASEN
            
            $answer = test_input($_POST['answer']);
        }

        $sql = "INSERT INTO `userdata` (`firstName`, `lastName`, `mail`, `entered`, `answer`) 
        VALUES ('$fname', '$lname', '$email', '$currentTime', '$answer');";
        mysqli_query($conn, $sql);
        //echo " error: ".mysqli_error($conn);

        mail($to, $subject, $message, $headers);
    }
?>

<script type=""></script>