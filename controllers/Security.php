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
               // $fullName = $prenom." ".$nom;
                $newUser->setNom($nom);
                $newUser->setPrenom($prenom);
                $newUser->setLogin($login);
                $newUser->setPassword($password);
                $newUser->setAvatar($_FILES["avatar"]["name"]);
                $newUser->setProfil($profil);
                
                $c = $this->manager->create($newUser);
                //chargement avatar
$target_dir = "assets/img/";
$target_file = $target_dir . basename($_FILES["avatar"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
// Check if image file is a actual image or fake image
if(isset($_POST["btn_inscrir"])) {
    $check = getimagesize($_FILES["avatar"]["tmp_name"]);
    if($check !== false) {
        $uploadOk = 1;
    } else {
                $this->data_view['errors']['avatar']= "File is not an image";
                   $this->layout = $layout;
                   $this->view="inscription";
                   $this->render();
        $uploadOk = 0;
    }
}
// Check if file already exists
// if (file_exists($target_file)) {
//     echo "Sorry, file already exists.";
//     $uploadOk = 0;
// }
// Check file size
// if ($_FILES["fileToUpload"]["size"] > 500000) {
//     echo "Sorry, your file is too large.";
//     $uploadOk = 0;
// }
// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
                    $this->data_view['errors']['avatar']= "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
                   $this->layout = $layout;
                   $this->view="inscription";
                   $this->render();
    $uploadOk = 0;
}
// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
                    $this->data_view['errors']['avatar']= "Sorry, your file was not uploaded.";
                   $this->layout = $layout;
                   $this->view="inscription";
                   $this->render();
// if everything is ok, try to upload file
} 
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