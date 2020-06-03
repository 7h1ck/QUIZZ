<?php

class Jeu extends Controller{

    public function __construct(){
        parent::__construct();
        $this->folder_view="jeu";
        $this->layout="admin";
    }

      


    public function listJoueurs(){
        //Afficher la Page de Connection
        echo "listj";
        $this->view="listJoueurs";
        $this->render();
    }
 
    

}