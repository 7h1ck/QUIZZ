<?php
class MQuestion implements IManager{
    public $id;
    public $question;
    public $points;
    public $type;



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
    public function setQuestion($question){
        $this->question = $question;
    }
    public function setPoints($points){
        $this->points = $points;
    }
    public function setType($type){
        $this->type = $type;
    }
    
}