<?php include_once("header.php")?>
<?php require("utilities.php")?>

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
          <option value="Category1"
            <?php echo $select_cat == 'Category1' ? 'selected' : '' ?>
            >Category 1</option>
          <option value="Category2"
            <?php if($select_cat == 'Category2') { ?> selected <?php } ?>
            >Category 2</option>
          <option value="Category3"
            <?php echo $select_cat == 'Category3' ? 'selected' : '' ?>
            >Category 3</option>
          <option value="Fashion"
            <?php echo $select_cat == 'Fashion' ? 'selected' : '' ?>
            >Fashion</option>
          <option value="Electronics"
            <?php echo $select_cat == 'Electronics' ? 'selected' : '' ?>
            >Electronics</option>
          <option value="Sports, Hobbies & Leisure"
            <?php echo $select_cat == 'Sports, Hobbies & Leisure' ? 'selected' : '' ?>
            >Sports, Hobbies & Leisure</option>
          <option value="Home & Garden"
            <?php echo $select_cat == 'Home & Garden' ? 'selected' : '' ?>
            >Home & Garden</option>
          <option value="Motors"
            <?php echo $select_cat == 'Motors' ? 'selected' : '' ?>
            >Motors</option>
          <option value="Collectables & Art"
            <?php echo $select_cat == 'Collectables & Art' ? 'selected' : '' ?>
            >Collectables & Art</option>
          <option value="Business, Office & Industrial Supplies"
            <?php echo $select_cat == 'Business, Office & Industrial Supplies' ? 'selected' : '' ?>
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
    <div class="col-md-1 px-0">
      <button type="submit" class="btn btn-primary">Search</button>
    </div>
  </div>
</form>
</div> <!-- end search specs bar -->


</div>

<div class="container mt-5">
<?php
  
  include 'database.php';
  
  $query = "SELECT title, auctionNo, auctionDescription, category, endDate, bidNo,
                CASE WHEN startingPrice>=max(bidAmount) OR max(bidAmount) IS NULL
                THEN startingPrice
                ELSE max(bidAmount)
                END maxJoinPrice
                FROM (SELECT title,auction.auctionNo,auctionDescription,category, endDate, createbid.bidNo, bid.bidAmount, startingPrice
                      FROM (auction LEFT JOIN createbid ON createbid.auctionNo=auction.auctionNo)
                      LEFT JOIN bid ON createbid.bidNo=bid.bidNo";
  $query_cond = "";

  if(!isset($_GET['keyword'])) {
  }
  else {
    $keyword = $_GET['keyword'];
    $query_cond .= " title like '%$keyword%'";
    if ($_GET['cat'] == "all") {
      // TODO: Define behavior if a category has not been specified.
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
    $query .= " WHERE ";
    $query .= $query_cond;
  }

  if (!isset($_GET['order_by'])) {
    $query_cond .= ") AS comprehensive
    GROUP BY auctionNo";
    $query .= $query_cond;
  }
  else {
    $query_cond = ") AS comprehensive
    GROUP BY auctionNo";
    $query .= $query_cond;

    $ordering = $_GET['order_by'];
    if ($ordering === "createtime") {
      $query_cond = " ORDER BY auctionNo DESC";
      $query .= $query_cond;
    }

    // TODO: add ended auctions
    if ($ordering === "date") {
      $query_cond = " ORDER BY endDate";
      $query .= $query_cond;
    }

    if ($ordering == "pricelow") {
      $query_cond = " ORDER BY maxJoinPrice";
      $query .= $query_cond;
    }
    if ($ordering == "pricehigh") {
      $query_cond = " ORDER BY maxJoinPrice DESC";
      $query .= $query_cond;
    }
    // TODO: display if same price order (Alphabetically?)
  }

  // echo 'Final: '.$query;

  $result = mysqli_query($connection, $query) or die('result.' . mysql_error());
  
  // pagination
  $num_results = 0; 
  while ($row = mysqli_fetch_assoc($result))
  {
    
      $num_results ++;
      
  }
  echo($num_results);
  $results_per_page = 3;
  $max_page = ceil($num_results / $results_per_page);
  
  if (!isset($_GET['page'])) 
  {
    $curr_page = 1;
    $query_cond = " LIMIT 0,3 " ;
    $query .= $query_cond;
    echo($query_cond);
    $result = mysqli_query($connection, $query) or die('result.' . mysql_error());

    // Use a while loop to print a list item for each auction listing retrieved from the query
    while ($row = mysqli_fetch_assoc($result))
    {
      $item_id = $row['auctionNo'];
      $title = $row['title'];
      $description = $row['auctionDescription'];
      $current_price = $row['maxJoinPrice'];

      $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
      $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
      $bid_num_row = mysqli_fetch_assoc($bid_num_result);
      $num_bids = $bid_num_row['COUNT(bidNo)'];

      $end_date = $row['endDate'];
      print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date);     
    }
  }  
  else 
  {
      $curr_page = $_GET['page'];
      #$query_cond .= "limit" . ($page-1) * 5 . ",5" ;
      #$query_cond = " LIMIT" . ($curr_page-1) * 3 . ",3" ;
      #$query_cond = " LIMIT (".$curr_page."-1)*3,3 " ;
      #$query_cond = " LIMIT "."2"."*3,3 " ;
      $index = ($curr_page-1)*3;
      #$query_cond = " LIMIT (".$curr_page."-1)*3,3 " ;
      $query_cond = " LIMIT ".$index.",3" ;
      echo($query_cond);
      #$query_cond = " LIMIT 0,3 " ;
      $query .= $query_cond;
      $result = mysqli_query($connection, $query) or die('result.' . mysql_error());
      while ($row = mysqli_fetch_assoc($result))
      {
        $item_id = $row['auctionNo'];
        $title = $row['title'];
        $description = $row['auctionDescription'];
        $current_price = $row['maxJoinPrice'];

        $bid_num_query = "SELECT COUNT(bidNo) FROM createbid WHERE auctionNo='$item_id'";
        $bid_num_result = mysqli_query($connection, $bid_num_query) or die('result.' . mysql_error());
        $bid_num_row = mysqli_fetch_assoc($bid_num_result);
        $num_bids = $bid_num_row['COUNT(bidNo)'];

        $end_date = $row['endDate'];
        print_listing_li($item_id, $title, $description, $current_price, $num_bids, $end_date);
      }    
  }
  /* TODO: Use above values to construct a query. Use this query to 
     retrieve data from the database. (If there is no form data entered,
     decide on appropriate default value/default query to make. */

  //! could be simple!
  
  /* For the purposes of pagination, it would also be helpful to know the
     total number of results that satisfy the above query */
  // TODO: Calculate me for real
?>

<!-- <div class="container mt-5"> -->

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
?>

  </ul>
</nav>


</div>



<?php include_once("footer.php")?>