<?php

class PartieManager extends Manager {
   
    function __construct(){
        $this->tableName="partie"; //dois tjr correspondre avec le classname
    }



    public function create($objet){
      

    }
    public function update($nbreQ){
        $sql = "UPDATE `partie` SET `nbreQuestions`= '$nbreQ' WHERE 'id' = 1";
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

    // public function getUserByLoginPwd($login,$pwd){
    //     $sql="select * from $this->tableName where login='$login' and password='$pwd'";
    //     $datas=$this->executeSelect($sql);
    //     return count($datas)==1? $datas[0]:null;
    // }
}



