<?php

class UserManager extends Manager {
   
    function __construct(){
        $this->tableName="User"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      $nm=  $objet->getFullName();
      $nm2 =$objet->getLogin();
      $nm3= $objet->getPassword();
      $nm5 =$objet->getProfil();
      $nm6 =$objet->getAvatar();

      $sql = "INSERT INTO user VALUES (null,'$nm','$nm2','$nm3','$nm5','$nm6')";
      //$nm7= $sql = "INSERT INTO user VALUES (null,".$objet->getFullName().",".$objet->getLogin().",".$objet->getPassword().",".$objet->getProfil().",".$objet->getAvatar().")";

       return  $this->executeUpdate( $sql)!=0;

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



