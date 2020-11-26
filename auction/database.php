<?php
//This file initialises the database connection. Variable set as superglobal to allow for calling it from within functions

$GLOBALS['connection'] = mysqli_connect('localhost','root','', 'auction_house')
             or die('Error connecting to MySQL server.' . mysql_error());


?>