<?php
class Router{
  private $ctrl;

  public function getRoute(){
      
      try{
        //Scenerio Nominal ou Alternatif
        //1)autoloading => changement automatique des classes
          spl_autoload_register(function ($class) {
            $pathLibs = "./libs/".$class.".php";
            $pathModels = "./models/".$class.".php";
            $pathControlers = "./controllers/".$class.".php";

            if (file_exists($pathLibs)) {
                require_once $pathLibs; 
            }elseif(file_exists( $pathControlers)){
              require_once  $pathControlers; 
            }elseif(file_exists($pathModels )){
              require_once  $pathModels; 
            } 
        });
     //2-Selectionner le Controller et executé une methode de ce controller
     //en se basant sur l'url =>controller/action/parametre1/parametre1/ ..../parametren
        if(isset($_GET['url'])){
          
          //transforme url en tableau
           $url=explode("/", $_GET['url']);
           $n = count($url);
           //Convertir Premeire lettre du Controller en Majuscule
          $controller=ucfirst($url[$n-2]);
          $pathControlers = "./controllers/".$controller.".php";
          //Controller Existe
          if(file_exists($pathControlers)){
            $cont=new $controller();
            //Action  Existe
            if(isset($url[$n-1])){
              //Methode Existe dans le Controller
               if(method_exists($cont,$url[$n-1])){
                $action=$url[$n-1];
                $cont->{$action}();
               }else{
                   //Methode  n'Existe pas dans le Controller
                   $this->ctrl=new Erreur();
                   $this->ctrl->showMessage("Methode  n'Existe pas dans le Controller");
               }

               
            }else{
              $this->ctrl=new Security();
              $this->ctrl->showPage();
            }
         
          }else{
            //Controller n'Existe pas
              $this->ctrl=new Erreur();
              $this->ctrl->showMessage("Ce Controller n'existe pas");
          }
         
        }else{
          $this->ctrl=new Security();
          $this->ctrl->showPage();
        }
     
      }catch(Exception $ex){

         //Scenario Exception
         $this->ctrl=new Erreur();
         $this->ctrl->showMessage($ex->getMessage());
          //die("Error");
      }
  }
}