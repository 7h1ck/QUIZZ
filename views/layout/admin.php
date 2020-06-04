<?php 
// import header
require_once("./views/layout/inc/header.inc.php");
?>

            <div class="card w-75 h-100">

                <div class="card-header bg-info text-center">
                   <span class="text-white ">CRÉER ET PARAMÉRTER VOS QUIZZ</span>
                   <a href="<?=URL_ROOT?>security/seDeconnecter" class="btn btn-primary float-right" style="background-color: #3addd6;">Déconnexion</a>
                </div>

                <div class="card-body bg-light d-flex align-items-center">
                  <div class="row d-flex align-items-center">
                    <div class="col-4">
                      <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-image: url(<?=URL_ASSETS?>/img/Card-header-bachround.png);">
                          <div class="col-5">
                              <img src="<?=URL_ASSETS?>/img/Amdi.jpg" alt="" class="rounded-circle border w-100" >
                          </div>
                          <h3 class="text-white"><?=$_SESSION['userConnected']->getFullName()?></h3>
                        </div>
                        <div class="card-body">
                           <nav class="nav flex-column py-3 ">
                                <a class="nav-link active" href="#">Liste Questions</a>
                                <a class="nav-link" href="<?=URL_ROOT?>security/enregistreUser">Créer Admin</a>
                                <a class="nav-link" href="<?=URL_ROOT?>jeu/listjoueurs">Liste joueurs</a>
                                <a class="nav-link" href=" #">Créer Questions</a>
                            </nav>
                        </div>
                      </div>
                    </div>
                    <div class="col-8 row w-100">
                      <!-- <div class="col-8"> -->
                        
                          
                                            <?php echo $content_for_layout;?>
                    
                        
                        
                      
                    </div>
                  </div>
                    
                </div>       
                    
                
            </div>
        
<?php 
// import footer
require_once("./views/layout/inc/footer.inc.php");
?>