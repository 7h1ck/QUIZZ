<?php

class UserManager extends Manager {
   
    function __construct(){
        $this->tableName="User"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      $sql = "INSERT INTO user (id, nom, prenom, login, password, profil, avatar, score) VALUES (NULL, '".$objet->nom."', '".$objet->prenom."', '".$objet->login."', '".$objet->password."', '".$objet->profil."', '".$objet->avatar."', '".$objet->score."');";
       return  $this->executeUpdate($sql)!=0;

    }
    public function update($objet){

    }
    public function updateScore($id,$score){
    $sql = "UPDATE `user` SET `score` = '$score' WHERE `user`.`id` = $id;";
    return  $this->executeUpdate($sql)!=0;
    }
    public  function delete($id){
      
    }
    public function findAll(){
        
    }
    public function findById($id){
        $sql = "SELECT `nom`, `prenom`, `score` FROM `user` WHERE `profil` = '$id' ORDER BY `score` DESC LIMIT 10"; 
        return $this->executeSelect($sql);
    }  

    public function findObject($object){
        $sql = "SELECT * FROM user WHERE login = '$object'"; 
        $datas=$this->executeSelect($sql);
        return count($datas)==1? $datas[0]:null;
    }
    
    // public function getUserByLoginPwd($login,$pwd){
    //     $sql="select * from $this->tableName where login='$login' and password='$pwd'";
    //     $datas=$this->executeSelect($sql);
    //     return count($datas)==1? $datas[0]:null;
    // }
}



