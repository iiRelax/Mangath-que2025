<div class="modal" tabindex="-1" id="inscriptionModal">
<div class="modal-dialog">
<div class="modal-content">
<div class="modal-header">
<h5 class="modal-title">Inscription</h5>
<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
</div>
<div class="modal-body">
<form method="POST" action="<?php echo base_url();?>/Home/inscription" name="inscriptionForm" id="inscriptionForm">
<div class="row">
<div class="col-sm-4">Nom</div>
<div class="col-sm-8"><input class="form-control" type="text" name="lastname" /></div>
</div>
<div class="row">
<div class="col-sm-4">Prénom</div>
<div class="col-sm-8"><input class="form-control" type="text" name="firstname" /></div>
</div>
<div class="row">
<div class="col-sm-4">Email</div>
<div class="col-sm-8"><input class="form-control" type="text" name="email" /></div>
</div>
<div class="row">
<div class="col-sm-4">Mot de passe</div>
<div class="col-sm-8"><input class="form-control" type="password" name="password" id="password" onkeyup="checkPass();"/></div>
</div>
<div class="row">
<div class="col-sm-4">Répétez le mot de passe</div>
<div class="col-sm-8"><input type="password" class="form-control" name="password2" id="password2" onkeyup="checkPass();"/></div>
<span id="confirmMessage" class="confirm-message"></span>
</div>
</form>
    </div>
<div class="modal-footer">
<button type="button" class="btn btn-secondary" data-bs-
dismiss="modal">Fermer</button>
<button type="button" class="btn btn-success" 
onclick="sendForm('inscriptionForm')">Inscription</button>
</div>
</div>
</div>
</div>
<div class="row">
     <div class="col-md-8 mx-auto my-3">
<?php if(session()->has("success")):?>

      <div class="alert alert-success">
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
      <?php echo session("success");?>
        </div>
    <?php elseif(session()->has("errors")):?>
    <?php foreach(session("errors") as $error):?>
      <div class="alert alert-danger alert-dismissible fade show" role="alert">
  <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  <strong>Erreur!</strong><?php echo $error;?></div>

<?php endforeach; ?>
  <?php endif; ?>
  </div>
</div>
<script>function sendForm(formid){
    document.getElementById(formid).submit();
}</script>

  <script>
	
  function checkPass()
{
  //Store the password field objects into variables ...
  var pass1 = document.getElementById('password');
  var pass2 = document.getElementById('password2');
  //Store the Confimation Message Object ...
  var message = document.getElementById('confirmMessage');
  //Set the colors we will be using ...
  var goodColor = "#66cc66";
  var badColor = "#ff6666";
  //Compare the values in the password field 
  //and the confirmation field
  if(pass1.value == pass2.value){
      //The passwords match. 
      //Set the color to the good color and inform
      //the user that they have entered the correct password 
      pass2.style.backgroundColor = goodColor;
      message.style.color = goodColor;
      message.innerHTML = "Passwords Match!"
  }else{
      //The passwords do not match.
      //Set the color to the bad color and
      //notify the user.
      pass2.style.backgroundColor = badColor;
      message.style.color = badColor;
      message.innerHTML = "Passwords Do Not Match!"
  }
}  
</script>