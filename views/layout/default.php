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
     
        <?php echo $content_for_layout;?>
        
    </div>

</body>

</html>