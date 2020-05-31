<!doctype html>
<html lang="en">

<head>
    <title>Connexion</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?=URL_ASSETS?>/css/bootstrap.min.css">


</head>

<body>

    <!-- <header> -->
    <nav class="navbar navbar-dark d-flex justify-content-start" style="background-color: #042425;">
                <a class="navbar-brand" href="#">
                    <img src="<?=URL_ASSETS?>/img/logo-QuizzSA.png" alt="logo" style="width:40px;">
                </a>
                <h2 class="text-white text-center flex-grow-1">Le plaisir de jouer</h2>
            </nav>


    <div id="main" class="d-flex justify-content-center align-items-center" style="background:url(<?=URL_ASSETS?>/img/background.png) no-repeat; height: 850px;background-size: cover;">
     
            <div class="card w-75">

                <div class="card-header bg-info text-center">
                   <span class="text-white ">CRÉER ET PARAMÉRTER VOS QUIZZ</span>
                   <a href="#" class="btn btn-primary float-right" style="background-color: #3addd6;">Déconnexion</a>
                </div>

                <div class="card-body bg-light">
                  <div class="row d-flex align-items-center">
                    <div class="col-4">
                      <div class="card">
                        <div class="card-header d-flex justify-content-between align-items-center" style="background-image: url(<?=URL_ASSETS?>/img/Card-header-bachround.png);">
                          <div class="col-5">
                              <img src="<?=URL_ASSETS?>/img/Amdi.jpg" alt="" class="rounded-circle border w-100" >
                          </div>
                          <h3 class="text-white">AMDI FALL</h3>
                        </div>
                        <div class="card-body">
                           <nav class="nav flex-column py-3 ">
                                <a class="nav-link active" href="#">Lister Admin</a>
                                <a class="nav-link" href="#">Créer Admin</a>
                                <a class="nav-link" href="#">Liste joueur</a>
                                <a class="nav-link" href=" #">Creer Question</a>
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
        
    </div>

</body>

</html>