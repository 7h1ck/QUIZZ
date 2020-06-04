<?php

class Validator{

   //Attributs 
    private $errors=[];

    //Getters
    public function getErrors(){
        return $this->errors;
    }


    public function isValid(){
        return count($this->errors)===0;
    }


   public  function isVide($nbre,$key,$sms="La Longueur est obligatoire"){
        if(empty($nbre)){
            $this->errors[$key]=$sms;
        }
           
     }
    //R2
    public  function isNumerique($nbre,$key,$sms="La Longueur  doit etre un numerique"){
     if(!is_numeric($nbre)){
        $this->errors[$key]=$sms;
     }
      
    }
    //R4
    public  function isPositif($nbre,$key,$sms="La Longueur est doit etre un numerique positif"){
        if($nbre<=0){
            $this->errors[$key]=$sms;
        }
       
    }
    //R1
    public  function compare($longueur,$largeur,$key,$sms="La Longeur doit etre superieur à la Largeur"){
        if($longueur<=$largeur){
            $this->errors[$key]=$sms;
        }
       
    }
    public function isEgal($val1,$val2,$key,$sms="Les Valeurs ne sont pas identiques"){
        if($val1!=$val2){
            $this->errors[$key]=$sms;
        }
    }

    //Email
    public function isEmail($valeur,$key,$sms=null)
    {
        if(!preg_match("#^[a-z0-9_.-]+@[a-z0-9_.-]{2,}\.[a-z]{2,4}$#",$valeur))
        {
            if($sms==null)
            {
                $sms="L'email n'est pas valide";
            }
    
            $this->errors[$key]= $sms;
        }
    
    }

    //Telephone
    public function isTelephone($valeur,$key,$sms=null)
    {
        if (!preg_match("#^7[5-80][ .-]?[0-9]{3}([ .-]?[0-9]{2}){2}$#",$valeur))
        {
            if($sms==null)
            {
                $sms="Le numéro n'est pas valide";
            }
    
            $this->errors[$key]= $sms;
        }
    }
}
?>