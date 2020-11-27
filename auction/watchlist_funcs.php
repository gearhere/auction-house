<?php require_once('database.php');



if (!isset($_POST['functionname']) || !isset($_POST['itemid'])|| !isset($_POST['userid'])) {
  return; 
}

// // Extract arguments from the POST variables:
$item_id = $_POST['itemid'];
$buyId = $_POST['userid'];

if ($_POST['functionname'] == "add_to_watchlist") {
  // TODO: Update database and return success/failure.

  //$res =  $item_id;
  $query_1 = "INSERT INTO watching (buyerId,auctionNo)
   VALUES ('$buyId','$item_id')"." on duplicate key update buyerId=buyerId ";
  #$res=$query_1;
  $result_1 = mysqli_query($connection,$query_1)
  or die('Error connecting to MySQL server.' . mysql_error()); 
  $res = "success";
}
else if ($_POST['functionname'] == "remove_from_watchlist") {
  // TODO: Update database and return success/failure.
  //$res =  $item_id;
  $query_2 = "DELETE FROM watching
   WHERE buyerId='$buyId' AND auctionNo='$item_id'";
  #$res =  $query_2;   
  $result_2 = mysqli_query($connection,$query_2)
  or die('Error connecting to MySQL server.' . mysql_error()); 
  $res = "success";
}

// Note: Echoing from this PHP function will return the value as a string.
// If multiple echo's in this file exist, they will concatenate together,
// so be careful. You can also return JSON objects (in string form) using
// echo json_encode($res).
echo $res;

?>
