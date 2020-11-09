<?php include_once("header.php")?>

<div class="container">
<h2 class="my-3">Register new account</h2>


<!-- Create auction form -->
<form method="POST" action="process_registration.php">
  <div class="form-group row">
    <label for="accountType" class="col-sm-2 col-form-label text-right">Registering as a:</label>
	<div class="col-sm-10">
	  <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="accountType" id="accountBuyer" value="buyer" checked>
        <label class="form-check-label" for="accountBuyer">Buyer</label>
      </div>
      <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="accountType" id="accountSeller" value="seller">
        <label class="form-check-label" for="accountSeller">Seller</label>
      </div>
      <small id="accountTypeHelp" class="form-text-inline text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="emailReg" class="col-sm-2 col-form-label text-right">Email</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="emailReg" name="email" placeholder="Email">
      <small id="emailHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="passwordReg" class="col-sm-2 col-form-label text-right">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passwordReg" name="password" placeholder="Password">
      <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number. 8 characters minimum</span></small>
    </div>
  </div>
  <div class="form-group row">
    <label for="passwordConfirmationReg" class="col-sm-2 col-form-label text-right">Repeat password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passwordConfirmationReg" name="confpassword" placeholder="Enter password again">
      <small id="passwordConfirmationHelp" class="form-text text-muted"><span class="text-danger">* Passwords don't match.</span></small>
    </div>
  </div>
  <div class="form-group row">
    <button type="submit" class="btn btn-primary form-control" id="submitReg" disabled="true">Register</button>
  </div>
</form>

<div class="text-center">Already have an account? <a href="" data-toggle="modal" data-target="#loginModal">Login</a>

</div>
<script>
var email = document.getElementById("emailReg");
var password = document.getElementById("passwordReg");
var passwordConfirmation = document.getElementById("passwordConfirmationReg");
var button = document.getElementById("submitReg");
var strongPassword = false;
var passwordMatch = false;
var correctEmail = false;


function checkEmail() { 
  var warning = document.getElementById("emailHelp");
  var correctEmailEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if (correctEmailEx.test(email.value)) { correctEmail = true; warning.style.display = "none"; }
  else {correctEmail = false; warning.style.display = "block";}
checkForm();

}

function checkPassword() { 
  var passwordChars = password.value.split('');
  var scores = {
      uppercase: 0,
      lowercase: 0,
      number: 0,
  }

  var Uppercase = /[ABCDEFGHIJKLMNOPRQSTUVWXYZ]/;
  var Lowercase = /[abcdefghijklmnoprqstuvwxyz]/;
  var Numbers = /[0123456789]/;

  for (var i=0; i<passwordChars.length; i++) {
    if (Uppercase.test(passwordChars[i])) {scores.uppercase += 1;}
    else if (Lowercase.test(passwordChars[i])) {scores.lowercase += 1;}
    else if (Numbers.test(passwordChars[i])) {scores.number += 1; } 
  }
  var warning = document.getElementById("passwordHelp");
  if (scores.uppercase > 0 && scores.lowercase > 0 && scores.number > 0 && passwordChars.length > 8) {
    warning.style.display = "none";
    strongPassword = true; }
  else {
    warning.style.display = "block";
    strongPassword = false;
  }
checkForm();
checkMatch();
}

function checkMatch() {
  var warning = document.getElementById("passwordConfirmationHelp");
  if (password.value == passwordConfirmation.value) {
      warning.style.display = "none";
      passwordMatch = true;
  }
  else {
    warning.style.display = "block";
    passwordMatch = false;
  }
  checkForm();
}

password.addEventListener("keyup", checkPassword);
passwordConfirmation.addEventListener("keyup", checkMatch);
email.addEventListener("keyup", checkEmail);


function checkForm() { if (passwordMatch && strongPassword && correctEmail) { button.disabled = false;} else {button.disabled = true;};};

</script>

<?php include_once("footer.php")?>
