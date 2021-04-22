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
        echo "<script type='text/javascript'> window.open('./answerUserController.php', '_self');</script>";      
        
   }else{
       //Player registered and the game is active       
       if ($playerControl->registerPlayer($currentGameId,session_id(),"Jesus de Nazareth") >0){       
        echo "<script type='text/javascript'> window.open('./answerUserController.php', '_self');</script>";
       }       
   }
}else{    
    // require '../view/answerUserNoQuestionView.php';
    echo "GAME NO SET";
}

unset($gameControl);
unset($playerControl);

?>