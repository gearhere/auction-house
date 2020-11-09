<?php include_once("database.php") ?>

<?php
// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.
session_start();
// LOGIN USER
if (isset($_POST['email'])) {
    global $connection;
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password = mysqli_real_escape_string($connection, $_POST['password']);
    $password = md5($password);
    $query = "SELECT * FROM Users WHERE Email='$email' AND password='$password'";
    $result = load_query($query);
    if (mysqli_num_rows($result) == 1) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $_POST['email'];
        $_SESSION['account_type'] = "buyer";
        header('location: index.php');
        echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');
        // Redirect to index after 3 seconds
        header("refresh:3;url=index.php");
    }else {
        echo("Wrong username/password combination");
        header("refresh:1;url=index.php");
}

}



?>