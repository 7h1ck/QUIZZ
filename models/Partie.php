<?php
class Partie implements IManager{
    public $id;
    public $nbreQuestions;



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
    public function setNbreQuestion($nbreQuestions){
        $this->nbreQuestions = $nbreQuestions;
    }
    
}