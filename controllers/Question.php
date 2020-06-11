<?php
class Question extends Controller{

    function __construct(){
        parent::__construct();
        $this->folder_view="question";
        $this->layout="admin";

    }

    public function listQuestions(){
        $this->view = "listQuestions";
        $this->render();
    }

    public function creerQuestions(){
        $this->view = "creerQuestions";
        $this->render();
    }

    public function enregistrerQuestion(){
        var_dump($_POST);
        die();
        // $this->view = "creerQuestions";
        // $this->render();
    }
    
}




