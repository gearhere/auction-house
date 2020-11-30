<?php require_once("header.php")?>

<div class="container">

<h2 class="my-3">My bids</h2><hr>

<?php
  // This page is for showing a user the auctions they've bid on.
  // It will be pretty similar to browse.php, except there is no search bar.
  // This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  // TODO: Check user's credentials (cookie/session).

  if (isset($_SESSION['username']) && $_SESSION['account_type'] == 'buyer') {
      $username = $_SESSION['username'];
      $query = "SELECT title, auction.auctionNo, auctionDescription, category, endDate, c.maxBid, startingPrice, auctionStatus FROM (auction LEFT JOIN (SELECT auctionNo, max(bidAmount) AS maxBid FROM (createbid JOIN bid ON createbid.bidNo = bid.bidNo) GROUP BY auctionNo) c ON auction.auctionNo = c.auctionNo) WHERE auction.auctionNo IN (SELECT auctionNo FROM createbid WHERE createbid.buyerId = (SELECT buyerId FROM buyer WHERE email = '$username')) ORDER BY endDate DESC";        $result = mysqli_query($connection, $query)or die('result.' . mysql_error());;
      $row = mysqli_fetch_assoc($result);
      echo '<h4>Current bids</h4>';
      while ($row) {
        $now = new Datetime();
        $end_date = new Datetime($row['endDate']);
        if ($now > $end_date && $row['auctionStatus'] == 0) {
        break;
    }
          $item_id = $row['auctionNo'];
          $title = $row['title'];
          $description = $row['auctionDescription'];
          $auction_status = $row['auctionStatus'];

          $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
          $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
          $bid_num_row = mysqli_fetch_assoc($bid_num_result);

          $max_price_query = "SELECT MAX(bidAmount) FROM createbid, bid, auction WHERE auction.auctionNo = createbid.auctionNo
 AND createbid.bidNo = bid.bidNo AND auction.auctionNo='$item_id'";
          $max_price_result = mysqli_query($connection, $max_price_query) or die('result.' . mysql_error());
          $max_price_row = mysqli_fetch_assoc($max_price_result);
          if ($row['startingPrice'] > $max_price_row['MAX(bidAmount)']){
              $current_price = $row['startingPrice'];
          } else{
              $current_price = $max_price_row['MAX(bidAmount)'];
          }
          $num_bids = $bid_num_row['COUNT(bidNo)'];
          print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date, $auction_status);
          $row = mysqli_fetch_assoc($result);
      }
      if ($row) {echo '<hr><br><h4>Past listings</h4></hr>';}
      while ($row) {
        $item_id = $row['auctionNo'];
        $title = $row['title'];
        $description = $row['auctionDescription'];
        $auction_status = $row['auctionStatus'];
        $end_date = new Datetime($row['endDate']);

        $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
        $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
        $bid_num_row = mysqli_fetch_assoc($bid_num_result);

        $max_price_query = "SELECT MAX(bidAmount) FROM createbid, bid, auction WHERE auction.auctionNo = createbid.auctionNo
AND createbid.bidNo = bid.bidNo AND auction.auctionNo='$item_id'";
        $max_price_result = mysqli_query($connection, $max_price_query) or die('result.' . mysql_error());
        $max_price_row = mysqli_fetch_assoc($max_price_result);
        if ($row['startingPrice'] > $max_price_row['MAX(bidAmount)']){
            $current_price = $row['startingPrice'];
        } else{
            $current_price = $max_price_row['MAX(bidAmount)'];
        }
        $num_bids = $bid_num_row['COUNT(bidNo)'];
        print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date, $auction_status);
        $row = mysqli_fetch_assoc($result);
      }

//      'SELECT title, auctionNo, auctionDescription, category, endDate, bidNo FROM
//(SELECT title,auction.auctionNo,auctionDescription,category, endDate, createbid.bidNo, bid.bidAmount, startingPrice FROM
//(auction LEFT JOIN createbid ON createbid.auctionNo=auction.auctionNo) LEFT JOIN bid ON createbid.bidNo=bid.bidNo';
//  '$item_id, $title, $desc, $price, $num_bids, $end_time';
//
//  print_r($result);
//  // TODO: Loop through results and print them out as list items.
//  print_listing_li();
//  display_time_remaining($interval);
  } else{
      header("Location: browse.php");
  }
?>

<?php include_once("footer.php")?>
