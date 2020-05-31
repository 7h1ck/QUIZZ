<?php
class User implements IManager{
    protected $id;
    protected $fullName;
    protected $login;
    protected $password;
    protected $profil;
    protected $avatar;

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
    public function getFullName(){
        return $this->fullName;
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

    public function setId($id){
        $this->id = $id;
    }
    public function setFullName($fullName){
        $this->fullName = $fullName;
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
    public function setAvatar($avatar){
        $this->avatar = $avatar;
    }


    // public function hydrate($row){
    //    $this->id=$row['id'];
    //    $this->fullName=$row['fullName'];
    //    $this->login=$row['login'];
    //    $this->pwd=$row['pwd'];
    //    $this->profil=$row['profil'];
    //    $this->avatar=$row['avatar'];
    // }

    // TRY AUTO-HYDRATE
    
    /*public function hydrate($row){
        foreach ($row as $key => $value) {
            $this->{$key} = $value;
        }
     }*/
}