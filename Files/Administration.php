<?php 
    include 'dbconnect.php';
    
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
    <title>Document</title>

    <!-- Datatables CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.22/css/jquery.dataTables.min.css">
    <!-- Datatables Responsive CSS -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.6/css/responsive.dataTables.min.css">
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
                    <li><a href="Index.php">Home</a></li>
                    <li><a href="Giveaway.html">Giveaway</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="brown-container">
        <div class = "container">
            <div class="data-tables">
            <table id="dataTable" class="text-center dataTable no-footer">
                <thead class="bg-light text-capitalize">
                    <tr>
                        <th>ID:</th>
                        <th>First name:</th>
                        <th>Last name:</th>
                        <th>Email:</th>
                        <th>Entered:</th>
                        <th>Answer:</th>
                    </tr>
                </thead>
                <tbody>
                <?php
                    foreach($data as $user)
                    {
                        echo "<th>".$user["userID"]."</th>
                              <th>".$user["firstName"]."</th>
                              <th>".$user["lastName"]."</th>
                              <th>".$user["mail"]."</th>
                              <th>".$user["entered"]."</th>
                              <th>".$user["answer"]."</th>";
                    }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="Modal.js"></script>
    <script src="Index.js"></script>
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