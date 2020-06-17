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
        $tabQuestion = $this->manager->findAll();
        $tabReponse =  $RepMgr->findAll();
        extract($this->data_view);
        $this->data_view['tabQuestion']= $tabQuestion;
        $this->data_view['tabReponse']= $tabReponse;
        $this->view = "listQuestions";
        $this->render();
    }

    public function creerQuestions(){
        $this->view = "creerQuestions";
        $this->render();
    }

    public function fixeNbreQ(){
        if ($_POST['nbre_questions']) {
            $partie = new PartieManager();
            $partie->update($_POST['nbre_questions']);
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

