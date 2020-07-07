<?php
class Question extends Controller{

    function __construct(){
        parent::__construct();
        $this->folder_view="question";
        $this->layout="admin";
        $this->manager=new MQuestionManager();

    }

    public function listQuestions(){ 
        $RepMgr=new ReponseManager();
        $RepMgr=new ReponseManager();
        $partieMgr = new PartieManager();
        $dataPartie = $partieMgr->findAll();
        $tabQuestion = $this->manager->findAll();
        $tabReponse =  $RepMgr->findAll();
        extract($this->data_view);
        $this->data_view['nbreQ'] = $dataPartie[0]->nbreQuestions;
        $this->data_view['tabQuestion']= $tabQuestion;
        $this->data_view['tabReponse']= $tabReponse;
        $this->view = "listQuestions";
        $this->render();
    }

    public function creerQuestions(){
        $this->view = "creerQuestions";
        $this->render();
    }
//Fixer le nombre de question par jeu
    public function fixeNbreQ(){
        extract($_POST);
        if (isset($nbre_questions)) 
        {
            $this->validator->isVide($nbre_questions,'nbre_questions',"Le nombre de question ne doit pas être vide");
            if ($this->validator->isValid()) 
            {
                $this->validator->isNumerique($nbre_questions,'nbre_questions',"Le nombre doit être numérique");
                if ($this->validator->isValid()) 
                {
                    if ($nbre_questions > 4) 
                    {
                        $partie = new PartieManager();
                        $partie->update($nbre_questions);
                    } 
                    else 
                    {
                        //Nbre < 5
                        $this->data_view['errors']['nbre_questions']= "Ce nombre doit être supérieur ou égal à 5";
                        $this->listQuestions();
                    }
                    
                } else 
                {
                    // Pas numérique
                    $this->data_view['errors']= $this->validator->getErrors();
                    $this->listQuestions();
                }
                
            } 
            else 
            {
                //Vide
                $this->data_view['errors']= $this->validator->getErrors();
                $this->listQuestions();
            }
            

        }
        $this->listQuestions();
    }

    public function enregistrerQuestion(){
        extract($_POST);
        $newQuestion = new MQuestion();
        $newQuestion->setQuestion($question);
        $newQuestion->setPoints($nbrePoints);
        $newQuestion->setType($typeQuestion);
        $sql = $this->manager->create($newQuestion);
        if ($sql) {
            //Reuperation de l'ID du question
            $idQ = $this->manager->findObject($newQuestion->question);
            if (!$idQ) {
                //question existe deja
                die("ce question existe deja");
            }else {
                //new question
                $RepMgr=new ReponseManager();
                $newReponse = new Reponse();
                $newReponse->setIdQuestion($idQ->id);
                
                unset($_POST['question']);
                unset($_POST['nbrePoints']);
                if ($typeQuestion === "text") {
                    $newReponse->setReponse($breponses[0]);
                    $newReponse->setKind("vraie");
                    $RepMgr->create($newReponse);
                    // var_dump($newReponse);
                    // die();
                } else {
                    # code...
                    unset($_POST['typeQuestion']);
                    //Reuperation des reponse
                    $i=1;
                    foreach ($_POST as $key => $value){
                        if ($key!=="check" ){
                            $newReponse->setReponse($value);
                            if (in_array($i, $check))
                            {
                                $newReponse->setKind("vraie");
                            }else {
                                $newReponse->setKind("faux");                                
                            }
                            $RepMgr->create($newReponse);
                            $i++;
                        }
                        
                    }
                }
                //render
                $this->data_view['info']="Question Enregistrer";
                $this->view = "creerQuestions";
                $this->render();
                
            }
            

        }else {
            die("errr creation question");
        }
        
        
    }
    
}

