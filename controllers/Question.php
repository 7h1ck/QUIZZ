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
        if (isset($btn_save)) 
        {//click sur Enregistrer  ++valid

            $newQuestion = new MQuestion();
            $newQuestion->setQuestion($question);//++hydrate
            $newQuestion->setPoints($nbrePoints);
            $newQuestion->setType($typeQuestion);
            //test d'existence
            $question = $this->manager->findObject($newQuestion->question);
            if (is_null($question)) 
            {//question n'existe pas in the BD
                //new question
               
                $this->manager->create($newQuestion);

                //Reuperation de l'ID du question after inserting
                $newQuestion = $this->manager->findObject($newQuestion->question);
                
                $RepMgr=new ReponseManager();
                $newReponse = new Reponse();
                $newReponse->setIdQuestion($newQuestion->id);
                //on libère le Poste pour qu'il ne reste que les réponses facilite the recuperation of answers
                unset($_POST['question']);
                unset($_POST['nbrePoints']);
                if ($typeQuestion === "text") 
                {
                    $newReponse->setReponse($reponseTxt);
                    $newReponse->setKind("vraie");
                    $RepMgr->create($newReponse);
                } 
                else 
                {// reponse <> text

                    unset($_POST['typeQuestion']);
                    //Reuperation des reponse
                    //N° de la question
                    $n=1;
                    foreach ($_POST as $key => $value)
                    {
                        // check is a array for selected answer(s)
                        if ($key!=="check" )
                        {
                            $newReponse->setReponse($value);
                            if (in_array($n, $check))
                            {//si ce réponse a été cochée
                                $newReponse->setKind("vraie");
                            }
                            else 
                            {
                                $newReponse->setKind("faux");                                
                            }
                            $RepMgr->create($newReponse);
                            $n++;
                        }
                        
                    }
                }
                //tout est Ok
                $this->data_view['info']="Question Enregistré avec succès";
                $this->creerQuestions();

            }
            else 
            {
                //question existe déja
                $this->data_view['info']= "Ce question existe déja";
                extract($this->data_view);
                $this->creerQuestions();
            }
            
        } 
        else 
        {
            //le btn not clickd
        }
        
        
        
    }
    
}

