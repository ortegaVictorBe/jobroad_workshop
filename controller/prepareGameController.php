<?php
declare(strict_types=1);
session_start();

require "../model/ConnectDB.php";
require "../model/Question.php";
require "../model/Answer.php";
require "../model/GameControl.php";
require "../model/PlayerControl.php";

$answer= new Answer();
$gameControl=new GameControl();
$playerControl=new PlayerControl();


if (isset($_POST['btnGo'])){
    //strat Game
    $idCurrentGame=$gameControl->getIdGame();
    $gameControl->startGame($idCurrentGame);

    //Openwindow StartGame with Javascript
    echo "<script type='text/javascript'> window.open('./startGameController.php', '_self');</script>";
    
    // require './startGameController.php';    

}else{

        //Limpiar TODOS los usuarios conectados y las respuestas
        $gameControl->deleteGames();
        $playerControl->deletePlayers();
        $answer->deleteAnswers();
        //Fin limpiar

        $currentDate=date(DATE_W3C);
        $gameSeted=$gameControl->setGame(session_id(),5,5,$currentDate);

        if (isset($gameSeted) && $gameSeted > 0){ 
        //getting the current id_game and activating
        $idCurrentGame=$gameControl->getIdGame(); 
        $gameControl->activateGame($idCurrentGame);

        require '../view/prepareGameView.php';    

        }else{
            //game no set
            echo "Game no Seted.. OMG.. contact to Developer";    
}
}
unset($gameControl);
unset($playerControl);


?>