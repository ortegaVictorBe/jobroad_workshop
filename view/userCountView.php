<?php
declare(strict_types=1);
// session_start();

require "../model/ConnectDB.php";
require "../model/GameControl.php";


$gameControl=new GameControl();

echo "<h2>".$gameControl->getUsersConnected()."</h2>";

unset($gameControl);


?>