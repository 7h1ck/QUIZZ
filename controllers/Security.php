<?php

class Security extends Controller{

    public function __construct(){
        parent::__construct();
        $this->folder_view="security";
        $this->layout="default";
        $this->manager=new UserManager();
    }

      


    public function index(){
        //Afficher la Page de Connection
        unset($_SESSION['userConnected']);
        session_destroy();
        $this->view="connexion";
        $this->render();
    }
 
    public function creerCompte(){
        $this->view="inscription";
        $this->render();
        
    }


    public function enregistreUser(){
        //Recuperation des Donnée =>$_POST
      
        $profil = "joueur";
        $layout = "default";
        if (isset($_SESSION['userConnected'])) {
            $profil = $layout = "admin";

        }
        if(isset($_POST['btn_inscrir'])){
            //Validation des données saisies
            //Extraire les données d'un tableau associatif =>extract($tab_associatif)
            //$_POST['login']   remplacer $login
            //$_POST['password'] remplacer $password 
        extract($_POST);
        $this->validator->isVide($nom,'nom',"Nom Obligatoire");
        $this->validator->isVide($prenom,'prenom',"Prenom  Obligatoire");
          $this->validator->isVide($login,'login',"Login Obligatoire");
          $this->validator->isVide($password,'password',"Mot de Passe  Obligatoire");
          $this->validator->isVide($passwordC,'passwordC',"La confirmation du mot de Passe est Obligatoire");
          //$this->validator->isVide($avatar,'avatar',"Avatar  Obligatoire");
          if($this->validator->isValid()){
              //Validation Password
              $this->validator->isEgal($password,$passwordC,"passwordC","Les deux Mots de Passe ne sont pas identiques");
              if($this->validator->isValid()){
                //Login existe
              $user = $this->manager->findObject($login);
              if($user==null){
                $newUser =  new User();
                $fullName = $prenom." ".$nom;
                $newUser->setFullName($fullName);
                $newUser->setLogin($login);
                $newUser->setPassword($password);
                $newUser->setAvatar($avatar);
                $newUser->setProfil($profil);
        
                $c = $this->manager->create($newUser);
                if ($c) {
                    $this->layout = $layout;
                   $this->view="inscription";
                   $this->data_view['info']="Utilisateur créee";
                    $this->render();
                }
                
                //$this->index();
             }else{
                   //Login ou Mot de passe Incorrect
                   $this->data_view['errors']['login']= "Login existe déja";
                   $this->layout = $layout;
                   $this->view="inscription";
                   $this->render();
                   
             }
            }else{
                $errors=$this->validator->getErrors();
                $this->data_view['errors']= $errors;
                $this->layout=$layout;
                $this->view="inscription";
                $this->render();
             }
          }else{
              $errors=$this->validator->getErrors();
              $this->data_view['errors']= $errors;
              $this->view="inscription";
              $this->layout = $layout;
              $this->render();
             
          }
      }else {
        $this->view="inscription";
        $this->layout = $layout;
        $this->render();
      }
    
    }

    public function seConnecter(){
        //Recuperation des Donnée =>$_POST
      
        if(isset($_POST['btn_connexion'])){
              //Validation des données saisies
              //Extraire les données d'un tableau associatif =>extract($tab_associatif)
              //$_POST['login']   remplacer $login
              //$_POST['password'] remplacer $password 
                 extract($_POST);

            $this->validator->isVide($login,'login',"Login Obligatoire");
            $this->validator->isVide($password,'password',"Mot de Passe  Obligatoire");
            if($this->validator->isValid()){
               $user= $this->manager->getUserByLoginPwd($login,$password);
               if($user!=null){
                   //Compte Existe
                   //session_start();
                   $_SESSION['userConnected'] = $user;
                   //extract($_SESSION);
                   //??new render??
                  if($user->getProfil()==="joueur"){
                      echo "Page jeu";
                    //   $this->layout="default";
                    //   //layout joueur
                    //   //$this->view="jeu";
                    //   $this->render();
                      
                      
                  }else{
                    $this->layout="admin";
                    $this->folder_view="jeu";
                    $this->view="listJoueurs";
                    $tabJoueur = $this->manager->findById("joueur");
                    extract($this->data_view);
                    $this->data_view['tabJoueur']= $tabJoueur;
                    $this->render();
                  }
               }else{
                     //Login ou Mot de passe Incorrect
                     $this->data_view['err_login']= "Login ou Mot de passe Incorrect";
                     $this->index();
                     
               }
            }else{
                $errors=$this->validator->getErrors();
                $this->data_view['errors']= $errors;
                $this->view="connexion";
                $this->render();
               
            }
        }else {
            $this->index();
        }
       
      
    }
    public function seDeconnecter(){
        $this->index();
    }

}