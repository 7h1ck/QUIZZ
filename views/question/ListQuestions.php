<div class="card shadow w-100 h-100">
<div class="card-body text-center text-muted d-flex flex-column justify-content-center align-content-center h-100">
    <form action="<?=URL_ROOT?>question/fixeNbreQ" method="post">
    <div class="text-center d-inline-flex justify-content-center"><h4>Nbre de question/Jeu</h4> <input class="form-control ml-4" style="width:7%" type="text" name="nbre_questions"> <button class="btn btn-info ml-4" type="submit">OK</button></div>
    </form>
    <div class="border border-secondary">
    <ol class="">
    <?php
        foreach ($tabQuestion as $Q) {
    ?>
            <li class="font-weight-bold"><?=$Q->question?> ?</li>
                <ul>
                    <?php
                        foreach ($tabReponse as $R) {
                            if ($R->idQuestion == $Q->id) {
                    ?>
                    <li class="text-primary"><?=$R->reponse?></li>
                            <?php  } ?>
                        <?php  } ?>
                </ul>
        <?php  } ?>
    </ol>
   
    </div>

    <div class=""><a href="" class="btn btn-primary disabled float-right" style="background-color: #3addd6;">Suivant</a></div>

</div>
</div>