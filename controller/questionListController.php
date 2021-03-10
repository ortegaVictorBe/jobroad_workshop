<?php
declare(strict_types=1);
//require "model/autoload.php";
require "../model/ConnectDB.php";
require "../model/Question.php";

$questions= new Question();

function cleanInput($data){
    $data=trim($data);
    $data=stripslashes($data);
    $data=htmlspecialchars($data);
    return $data;
};

require '../view/questionListView.php';
unset($questions);

?>