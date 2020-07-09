var typeQestion=document.getElementById("typeQuestion");

    
    //Type question changed
    typeQestion.addEventListener("change",function(e)
    {
       resetElements();
       if(typeQestion.value==="text")
       {
        document.getElementById("mainReponse").innerHTML="<div class='form-inline my-2'><label class='col-2'>Réponse </label> <input type='text' class='col-5' onkeyup='removeErrorTxt(\"errortxt\")' error='errortxt' name='reponseTxt' /></div> <br> <small id='errortxt' class='error text-danger'></small>";
        }
        removeErCk()
    }); 
    
    
    function removeErrorTxt(id)
    {
       document.getElementById(id).innerHTML="";
    }

    //suprimer l'erreur quand on selectionne un check ou radio
    function removeErCk()
    {
       document.getElementById("general_error").innerHTML="";
    }
    

    /*function disabledBtn()
    {
        var btn= document.getElementById("btn_add");
        // var num=numberChamp();
        if(typeQestion.value != "checkbox" && typeQestion.value != "radio")
        {
            btn.setAttribute("disabled","true");
        }
        else
        {
            btn.removeAttribute("disabled");  
        }

    }



function numberChamp()
{
	const champs=document.getElementsByTagName("input");
	var number=0;
	for(let champ of champs)
	{
		if(champ.hasAttribute("cp"))
		{
			number++;
		}

	}

	return number;
}
*/


function validateTextReponse()
{// on a 2 réponse au -
    const inputs = document.getElementsByTagName("input");
    var nbrCpNonvide=0;
    for(let input of inputs)
    {
        if(input.hasAttribute("error0"))
        {
            if(input.value)
            {
                nbrCpNonvide++
            }
        }
    }

    return nbrCpNonvide >=2;
    
}

//valid le score et la question
function validateScQuest()
{
    var score= document.getElementById("score").value;
    var question = document.getElementById("question").value;
    var error=false;

   if(!Number.isInteger(+score))
   {
        document.getElementById('error_nbrePoint').innerText="veuillez mettre un nombre entier positif";
        error= true; 
   }
   if(!question)
   {
    document.getElementById('error_question').innerText="la question ne doit pas être vide";
     error=true;
        
   }
    
   // on a pas entrer dans les if donc !error = vraie
   return !error;
        
}

function validate()
{
   var form = document.getElementById("mainform");
   var errorep=false;
   //si c'est un choix text va obieit a la validation des champs vides
   
   if(typeQestion.value=="checkbox" || typeQestion.value=='radio')
   {
     
            var repChecked = 0;

            //Reference a tous les checkboxs in the right
            var chks = form.getElementsByClassName("ck");

            //Pour compter le nombre de checkboxs coché.
            for (let chk of chks) 
            { 
                if (chk.checked) {
                    repChecked++;
                }
            }
            //appel de la fonction qui determine si nombre de input ecrit est > a 2
            var twoReponse=validateTextReponse();

            
            if (repChecked <= 0 || !twoReponse) 
            {
                if(repChecked <= 0)
                {
                        document.getElementById("general_error").innerHTML="veuillez cocher un champ <br>";
                }
                else
                {// !twoReponse
                        document.getElementById("general_error").innerHTML+="il faut au moins remplir deux reponses"; 
                }

                form.preventDefault();
                errorep = true;
            }

    }

    //scr and question are valid && on a +2 rep and au- 1 is checked
    return validateScQuest() && !errorep;
}

    
var i = 0; /* Set Global Variable i */
function increment()
{
    i += 1; /* Function pour incrémenter automatiquement. */
}
/*
---------------------------------------------

Function to Remove Form Elements Dynamically
---------------------------------------------

*/
function removeElement(parentDiv, childDiv){
    if (childDiv == parentDiv)
    {
    	return ;
    }
    else
    if (document.getElementById(childDiv))
    {
    	var child = document.getElementById(childDiv);
    	var parent = document.getElementById(parentDiv);
        parent.removeChild(child);
        //appéle la function de génération de labels reponse 
            genRepNumb();
        //appele de function qui limite les champs en desactivant le bouton
            // disabledBtn()
    }
    else
    {
    	return false;
    }
}
/*
----------------------------------------------------------------------------

Functions add question

----------------------------------------------------------------------------
*/

document.getElementById("btn_add").addEventListener("click",function(e)
    {
        if(typeQestion.value==="multiple" || typeQestion.value==="simple")
         {
             
            var divReponse = document.createElement('div');
                    divReponse.setAttribute("class", "form-inline my-2");
            // creattion du label
            var label = document.createElement('LABEL');
                label.setAttribute("class", "col-2 lab");
            //creation du input 
            var chmpInput = document.createElement("INPUT");
                chmpInput.setAttribute("type", "text");
                chmpInput.setAttribute("class", "col-5");

                //ajouter le label
                divReponse.appendChild(label);
                chmpInput.setAttribute("cp", "cp");
                    
                
                var btn_delete = document.createElement("button");
                btn_delete.setAttribute("type", "button");
                btn_delete.setAttribute("class", "ml-2 mb-1 close text-danger");
                btn_delete.innerHTML = "&times";
                //pour générer le i
                increment();
                
                chmpInput.setAttribute("Name", "reponse_" + i);
                chmpInput.setAttribute('onkeyup','removeErCk()');
                chmpInput.setAttribute("error0", "error_" + i);
                    divReponse.appendChild(chmpInput);
                var chmpCheckRep = document.createElement("INPUT");
                    chmpCheckRep.setAttribute("class", "ck form-check-input mx-2");
                    chmpCheckRep.setAttribute("Name", "check[]");
                    chmpCheckRep.setAttribute("onclick", "removeErCk()");
                    removeErCk();
                    if(typeQestion.value==="multiple")
                    {
                        chmpCheckRep.setAttribute("type", "checkbox");
                    }
                    else if(typeQestion.value==="simple")
                    {
                        chmpCheckRep.setAttribute("type", "radio");
                    }
                    chmpCheckRep.setAttribute("value", i);
                    divReponse.appendChild(chmpCheckRep);
                //bouton d'effacement
                btn_delete.setAttribute("onclick", "removeElement('mainReponse','id_" + i + "')");
                divReponse.appendChild(btn_delete);
                //creation du champ erreur
                var err=document.createElement("small");
                err.setAttribute("id", "error_" + i);
                err.setAttribute("class", "error error_rep text-danger");
                divReponse.appendChild(err);
                //
                divReponse.setAttribute("id", "id_" + i);
            document.getElementById("mainReponse").appendChild(divReponse);
        
            //appéle la function de génération de labels reponse 
              genRepNumb();
            // appele de function de limitation des chmaps   
            //   disabledBtn();
        }
    });


    function genRepNumb()
    {
        var form = document.getElementById("mainform");
        var labs=form.getElementsByClassName("lab")
        for (var i = 0; i < labs.length; i++) 
        { 
            labs[i].innerHTML="Reponse "+(i+1);
        }
    }


/*
-----------------------------------------------------------------------------
Functions pour supprimer tout les champs!
------------------------------------------------------------------------------
*/
    function resetElements()
    {
        document.getElementById('mainReponse').innerHTML = '';
        // disabledBtn()
        
    }

