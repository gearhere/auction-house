<?php

$connection = mysqli_connect("localhost","yang","123", "auction_house")
             or die('Error connecting to MySQL server.' . mysql_error());

// function load_query($query){
//     global $connection;
//     $result = mysqli_query($connection, $query);
//     // mysqli_close($connection);
//     return $result;}

?>