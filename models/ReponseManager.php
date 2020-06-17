<?php

class ReponseManager extends Manager {
   
    function __construct(){
        $this->tableName="reponse"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      $sql = "INSERT INTO `reponse` (`id`, `reponse`, `idQuestion`, `kind`) VALUES (NULL, '$objet->reponse', '$objet->idQuestion', '$objet->kind');";
       return  $this->executeUpdate($sql)!=0;

    }
    public function update($objet){

    }
    public  function delete($id){
      
    }
    public function findAll(){
        $sql = "SELECT * FROM `reponse`"; 
        return $this->executeSelect($sql);
    }
    public function findById($id){
        
    }  

    public function findObject($object){
        $sql = "SELECT * FROM `reponse` WHERE idQuestion = '$object'"; 
        return $this->executeSelect($sql);
    }

    // public function getUserByLoginPwd($login,$pwd){
    //     $sql="select * from $this->tableName where login='$login' and password='$pwd'";
    //     $datas=$this->executeSelect($sql);
    //     return count($datas)==1? $datas[0]:null;
    // }
}



