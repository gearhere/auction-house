<?php include_once("header.php")?>
 <div class="container">
<h2 class="my-3">My Watchlist</h2>

<?php
//This page displays user's watched items 

if (isset($_SESSION['username']) && $_SESSION['account_type'] == 'buyer') {
    // Perform a query to pull up the auctions they've bidded on.

    $username = $_SESSION['username'];
    $query = "SELECT * FROM watching, buyer, auction WHERE auction.auctionNo = watching.auctionNo AND watching.buyerId = buyer.buyerId AND buyer.email = '$username' ORDER BY endDate DESC";
    $result = mysqli_query($connection, $query) or die ('result.' . mysql_error());
    
    while ($row = mysqli_fetch_assoc($result)) { //Display all listings iterating over the query results
        if ($row['auctionStatus'] == 0) {break;} //Check to avoid displaying expired auctions in watchlist

        $item_id = $row['auctionNo'];
        $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
        $num_bids = mysqli_fetch_row(mysqli_query($connection, $bid_num_query))[0];

        $max_price_query = "SELECT MAX(bidAmount) FROM createbid, bid, auction WHERE auction.auctionNo = createbid.auctionNo
                            AND createbid.bidNo = bid.bidNo AND auction.auctionNo='$item_id'";
        $max_price = mysqli_fetch_row(mysqli_query($connection, $max_price_query))[0] ?: 0;

        $current_price = $row['startingPrice'] > $max_price ? $row['startingPrice'] : $max_price; //Decide what price to display depending on whether there are bids
            
        print_listing_li($row['auctionNo'], $row['title'], $row['auctionDescription'], $current_price, $num_bids, $row['endDate'], $row['auctionStatus']);
    }


} else{
    header("Location: browse.php");
}
?>
