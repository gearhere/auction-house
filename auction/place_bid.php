<?php require_once("header.php")?>
<?php include("send_mail.php");?>

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
    
    $update_query = 
    "SELECT email,firstName FROM buyer 
    WHERE buyerId = (SELECT cb.buyerId FROM bid AS b JOIN createbid AS cb ON b.bidNo = cb.bidNo WHERE cb.auctionNo='$auction_number' AND b.bidStatus = 1 )";
    $result_update = mysqli_query($connection,$update_query) or die('result.' . mysql_error());
    $fetch_buyer = mysqli_fetch_row($result_update);
    send_email_update($fetch_buyer[0],$fetch_buyer[1],$bid);
    
    $watch_query = 
    "SELECT b.email,b.firstName FROM buyer AS b JOIN watching AS w ON b.buyerId = w.buyerId WHERE w.auctionNo='$auction_number'";

    $result_watch = mysqli_query($connection,$watch_query) or die('result.' . mysql_error());

    while ($watch_row = mysqli_fetch_assoc($result_watch))
    {
        $bid_email = $watch_row['email'];
        $bid_name = $watch_row['firstName'];
        send_email_watch($bid_email,$bid_name,$bid);
    }
   
    $query = "
    START TRANSACTION; 
    UPDATE bid 
    SET bid.bidStatus = 0 
    WHERE bid.bidNo IN 
    (SELECT * FROM 
    (SELECT bid.bidNo AS matchingBids 
    FROM createbid JOIN bid ON bid.bidNo = createbid.bidNo WHERE auctionNo = $auction_number)AS final); 
    INSERT INTO bid (bidAmount, bidTime, bidStatus) VALUES ('$bid', now(),1); SET @last_id_in_bid = LAST_INSERT_ID(); INSERT INTO createbid(bidNo, auctionNo, buyerId) VALUES (@last_id_in_bid, '$auction_number', '$buyer_id'); COMMIT;";
    $message = "Bid placed successfully. Redirecting you back...";
    $create_bid = mysqli_multi_query($connection, $query);
    runModal($message,"listing.php?item_id=$auction_number","Bidding result");


?>
