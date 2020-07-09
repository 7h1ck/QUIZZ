<div class="card shadow w-100">
<div class="card-body text-center text-muted d-flex flex-column justify-content-center align-content-between">

    <div class="text-center"><h4>PARAMÉTREZ VOTRE QUESTION</h4></div>

            <form action="<?=URL_ROOT?>question/enregistrerQuestion" method="post" id="mainform" onsubmit="return validate();" name="mainform">
    <div class="border border-secondary rounded">
        <div class="form-inline">
            <label for="question" class="col-2">Question</label>
            <textarea class="form-control col-10" rows="5" id="question" name="question" onkeyup="removeErrorTxt(&quot;error_1&quot;)"></textarea>
            <small class="error text-danger" id="error_question"></small>

        </div>
        <div class="form-inline">
            <label for="nbrePoints" class="col-2">Nbre de Points</label>
            <select name="nbrePoints" id="score" error="error_2" class="custom-select col-1 h-25">
                <option vlaue="1">1</option>
                <option vlaue="2">2</option>
                <option vlaue="3">3</option>
                <option vlaue="4">4</option>
                <option vlaue="5">5</option>
            </select>
        <small class="error text-danger" id="error_nbrePoint"></small>
        </div>

        <div class="form-inline form-check">
        <label for="sel1" class="mr-2">Type de réponse</label>
            <select class="form-control col-8 mr-2" id="typeQuestion"  name="typeQuestion">
                <option value="">Donnez le type de réponse</option>
                <option vlaue="text">text</option>
                <option vlaue="simple">simple</option>
                <option vlaue="multiple">multiple</option>
            </select>
        <button class="btn btn-info col-1 text-center" type="button" id="btn_add">+</button>
        </div>
        <div id="mainReponse">
            <!-- <div class="form-inline my-2" id="divRep">
                55555
            </div> -->
        </div>
        <div id="general_error" class="error text-danger"></div>
    <?php
            if (isset($info)){ 
                ?>
                        <div class="text-danger"><?=$info?></div>
    <?php } ?>

        <button type="submit" class="btn btn-primary float-right" style="background-color: #3addd6;" name="btn_save">Enregistrer</button>
    </div>
        </form>  

</div>
</div>
