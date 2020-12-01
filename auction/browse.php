<?php require("header.php")?>

<div class="container">

<h2 class="my-3">Browse listings</h2>

<div id="searchSpecs">
<!-- When this form is submitted, this PHP page is what processes it.
     Search/sort specs are passed to this page through parameters in the URL
     (GET method of passing data to a page). -->
<form method="get" action="browse.php">
  <div class="row">
    <div class="col-md-5 pr-0">
      <div class="form-group">
        <label for="keyword" class="sr-only" >Search keyword:</label>
	    <div class="input-group">
          <div class="input-group-prepend">
            <span class="input-group-text bg-transparent pr-0 text-muted">
              <i class="fa fa-search"></i>
            </span>
          </div>
          <!-- keep the input value display -->
          <input type="text" class="form-control border-left-0" id="keyword" placeholder="Search for anything" value="<?= (isset($_GET['keyword'])) ? strip_tags($_GET['keyword']) : '' ?>" name='keyword'>
        </div>
      </div>
    </div>
    <div class="col-md-3 pr-0">
      <div class="form-group">
        <label for="cat" class="sr-only">Search within:</label>
        <?php
          // get selected value
          $select_cat = isset($_GET['cat']) ? $_GET['cat'] : '';
        ?>
        <select class="form-control" id="cat" name="cat">
          <option selected value="all">All categories</option>
          <option value="Fashion"
            <?php
              // keep selected value display
              echo $select_cat == 'Fashion' ? 'selected' : ''  ?>
            >Fashion</option>
          <option value="Electronics"
            <?php echo $select_cat == 'Electronics' ? 'selected' : '' ?>
            >Electronics</option>
          <option value="SportsandHobbies"
            <?php echo $select_cat == 'SportsandHobbies' ? 'selected' : '' ?>
            >Sports, Hobbies & Leisure</option>
          <option value="HomeandGarden"
            <?php echo $select_cat == 'HomeandGarden' ? 'selected' : '' ?>
            >Home & Garden</option>
          <option value="Motors"
            <?php echo $select_cat == 'Motors' ? 'selected' : '' ?>
            >Motors</option>
          <option value="CollectablesandArt"
            <?php echo $select_cat == 'CollectablesandArt' ? 'selected' : '' ?>
            >Collectables & Art</option>
          <option value="BusiandIndu"
            <?php echo $select_cat == 'BusiandIndu' ? 'selected' : '' ?>
            >Business, Office & Industrial Supplies</option>
          <option value="Health"
            <?php echo $select_cat == 'Health' ? 'selected' : '' ?>
            >Health</option>
          <option value="Media"
            <?php echo $select_cat == 'Media' ? 'selected' : '' ?>
            >Media</option>
          <option value="Others"
            <?php echo $select_cat == 'Others' ? 'selected' : '' ?>
          >Others</option>
        </select>
      </div>
    </div>
    <div class="col-md-3 pr-0">
      <div class="form-inline">
        <label class="mx-2" for="order_by">Sort by:</label>
        <?php
          //default ordering
          $select_order = isset($_GET['order_by']) ? $_GET['order_by'] : '';
        ?>
        <select class="form-control" id="order_by" name="order_by">
          <option selected value="selected">None</option>
          <option value="createtime"
            <?php echo $select_order == 'createtime' ? 'selected' : '' ?>
            >New to old</option>
          <option value="pricelow"
            <?php echo $select_order == 'pricelow' ? 'selected' : '' ?>
            >Price (low to high)</option>
          <option value="pricehigh"
            <?php echo $select_order == 'pricehigh' ? 'selected' : '' ?>
            >Price (high to low)</option>
          <option value="date"
            <?php echo $select_order == 'date' ? 'selected' : '' ?>
            >Soonest expiry</option>
        </select>
      </div>
    </div>
    <!-- <div class="col-sm-3 px-0 ">
    <div class="form-inline"><label class="m-1" for="endedAuctions">Include finished auctions?</label><input type="checkbox" id="endedAuctions" name="endedAuctions"></div>
    </div> -->
    <div class="col-sm-1 px-0 ">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</div> <!-- end search specs bar -->


</div>

<div class="container mt-5">
<?php
  // the query as base
  $query = "SELECT title, auctionNo, auctionDescription, category, endDate, bidNo, auctionStatus,
                CASE WHEN startingPrice>=max(bidAmount) OR max(bidAmount) IS NULL
                THEN startingPrice
                ELSE max(bidAmount)
                END maxJoinPrice
                FROM (SELECT title,auction.auctionNo,auctionDescription,category, endDate, createbid.bidNo, bid.bidAmount, startingPrice, auctionStatus
                      FROM (auction LEFT JOIN createbid ON createbid.auctionNo=auction.auctionNo)
                      LEFT JOIN bid ON createbid.bidNo=bid.bidNo";
  // any sql condition except for ORDER BY
  $query_cond = "";
  // conditions of ORDER BY
  $order_cond = "";

  if(!isset($_GET['keyword'])) {
  }
  else {
    $keyword = $_GET['keyword'];
    $query_cond .= " title LIKE '%$keyword%'";
    if ($_GET['cat'] == "all") {
    }
    else {
      if (!empty($query_cond)){
        $query_cond .= " AND";
      }
      $category = $_GET['cat'];
      $query_cond .= " category='$category'";
  }
  }

  if (!empty($query_cond)){
    $query_cond = " WHERE ". $query_cond;
  }

  if (!isset($_GET['order_by'])) {
  }
  else {
    $ordering = $_GET['order_by'];
    if ($ordering === "createtime") {
      $order_cond = " ORDER BY auctionNo DESC";
    }

    if ($ordering === "date") {
      // remove ended auctions
      $query_cond = $query_cond." AND endDate > NOW()";
      $order_cond = " ORDER BY endDate";
    }

    if ($ordering == "pricelow") {
      $order_cond = " ORDER BY maxJoinPrice";
    }

    if ($ordering == "pricehigh") {
      $order_cond = " ORDER BY maxJoinPrice DESC";
    }
  }
  
  $query_cond .= ") AS comprehensive GROUP BY auctionNo";
  $query .= $query_cond;
  $query .= $order_cond;

  $result = mysqli_query($connection, $query) or die('Error connecting to SQL server.');
  // pagination
  $num_results = 0; 
  while ($row = mysqli_fetch_assoc($result))
  {
      $num_results ++;
  }

  echo('
    <div class="p-2 mr-5"><h6>There are ' . $num_results . ' results for this search </h6>'  . '</div>');

  $results_per_page = 10;
  $max_page = ceil($num_results / $results_per_page);
  
  //! could be simple! a function maybe 
  if (!isset($_GET['page'])) 
  {
    $curr_page = 1;
    $query_cond = " LIMIT 0,10 " ;
    $query .= $query_cond;
    $result = mysqli_query($connection, $query) or die('result.' . mysql_error());

    // Use a while loop to print a list item for each auction listing retrieved from the query
    while ($row = mysqli_fetch_assoc($result))
    {
      $item_id = $row['auctionNo'];
      $title = $row['title'];
      $description = $row['auctionDescription'];
      $current_price = $row['maxJoinPrice'];
      $auction_status = $row['auctionStatus'];

      $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
      $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
      $bid_num_row = mysqli_fetch_assoc($bid_num_result);
      $num_bids = $bid_num_row['COUNT(bidNo)'];

      $end_date = $row['endDate'];
      print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date, $auction_status);  
    }
  }  
  else 
  {
      $curr_page = $_GET['page'];
      $index = ($curr_page-1)*10;
      $query_cond = " LIMIT ".$index.",10" ;
      $query .= $query_cond;
      $result = mysqli_query($connection, $query) or die('result.' . mysql_error());
      while ($row = mysqli_fetch_assoc($result))
      {
        $item_id = $row['auctionNo'];
        $title = $row['title'];
        $description = $row['auctionDescription'];
        $current_price = $row['maxJoinPrice'];
        $auction_status = $row['auctionStatus'];


        $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
        $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
        $bid_num_row = mysqli_fetch_assoc($bid_num_result);
        $num_bids = $bid_num_row['COUNT(bidNo)'];

        $end_date = $row['endDate'];
        print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date, $auction_status);
      }    
  }
?>

<!-- TODO: If result set is empty, print an informative message. Otherwise... -->

<ul class="list-group">
</ul>

<!-- Pagination for results listings -->
<nav aria-label="Search results pages" class="mt-5">
  <ul class="pagination justify-content-center">
  
<?php

  // Copy any currently-set GET variables to the URL.
  $querystring = "";
  foreach ($_GET as $key => $value) {
    if ($key != "page") {
      $querystring .= "$key=$value&amp;";
    }
  }
  
  $high_page_boost = max(3 - $curr_page, 0);
  $low_page_boost = max(2 - ($max_page - $curr_page), 0);
  $low_page = max(1, $curr_page - 2 - $low_page_boost);
  $high_page = min($max_page, $curr_page + 2 + $high_page_boost);
  
if ($num_results)
{

  if ($curr_page != 1) {
    echo('
    <li class="page-item">
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . ($curr_page - 1) . '" aria-label="Previous">
        <span aria-hidden="true"><i class="fa fa-arrow-left"></i></span>
        <span class="sr-only">Previous</span>
      </a>
    </li>');
  }
    
  for ($i = $low_page; $i <= $high_page; $i++) {
    if ($i == $curr_page) {
      // Highlight the link
      echo('
    <li class="page-item active">');
    }
    else {
      // Non-highlighted link
      echo('
    <li class="page-item">');
    }
    
    // Do this in any case
    echo('
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . $i . '">' . $i . '</a>
    </li>');
  }
  
  if ($curr_page != $max_page) {
    echo('
    <li class="page-item">
      <a class="page-link" href="browse.php?' . $querystring . 'page=' . ($curr_page + 1) . '" aria-label="Next">
        <span aria-hidden="true"><i class="fa fa-arrow-right"></i></span>
        <span class="sr-only">Next</span>
      </a>
    </li>');
  }
}
?>

  </ul>
</nav>
</div>

<?php include_once("footer.php")?>