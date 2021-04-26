<?php
declare(strict_types=1);
session_start();

require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";
require "../model/GameControl.php";
require "../model/PlayerControl.php";

echo '<script type="text/javascript" src="https://code.jquery.com/jquery.js"></script>
<script>
$(document).ready(function() {
    function reloadView() {
        // location.reload();
        window.open("./answerUserController.php", "_self")
    }
    setInterval(reloadView, 5000);
});
</script>';


$answer= new Answer();
$question=new Question();
$gameControl=new GameControl();
$playerControl=new PlayerControl();

//Clean function - reviw the Dataentry
function cleanInput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
};

//Evaluate if there are Questions availables
$totalAvailableQuestions=$question->totalAvailableQuestions();
$currentGameId=$gameControl->getIdGame();

if ($totalAvailableQuestions['total_questions'] > 0) {
    $currentQuestion=$question->loadCurrentQuestion();
    // var_dump($currentQuestion);
    if($currentQuestion == 0){
        require '../view/answerUserNoQuestionView.php';
    }else{
        require '../view/answerUserView.php';    
    }
    
}else{
    
}

unset($answer);
unset($question);
unset($playerControl);
unset($gameControl);

?>