<?php

class UserManager extends Manager {
   
    function __construct(){
        $this->tableName="User"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      $sql = "INSERT INTO user (id, nom, prenom, login, password, profil, avatar, score) VALUES (NULL, '".$objet->nom."', '".$objet->prenom."', '".$objet->login."', '".$objet->password."', '".$objet->profil."', '".$objet->avatar."', NULL);";
       return  $this->executeUpdate($sql)!=0;

    }
    public function update($objet){

    }
    public  function delete($id){
      
    }
    public function findAll(){
        
    }
    public function findById($id){
        $sql = "SELECT * FROM user WHERE profil = '$id'"; 
        $datas=$this->executeSelect($sql);
        return $datas;
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



