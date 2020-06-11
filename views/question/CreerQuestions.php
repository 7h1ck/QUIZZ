<div class="card shadow w-100">
<div class="card-body text-center text-muted d-flex flex-column justify-content-center align-content-between">

    <div class="text-center"><h4>PARAMÉTREZ VOTRE QUESTION</h4></div>

    <div class="border border-secondary rounded" id="main">
            <form action="<?=URL_ROOT?>question/enregistrerQuestion" method="post">
        <div class="form-inline">
            <label for="comment" class="col-2">Question</label>
            <textarea class="form-control col-10" rows="5" id="comment" name="question"></textarea>
        </div>
        <div class="form-inline">
            <label for="pwd" class="col-2">Nbre de Points</label>
            <select name="nbrePoints" class="custom-select col-1 h-25">
                <option></option>
                <option>1</option>
                <option>2</option>
                <option>3</option>
                <option>4</option>
            </select>
        </div>
        <div class="form-inline form-check">
        <label for="sel1" class="mr-2">Type de réponse</label>
            <select class="form-control col-8 mr-2" id="typeQ" name="typeQuestion">
                <option value="">Donnez le type de réponse</option>
                <option vlaue="text">text</option>
                <option vlaue="radio">radio</option>
                <option vlaue="checkbox">checkbox</option>
            </select>
        <button class="btn btn-info col-1" type="button" id="btn_add">+</button>
        </div>
        <!-- <div class="form-inline my-2">
            <label for="my-input" class="col-2">Réponse 1</label>
            <input id="my-input" class="form-control col-5" type="text" name="">
            <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="">&times;</button>
        </div> -->
        <!-- <div class="form-inline my-2">
            <label for="my-input" class="col-2">Réponse 1</label>
            <input id="my-input" class="form-control col-5 " type="text" name="">
            <input type="checkbox" name="" id="" class="mx-2">
            <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="">&times;</button>
        </div> -->
        <div id="main">
            <div class="form-inline my-2" id="divRep">
                <!-- <label for="my-input" class="col-2">Réponse 1</label>
                <input id="my-input" class="form-control col-5 " type="text" name="">
                <input type="radio" name="" id="" class="mx-2">
                <button type="button" class="ml-2 mb-1 close text-danger" data-dismiss="">&times;</button> -->
            </div>
        </div>
        <button type="">sub</button>
        </form>  
    </div>
    <div class=""><a href="" type="submit"  class="btn btn-primary float-right" style="background-color: #3addd6;">Enregistrer</a></div>

</div>
</div>
<script>

    // const main = document.getElementById("main");
    // const divRep = document.getElementById("divRep");
    // var i = 1;
    // function createRep(type,i) {
    //     divRep.innerHTML = "<label for=\"my-input\" class=\"col-2\">Réponse "+i+"</label>";
    //     divRep.innerHTML +="<input id=\"my-input\" class=\"form-control col-5 \" type=\"text\" name=\"\">";
    //     divRep.innerHTML += "<input type="+type+" name="" id="" class=\"mx-2\">";
    //     divRep.innerHTML += "<button type=\"button\" class=\"ml-2 mb-1 close text-danger\" data-dismiss=\"\">&times;</button>";       
    //     main.appendChild(divRep);
    // }
    const add = document.getElementById("btn_add");
    add.addEventListener("click",function addr(){
        const main = document.getElementById("main");
    const divRep = document.getElementById("divRep");
    var i = 1;
    var typ = document.getElementById("typeQ").value;
    if (typ) {
        alert(typ);
        divRep.innerHTML = "<label for=\"my-input\" class=\"col-2\">Réponse "+i+"</label>";
        divRep.innerHTML +="<input id=\"my-input\" class=\"form-control col-5 \" type=\"text\" name=\"\">";
        divRep.innerHTML += "<input type="+typ+" name=\"\" id=\"\" class=\"mx-2\">";
        divRep.innerHTML += "<button type=\"button\" class=\"ml-2 mb-1 close text-danger\" data-dismiss=\"\">&times;</button>";       
        //main.appendChild(divRep);

    });

    }
</script>