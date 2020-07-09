<?php

class Security extends Controller
{
    private $tabJoueur;
    public function __construct()
    {
        parent::__construct();
        $this->folder_view="security";
        $this->layout="default";
        $this->manager=new UserManager();
        $this->tabJoueur = $this->manager->findById("joueur");
    }

      


    public function index()
    {
        //Afficher la Page de Connection
        unset($_SESSION['userConnected']);
        session_destroy();
        $this->view="connexion";
        $this->render();
    }
 
    public function creerCompte()
    {
        $this->view="inscription";
        $this->render();
    }


    public function enregistreUser()
    {
        //Recuperation des Donnée =>$_POST
      
        $profil = "joueur";
        $layout = "default";
        // d ne pas passer d'une layout à l'autre
        $score = 0;
        if (isset($_SESSION['userConnected'])) 
        {
            $profil = $layout = "admin";
            $score = null;
        }
        if(isset($_POST['btn_inscrir']))
        {
            
            extract($_POST);
            $this->validator->isVide($nom,'nom',"Nom Obligatoire");
            $this->validator->isVide($prenom,'prenom',"Prenom  Obligatoire");
            $this->validator->isVide($login,'login',"Login Obligatoire");
            $this->validator->isVide($password,'password',"Mot de Passe  Obligatoire");
            $this->validator->isVide($passwordC,'passwordC',"La confirmation du mot de Passe est Obligatoire");
            $this->validator->isVide($_FILES["avatar"],'avatar',"Avatar  Obligatoire");
            if($this->validator->isValid())
            {
                //Validation Password
                $this->validator->isEgal($password,$passwordC,"passwordC","Les deux Mots de Passe ne sont pas identiques");
                if($this->validator->isValid())
                {
                    //test Login existe
                    $user = $this->manager->findObject($login);
                    if($user==null)
                    {// the way is free
                        
                        //chargement avatar
                        $target_dir = "assets/img/";
                        $target_file = $target_dir . basename($_FILES["avatar"]["name"]);
                        $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
                        // Check if image file is a actual image or fake image
                        $check = getimagesize($_FILES["avatar"]["tmp_name"]);
                        if($check !== false) 
                        {
                            if($imageFileType == "jpeg" || $imageFileType == "png")
                            {
                                //Création d'utilisateur
                                $newUser =  new User();
                                $newUser->setNom($nom);
                                $newUser->setPrenom($prenom);
                                $newUser->setLogin($login);
                                $newUser->setPassword($password);
                                $newUser->setAvatar($_FILES["avatar"]["name"]);
                                $newUser->setProfil($profil);
                                $newUser->setScore($score);
                            
                                $created = $this->manager->create($newUser);
                                move_uploaded_file($_FILES["avatar"]["tmp_name"], $target_file);

                                if ($created) 
                                {// Creation ré86
                                    $this->layout = $layout;
                                    $this->view="inscription";
                                    $this->data_view['info']="Utilisateur crée avec succès";
                                    $this->render();
                                }
                                else
                                {
                                    $this->layout = $layout;
                                    $this->view="inscription";
                                    $this->data_view['info']="Erreur lors de la création";
                                    $this->render();
                                }
                            }
                            else 
                            {//fake format
                                $this->data_view['errors']['avatar']= "Seul les formats PNG, JPEG sont autorisés.";
                                $this->layout = $layout;
                                $this->view="inscription";
                                $this->render();
                            }
                        } 
                        else 
                        {//fake image
                            
                            $this->data_view['errors']['avatar']= "Le fichier n'est pas une image";
                            $uploadOk = 0;
                            $this->layout = $layout;
                            $this->view="inscription";
                            $this->render();
                        }

                        // Check if file already exists
                        // if (file_exists($target_file)) {
                        //     echo "Sorry, file already exists.";
                        //     $uploadOk = 0;
                        // }

                    }
                    else
                    {// y'a klkn
                        $this->data_view['errors']['login']= "Login existe déja";
                        $this->layout = $layout;
                        $this->view="inscription";
                        $this->render();
                    }
                }
                else
                {//Password not identical
                    $this->data_view['errors']= $this->validator->getErrors();
                    $this->layout=$layout;
                    $this->view="inscription";
                    $this->render();
                }
            }
            else
            {//chmp vide detected
                $this->data_view['errors']= $this->validator->getErrors();
                $this->view="inscription";
                $this->layout = $layout;
                $this->render();
            }
        }
        else 
        {// btn ain't clicked
            $this->view="inscription";
            $this->layout = $layout;
            $this->render();
        }
    
    }

    public function seConnecter()
    {
      
        if(isset($_POST['btn_connexion']))
        {
              
            extract($_POST);

            $this->validator->isVide($login,'login',"Login Obligatoire");
            $this->validator->isVide($password,'password',"Mot de Passe  Obligatoire");
            if($this->validator->isValid())
            {
               $user= $this->manager->getUserByLoginPwd($login,$password);
               if($user!=null)
               {//Compte Existe
                   
                   $_SESSION['userConnected'] = $user;

                    if($user->getProfil()==="joueur")
                    {
                        //Pour recupérer les best joueurs
                        $_SESSION['tabMeilleur'] = $this->tabJoueur;
                        $jeux = new Jeu(); 
                        $jeux->Jouer();
                    }
                    else
                    {// admin leu !
                        $this->listJoueurs();
                    }
               }
               else
               {//Login ou Mot de passe Incorrect
                     
                     $this->data_view['err_login']= "Login ou Mot de passe Incorrect";
                     $this->index();
                     
               }
            }
            else
            {//Login ou Mot de passe vide
                $errors=$this->validator->getErrors();
                $this->data_view['errors']= $errors;
                $this->view="connexion";
                $this->render();
               
            }
        }
        else 
        {//bnt ain't cilcked
            $this->index();
        }
       
      
    }

    public function seDeconnecter()
    {
        $this->index();
    }

    public function listJoueurs()
    {
        $this->layout="admin";
        $this->folder_view="jeu";
        $this->view="listJoueurs";
        extract($this->data_view);
        $this->data_view['tabJoueur']= $this->tabJoueur;
        $this->render();
    }

}