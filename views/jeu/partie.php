<div class=" bg-light mt-2 border border-info rounded-0 text-center h-25 ">
    <h1 class="display-4">Question <?=$i?>/<?=$nbreQ?></h1>
    <p class="lead"><?=$actuQ->question?></p>
</div>


<div class="bg-light float-right mt-2">
<?=$actuQ->points?> pts
</div>


<div class="bg-light float-right mt-2 h-25">
    <form action="<?=URL_ROOT?>jeu/suivant" id="form" onsubmit="return validate();" method="POST">
        <?php
            if ($actuQ->type == "multiple") {
               foreach ($tabReponse as $rep){
                ?>
                   <div class="form-check">
                       <input type="checkbox" class="form-check-input" kind="<?=$rep->kind?>" id="customCheck" value="<?=$rep->reponse?>" name="example1">
                       <label class="form-check-label" for="customCheck"><?=$rep->reponse?></label>
                   </div>
        <?php                  
               }
            }elseif ($actuQ->type == "simple") {
                foreach ($tabReponse as $rep) {
        ?>
        
                    <div class="form-check">
                        <input type="radio" class="form-check-input" kind="<?=$rep->kind?>" id="customCheck" name="reponse" value="<?=$rep->reponse?>">
                        <label class="form-check-label" for="customRadio"><?=$rep->reponse?></label>
                    </div>
        <?php
                }
            }else {
        ?>
                <div class="form-group">
                    <input type="text" class="form-control" value="" id="reptext" name="reponseText">
                </div>
        <?php
            }
        ?> 
            <input type="hidden" name="nQ" value="<?=$i?>">
            <input type="hidden" id="npt" name="nP" value=<?=$actuPoints?>>
            <span><button class="btn btn-primary float-right" style="background-color: #3addd6; "type="submit" name="btnSuivant" id="btnSuivant">Suivant</button></span>
    </form>
</div>
        <div class="row d-flex justify-content-between">
            <span><a href="#"  class="btn btn-primary float-right" id="btnPreced" style="background-color: #3addd6;">Précédent</a></span>
        </div>                                          
<?php

?>
<script>
    var divPoint = document.getElementById("npt");
    var next = document.getElementById("btnSuivant");
    var inputs = document.getElementsByClassName("form-check-input")
    if (<?=$i?>><?=$nbreQ?>-1) 
    {
        //next.setAttribute("disabled","disabled");
        next.innerHTML = "Terminer"
        next.name = "btnTerminer"
    }

    if (<?=$i?>==1) 
    {
        var back = document.getElementById("btnPreced");
        // back.setAttribute("disabled");
        back.className += " disabled"
    }
    next.addEventListener("click",function(event)
    {
        if ("<?=$actuQ->type?>" == "text") 
        {
            var rept = document.getElementById("reptext").value;
            if (rept=="<?=$tabReponse[0]->reponse?>") 
            {   
                divPoint.value += Number(<?=$actuQ->points?>)
            }    
        }
        else if("<?=$actuQ->type?>" == "simple")
        {
            var correct = false;
            for(let input of inputs)
            {
                if (input.checked == true && input.getAttribute("kind") == "vraie") 
                {
                    correct = true;
                    break;
                } 
            }
            if (correct) 
            {
                divPoint.value += Number(<?=$actuQ->points?>)

            }
         
        }
        else 
        {
            var correct = true;
            
            for(let input of inputs){
                if ((input.checked == false && input.getAttribute("kind") == "vraie") || (input.checked == true && input.getAttribute("kind") == "false")) {
                    correct = false;
                    break;
                } 
            }
            if (correct) 
            {
                divPoint.value += Number(<?=$actuQ->points?>)

            }
        }
    });
</script>