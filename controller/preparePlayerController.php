<?php
declare(strict_types=1);
session_start();

require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";
require "../model/GameControl.php";
require "../model/PlayerControl.php";


$gameControl=new GameControl();
$playerControl=new PlayerControl();

$currentGameId=$gameControl->getIdGame();
$currentActiveGame=$gameControl->getActiveGame($currentGameId);


if (isset($currentActiveGame) && $currentActiveGame == 1){
   //game set sucecssfully
   $loggedPlayer=$playerControl->getInfoPlayer($currentGameId,session_id());
    
   if (isset($loggedPlayer) and empty($loggedPlayer)==false){
       
       //$gameStarted=$gameControl->getStartedGame($currentGameId);
       //var_dump($gameStarted);
       //if (isset($gameStarted) && $gameStarted == 1){
           //Game strated
           //Openwindow player answers with Javascript
            echo "<script type='text/javascript'> window.open('./answerUserController.php', '_self');</script>";
       //} 
        
   }else{
       //Player registered and the game is active
       //Register Player
       if ($playerControl->registerPlayer($currentGameId,session_id(),"Jesus de Nazareth") >0){
        // echo "Usuario Registrado"; 
        echo "<script type='text/javascript'> window.open('./answerUserController.php', '_self');</script>";
       }       
   }
}else{
    //game no set
    // require '../view/answerUserNoQuestionView.php';
    echo "GAME NO SET";
}

unset($gameControl);
unset($playerControl);

?>