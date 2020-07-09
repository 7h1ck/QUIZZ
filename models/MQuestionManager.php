<?php

class MQuestionManager extends Manager {
   
    function __construct(){
        $this->tableName="mquestion"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      $sql = "INSERT INTO `mquestion` (`id`, `question`, `type`, `points`) VALUES (NULL, '$objet->question', '$objet->type', '$objet->points');";
       return  $this->executeUpdate($sql)!=0;

    }
    public function update($objet){

    }
    public  function delete($id){
      
    }
    public function findAll(){
        $sql = "SELECT * FROM `mquestion` LIMIT 8"; 
        return $this->executeSelect($sql);
    }
    public function findById($id){
       
    }  

    public function findObject($object){
        $sql = "SELECT * FROM `mquestion` WHERE `question` = '$object'"; 
        $datas=$this->executeSelect($sql);
        return count($datas)==1? $datas[0]:null;
        //kwowing that the count alwayse be 1
    }

    
}



