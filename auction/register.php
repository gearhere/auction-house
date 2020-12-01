<?php require_once("header.php")?>

<div class="container">
<h2 class="my-3">Register new account</h2>


<!-- Create auction form -->
<form method="POST" action="process_registration.php">
  <div class="form-group row">
    <label for="accountType" class="col-sm-2 col-form-label text-right">Registering as a:</label>
	<div class="col-sm-10">
	  <div class="form-check form-check-inline">
        <input class="form-check-input" type="radio" name="accountType" id="accountBuyer" value="buyer">
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
      <input type="text" class="form-control" id="emailReg" name="emailReg" placeholder="Email">
      <small id="emailHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="firstName" class="col-sm-2 col-form-label text-right">First Name</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="firstName" name="firstName" placeholder="First Name">
      <small id="firstNameHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="lastName" class="col-sm-2 col-form-label text-right">Last Name</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="lastName" name="lastName" placeholder="Last Name">
      <small id="lastNameHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="streetAddress" class="col-sm-2 col-form-label text-right">Address</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="streetAddress" name="streetAddress" placeholder="Street Address">
      <small id="streetAddressHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="city" class="col-sm-2 col-form-label text-right">City</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="city" name="city" placeholder="City">
      <small id="cityHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="postcode" class="col-sm-2 col-form-label text-right">Postcode</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="postcode" name="postcode" placeholder="Postcode">
      <small id="postcodeHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
	   <div class="form-group row">
    <label for="phoneNo" class="col-sm-2 col-form-label text-right">Phone number</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="phoneNo" name="phoneNo" placeholder="Phone number">
      <small id="phoneNoHelp" class="form-text text-muted"><span class="text-danger">* Required.</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="secondaryPhoneNo" class="col-sm-2 col-form-label text-right">Secondary phone number</label>
	<div class="col-sm-10">
      <input type="text" class="form-control" id="secondaryPhoneNo" name="secondaryPhoneNo" placeholder="Phone number">
      <small id="secondaryPhoneNoHelp" class="form-text text-muted">Optional</span></small>
	</div>
  </div>
  <div class="form-group row">
    <label for="passwordReg" class="col-sm-2 col-form-label text-right">Password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passwordReg" name="passwordReg" placeholder="Password">
      <small id="passwordHelp" class="form-text text-muted"><span class="text-danger">* Must contain at least 1 uppercase letter, 1 lowercase letter, and 1 number. 8 characters minimum.</span></small>
    </div>
  </div>
  <div class="form-group row">
    <label for="passwordConfirmationReg" class="col-sm-2 col-form-label text-right">Repeat password</label>
    <div class="col-sm-10">
      <input type="password" class="form-control" id="passwordConfirmationReg" name="passwordConfirmationReg" placeholder="Enter password again">
      <small id="passwordConfirmationHelp" class="form-text text-muted"><span class="text-danger">* Passwords don't match.</span></small>
    </div>
  </div>
  <div class="form-group row">
    <button type="submit" class="btn btn-primary form-control" id="submitReg" disabled  >Register</button>
  </div>
</form>

<div class="text-center">Already have an account? <a href="" data-toggle="modal" data-target="#loginModal">Login</a>

</div>
<script>

inputs = document.getElementsByTagName('input');
	document.getElementById("phoneNo").addEventListener("keyup",checkForm);


for (i = 0; i<inputs.length; ++i ) {
  inputs[i].addEventListener("keyup",checkForm);
}

document.getElementById("accountBuyer").addEventListener("click", checkForm);
document.getElementById("accountSeller").addEventListener("click", checkForm);

function checkEmail() { 
  var correctEmailEx = /^(([^<>()\[\]\.,;:\s@\"]+(\.[^<>()\[\]\.,;:\s@\"]+)*)|(\".+\"))@(([^<>()[\]\.,;:\s@\"]+\.)+[^<>()[\]\.,;:\s@\"]{2,})$/i;
  if (correctEmailEx.test(inputs.namedItem("emailReg").value)) { document.getElementById("emailHelp").style.display = "none"; return true }
  else {document.getElementById("emailHelp").style.display = "block"; return false}

}
	function checkNumber() {
  var phoneNumber = inputs.namedItem("phoneNo").value;
  if ((typeof Number(phoneNumber)) == 'number' && phoneNumber.length>8) {document.getElementById("phoneNoHelp").style.display="none";return true;}
  else {document.getElementById("phoneNoHelp").style.display="block";return false;}

}


function checkOther(element) {
if (element.value.length >= 3) {
  document.getElementById(element.id.concat("Help")).style.display = "none";
  return true;}
else {
  document.getElementById(element.id.concat("Help")).style.display = "block";
  return false;}


}

function checkPassword() { 
  var passwordChars = inputs.namedItem("passwordReg").value.split('');
  var scores = {
      uppercase: 0,
      lowercase: 0,
      number: 0,
  }

  for (var i=0; i<passwordChars.length; i++) {
    if (/[ABCDEFGHIJKLMNOPRQSTUVWXYZ]/.test(passwordChars[i])) {scores.uppercase += 1;}
    else if (/[abcdefghijklmnoprqstuvwxyz]/.test(passwordChars[i])) {scores.lowercase += 1;}
    else if (/[0123456789]/.test(passwordChars[i])) {scores.number += 1; } 
  }
  if (scores.uppercase > 0 && scores.lowercase > 0 && scores.number > 0 && passwordChars.length >= 8) {
    document.getElementById("passwordHelp").style.display = "none";
    return true;}
  else {
    document.getElementById("passwordHelp").style.display = "block";
    return false;
  }
}

function checkMatch() {
  if (inputs.namedItem("passwordReg").value == inputs.namedItem("passwordConfirmationReg").value && inputs.namedItem("passwordReg").value != '') {
    document.getElementById("passwordConfirmationHelp").style.display = "none";
    return true;
  }
  else {
    document.getElementById("passwordConfirmationHelp").style.display = "block";
    return false;
  }
}

function checkRadio() {
  if (document.getElementById("accountBuyer").checked || document.getElementById("accountSeller").checked) {
    document.getElementById("accountTypeHelp").style.display = "none";
    return true;
  }
  else {
    document.getElementById("accountTypeHelp").style.display = "block";
    return false;
  }


  }



function checkForm() { 
  checkPassword();
  checkMatch();
  checkEmail();
  checkRadio();
  checkNumber();
  checkOther(inputs.namedItem("firstName"));
  checkOther(inputs.namedItem("lastName"));
  checkOther(inputs.namedItem("streetAddress"));
  checkOther(inputs.namedItem("city"));
  checkOther(inputs.namedItem("postcode"));
  var completeCheck =   checkPassword() &&
                        checkMatch() &&
                        checkEmail() &&
                        checkRadio() &&
			checkNumber() &&
                        checkOther(inputs.namedItem("firstName")) &&
                        checkOther(inputs.namedItem("lastName")) &&
                        checkOther(inputs.namedItem("streetAddress")) &&
                        checkOther(inputs.namedItem("city")) &&
                        checkOther(inputs.namedItem("postcode"));
  
  if (completeCheck) { document.getElementById("submitReg").disabled = 
false;} else {document.getElementById("submitReg").disabled = true;};};


</script>

