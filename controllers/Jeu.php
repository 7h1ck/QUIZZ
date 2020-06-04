<?php

class Jeu extends Controller{

    public function __construct(){
        parent::__construct();
        $this->folder_view="jeu";
        $this->layout="admin";
        $this->manager = new UserManager();
    }

      


    public function listJoueurs(){
        //Afficher la Page de Connection
        $tabJoueur = $this->manager->findById("joueur");
        extract($this->data_view);
        $this->data_view['tabJoueur']= $tabJoueur;
        $this->view="listJoueurs";
        $this->render();
    }
 
    

}