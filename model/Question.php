<?php
class Question{
private $conn;
private $questions=[];

public function __construct(){
    $this->conn=new ConnectDB_MySql();    
}


public function loadQuestions(){
    //Selecting from the database
    $handle = $this->conn->getPdo()->prepare('SELECT `ID`, `description`,`available`,`order` FROM blackbox_questions ORDER BY `order`');
    $handle->execute();
    $loadQuestions=$handle->fetchAll();
    foreach ($loadQuestions as $key => $oneQuestion) {
        array_push($this->questions,$oneQuestion);
    }
//    var_dump($this->questions);
}

//load the current question
public function loadCurrentQuestion(){
    $handle=$this->conn->getPdo()->prepare('SELECT `ID`,`description` FROM blackbox_questions WHERE `current`=:current');
    $handle->bindValue(':current','1');
    $handle->execute();
    $currenQuestion=$handle->fetchAll();
    // var_dump($currenQuestion);
    if ($handle->rowCount() >0){     
        return $currenQuestion[0];        
    }else{
        return 0;
        // REvisar este retorno--ojo --
    }
}

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