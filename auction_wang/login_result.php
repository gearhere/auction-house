<?php

// TODO: Extract $_POST variables, check they're OK, and attempt to login.
// Notify user of success/failure and redirect/give navigation options.

// For now, I will just set session variables and redirect.
 $x = 0;
session_start();
$_SESSION['logged_in'] = true;
$_SESSION['username'] = "test";
$_SESSION['account_type'] = "buyer";

    
    $connection = mysqli_connect("localhost","auction_house","ucl", "auction_house");
    if (mysqli_connect_errno()){
        echo 'Failed to connect to the MySQL';
    }
   

    $query = "SELECT * FROM user ";
    $result = mysqli_query($connection, $query);
    
    echo '<table border="1">';
    while ($row = mysqli_fetch_array($result))
    {
    
        if ($row['username'] == $_POST["uname"] & $row['userpassword'] == $_POST["ups"])# fdsf
        {

            #echo $row['username'];
            #echo $_POST["uname"];
            echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');
            header("refresh:5;url=index.php");
            $x= 1;
        }
        #echo '<tr><td>' . $row['username']. '</td><td>' .
        #$row['userpassword']. '</tr></td>';
        #echo '</table>';
    }

    if ($x==0)
    {
    echo('<div class="text-center">Wrong, try again.</div>');
    }
           

    
#echo('<div class="text-center">You are now logged in! You will be redirected shortly.</div>');

// Redirect to index after 5 seconds

   


?>