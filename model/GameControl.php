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

public function startGame($id_game)
{
    $handle = $this->conn->getPdo()->prepare("UPDATE blackbox_control SET `active`=:a  WHERE `id_game`=:d");         
    $handle->bindValue(':a', '1');
    $handle->bindValue(':b', $id_game);    
    $handle->execute();
    return $handle->rowCount();
}

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

}

?>