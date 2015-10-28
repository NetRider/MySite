<!-- Page Content -->
<div class="container" id="registrationContainer">
    <div class="container-page">
        <h3 class="dark-grey">Registrazione</h3>
        <hr>
            <form id="registrationForm" autocomplete="off" novalidate="novalidate">
                <div class="row">
                    <div class="form-group col-lg-5">
                        <label>Nome Utente</label>
        			    <input type="text" name="username" class="form-control" id="username">
                    </div>
                    <div class="form-group col-lg-4 myTooltip" hidden>
                   </div>
               </div>
               <div class="row">
                   <div class="form-group col-lg-5">
                       <label>Password</label>
                       <input type="password" name="password" class="form-control" id="password">
                  </div>
                  <div class="form-group col-lg-4 myTooltip" hidden>
                 </div>
              </div>
              <div class="row">
                  <div class="form-group col-lg-5">
                      <label>Ripeti Password</label>
                      <input type="password" name="password_confirm" class="form-control" id="password_confirm">
                 </div>
                 <div class="form-group col-lg-4 myTooltip" hidden>
                </div>
             </div>
             <div class="row">
                 <div class="form-group col-lg-5">
                     <label>Email</label>
                     <input type="text" name="email" class="form-control" id="email">
                </div>
                <div class="form-group col-lg-4 myTooltip" hidden>
               </div>
            </div>
           <div class="row">
               <div class="form-group col-lg-5">
                   <label>Immagine profilo</label>
                   <input type="file" name="image" id="image">
               </div>
               <div class="form-group col-lg-4 myTooltip" hidden>
              </div>
           </div>
           <button type="submit" class="btn btn-primary" id="registrationButton">Registrati</button>
       </form>
	</div>
    <hr>
</div>
<script src="Library/jquery.validate.min.js"></script>
<script src="Library/additional-methods.min.js"></script>
<script src="Smarty_dir/templates/js/registration.js"></script>
