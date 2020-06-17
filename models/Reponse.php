<?php
class Reponse implements IManager{
    public $id;
    public $reponse;
    public $idQuestion;
    public $kind;



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

     

    public function setId($id){
        $this->id = $id;
    }
    public function setReponse($reponse){
        $this->reponse = $reponse;
    }
    public function setIdQuestion($idQuestion){
        $this->idQuestion = $idQuestion;
    }
    public function setKind($kind){
        $this->kind = $kind;
    }
    
}