<?php

class JoueurManager extends Manager{
   
    function __construct(){
        $this->tableName="Joueur";
    }



    public function create($objet){
        $sql = "INSERT INTO Joueur VALUES (null,'$objet->fullName','$objet->login','$objet->pwd','$objet->profil','$objet->avatar','$objet->scors','$objet->nbrePartie')";
        return  $this->executeUpdate( $sql)!=0;

    }
    public function update($objet){

    }
    public  function delete($id){
      
    }
    public function findAll(){
      
    }
    public function findById($id){

    }  

    public function getUserByLoginAndPwd($login,$pwd){
       $sql="select * from Joueur where login='$login' and pwd='$pwd'";
       return $this-> ExecuteSelect($sql);
    } 
}