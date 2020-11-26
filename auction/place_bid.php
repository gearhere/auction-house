<?php include_once("header.php")?>
<?php require("utilities.php")?>
<?php include_once("footer.php")?>
<?php include_once("database.php")?>
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
        runModal($message,$auction_number);
    }
    $current_price = $_POST["currentPrice"];
    $buyer_username = $_SESSION['username'];
    $bid = intval($_POST["bid"]);
    $buyer_id_query = "SELECT buyerId FROM buyer WHERE email='$buyer_username'";
    $buyer_id = intval(mysqli_fetch_row(mysqli_query($connection, $buyer_id_query))[0]);
    


    $query = "START TRANSACTION; INSERT INTO bid (bidAmount, bidTime) VALUES ('$bid', now()); SET @last_id_in_bid = LAST_INSERT_ID(); INSERT INTO createbid(bidNo, auctionNo, buyerId) VALUES (@last_id_in_bid, '$auction_number', '$buyer_id'); COMMIT;";
    $message = "Bid placed successfully. Redirecting you back...";
    $create_bid = mysqli_multi_query($connection, $query);
    runModal($message,$auction_number);

?>
