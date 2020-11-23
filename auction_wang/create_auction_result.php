<?php include_once("header.php")?>
<?php include_once("footer.php")?>
 
<script type="text/javascript">
 $(window).on('load',function(){
 $('#auctionResult').modal('show');
 });
</script>

<div class="container my-5">

<?php

// This function takes the form data and adds the new auction to the database.

/* TODO #1: Connect to MySQL database (perhaps by requiring a file that
            already does this). */
            

/* TODO #2: Extract form data into variables. Because the form was a 'post'
            form, its data can be accessed via $POST['auctionTitle'], 
            $POST['auctionDetails'], etc. Perform checking on the data to
            make sure it can be inserted into the database. If there is an
            issue, give some semi-helpful feedback to user. */


/* TODO #3: If everything looks good, make the appropriate call to insert
            data into the database. */
            
include 'function.php';

if (isDataValid())
{
  $newItem = getItem();

  if (checkRepetition($newItem))
  {
  saveToDatabase($newItem);
  echo "<h2>item added</h2>";
  printItem($newItem);
  }
 
}
              
// If all is successful, let user know.
echo('<div class="text-center">Auction successfully created! <a href="listing.php">View your new listing.</a></div>');

?>


</div>
<?php include_once("footer.php")?>
<!-- 
            // function isDataValid()
            // {
            //   $errorMessage = null;
            //   if (!isset($_POST['auctionTitle']) or trim($_POST['auctionTitle']) == '')
            //     $errorMessage = 'You must enter your auctionTitle';
            //   #else if (!isset($_POST['auctionDetails']) or trim($_POST['auctionDetails']) == '')
            //   #  $errorMessage = 'You must enter your auctionDetails';
            //   else if (!isset($_POST['auctionCategory']) or trim($_POST['auctionCategory']) == '')
            //     $errorMessage = 'You must enter your auctionCategory';
            //   else if (!isset($_POST['auctionStartPrice']) or trim($_POST['auctionStartPrice']) == '')
            //     $errorMessage = 'You must enter your auctionStartPrice';
            //   #else if (!isset($_POST['auctionReservePrice']) or trim($_POST['auctionReservePrice']) == '')
            //   #  $errorMessage = 'You must enter your auctionReservePrice';
            //   else if (!isset($_POST['auctionEndDate']) or trim($_POST['auctionEndDate']) == '')
            //     $errorMessage = 'You must enter your auctionEndDate';
            //   if ($errorMessage !== null)
            //   {
            //     echo <<<EOM
            //     <p>Error: $errorMessage</p>
            //     EOM;
            //     return False;
            //   }
            //   return True;
            // }
      
            // function getItem()
            // {
            //   $item = array();
            //   $item['auctionTitle'] = $_POST['auctionTitle'];
            //   $item['auctionDetails'] = $_POST['auctionDetails'];
            //   $item['auctionCategory'] = $_POST['auctionCategory'];
            //   $item['auctionStartPrice'] = $_POST['auctionStartPrice'];
            //   $item['auctionReservePrice'] = $_POST['auctionReservePrice'];
            //   $item['auctionEndDate'] = $_POST['auctionEndDate'];
            //   return $item;
            // }
      
            // function printItem($item)
            // {
            //   echo "<p>auctionTitle: ${item['auctionTitle']}</p>";
            //   echo "<p>auctionDetails: ${item['auctionDetails']}</p>";
            //   echo "<p>auctionCategory: ${item['auctionCategory']}</p>";
            //   echo "<p>auctionStartPrice: ${item['auctionStartPrice']}</p>";
            //   echo "<p>auctionReservePrice: ${item['auctionReservePrice']}</p>";
            //   echo "<p>auctionEndDate: ${item['auctionEndDate']}</p>";
            // }
      
            // function saveToDatabase($item)
            // {
            //  #$connection = mysqli_connect("localhost","auction_house","ucl", "auction_house")
            //  #or die('Error connecting to MySQL server.' . mysql_error());
            //  include 'database.php';
            //  $query = "INSERT INTO auction (title,auctionDescription,category,startingPrice,reservePrice,endDate)".
            //   "VALUES ('${item['auctionTitle']}','${item['auctionDetails']}','${item['auctionCategory']}','${item['auctionStartPrice']}','${item['auctionReservePrice']}','${item['auctionEndDate']}')";
            //  $result = mysqli_query($connection,$query);
            //  #or die('Error making saveToDatabase query' . mysql_error());
            //  #mysqli_close($connection);
            // }

            // function checkRepetition($item)
            // {
            //   #$connection = mysqli_connect("localhost","auction_house","ucl", "auction_house")
            //  #or die('Error connecting to MySQL server.' . mysql_error());
            
            //  include 'database.php';
            //   $query = "SELECT title,auctionDescription,category,startingPrice FROM auction";
            //   $result = mysqli_query($connection,$query);

            //   while ($row = mysqli_fetch_array($result))
            //   {
            //     if ($item['auctionTitle']==$row['title'] && $item['auctionDetails']==$row['auctionDescription'] &&$item['auctionCategory']==$row['category'] &&$item['auctionStartPrice']==$row['startingPrice'] )
            //     {
            //       echo 'repeat, try again';
            //       return NULL;
            //     }
            //   }

            //   return $item;
        
            // }                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                

          
 -->


