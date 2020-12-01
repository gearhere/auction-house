<?php require_once("header.php")?>


<?php

if (!isset($_POST['emailReg']) || //Check if all data was submitted
    !isset($_POST['passwordReg']) || 
    !isset($_POST['passwordConfirmationReg']) || 
    !isset($_POST['firstName']) || 
    !isset($_POST['lastName']) || 
    !isset($_POST['streetAddress']) || 
    !isset($_POST['city']) || 
    !isset($_POST['postcode']) ||
    !isset($_POST['phoneNo']))
    {
  runModal('The form has been submitted incorrectly. Some data may be missing. You will redirected back to the registration page.','register.php');
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
    $phoneNo = trim($_POST['phoneNo']);
    $secPhoneNo = $_POST['secondaryPhoneNo'] ? trim($_POST['secondaryPhoneNo']) : "n/a";

}



if(!isset($_POST['accountType']) || $_POST['accountType']!= 'buyer' && $_POST['accountType'] != 'seller') { //Check if account type was selected
    runModal('You haven\'t chosen a correct account type. You will be redirected back to the registration page.','register.php');

}

else if (!filter_var($email, FILTER_VALIDATE_EMAIL)) { //Check if email correct
   runModal('Submitted e-mail is incorrect. You will be redirected back to the registration page.','register.php');
       
}

else if(!$uppercase || !$lowercase || !$number || strlen($password) < 8) { //Check if password correct
    runModal('Submitted password doesn\'t adhere to the requirements. You will be redirected back to the registration page.','register.php');
  }

else if($password !== $passwordConf) { //Check if passwords match
    runModal('The entered passwords don\'t match. You will be redirected back to the registration page.','register.php');
}

else if(empty($firstName) || empty($lastName) || empty($street) || empty($city) || empty($postcode) || empty($phoneNo)) { //Check if any remaining data is missing
    runModal('One of the following personal information missing or incorrect: first name, last name, address, city, postcode, phone number. You will be redirected back to the registration page.','register.php');

}

else if ($_POST['accountType'] == 'buyer') { //Process registration for a buyer account
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $checkSeller = "SELECT email from seller WHERE email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($connection, $checkSeller)) ? true : false; //check if there is already an account under this name

    if (!$result) {
    $addUser = "START TRANSACTION; INSERT INTO buyer(email,password,firstName,lastName) VALUES ('$email','$hash','$firstName','$lastName'); SET @last_id = LAST_INSERT_ID(); INSERT INTO buyercont(street,city,postcode, telNo, backupTelNo, buyerId) VALUES('$street','$city','$postcode','$phoneNo','$secPhoneNo',@last_id); COMMIT;";
    $processRegistration = mysqli_multi_query($connection, $addUser); 
        if(!empty(mysqli_error($connection))) { //check if database rejects based on duplicate email
          runModal('User under this e-mail already exists! You will be redirected back to the registration page.','register.php');
        }
        else { 
          runModal('You have registered successfully! Redirecting...','browse.php');
        }
    }
    
    else { //If there is already seller account under this name to ensure data consistency
    $message = 'There is already a Seller account registered under this e-mail. If you want to register for an additional Buyer account, please use a different e-mail address.';
    header("refresh:5;url=register.php");

    }
}

else if ($_POST['accountType'] == 'seller') {
    $hash = password_hash($password, PASSWORD_DEFAULT);
    $checkBuyer = "SELECT email from buyer WHERE email = '$email'";
    $result = mysqli_fetch_array(mysqli_query($connection, $checkBuyer)) ? true : false; //check if there is already an account under this name

    if (!$result) {
    $addUser = "START TRANSACTION; INSERT INTO seller(email,password,firstName,lastName) VALUES ('$email','$hash','$firstName','$lastName'); SET @last_id = LAST_INSERT_ID(); INSERT INTO sellercont(street,city,postcode, telNo, backupTelNo, sellerId) VALUES('$street','$city','$postcode','$phoneNo','$secPhoneNo',@last_id); COMMIT;";
    $processRegistration = mysqli_multi_query($connection, $addUser);
        if(!empty(mysqli_error($connection))) { //check if database rejects based on duplicate email
          runModal('User under this e-mail already exists! You will be redirected back to the registration page.','register.php');
        }
        else { 
          runModal('You have registered successfully! Redirecting...','browse.php');
        }
    }
    
    else { //If there is already buyer account under this name
   runModal('There is already a Buyer account registered under this e-mail. If you want to register for an additional Seller account, please use a different e-mail address.','register.php');

    }




}
?>
