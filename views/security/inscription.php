<div class="card shadow w-75">
<div class="card-body row">
                            <div class="col-7">
                            <h5 class="card-title">S’INSCRIRE</h5>
                            <p class="card-text">Pour proposer des quizz</p>
                            <?php
                if (isset($info)){ 
                  ?>
                          <small class="text-success"><?=$info?></small>
                <?php } ?>                      
                            <hr>
                            <form method="post" action="<?=URL_ROOT?>security/enregistreUser" id="form-inscription" enctype="multipart/form-data">
                              <div class="form-group">
                                <label for="nom">Nom</label>
                                <input id="nom" class="form-control" type="text" name="nom" error="error_nom">
                                <small  class="text-danger" id="error_nom"></small>

                                <?php
                if (isset($errors['nom'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['nom']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input id="prenom" class="form-control" type="text" name="prenom" error="error_prenom">
                                <small  class="text-danger" id="error_prenom"></small>

                                <?php
                if (isset($errors['prenom'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['prenom']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="login">Login</label>
                                <input id="login" class="form-control" type="text" name="login" error="error_login">
                                <small  class="text-danger" id="error_login"></small>

                                <?php
                if (isset($errors['login'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['login']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="" placeholder=""  error="error_pwd1">
                                <small  class="text-danger" id="error_pwd1"></small>

                                <?php
                if (isset($errors['password'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['password']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="">Confirmer password</label>
                                <input type="password" class="form-control" name="passwordC" id="" placeholder="" error="error_pwd2">
                                <small  class="text-danger" id="error_pwd2"></small>

                                <?php
                if (isset($errors['passwordC'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['passwordC']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group d-flex justify-content-between">
                                <p class="">Avatar</p>
                                <input class=" form-control-file w-25" type="file" id="imgUser" name="avatar" error="error_avatar">
                                <?php
                if (isset($errors['avatar'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['avatar']?></small>
                <?php } ?>

                              </div>
                                <!-- error photo -->
                                <small  class="form-text text-danger float-right" id="error_avatar"></small>
                
                              <button class="btn btn-info m-auto" name="btn_inscrir" type="submit">Créer compte</button>
                            </form>
                            </div>
                            <div class="col-5">
                              <img src="<?=URL_ASSETS?>/img/Amdi.jpg" alt="" class="rounded-circle border w-100" id="avatar" >
                            </div>

</div>
</div>
<?php

?>

<script>
                //JS
                //1)Recuperer l'element(balise) sur lequel on veut faire un traitrement
                    /*
                        a)id
                             document.getElementById("id")
                             document.querySelector("#id")
                        b)nomBalise
                           document.getElementsByTagName("balise")
                           document.querySelectorAll("balise")
                        c)classe
                            document.getElementsByClassName("classe")
                            document.querySelectorAll(".nomClasse")
                    */ 
                //2)Evenement:Fait qui lorsqu'il se realise dans la page alors on déclenche 
                   //un ensemble de Traitement
                     //click
                     //blur
                     //mousseover
                     //moussedown
                     //keyup
                   //Ecouteur d'evenement  
                  /* 
                     var elt=document.getElementById("id")
                        elt.addEventListener("nomEvt",function(event){
                               //Actions
                        })
                        //event:Content toutes les informations de l'evenement déclenché
                          event.target=>source de l'evenement


                        for(let elt of tableau){

                        }

                  */

                
                  
           /*
               const prenom=document.getElementById("prenom");
                  const errorPrenom=document.getElementById("error_prenom");
                  
                  document.getElementById("form-inscription").addEventListener("submit",function(event){
                         let valid=true;
                         //Prenom est Vide 
                       
                         if(!prenom.value.trim()){
                            valid=false
                            errorPrenom.innerText="Champ Obligatoire"
                            //innerHTML=>ajouter du Contenu HTML dans une Balise
                         }
                        //Empeche le Rechargement de page =>
                         if(valid==false){
                            event.preventDefault();
                             return false;
                         }
                     
                  })

                  prenom.addEventListener("keyup",function(event){
                    errorPrenom.innerText="";
                  })
               */  

               const inputs= document.getElementsByTagName("input") 
               for(let input of  inputs){
                       input.addEventListener("keyup",function(event){
                       if(event.target.hasAttribute("error")){
                                 //recuperer la valeur de l'attribut error
                                    let idSmall=event.target.getAttribute("error")
                                    //recuperer l'objet Small 
                                    const errorSmall=document.getElementById(idSmall);
                                    errorSmall.innerText=""
                                    //innerHTML=>ajouter du Contenu HTML dans une Balise
                            }
                  })

                }




               document.getElementById("form-inscription").addEventListener("submit",function(event){
                   let valid=true;
                  for(let input of  inputs){
                      if(!input.value.trim()){
                            valid=false
                            //Verifie si  l'attribut error existe dans le input
                            if(input.hasAttribute("error")){
                                 //recuperer la valeur de l'attribut error
                                    let idSmall=input.getAttribute("error")
                                    //recuperer l'objet Small 
                                    const errorSmall=document.getElementById(idSmall);
                                    errorSmall.innerText="Champ Obligatoire"
                                    //innerHTML=>ajouter du Contenu HTML dans une Balise
                            }
                            
                         }
                            
                  }
                  if(valid==false){
                            event.preventDefault();
                             return false;
                   }
              });

              

              //Chargement de L'image
             const imgUpload= document.querySelector("#imgUser");
              

             const prevUpload=()=>{
                   //Récuperation de  l'image  du champ input
                     let fileImg=imgUpload.files[0]
                     //Transformer l'image en un flux d'octets
                     let reader=new FileReader();
                     if(fileImg){
                         reader.readAsDataURL(fileImg)
                         reader.onloadend=function(){
                               const avatar= document.querySelector("#avatar");
                               avatar.src=reader.result
                               //avatar.style.maxWidth="230px"
                               //avatar.style.maxHeight="330px"
                         }
                     }

            }



            //Ecouteur Evenement

             imgUpload.addEventListener("change",prevUpload);

            



            /* 
            function  prevUpload(){

             }
             ou 

             prevUpload=function(){

             }
              ou Arrow Fonction
              prevUpload=()=>{
                 
               }

             */

            </script>
