<?php

class PartieManager extends Manager {
   
    function __construct(){
        $this->tableName="partie"; //doit tjr correspondre avec la classname
    }



    public function create($objet){
      

    }
    public function update($nbreQ){
        $sql = "UPDATE `partie` SET `nbreQuestions`= $nbreQ WHERE `partie`.`id` = 1";
        return  $this->executeUpdate($sql)!=0;
    }
    
    public  function delete($id){
      
    }
    public function findAll(){
        $sql = "SELECT * FROM `partie`"; 
        return $this->executeSelect($sql);
    }
    public function findById($id){
        
    }  

    public function findObject($object){
        
    }

   
}



