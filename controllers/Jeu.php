<?php

class Jeu extends Controller{
    private $RepMgr;
    private $nbreQ;
    private $actuQ;
    private $tabQuestion;
    private $tabReponse;
    private $partie;
    public function __construct(){
        parent::__construct();
        $this->folder_view="jeu";
        $this->layout="layoutJeu";
        $this->view="partie";
        extract($this->data_view);

        $this->manager = new MQuestionManager();
        $this->repMgr = new ReponseManager();
        $this->partieMgr = new PartieManager();

        $this->tabQuestion = $this->manager->findAll();
        $this->tabReponse = $this->repMgr->findAll();
        $this->partie = $this->partieMgr->findAll();

        $this->nbreQ = $this->partie[0]->nbreQuestions;
        $this->data_view['nbreQ'] = $this->nbreQ;
    }

      


    

    public function jouer()
    {
        $this->data_view['actuPoints'] = 0;
        $this->data_view['i'] = 1;
        $this->data_view['actuQ'] = $this->tabQuestion[0];
        $this->data_view['tabReponse']= $this->repMgr->findObject($this->tabQuestion[0]->id);
        // $_SESSION['recap']['question1'] = $this->tabQuestion[0];
        // $_SESSION['recap']['reponse1'] = $this->data_view['tabReponse'];
        $this->render();
    }
    public function suivant()
    {
        if (isset($_POST['btnSuivant'])) 
        {
            $i = rand(1,count($this->tabQuestion)-1);
            $this->data_view['actuPoints'] = $_POST['nP'];
            $this->data_view['i'] =$_POST['nQ']+1;
            $this->data_view['actuQ'] = $this->tabQuestion[$i];
            $this->data_view['tabReponse']= $this->repMgr->findObject($this->tabQuestion[$i]->id);
            // $_SESSION['recap']['question$_POST["nQ"]+1'] = $this->tabQuestion[$i];
            // $_SESSION['recap']['reponse$_POST["nQ"]+1'] = $this->data_view['tabReponse'];
            $this->render();
        }
        else
        {
            // btn Terminer clicked 
            var_dump($_SESSION['recap']);                
            $this->finJeu();
        }
    }
    
    public function finJeu()
    {
        $sC = 0;
        for ($i=0; $i < strlen($_POST['nP']); $i++) { 
            # code...
            $sC += (int)substr($_POST['nP'],$i,1);
        }
        //récap
        if ($sC > $_SESSION['userConnected']->score) {
            $userMgr = new UserManager();
            $userMgr->updateScore($_SESSION['userConnected']->id,$sC);
    
        }
        $this->data_view['sC'] = $sC;
        $this->view="recap";
        $this->render();

    }

}