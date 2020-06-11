<?php
class User implements IManager{
    public $id;
    public $nom;
    public $prenom;
    public $login;
    public $password;
    public $profil;
    public $avatar;
    public $score;

    public function __construct($row=null){
        if($row!=null){
            $this->hydrate($row);
        }
    }

    public function hydrate($row){
        foreach ($row as $key => $value) {
            $this->{$key} = $value;
        }
     }

     public function getId(){
        return $this->id;
    }
    public function getNom(){
        return $this->nom;
    }
    public function getPrenom(){
        return $this->prenom;
    }
    public function getLogin(){
        return $this->login;
    }
    public function getPassword(){
        return $this->password;
    }
    public function getProfil(){
        return $this->profil;
    }
    public function getAvatar(){
        return $this->avatar;
    }

    public function getScore(){
        return $this->score;
    }

    public function setId($id){
        $this->id = $id;
    }
    public function setNom($nom){
        $this->nom = $nom;
    }
    public function setPrenom($prenom){
        $this->prenom = $prenom;
    }
    public function setLogin($login){
        $this->login = $login;
    }
    public function setPassword($password){
        $this->password = $password;
    }
    public function setProfil($profil){
        $this->profil = $profil;
    }
    public function setScore($score){
        $this->score = $score;
    }
    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }

}