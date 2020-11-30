<?php require_once("header.php")?>


<div class="container">

<h2 class="my-3">Recommendations for you</h2>

<?php
  // This page is for showing a buyer recommended items based on their bid 
  // history. It will be pretty similar to browse.php, except there is no 
  // search bar. This can be started after browse.php is working with a database.
  // Feel free to extract out useful functions from browse.php and put them in
  // the shared "utilities.php" where they can be shared by multiple files.
  
  
  // TODO: Check user's credentials (cookie/session).
  $buyer_username = $_SESSION['username'];
  $buyer_id_query = "SELECT buyerId FROM buyer WHERE email='$buyer_username'";
  $buyer_id = intval(mysqli_fetch_row(mysqli_query($connection, $buyer_id_query))[0]);

  // TODO: Perform a query to pull up auctions they might be interested in.
  $query = "SELECT createbid.auctionNo, COUNT(auction.auctionNo), auction.auctionStatus, auction.title, auction.auctionDescription, auction.endDate
            FROM createbid
            INNER JOIN auction
            ON createbid.auctionNo = auction.auctionNo
            AND auction.auctionStatus = 1
            AND createbid.auctionNo NOT IN (SELECT DISTINCT(auctionNo) FROM createbid AS targetuserhis WHERE buyerId = '$buyer_id')
            AND buyerId in (SELECT DISTINCT(buyerId) FROM createbid 
                            WHERE auctionNo IN (SELECT DISTINCT(createbid.auctionNo) FROM createbid
                            INNER JOIN auction
                            ON  buyerId = '$buyer_id'
                            AND createbid.auctionNo = auction.auctionNo)
                            AND buyerId <> '$buyer_id'
                           )
            GROUP BY createbid.auctionNo
            ORDER BY COUNT(auction.auctionNo) DESC;";
  
  $recommendation_list = mysqli_query($connection, $query) or die('result.' . mysql_error());

  // TODO: Loop through results and print them out as list items.
  while ($listing = mysqli_fetch_row($recommendation_list)) {
    $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$listing[0]'";
    $num_bids = mysqli_fetch_row(mysqli_query($connection, $bid_num_query)) or die('result.' . mysql_error());

    $auction_no = $listing[0];
    $price_query = "SELECT auctionNo,
                    CASE WHEN startingPrice>=max(bidAmount) OR max(bidAmount) IS NULL THEN startingPrice ELSE max(bidAmount) END maxJoinPrice
                    FROM (SELECT auction.auctionNo, bid.bidAmount, startingPrice
                          FROM (auction LEFT JOIN createbid ON createbid.auctionNo=auction.auctionNo)
                                        LEFT JOIN bid ON createbid.bidNo=bid.bidNo
                          WHERE auction.auctionNo='$auction_no') AS comprehensive";
    $price_list = mysqli_fetch_row(mysqli_query($connection, $price_query)) or die('result.' . mysql_error());
    $current_price = $price_list[1];
    
    print_listing_li($listing[0], $listing[3], $listing[4], $current_price, $num_bids[0], $listing[5], $listing[2]);
  }
  
?>
