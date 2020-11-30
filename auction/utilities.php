<?php

// display_time_remaining:
// Helper function to help figure out what time to display
function display_time_remaining($interval) {

    if ($interval->days == 0 && $interval->h == 0) {
      // Less than one hour remaining: print mins + seconds:
      $time_remaining = $interval->format('%im %Ss');
    }
    else if ($interval->days == 0) {
      // Less than one day remaining: print hrs + mins:
      $time_remaining = $interval->format('%hh %im');
    }
    else {
      // At least one day remaining: print days + hrs:
      $time_remaining = $interval->format('%ad %hh');
    }

  return $time_remaining;

}

// print_listing_li:
// This function prints an HTML <li> element containing an auction listing
function print_listing_li($item_id, $title, $desc, $price, $num_bids, $end_time, $auction_status)
{
  // Truncate long descriptions
  if (strlen($desc) > 250) {
    $desc_shortened = substr($desc, 0, 250) . '...';
  }
  else {
    $desc_shortened = $desc;
  }
  
  // Fix language of bid vs. bids
  if ($num_bids == 1) {
    $bid = ' bid';
  }
  else {
    $bid = ' bids';
  }
  
  // Calculate time to auction end
  $now = new DateTime();


  if (gettype($end_time) != 'object') {$end_time = new DateTime($end_time);} //This is to ensure variable $end_time is of correct type



  if ($now > $end_time && $auction_status == 0 ) { //These two conditions should by definition be equivalent but this offers additional check for any data inconsistencies
    $fetch_winner_query = "SELECT email FROM buyer WHERE buyerId = (SELECT buyerId FROM winner WHERE auctionNo = '$item_id') ";
    $fetch_winner = mysqli_fetch_row(mysqli_query($GLOBALS['connection'], $fetch_winner_query));
    if (!$fetch_winner) {
      $time_remaining = "<h6 style=\"color:red\">This auction had no winner</h6>";
    }
    else {
      if (isset($_SESSION['username']) && $fetch_winner[0] == $_SESSION['username']) {$fetch_winner[0] = 'you';}
      $time_remaining = "<h6 style=\"color:green\">This auction was won by $fetch_winner[0]";

    }
  }
  else {
    // Get interval:
    $time_to_end = date_diff($now, $end_time);
    $time_remaining = display_time_remaining($time_to_end) . ' remaining';
  }
  
  // Print HTML
  echo('
    <li class="list-group-item d-flex justify-content-between">
    <div class="p-2 mr-5"><h5><a href="listing.php?item_id=' . $item_id . '">' . $title . '</a></h5>' . $desc_shortened . '</div>
    <div class="text-right "><span style="font-size: 1.5em">£' . number_format($price, 2) . '</span><br/>' . $num_bids . $bid . '<br/>' . $time_remaining . '</div>
  </li>'
  );
}

?>
<?php

function runModal($message, $redirect, $title = "Registration Result") {
  echo "<script type=\"text/javascript\">
  $(window).on('load',function(){
      $('#messageModal').modal('show');
  });
</script>";

echo "<div class=\"modal fade\" id=\"messageModal\" role=\"dialog\">
   <div class=\"modal-dialog\">
     <div class=\"modal-content\">
 
       <!-- Modal Header -->
       <div class=\"modal-header\">
         <h4 class=\"modal-title\">$title</h4>
       </div>
 
       <!-- Modal body -->
       <div class=\"modal-body\">
         <p>$message</p>
       </div>
 
     </div>
   </div>
 </div>";
header("Refresh: 3, url=$redirect");
 exit();
}
 ?>
