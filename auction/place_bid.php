<?php require_once("header.php")?>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#regResult').modal('show');
    });
</script>

<?php
    if (!isset($_POST['itemID'])) {$message = "Fatal error - auction number invalid." ; runModal($message); }
    else if (!isset($_SESSION['logged_in']) || !isset($_SESSION['account_type']) || $_SESSION['logged_in'] != true || $_SESSION['account_type'] != 'buyer') {
    $message = "Fatal error - user not logged in or invalid user type."; runModal($message); }
    else if (!isset($_POST['currentPrice'])) {$message = "Fatal error. Current price missing from submitted data."; runModal($message);}
    $auction_number = $_POST["itemID"];
    $auction_query = "SELECT auctionNo, auctionStatus from auction WHERE auctionNo = $auction_number" ;
    $auction_info = mysqli_query($connection,$auction_query);
    if (mysqli_num_rows($auction_info) != 1 || mysqli_fetch_row($auction_info)[1] != "1") {
        $message = "Fatal error - auction does not exist or has ended. ";
        runModal("Bidding result",$message,"listing.php?item_id=$auction_number");
    }
    $current_price = $_POST["currentPrice"];
    $buyer_username = $_SESSION['username'];
    $bid = intval($_POST["bid"]);
    if ($bid<=$current_price) {runModal("Bidding result", "Incorrect bid amount!","listing.php?item_id=$auction_number"); exit();}
    $buyer_id_query = "SELECT buyerId FROM buyer WHERE email='$buyer_username'";
    $buyer_id = intval(mysqli_fetch_row(mysqli_query($connection, $buyer_id_query))[0]);
    


    $query = "START TRANSACTION; UPDATE bid
    SET bid.bidStatus = 0
    WHERE bid.bidNo IN
    (SELECT bid.bidNo AS matchingBids FROM createbid JOIN bid ON bid.bidNo = createbid.bidNo WHERE auctionNo = $auction_number);
    INSERT INTO bid (bidAmount, bidTime, bidStatus) VALUES ('$bid', now(),1); SET @last_id_in_bid = LAST_INSERT_ID(); INSERT INTO createbid(bidNo, auctionNo, buyerId) VALUES (@last_id_in_bid, '$auction_number', '$buyer_id'); COMMIT;";
    $message = "Bid placed successfully. Redirecting you back...";
    $create_bid = mysqli_multi_query($connection, $query);
        runModal("Bidding result",$message,"listing.php?item_id=$auction_number");
?>
