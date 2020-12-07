<?php
    require 'dbconnect.php';
    require 'functions.inc.php';

    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        $question = $_POST['question'];
        $answer1 = $_POST['answer1'];
        $answer2 = $_POST['answer2'];
        $answer3 = $_POST['answer3'];
        $answer4 = $_POST['answer4'];

        if (emptyQuestionString($question, $answer1, $answer2, $answer3, $answer4) !== false) {
            header("location: ../Files/Questions.php?error=emptyinputs");
            exit();
        }
        createQuestion($conn, $question, $answer1, $answer2, $answer3, $answer4);
    }
    else {
        header("location: ../Files/Questions.php");
    }   
?>