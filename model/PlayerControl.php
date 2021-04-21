<?php
class PlayerControl{
private $conn;

public function __construct(){
    $this->conn=new ConnectDB_MySql();       
}

public function registerPlayer($id_game, $session_player, $full_name){
    $handle = $this->conn->getPdo()->prepare("INSERT INTO blackbox_players (`id_game`,`session_player`,`full_name`) VALUES(:a,:b,:c)");         
    $handle->bindValue(':a', $id_game);
    $handle->bindValue(':b', $session_player);    
    $handle->bindValue(':c', $full_name);        
    $handle->execute();
    return $handle->rowCount();

}

public function getInfoPlayer($id_game,$session_player)
{
    $handle=$this->conn->getPdo()->prepare("SELECT `session_player` FROM `blackbox_players` WHERE `id_game`=:a AND `session_player`=:b");    
    $handle->bindValue(':a', $id_game);
    $handle->bindValue(':b', $session_player);    
    $handle->execute();
    $currenSessionPlayer=$handle->fetch();
    
    if ($handle->rowCount() >0){     
        return $currenSessionPlayer['session_player'];        
    }else{
        return "";
        //User no registered      
    }
}

public function deletePlayers(){
    $handle = $this->conn->getPdo()->prepare("DELETE FROM  blackbox_players");
    $handle->execute();
    return true;
}
}

?>