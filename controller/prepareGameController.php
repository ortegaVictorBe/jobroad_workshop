<?php
declare(strict_types=1);
session_start();

require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";
require "../model/GameControl.php";


$gameControl=new GameControl();

//Aqui Limpiar las tablas de control y de respuestas de los usuarios

// $currentDate=date("d/m/Y h:i");
$currentDate=date(DATE_W3C);
$gameSeted=$gameControl->setGame(session_id(),5,5,$currentDate);

if (isset($gameSeted) && $gameSeted > 0){
 //game set sucecssfully
 require '../view/prepareGameView.php';    

}else{
    //game no set
    require '../view/answerUserNoQuestionView.php';
}

unset($gameControl);
//unset($question);

?>