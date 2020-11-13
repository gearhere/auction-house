<?php include_once("header.php")?>

<div class="container my-5">

<?php

// This function takes the form data and adds the new auction to the database.

/* 1. Connect to MySQL database (perhaps by requiring a file that already does this). */
require_once("database.php");
$errors = array();

/* 2. Extract form data into variables. Because the form was a 'post'
      form, its data can be accessed via $POST['auctionTitle'],
      $POST['auctionDetails'], etc. Perform checking on the data to
      make sure it can be inserted into the database. If there is an
      issue, give some semi-helpful feedback to user. */
$aT = $_POST['auctionTitle'];
$aD = $_POST['auctionDetails'];
$aC = $_POST['auctionCategory'];
$aSp = $_POST['auctionStartPrice'];
$aRp = $_POST['auctionReservePrice'];
$aE = $_POST['auctionEndDate'];

if (empty($aT)) {
    array_push($errors, "Auction title is required");
}
elseif (empty($aC)) {
    array_push($errors, "Auction category is required");}
elseif (empty($aSp)) {
    array_push($errors, "Auction start price is required");}
elseif (empty($aE)) {
    array_push($errors, "Auction EndDate is required");}

/* 3: If everything looks good, make the appropriate call to insert
   data into the database. */
// If all is successful, let user know.
if (count($errors) == 0) {
    $query = "INSERT INTO Auctions (aTitle,aDetails,aCategory,aSPrice,aRPrice,aEDate) VALUES('$aT', '$aD', '$aC','$aSp','$aRp','$aE')";
    load_query($query);
    echo('<div class="text-center">Auction successfully created! <a href="FIXME">View your new listing.</a></div>');
}else{
    echo $errors[0];
    header("refresh:3;url=create_auction.php");
}

?>
</div>

<?php include_once("footer.php")?>