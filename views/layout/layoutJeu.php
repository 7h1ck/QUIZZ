<?php 
// import header
require_once("./views/layout/inc/header.inc.php");
?>

            <div class="card w-75 h-100">

                <div class="card-header p-0 bg-info text-center d-flex justify-content-between align-items-center" style="height:10%;"> 
                    <div class="col-2 h-100 d-flex align-items-center">
                                    <img src="<?=URL_ASSETS?>/img/<?=$userConnected->getAvatar()?>" style="height:100%;" alt="" class="rounded-circle border w-auto" >
                        <h3 class="text-white mt-0"><?=$userConnected->getPrenom()?> <?=$userConnected->getNom()?></h3>
                    </div>
                    <div class="text-white col-8">
                    BIENVENUE SUR LA PLATEFORME DE JEU DE QUIZZ <br>
                    JOUER ET TESTER VOTRE NIVEAU DE CULTURE GÉNÉRALE
                    </div>
                    <div class="col-2">
                        <a href="<?=URL_ROOT?>security/seDeconnecter" class="btn text-light float-right" style="background-color: #3addd6;">Déconnexion</a>
                    </div>
                </div>

                <div class="card-body bg-light">
                  <!-- body -->
                    <div class="card-body shadow bg-white h-100 rounded w-100 d-flex align-items-center justify-content-between">
                      <div class="col-8  border border-info rounded h-100 d-flex align-items-between justify-content-between flex-column">
                                            <?php echo $content_for_layout;?>

                        
                      </div>
                      <!-- right div -->
                      <div class="col-4 h-100">
                            <div class="container h-75 mt-3">
                            
                            <!-- Nav tabs -->
                            <ul class="nav nav-tabs ">
                              <li class="nav-item">
                                <a class="nav-link active" href="#home">Top scores</a>
                              </li>
                              <li class="nav-item">
                                <a class="nav-link" href="#menu1">Mon meilleur score</a>
                              </li>
                              <!-- <li class="nav-item">
                                <a class="nav-link" href="#menu2">Menu 2</a>
                              </li> -->
                            </ul>

                            <!-- Tab panes -->
                            <div class="tab-content shadow rounded-bottom h-100 border p-3 mb-3">
                              <div id="home" class="container tab-pane active"><br>
                              <?php
                                foreach ($tabMeilleur as $joueur) {
                              ?>
                                  <div class="row d-flex justify-content-between">
                                    <span><?=$joueur->prenom?>  <?=$joueur->nom?></span>
                                    <span><?=$joueur->getScore()?></span>
                                  </div>
                              <?php
                                }
                              ?>
                              </div>
                              <div id="menu1" class="container tab-pane fade"><br>
                              <h3 class="text-dark">meilleur score</h3>
                              <p class="text-success font-weight-bolder"><?=$userConnected->getScore()?></p>
                              </div>
                             
                            </div>
                          
                          </div>

                          <script>
                          $(document).ready(function(){
                            $(".nav-tabs a").click(function(){
                              $(this).tab('show');
                            });
                            // $('.nav-tabs a').on('shown.bs.tab', function(event){
                            //   var x = $(event.target).text();         // active tab
                            //   var y = $(event.relatedTarget).text();  // previous tab
                            //   $(".act span").text(x);
                            //   $(".prev span").text(y);
                            // });
                          });
                          </script>
                      </div>
                        
                          
                    
                        
                        
                      
                    </div>
                    
                </div>       
                    
                
            </div>
        
<?php 
// import footer
require_once("./views/layout/inc/footer.inc.php");
?>