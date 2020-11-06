<?php

// TODO1: Check input are OK;
// TODO2: Notify user of failure and redirect/give navigation options.
?>

<!-- Zongyue's bad codes begin here-->

<?php
// COMPLETED features: 
// 1. Extract $_POST variables;
// 2. Create an Account;
// 3. Notify user of success and redirect.

// Set datsbase information
$dbhost = "localhost";
$dbuser = "root";
$dbpwd = "";
$dbname = "auction_house";

// Extract user input from the form,
// adding names in html of register.php
$accountType = $_POST["accountType"];
$email = $_POST["email"];
// encrypt the password before saving in the database
$password = md5($_POST["password"]);

// Create connection
$connection = mysqli_connect($dbhost, $dbuser, $dbpwd, $dbname);
// Check connection
if (!$connection) {
    die("Connection failed: " . mysqli_connect_error());
  }

// Execute SQL statement to save the
// input to the database
$sql = "INSERT INTO user (userId, accountType, email, password)
VALUES (0002, '$accountType', '$email', '$password')";

// Redirect to index after 3 seconds, and
// end the scripts, automatically closing the connection
if (mysqli_query($connection, $sql)) {
    echo "New record created successfully! You will return to the homepage soon.";
    die(header("refresh:3;url=index.php"));
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($connection);
  }
?>

<!-- Zongyue's bad codes end here-->