<?php
class Answer{
private $conn;
private $answers=[];

public function __construct(){
    $this->conn=new ConnectDB_MySql();    
}

public function saveAnswer($ID_Question, $userAnswer,$session_id){

    $handle = $this->conn->getPdo()->prepare("INSERT INTO blackbox_answers (`description`,`ID_question`, `session_id`) VALUES(:a,:b, :c)");         
    $handle->bindValue(':a', $userAnswer);
    $handle->bindValue(':b', $ID_Question);    
    $handle->bindValue(':c', $session_id);    
    $handle->execute();
    return $handle->rowCount();

}

//Evaluate if the question is already answered by user (Session)
public function questionAnswered($ID_question,$session_id) {
    $return=false;
    $handle = $this->conn->getPdo()->prepare("SELECT `ID_answer`, `ID_question`,`session_id` FROM blackbox_answers WHERE `ID_question`=:a AND `session_id`=:b");         
    $handle->bindValue(':a', $ID_question);
    $handle->bindValue(':b', $session_id);        
    $handle->execute();
    if ($handle->rowCount() > 0) {
       $return=true; 
    }  
   return $return;
}
}
?>