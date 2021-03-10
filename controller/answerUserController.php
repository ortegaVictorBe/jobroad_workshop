<?php
declare(strict_types=1);
session_start();

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

//Evaluate if there are Questions availables
$totalAvailableQuestions=$question->totalAvailableQuestions();

if (empty($totalAvailableQuestions)) {
    require '../view/answerUserView.php';    
}else{
    require '../view/answerUserNoQuestionView.php';
}

unset($answer);
unset($question);

?>