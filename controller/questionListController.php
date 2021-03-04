<?php
declare(strict_types=1);
//require "model/autoload.php";
require "../model/ConnectDB.php";
require "../model/Question.php";

$questions= new Question();

require '../view/questionListView.php';
unset($questions);

?>