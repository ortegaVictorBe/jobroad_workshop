<?php
declare(strict_types=1);
session_start();


require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";
require "../model/GameControl.php";


$answer= new Answer();
$question=new Question();
$gameControl=new GameControl();


//Getting the total of available Questions
$totalAvailableQuestions=$question->totalAvailableQuestions();
$currentGameId=$gameControl->getIdGame();


if ($totalAvailableQuestions['total_questions'] > 0) {   
        if ($_SERVER["REQUEST_METHOD"]=="POST") {
            
            if (isset($_POST['btnNextQuestionResults'])) {                      
                
                    $currentAvailableQuestion=$_SESSION['currentQuestion_order'];
                    $currentQuestion=$question->setCurrentQuestion($currentAvailableQuestion);
                    
                    if (empty($currentQuestion)) {
                        //Pensar que hacer aqui
                        echo " <strong>*Last Question!!</strong>";
                    }else{
                        $_SESSION['currentQuestion_ID']=$currentQuestion['ID'];
                        $_SESSION['currentQuestion_description']=$currentQuestion['description'];
                        $_SESSION['currentQuestion_order']=$currentQuestion['order'];                          
                    }                     
            } 


        }else{
            //The user didnt press any button
            // echo "no Post press";

            //Start Game with first Question
            $currentQuestion=$question->setCurrentQuestion(0);
            $_SESSION['currentQuestion_ID']=$currentQuestion['ID'];
            $_SESSION['currentQuestion_description']=$currentQuestion['description'];
            $_SESSION['currentQuestion_order']=$currentQuestion['order'];                          
            
            //Deleting the answers
            // $answer->deleteAnswers();
            // $question->commitChanges();
        };
        
        require '../view/startGameView.php';
}else{
    //No questions Availables at the beginning
    //Mandar al usuario a la tabla de preguntas
    require '../view/startGameNoQuestionsView.php';
}


unset($answer);
unset($question);
unset($gameControl);
?>