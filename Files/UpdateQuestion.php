<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/UpdateQuestion.css">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <header>
            <h1>Question Administration Page</h1>
            <nav>
                <a href="#" class="hide-desktop">
                    <i class="fa fa-bars" id="menu"></i>
                </a>
                <ul class="show-desktop hide-mobile" id="nav">
                    <li id="exit" class="exit-btn hide-desktop">
                        <img src="../Images/x.png" alt="" srcset="">
                    </li>
                    <li><a href="http://localhost/Route99/Files/Administration.php">Home</a></li>
                    <li><a href="http://localhost/Route99/Files/Giveaway.html">Giveaway</a></li>
                    <li><a href="http://localhost/Route99/Files/Questions.php">Create Question</a></li>
                </ul>
            </nav>
        </header>
    </div>
    <div class="current-question">
    </div>
    <div class="update-question">
        <div class="container">
            <form action="../inc/UpdateQuestion.inc.php" method="post">
                <h1>Update to new question</h1>
                
                <label for="questions">Choose a question:</label>

                <select name="questions" id="questions" method="POST">
                <option value="">Question</option>
                </select>

                <label for="answer1">Choose the first answer:</label>
                
                <select name="answer1" id="answer1">
                    <option value="">First Answer</option>
                </select>
                
                <label for="answer2">Choose the Second answer:</label>
                
                <select name="answer2" id="answer2">
                    <option value="">Second Answer</option>
                </select>
                
                <label for="answer3">Choose the Third answer:</label>
                
                <select name="answer3" id="answer3">
                    <option value="">Third Answer</option>
                </select>
                
                <label for="answer4">Choose the Fourth answer:</label>
                
                <select name="answer4" id="answer4">
                    <option value="">Fourth Answer</option>
                </select>

                <input type="submit" value="Update Question">
            </form>
        </div>
    </div>
    <script src="Index.js"></script>
</body>
</html>