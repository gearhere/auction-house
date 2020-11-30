<?php require_once("header.php")?>

<?php
  // Get info from the URL:
  //TODO: uncomment this when database is ready.
  $item_id = $_GET['item_id'];

  // Use item_id to make a query to the database.
  // first query to fetch tile, description, current highest bid and end date about this auction.
  $query1 = ("SELECT a.title, a.auctionDescription, MAX(b.bidAmount), a.endDate, startingPrice, auctionStatus  FROM auction AS a, bid AS b, createbid AS c 
WHERE b.bidNo = c.bidNo and a.auctionNo = c.auctionNo and a.auctionNo = '$item_id'");
  $result1 = mysqli_query($connection, $query1);
  $row1 = mysqli_fetch_row ($result1);
  $title = $row1[0];
  $auction_status = $row1[5];
  $description = $row1[1];
  if ($row1[2] == 0) {$current_price = $row1[4];} else {$current_price = $row1[2];}
  $end_time = new DateTime($row1[3]);

  // second query to fetch the number of bids for this auction.
  $query2 = ("SELECT COUNT(b.bidAmount) FROM auction AS a, bid AS b, createbid AS c
WHERE b.bidNo = c.bidNo and a.auctionNo = c.auctionNo and a.auctionNo = '$item_id'");
  $result2 = mysqli_query($connection, $query2);
  $row2 = mysqli_fetch_row ($result2);
  $num_bids = $row2[0];

  // TODO: Note: Auctions that have ended may pull a different set of data,
  //       like whether the auction ended in a sale or was cancelled due
  //       to lack of high-enough bids. Or maybe not.
  
  // Calculate time to auction end:
  $now = new DateTime();
  
  if ($now < $end_time) {
    $time_to_end = date_diff($now, $end_time);
    $time_remaining = ' (in ' . display_time_remaining($time_to_end) . ')';
  }
  
  // TODO: If the user has a session, use it to make a query to the database
  //       to determine if the user is already watching this item.
  //       For now, this is hardcoded.
  $has_session = true;
  $watching = false;
?>


<div class="container">

<div class="row"> <!-- Row #1 with auction title + watch button -->
  <div class="col-sm-8"> <!-- Left col -->
    <h2 class="my-3"><?php echo($title); ?></h2>
  </div>
  <div class="col-sm-4 align-self-center"> <!-- Right col -->
<?php
  /* The following watchlist functionality uses JavaScript, but could
     just as easily use PHP as in other places in the code */
  if ($now < $end_time && isset($_SESSION['account_type']) && $_SESSION['account_type'] == 'buyer' ): 
?>
    <div id="watch_nowatch" <?php if ($has_session && $watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-outline-secondary btn-sm" onclick="addToWatchlist()">+ Add to watchlist</button>
    </div>
    <div id="watch_watching" <?php if (!$has_session || !$watching) echo('style="display: none"');?> >
      <button type="button" class="btn btn-success btn-sm" disabled>Watching</button>
      <button type="button" class="btn btn-danger btn-sm" onclick="removeFromWatchlist()">Remove watch</button>
    </div>
<?php endif /* Print nothing otherwise */ ?>
  </div>
</div>
<div class="row"> <!-- Row #2 with auction description + bidding info -->
  <div class="col-sm-8"> <!-- Left col with item info -->

    <div class="itemDescription">
    <?php echo($description); ?>
    </div>
      <!-- TODO: List current bids. -->
      <?php
      $query3 = "SELECT d.email , b.bidAmount, b.bidTime FROM auction AS a, bid AS b, createbid AS c, buyer AS d
WHERE b.bidNo = c.bidNo and a.auctionNo = c.auctionNo and a.auctionNo = '$item_id' and c.buyerId = d.buyerId ORDER BY b.bidTime DESC";
      $result3 = mysqli_query($connection, $query3);;
      $row3 = mysqli_fetch_row ($result3);
      if ($num_bids >0) {echo "<br><hr><h4>Current Bids: </h4>"."<br><table class=\"table\"><tr><td><strong>User</strong></td><td><strong>Bid value</strong></td><td><strong>Bid time</strong></td></tr>";;
      $counter = 0;
      while ($row3) {
          if ($counter == 0 ) {

          
              echo "<tr><td><strong>$row3[0]</strong></td><td><strong>$row3[1]</strong></td><td><strong>$row3[2]</strong></td></tr>";
          }
          else {

            echo "<tr><td>$row3[0]</td><td>$row3[1]</td><td>$row3[2]</td></tr>";
          }

        
          $row3 = mysqli_fetch_row ($result3);
          $counter = $counter+1; 
        }
          echo "</table><br>";
      }
      else {
        echo "<br><hr><h4 style=\"color:red\">No bids!</hr>";
      }
?>

  </div>

  <div class="col-sm-4"> <!-- Right col with bidding info -->

    <p>
<?php if ($now > $end_time && $auction_status == 0): ?>
<?php $fetch_winner_query = "SELECT email FROM buyer WHERE buyerId = (SELECT buyerId FROM winner WHERE auctionNo = '$item_id') ";
      $fetch_winner = mysqli_fetch_row(mysqli_query($connection, $fetch_winner_query)); ?>
     <h5>This auction ended <?php echo(date_format($end_time, 'j M H:i')) ?></h5><hr>
     <?php if (!$fetch_winner) {
        echo "<h6 style=\"color:red\">This auction had no winner - either there were no valid bids, or the reserve price wasn't reached.</h6>";
      }
      else {
        if (isset($_SESSION['username']) && $fetch_winner[0]==$_SESSION['username']) {$fetch_winner[0] = "you";}
        echo "<h6 style=\"color:green\">This auction was won by $fetch_winner[0].";

      }
      ?>

<?php else: ?>
     <h5>Auction ends <?php echo(date_format($end_time, 'j M H:i') . $time_remaining) ?></h5><hr></p>  
    <p class="lead">Current price: £<?php echo(number_format($current_price, 2)) ?></p>

    <!-- Bidding form -->
    <?php if(isset($_SESSION['account_type']) && $_SESSION['logged_in']==true &&$_SESSION['account_type'] == "buyer"): ?>
    <form method="POST" action="place_bid.php">
      <div class="input-group">
        <div class="input-group-prepend">
          <span class="input-group-text">£</span>
        </div>
        <?php echo "<input type=\"hidden\" value=\"$item_id\" name=\"itemID\"><input type=\"hidden\" value=\"$current_price\" name=\"currentPrice\">";?>
	    <input type="number" class="form-control" id="bid" name="bid">
      </div>
      <button type="submit" class="btn btn-primary form-control" id="submit" disabled="true">Place bid</button>
    </form>
    <?php elseif (isset($_SESSION['account_type']) &&  $_SESSION['logged_in']==true && $_SESSION['account_type'] == "seller") :?>
    You're logged in with a seller account. Please login with a buyer account to place your bid.
    <?php else: ?>
    Please login to place a bid.
    <?php endif ?>
<?php endif ?>

  </div> <!-- End of right col with bidding info -->

</div> <!-- End of row #2 -->
<?php
if(isset($_SESSION['account_type']) && $_SESSION['logged_in']==true &&$_SESSION['account_type'] == "buyer")
{
  $buyName = $_SESSION['username'];

    $query_a = "SELECT buyerId FROM buyer WHERE email = '$buyName'";
    $result_a = mysqli_query($connection,$query_a)
    or die('Error connecting to MySQL server.' . mysql_error());
    $buyerId = mysqli_fetch_assoc($result_a)['buyerId'];

    $query_b = "SELECT * FROM watching";
    $result_b = mysqli_query($connection,$query_b)
    or die('Error connecting to MySQL server.' . mysql_error());
    $check = 0;
    if ($result_b)
    {
  
        while ($row = mysqli_fetch_array($result_b))
      {
          if ($item_id==$row['auctionNo'] && $buyerId==$row['buyerId'])
          {
              
              $check = 1;
              break;
          }
          
            $check = 0;
              
      }
    }
    
}
?>




<script> 
// JavaScript functions: addToWatchlist and removeFromWatchlist.



var itemId = '<?php echo($item_id);?>';
var buyId = '<?php echo($buyerId);?>';

var check = '<?php echo($check);?>';

console.log(check,itemId,buyId);

if (check==1) 
{
  $("#watch_nowatch").hide();
  $("#watch_watching").show();       // $("#watch_nowatch").hide();         
          // $("#watch_watching").show();
  console.log('1');
}


function addToWatchlist(button) {
  console.log("These print statements are helpful for debugging btw");
  //php echo($item_id);?>
  //[?php echo($item_id);?>]
  console.log(itemId,buyId);
  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  //$.ajax('watchlist_funcs.php', {type: "POST", data: {functionname: 'add_to_watchlist', arguments: [?php echo($item_id);?>]},
  $.ajax('watchlist_funcs.php', {type: "POST", data: {functionname: 'add_to_watchlist', itemid: itemId, userid: buyId},
    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        var objT = obj.trim();
        console.log(objT);
        if (objT == "success") {
          $("#watch_nowatch").hide();
          $("#watch_watching").show();
        }
        else {
          var mydiv = document.getElementById("watch_nowatch");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Add to watch failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call

} // End of addToWatchlist func

function removeFromWatchlist(button) {
  // This performs an asynchronous call to a PHP function using POST method.
  // Sends item ID as an argument to that function.
  $.ajax('watchlist_funcs.php', {
    type: "POST",
    data: {functionname: 'remove_from_watchlist', itemid: itemId, userid: buyId},

    success: 
      function (obj, textstatus) {
        // Callback function for when call is successful and returns obj
        console.log("Success");
        
        var objT = obj.trim();
        console.log(objT);

        if (objT == "success") {
          $("#watch_watching").hide();
          $("#watch_nowatch").show();
        }
        else {
          var mydiv = document.getElementById("watch_watching");
          mydiv.appendChild(document.createElement("br"));
          mydiv.appendChild(document.createTextNode("Watch removal failed. Try again later."));
        }
      },

    error:
      function (obj, textstatus) {
        console.log("Error");
      }
  }); // End of AJAX call
} // End of addToWatchlist func

// check if bid price is lower than current bid price.
var bid = document.getElementById("bid");
var button = document.getElementById("submit");
var bidValid = false;
var x = parseInt("<?php echo"$current_price"?>");

function checkBid() {
    if(bid.value > x){
        bidValid = true;}
    else {
        bidValid = false;
    }
    checkForm()
}

function checkForm() {
    console.log(bidValid.value)
    if (bidValid) {
        button.disabled = false;
    } else {
        button.disabled = true;}
}

bid.addEventListener("keyup", checkBid);

</script>
