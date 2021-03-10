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
    $handle = $this->conn->getPdo()->prepare("SELECT `ID_answer`, `description` FROM blackbox_answers WHERE `ID_question`=:a AND `session_id`=:b");         
    $handle->bindValue(':a', $ID_question);
    $handle->bindValue(':b', $session_id);        
    $handle->execute();
    $currenAnswer=$handle->fetchAll();
    if ($handle->rowCount() >0){     
        return $currenAnswer[0];        
    }else{
        return null;
    }    
}

public function deleteAnswers(){
    $handle = $this->conn->getPdo()->prepare("DELETE FROM  blackbox_answers");
    $handle->execute();
    return true;
}

//Getting Answers by Question
public function getAnswersByQuestion($ID_Question)
{  
    
    $handle = $this->conn->getPdo()->prepare("SELECT *  FROM  blackbox_answers WHERE ID_Question=:a");
    $handle->bindValue(':a',$ID_Question);
    $handle->execute();
    $answersByQuestion=$handle->fetchAll();    

    echo "
	<table class='table table-striped table-hover scrollable'>
    <thead class='thead-dark'>
		<tr >			
			<th>Answers</th>			
		</tr>
        </thead ><tbody>";
foreach ($answersByQuestion as $index => $oneAnswer){    
	echo "
		<tr class='warning'>
			<td> ".$oneAnswer['description']."</td>            
        </tr>";
}
echo " </tbody>
</table>";

}
//Get summary by Question
public function getGroupedAnswersByQuestion($ID_Question)
{    
    $handle = $this->conn->getPdo()->prepare("SELECT `description`, COUNT(`ID_answer`) AS `total`  FROM  blackbox_answers WHERE ID_Question=:a GROUP BY `description` ORDER BY `total` DESC");
    $handle->bindValue(':a',$ID_Question);
    $handle->execute();
    $answersByQuestion=$handle->fetchAll();

    echo "
	<table class='table table-striped table-hover'>
    <thead class='thead-dark'>
		<tr >			
			<th>Answer</th>
			<th>Total</th>			
		</tr>
        </thead><tbody>";
 $sumTotal=0;       
foreach ($answersByQuestion as $index => $oneAnswer){    
    $sumTotal=$sumTotal+$oneAnswer['total'];
	echo "
		<tr class='warning'>
			<td> ".$oneAnswer['description']."</td>
            <td> ".$oneAnswer['total']."</td>
</tr>";
}
echo "<tr class='table-warning'><td>Total Answers:</td><td>".$sumTotal."</tr>";
echo " </tbody>
</table>";

return $answersByQuestion;

}

//Getting Top3
public function getTop3($ID_Question)
{    
    $handle = $this->conn->getPdo()->prepare("SELECT `description`, COUNT(`ID_answer`) AS `total`  FROM  blackbox_answers WHERE ID_Question=:a GROUP BY `description` ORDER BY `total` DESC limit 0,3");
    $handle->bindValue(':a',$ID_Question);
    $handle->execute();
    $answersByQuestion=$handle->fetchAll();

    echo "
	<table class='table table-striped table-hover'>
    <thead class='thead-dark'>
		<tr >			
			<th colspan='2'><strong>TOP 3</strong></th>
					
		</tr>
        </thead><tbody>";
 $sumTotal=0;       
foreach ($answersByQuestion as $index => $oneAnswer){    
    $sumTotal=$sumTotal+$oneAnswer['total'];
	echo "
		<tr class='table-warning'>
			<td><strong> ".$oneAnswer['description']."</strong></td>
            <td><strong> ".$oneAnswer['total']."<strong></td>
</tr>";
}

echo " </tbody>
</table>";

return $answersByQuestion;

}

}
?>