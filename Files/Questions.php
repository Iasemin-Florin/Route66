<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../CSS/Questions.css">
    <title>QuestionsPage</title>
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
                        <li><a href="http://localhost/Route99/Files/UpdateQuestion.php">Update Question</a></li>
                    </ul>
                </nav>
            </header>
    </div>
    <div class="question-container">
        <div class="container">
            <form action="../inc/questions.inc.php" method="post">
                <label for="question">Insert a question</label>
                <input type="text" name="question">
                <label for="answer1">enter a answer</label>
                <input type="text" name="answer1">
                <label for="answer2">enter another answer</label>
                <input type="text" name="answer2">
                <label for="answer3">enter another answer if you want</label>
                <input type="text" name="answer3">
                <label for="answer4">enter another answer if you want</label>
                <input type="text" name="answer4">
                <input type="submit" value="Upload question">
                </form>
        </div>
    </div>
    <script src="Index.js"></script>
</body>
</html>