<?php include_once("header.php")?>

<div class="container my-5">

<?php

// This function takes the form data and adds the new auction to the database.

/* 1. Connect to MySQL database (perhaps by requiring a file that already does this). */
require_once("database.php");

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
$current_t = date("Y-m-d H:i:s");

/* Validation.
TODO:more detailed validation. Consistent with data in database. */
// 1) the length of title. -
// 2) the length of detail information. -
// 3) end date should be later than current time. -
// 4) category: manual input/connect to database and display.
// 5) reserve_price price should be higher than starting price. -
// 6) the upper limit of starting price & reserve price & date. ?
$errors = array();
if (!isset($aT) or trim($aT) == ''){
    $errors[] = 'You must enter your title';}
if (strlen($aT) > 35){
    $errors[] = 'The length of title should be less than 35 characters';}
if (strlen($aD) > 255){
    $errors[] = 'The length of description should be less than 255 characters';}
if ($aE < $current_t){
    $errors[] = 'You should set a date later than current time';}
if (!isset($aSp) or trim($aSp) == ''){
    $errors[] = 'You must enter your startprice';}
if ($aRp > 0 and $aSp > $aRp){
    $errors[] = 'Your reserve price should be higher than start price';}
if (!isset($aE) or trim($aE) == ''){
    $errors[] = 'You must enter your end date for this auction';}


/* 3: If everything looks good, make the appropriate call to insert
   data into the database. */
// If all is successful, let user know.
if (count($errors) == 0) {
    $query1 = "INSERT INTO auction (category, title, auctionDescription, startingPrice, reservePrice, startDate, endDate)
VALUES ('$aC', '$aT', '$aD', '$aSp', '$aRp', '$current_t', '$aE')";
    load_query($query1);
    echo('<div class="text-center">Auction successfully created! <a href="FIXME">View your new listing.</a></div>');
    header("refresh:3;url=browse.php");
}else{
    /* Display errors.
    TODO: display errors. Consider displaying the errors in the same page. */
    echo '<pre>'; print_r($errors); echo '</pre>';
    //echo var_dump($errors);
    header("refresh:3;url=create_auction.php");
}

?>
</div>

<?php include_once("footer.php")?>