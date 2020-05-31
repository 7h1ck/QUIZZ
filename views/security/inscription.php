<div class="card shadow">
<div class="card-body row">
                            <div class="col-7">
                            <h5 class="card-title">S’INSCRIRE</h5>
                            <p class="card-text">Pour proposer des quizz</p>
                            <hr>
                            <form method="post" action="security/enregistreUser">
                              <div class="form-group">
                                <label for="nom">Nom</label>
                                <input id="nom" class="form-control" type="text" name="nom">
                                <?php
                if (isset($errors['nom'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['nom']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="prenom">Prénom</label>
                                <input id="prenom" class="form-control" type="text" name="prenom">
                                <?php
                if (isset($errors['prenom'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['prenom']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="login">Login</label>
                                <input id="login" class="form-control" type="text" name="login">
                                <?php
                if (isset($errors['login'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['login']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="password" id="" placeholder="">
                                <?php
                if (isset($errors['password'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['password']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group">
                                <label for="">Confirmer password</label>
                                <input type="password" class="form-control" name="passwordC" id="" placeholder="">
                                <?php
                if (isset($errors['passwordC'])){ 
                  ?>
                          <small class="text-danger"><?=$errors['passwordC']?></small>
                <?php } ?>
                              </div>
                              <div class="form-group d-flex justify-content-between">
                                <p class="">Avatar</p>
                                <input class=" form-control-file w-25" type="file" name="avatar">
                              </div>
                
                              <button class="btn btn-info m-auto" name="btn_inscrir" type="submit">Créer compte</button>
                            </form>
                            </div>
                            <div class="col-5">
                              <img src="<?=URL_ASSETS?>/img/Amdi.jpg" alt="" class="rounded-circle border w-100" >
                            </div>

</div>
</div>


<script>
  for(input of inputs)
                {
                    input.addEventListener("keyup",function(e)
                    {
                        if(e.target.hasAttribute("error"))
                        {
                            var idDivError=e.target.getAttribute("error");
                            if(e.target.getAttribute("type")=="password")
                            {
                                if(e.target.value.length < 5)
                                {
                                    document.getElementById(idDivError).innerText="Doit contenir au moins 5 caracteres";
                                }
                                else
                                {
                                    document.getElementById(idDivError).innerText="";
                                }
                            }
                            else
                            {
                                document.getElementById(idDivError).innerText="";
                            }
                        }
                    })
                }

            document.getElementById("pwd_c").addEventListener("keyup",function()
            {
                var pwd=document.getElementById("pwd").value;
                var pwd_c=document.getElementById("pwd_c").value;
                if(pwd_c===pwd)
                {
                    document.getElementById('pwd_ctxt').innerText="";

                }
                else
                {
                    document.getElementById('pwd_ctxt').innerText="les mots de passes ne sont pas identiques";

                }
            });


</script>