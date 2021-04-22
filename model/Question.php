<?php
class Question{
private $conn;
private $questions=[];

public function __construct(){
    $this->conn=new ConnectDB_MySql();    
}

//This function load the questions from the database and save into array
public function loadQuestions(){
    //Selecting from the database
    $handle = $this->conn->getPdo()->prepare('SELECT `ID`, `description`,`available`,`order` FROM blackbox_questions ORDER BY `order`');
    $handle->execute();
    $loadQuestions=$handle->fetchAll();
    foreach ($loadQuestions as $key => $oneQuestion) {
        array_push($this->questions,$oneQuestion);
    }
}

public function totalAvailableQuestions(){
    $handle = $this->conn->getPdo()->prepare('SELECT COUNT(`ID`) AS `total_questions`FROM blackbox_questions WHERE `available`=:a AND `order` > :b');
    $handle->bindValue(':a',1);
    $handle->bindValue(':b',0);
    $handle->execute();
    $availableQuestions=$handle->fetch();
    return $availableQuestions;
}
//Set the currentQuestion related with the order
public function setCurrentQuestion($currentAvailable){
        $handleClean = $this->conn->getPdo()->prepare("UPDATE blackbox_questions SET `current`=:a WHERE `available`=:b");          
        $handleClean->bindValue(':a', 0);
        $handleClean->bindValue(':b', 1);
        $handleClean->execute();           
         
        //Setting the first available
        $handle = $this->conn->getPdo()->prepare('SELECT `ID`, `description`,`available`,`order`,`current` FROM blackbox_questions WHERE `available`=:a AND `order`>:b ORDER BY `order`');
        $handle->bindValue(':a', 1);
        $handle->bindValue(':b', $currentAvailable);
        $handle->execute();
        $loadNextAvailable=$handle->fetch();
        
        if (empty($loadNextAvailable)==false ) {            
            //Setting the new current
            $handleCurrent = $this->conn->getPdo()->prepare("UPDATE blackbox_questions SET `current`=:a WHERE `ID`=:b AND `available`=:c");          
            $handleCurrent->bindValue(':a', 1);
            $handleCurrent->bindValue(':b', $loadNextAvailable['ID']);
            $handleCurrent->bindValue(':c', 1);
            $handleCurrent->execute();
        }   
        
        return $loadNextAvailable;
}

//load the current question
public function loadCurrentQuestion(){
    $handle=$this->conn->getPdo()->prepare('SELECT `ID`,`order`,`description` FROM blackbox_questions WHERE `current`=:current');
    $handle->bindValue(':current','1');
    $handle->execute();
    $currenQuestion=$handle->fetch();
    // var_dump($currenQuestion);
    if ($handle->rowCount() >0){     
        return $currenQuestion;        
    }else{
        return 0;
        // REvisar este retorno--ojo --
    }
}

//clear current question, to start the game
public function clearCurrentQuestion(){
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_questions SET `current`=:a");         
    $handle->bindValue(':a', 0);    
    $handle->execute();
    return $handle->rowCount();
}

//Update Question in listQuestionView
public function updateQuestion($id, $desc, $available, $order){            
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_questions SET `description`=:a, `available`=:b, `order`=:c WHERE `ID`=:d");         
    $handle->bindValue(':a', $desc);
    $handle->bindValue(':b', $available);
    $handle->bindValue(':c', $order);
    $handle->bindValue(':d', $id);
    $handle->execute();
    return $handle->rowCount();
}

//Commit function
public function commitChanges(){    
    $handle = $this->conn->getPdo()->prepare("COMMIT");         
    $handle->execute();
}

//Show Questions in readOnly mode
public function getShowReadOnlyQuestions()
{    
    
    echo "
	<table class='table table-striped table-hover'>
    <thead>
		<tr >
			<th>ID</th>
			<th>Description</th>
			<th>Available</th>
			<th>Order</th>
		</tr>
        </thead><tbody>";
foreach ($this->questions as $index => $oneQuestion){
	echo "
		<tr class='warning'>
			<td>".$oneQuestion['ID']."</td>
			<td>".$oneQuestion['description']."</td>
			<td>".$oneQuestion['available']."</td>
			<td>".$oneQuestion['order']."</td>
		</tr>";
}
echo " </tbody></table>";

}

//This function is used for read all the questions in the Listquestion page, to update them
public function getQuestions()
{    
    
    echo "
	<table class='table table-striped table-hover'>
    <thead>
		<tr >
			<th></th>
			<th>Question</th>
			<th>Use</th>
			<th>Order</th>
		</tr>
        </thead><tbody>";
foreach ($this->questions as $index => $oneQuestion){
    if($oneQuestion['available']==1)
        {$selected="checked";}
    else{$selected="";};
	echo "
		<tr class='warning'>
			<td><input type=hidden name='ID_Question[".$oneQuestion['ID']."]' value='".$oneQuestion['ID']."'></td>
            <td><input name='desc_Question[".$oneQuestion['ID']."]' value='".$oneQuestion['description']."' size='50'></td>
            <td><input type=checkbox name='available_Question[".$oneQuestion['ID']."]' value='".$oneQuestion['available']."' ".$selected.">
           </td>
<td><input type=number min=1 max=100 step=1 name='order_Question[".$oneQuestion['ID']."]' value='".$oneQuestion['order']."'></td>
</tr>";
}
echo " </tbody>
</table>";

}
}
?>