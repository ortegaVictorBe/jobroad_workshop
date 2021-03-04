<?php
declare(strict_types=1);
session_start();
// $questionsAnswered=[];
// $_SESSION['questionsAnswered']=$questionsAnswered;
echo session_id();

//require "model/autoload.php";
require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";

$answer= new Answer();
$question=new Question();

//Clean function - reviw the Dataentry
function cleanInput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
};

require '../view/answerUserView.php';
unset($answer);
unset($question);

?>