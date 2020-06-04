<div class="card shadow w-100 h-100">
<div class="card-body text-center text-muted d-flex flex-column justify-content-center align-content-center h-100">

    <div class="text-center"><h4>LISTE DES JOUEURS PAR SCORE</h4></div>

    <div class="border-secondary">
    <table class="table table-borderless">
        <thead>
        <tr>
            <th>Nom</th>
            <th>Prénom</th>
            <th>Score</th>
        </tr>
        </thead>
        <tbody>
            <?php
                foreach ($tabJoueur as $joueur) {                     
            ?>
                <tr>
                    <td><?=$joueur->getfullName()?></td>
                    <td><?=$joueur->getLogin()?></td>
                    <td><?=$joueur->getId() * 10?> pts</td>
                </tr>

                <?php
                
                }
                ?>

            </tbody>
        </table>
    </div>

    <div class=""><a href="" class="btn btn-primary float-right" style="background-color: #3addd6;">Suivant</a></div>

</div>
</div>






       