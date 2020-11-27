<?php require_once("header.php")?>

<div class="container">

<h2 class="my-3">My listings</h2><hr>
<?php
if (!isset ($_SESSION['username']) || !isset ($_SESSION['logged_in']) || !isset ($_SESSION['account_type']) || $_SESSION['logged_in'] != true || $_SESSION['account_type'] != 'seller' ) {
  $message = "You're not logged in or are using a buyer account. Login as a seller to view your listings.";
  runModal($message);
}
else { 
  
  
  
  $username = $_SESSION['username'];


$query = "SELECT title, auction.auctionNo, auctionDescription, category, endDate, c.maxBid, startingPrice, auctionStatus
FROM (auction LEFT JOIN 
(SELECT auctionNo, max(bidAmount) AS maxBid FROM (createbid JOIN bid ON createbid.bidNo = bid.bidNo) GROUP BY auctionNo) c
ON auction.auctionNo = c.auctionNo) WHERE auction.sellerId = (SELECT sellerId FROM seller WHERE email = '$username') ORDER BY endDate DESC";

$fetch_listings = mysqli_query($connection, $query);
echo '<h4>Current listings</h4>';
$listing = mysqli_fetch_row($fetch_listings);
while ($listing) { 
  $now = new Datetime();
  $end_time = new Datetime($listing[4]);
  if ($now > $end_time && $listing[7] == 0) {
  break;
  }
  $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$listing[1]'";
  $num_bids = mysqli_fetch_row(mysqli_query($connection, $bid_num_query));

  if ($listing[5] == 0) {
    print_listing_li($listing[1], $listing[0], $listing[2],$listing[6], $num_bids[0], $listing[4],$listing[7]);
  }
  else {
    print_listing_li($listing[1], $listing[0], $listing[2],$listing[5], $num_bids[0], $listing[4],$listing[7]);
  }
  $listing = mysqli_fetch_row($fetch_listings);
  
}
if ($listing) { echo '<hr><br><h4>Past listings</h4></hr>';}
while ($listing) {
  $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$listing[1]'";
  $num_bids = mysqli_fetch_row(mysqli_query($connection, $bid_num_query));

  if ($listing[5] == 0) {
    print_listing_li($listing[1], $listing[0], $listing[2],$listing[6], $num_bids[0], $listing[4],$listing[7]);
  }
  else {
    print_listing_li($listing[1], $listing[0], $listing[2],$listing[5], $num_bids[0], $listing[4],$listing[7]);
  }
  $listing = mysqli_fetch_row($fetch_listings);


}

}
