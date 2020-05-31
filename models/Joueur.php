<?php
class Joueur extends User{
    private $scors;
    private $nbrePartie;


    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function hydrate($row){
       $this->id=$row['id'];
       $this->fullName=$row['fullName'];
       $this->login=$row['login'];
       $this->pwd=$row['pwd'];
       $this->profil=$row['profil'];
       $this->avatar=$row['avatar'];
       $this->scors=$row['scors'];
       $this->nbrePartie=$row['nbrePartie'];
    }
}