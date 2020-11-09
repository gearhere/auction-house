<?php include_once("database.php") ?>
<?php

// TODO: Extract $_POST variables, check they're OK, and attempt to create
// an account. Notify user of success/failure and redirect/give navigation 
// options.
$email = "";

//Register
if (isset($_POST['email'])) {
    // receive all input values from the form
    global $connection;
    $accountType = mysqli_real_escape_string($connection, $_POST['email']);
    $email = mysqli_real_escape_string($connection, $_POST['email']);
    $password_1 = mysqli_real_escape_string($connection, $_POST['password_1']);
    $password_2 = mysqli_real_escape_string($connection, $_POST['password_2']);

    // TODO:
    // form validation: ensure that the form is correctly filled ...
    // by adding (array_push()) corresponding error unto $errors array
    // first check the database to make sure
    // a user does not already exist with the same username and/or email

    $password = md5($password_1);//encrypt the password before saving in the database
    $query = "INSERT INTO Users (Email, Password) VALUES('$email', '$password')";
    load_query($query);
}
echo('<div class="text-center">You have sucessfully registered. Please log in!</div>');
// Redirect to index after 5 seconds
header("refresh:5;url=index.php");
?>