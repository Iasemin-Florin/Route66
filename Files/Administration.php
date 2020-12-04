<?php 
    include '../inc/dbconnect.php';
    
    $sql = "SELECT * FROM `userdata`";
    $response = mysqli_query($conn, $sql);
    
    $data = array();

    if($response) 
    {
        while ($row = mysqli_fetch_assoc($response)) 
        {
            $data[] = $row;
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Administration.css">
    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- Datatables Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Administrator's Page</h1>
            <nav>
                 <a href="#" class="hide-desktop">
                    <i class="fa fa-bars" id="menu"></i>
                </a>
                <ul class="show-desktop hide-mobile" id="nav">
                    <li id="exit" class="exit-btn hide-desktop">
                        <img src="../Images/x.png" alt="" srcset="">
                    </li>
                    <li><a href="http://localhost/Route99/Files/Index.php">Home</a></li>
                    <li><a href="http://localhost/Route99/Files/Giveaway.html">Giveaway</a></li>
                    <li><a href="http://localhost/Route99/Files/Questions.html">Questions</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="brown-container">
        <div>
            <table>
                <tr>
                    <th>ID:</th>
                    <th>First name:</th>
                    <th>Last name:</th>
                    <th>Email:</th>
                    <th>Entered:</th>
                    <th>Answer:</th>
                </tr>
                <tr>
                    <?php 
                        foreach($data as $user)
                        {
                            echo "
                                <tr>
                                    <td>".$user['userID']."</td>
                                    <td>".$user['firstName']."</td>
                                    <td>".$user['lastName']."</td>
                                    <td>".$user['mail']."</td>
                                    <td>".strtotime($user['entered'])."</td>
                                    <td>".$user['answer']."</td>
                                    <br>
                                </tr>";
                        }
                    ?>
                </tr>
            </table>
        </div>
    </div>
    <script src="Modal.js"></script>
    <script src="Index.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <!-- Datatables JS -->
    <script src="https://cdn.datatables.net/1.10.22/js/jquery.dataTables.min.js"></script>
    <!-- Datatables Responsive JS -->
    <script src="https://cdn.datatables.net/responsive/2.2.6/js/dataTables.responsive.min.js"></script>
    
    <script>
        $('#dataTable').DataTable({
            responsive: true
        });
    </script>
</body>
</html>