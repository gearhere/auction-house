<?php require_once("header.php")?>




<?php
if (isset($_POST["email"]) & isset($_POST["password"]) & !empty($_POST["email"]) & !empty($_POST["password"])) { //Check if login information submitted
$email= filter_var($_POST['email'],FILTER_VALIDATE_EMAIL) ? trim($_POST["email"]) : null; //Additional check for e-mail validity
$password = $_POST["password"];

$buyerQuery = "SELECT password FROM buyer WHERE email = '$email' ";
$sellerQuery = "SELECT password FROM seller WHERE email = '$email' ";

$fetchBuyer = mysqli_query($connection, $buyerQuery) ? mysqli_fetch_array(mysqli_query($connection, $buyerQuery)) : false; //Check if there exists a buyer account under given email
$fetchSeller = mysqli_query($connection, $sellerQuery) ? mysqli_fetch_array(mysqli_query($connection, $sellerQuery)) : false; //Like above but for a seller account

if ($fetchBuyer) {

    if (password_verify($password, $fetchBuyer["password"])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $email;
        $_SESSION['account_type'] = "buyer" ;
        runModal('Logged in successfully! Redirecting...', 'browse.php', 'Login result');
    }

    else {
        runModal('Password incorrect! Redirecting...','browse.php', 'Login result');
    }

}

else if ($fetchSeller) {
    if (password_verify($password, $fetchSeller["password"])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $email;
        $_SESSION['account_type'] = "seller" ;
        runModal('Logged in successfully! Redirecting...','browse.php', 'Login result');

    }

    else {
        runModal('Password incorrect! Redirecting...','browse.php', 'Login result');
    }
}
else {
    runModal('User not found... Redirecting...','browse.php', 'Login result');
}

}
else {

  header("Location: browse.php");
}

?>
