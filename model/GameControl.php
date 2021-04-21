<?php
class GameControl{
private $conn;

public function __construct(){
    $this->conn=new ConnectDB_MySql();       
}

public function setGame($pSessionMaster,$pDelayUsers,$pDelayMaster,$pGameDate){

    $handle = $this->conn->getPdo()->prepare("INSERT INTO blackbox_control (`session_master`,`delay_users`,`delay_master`,`game_date`,`active`) VALUES(:a,:b,:c,:d,:e)");         
    $handle->bindValue(':a', $pSessionMaster);
    $handle->bindValue(':b', $pDelayUsers);    
    $handle->bindValue(':c', $pDelayMaster);    
    $handle->bindValue(':d', $pGameDate);    
    $handle->bindValue(':e', 0);    
    $handle->execute();
    return $handle->rowCount();


}
//Count the current users conected
public function getUsersConnected(){
    $handle=$this->conn->getPdo()->prepare('SELECT COUNT(`id_player`) as totUsers FROM blackbox_players');    
    $handle->execute();
    $usersConnected=$handle->fetch();    
    if ($handle->rowCount() >0){     
        return $usersConnected['totUsers'];        
    }else{
        return 1000;
        //No users connected       
    }


}
//Get id of the current game
public function getIdGame(){

    $handle=$this->conn->getPdo()->prepare('SELECT `id_game` FROM blackbox_control');    
    $handle->execute();
    $currenIdGame=$handle->fetch();
    
    if ($handle->rowCount() >0){     
        return $currenIdGame['id_game'];        
    }else{
        return 0;
        //No active game        
    }
}

//Getting the current game - complete
public function getCurrentGame(){

}

//Getting the current top3
public function getCurrentTop3($id_game){
    $handle=$this->conn->getPdo()->prepare('SELECT `current_top3` FROM blackbox_control WHERE `id_game`=:a');   
    $handle->bindValue(':a', $id_game); 
    $handle->execute();
    $currenTop3=$handle->fetch();
    
    if ($handle->rowCount() >0){     
        return $currenTop3['current_top3'];        
    }else{
        return 0;
        //Nothing Top3        
    }
    
}

//Getting the current Active Game
public function getActiveGame($id_game){
    $handle=$this->conn->getPdo()->prepare('SELECT `active` FROM blackbox_control WHERE `id_game`=:a');   
    $handle->bindValue(':a', $id_game); 
    $handle->execute();
    $currenActive=$handle->fetch();
    
    if ($handle->rowCount() >0 and $currenActive['active'] == 1){     
        return 1;       
    }else{
        return 0;
        //The game is not ACTIVE yet
    }
    
}

//Getting the current started Game
public function getStartedGame($id_game){
    $handle=$this->conn->getPdo()->prepare('SELECT `started` FROM blackbox_control WHERE `id_game`=:a');   
    $handle->bindValue(':a', $id_game); 
    $handle->execute();
    $currenStarted=$handle->fetch();
    
    if ($handle->rowCount() >0 and $currenStarted['started'] == 1){     
        return 1;       
    }else{
        return 0;
        //The game is not STARTED yet
    }
    
}


//Deleting all the Games previous
public function deleteGames()
{
    $handle = $this->conn->getPdo()->prepare("DELETE FROM  blackbox_control");
    $handle->execute();
    return true;
}


//update the current game to active
public function activateGame($id_game)
{
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_control SET `active`=:a  WHERE `id_game`=:b");         
    $handle->bindValue(':a', '1');
    $handle->bindValue(':b', $id_game);    
    $handle->execute();
    return $handle->rowCount();
}

public function startGame($id_game)
{
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_control SET `started`=:a  WHERE `id_game`=:b");         
    $handle->bindValue(':a', '1');
    $handle->bindValue(':b', $id_game);    
    $handle->execute();
    return $handle->rowCount();
}



//Update the current game with current Top3(Id_Question)
public function updateTop3($id_game,$ID_Question){
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_control SET `current_top3`=:a  WHERE `id_game`=:b");         
    $handle->bindValue(':a', $ID_Question);
    $handle->bindValue(':b', $id_game);    
    $handle->execute();
    return $handle->rowCount();
}



}

?>