<?php include_once("header.php")?>
<?php include_once("footer.php")?>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#regResult').modal('show');
    });
</script>


<?php
    include 'database.php';

if (!isset($_POST['emailReg']) || !isset($_POST['passwordReg']) || !isset($_POST['passwordConfirmationReg']) || !isset($_POST['firstName']) ||
!isset($_POST['lastName']) || !isset($_POST['streetAddress']) || !isset($_POST['city']) || !isset($_POST['postcode'])) {
  $message='The form has been submitted incorrectly. Some data may be missing. You will redirected back to the registration page.';
header("refresh:5;url=register.php");
}
else {
    $email = trim($_POST['emailReg']);
    $password = $_POST['passwordReg'];
    $passwordConf = $_POST['passwordConfirmationReg'];
    $firstName = trim($_POST['firstName']);
    $lastName = trim($_POST['lastName']);
    $street = trim($_POST['streetAddress']);
    $city = trim($_POST['city']);
    $postcode = trim($_POST['postcode']);
    $uppercase = preg_match('@[A-Z]@', $password);
    $lowercase = preg_match('@[a-z]@', $password);
    $number    = preg_match('@[0-9]@', $password);

}




if(!isset($_POST['accountType']) || $_POST['accountType']!= 'buyer' && $_POST['accountType'] != 'seller') {
    $message='You haven\'t chosen a correct account type. You will be redirected back to the registration page.';
    header("refresh:5;url=register.php");

}
else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
   $message='Submitted e-mail is incorrect. You will be redirected back to the registration page.';
       
 header("refresh:5;url=register.php");
}

else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) {
    $message='Submitted password doesn\'t adhere to the requirements. You will be redirected back to the registration page.';
 header("refresh:5;url=register.php");
  }

else if($password !== $passwordConf) {
    $message='The entered passwords don\'t match. You will be redirected back to the registration page.';
    header("refresh:5;url=register.php");
}
else if(empty($firstName) || empty($lastName) || empty($street) || empty($city) || empty($postcode)) {
    $message='One of the following personal information missing: first name, last name, address, city, postcode. You will be redirected back to the registration page.';
    header("refresh:5;url=register.php");

}

else if ($_POST['accountType'] == 'buyer') {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $checkSeller = "SELECT email from seller WHERE email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($connection, $checkSeller)) ? true : false;

    if (!$result) {
    $addUser = "INSERT INTO buyer(email,hash,firstName,lastName,street,city,postcode) VALUES ('$email','$hash','$firstName','$lastName','$street','$city','$postcode')";
    $processRegistration = mysqli_query($connection, $addUser);
        if(!empty(mysqli_error($connection))) { $message = 'User under this e-mail already exists! You will be redirected back to the registration page.'; header("refresh:5,url=register.php");}
        else { $message = 'You have registered successfully! Redirecting...'; header("refresh:5;url=browse.php");}
    }
    
    else {
    $message = 'There is already a Seller account registered under this e-mail. If you want to register for an additional Buyer account, please use a different e-mail address.';
    header("refresh:5;url=register.php");

    }
}

else if ($_POST['accountType'] == 'seller') {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $checkBuyer = "SELECT email from buyer WHERE email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($connection, $checkBuyer)) ? true : false;

    if (!$result) {
    $addUser = "INSERT INTO seller(email,hash,firstName,lastName,street,city,postcode) VALUES ('$email','$hash','$firstName','$lastName','$street','$city','$postcode')";
    $processRegistration = mysqli_query($connection, $addUser);
        if(!empty(mysqli_error($connection))) { echo mysqli_error($connection); $message = 'User under this e-mail already exists! You will be redirected back to the registration page.'; header("refresh:5,url=register.php");}
        else { $message = 'You have registered successfully! Redirecting...'; header("refresh:5;url=browse.php");}
    }
    
    else {
    $message = 'There is already a Buyer account registered under this e-mail. If you want to register for an additional Seller account, please use a different e-mail address.';
    header("refresh:5;url=register.php");

    }




}




echo "<div class=\"modal hide fade\" id=\"regResult\" role=\"dialog\">
   <div class=\"modal-dialog\">
     <div class=\"modal-content\">
 
       <!-- Modal Header -->
       <div class=\"modal-header\">
         <h4 class=\"modal-title\">Registration Result</h4>
       </div>
 
       <!-- Modal body -->
       <div class=\"modal-body\">
         <p>$message</p>
       </div>
 
     </div>
   </div>
 </div>";

?>

