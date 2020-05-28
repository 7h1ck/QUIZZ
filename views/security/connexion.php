<div class="card w-50 ">
                <div class="card-header bg-info ">
                   <span class="text-white">Login Form</span>
                </div>
                <div class="card-body">
                    <form action="/action_page.php" class="needs-validation" novalidate>
                        <div class="form-group">
                          <!-- <label for="uname">Username:</label> -->
                          <input type="text" class="form-control" id="uname" placeholder="Login" name="uname" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Le champ est obligatoir</div>
                        </div>
                        <div class="form-group">
                          <!-- <label for="pwd">Password:</label> -->
                          <input type="password" class="form-control" id="pwd" placeholder="Password" name="pswd" required>
                          <div class="valid-feedback">Valid.</div>
                          <div class="invalid-feedback">Le champ est obligatoir</div>
                        </div>
                        
                        <button type="submit" class="btn btn-info mr-3">Connexion</button>
                        <a href="security/creerCompte" class="text-secondary"> s'inscrire pour jouer</a>
                      </form>
                      
                      <script>
                      // Disable form submissions if there are invalid fields
                      (function() {
                        'use strict';
                        window.addEventListener('load', function() {
                          // Get the forms we want to add validation styles to
                          var forms = document.getElementsByClassName('needs-validation');
                          // Loop over them and prevent submission
                          var validation = Array.prototype.filter.call(forms, function(form) {
                            form.addEventListener('submit', function(event) {
                              if (form.checkValidity() === false) {
                                event.preventDefault();
                                event.stopPropagation();
                              }
                              form.classList.add('was-validated');
                            }, false);
                          });
                        }, false);
                      })();
                      </script>
                      
                </div>
            </div>