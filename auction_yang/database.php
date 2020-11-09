<?php
$connection = mysqli_connect('localhost','yangzou','123','auction_13');

function load_query($query){
    global $connection;
    $result = mysqli_query($connection, $query);
    mysqli_close($connection);
    return $result;
}


