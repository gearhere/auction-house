<?php require_once("header.php")?>
<script type="text/javascript">
 $(window).on('load',function(){
 $('#auctionResult').modal('show');
 });
</script>

<div class="container my-5">

<?php
function isDataValid()
{
    $errorMessage = null;
    if (!isset($_POST['auctionTitle']) or trim($_POST['auctionTitle']) == '')
        $errorMessage = 'You must enter your auctionTitle';
    #else if (!isset($_POST['auctionDetails']) or trim($_POST['auctionDetails']) == '')
    #  $errorMessage = 'You must enter your auctionDetails';
    else if (!isset($_POST['auctionCategory']) or trim($_POST['auctionCategory']) == '')
        $errorMessage = 'You must enter your auctionCategory';
    else if (!isset($_POST['auctionStartPrice']) or trim($_POST['auctionStartPrice']) == '')
        $errorMessage = 'You must enter your auctionStartPrice';
    #else if (!isset($_POST['auctionReservePrice']) or trim($_POST['auctionReservePrice']) == '')
    #  $errorMessage = 'You must enter your auctionReservePrice';
    else if (!isset($_POST['auctionEndDate']) or trim($_POST['auctionEndDate']) == '')
        $errorMessage = 'You must enter your auctionEndDate';
    if ($errorMessage !== null)
    {
        echo <<<EOM
    <p>Error: $errorMessage</p>
    EOM;
        return False;
    }
    return True;
}

function getItem()
{
    $item = array();
    $item['auctionTitle'] = $_POST['auctionTitle'];
    $item['auctionDetails'] = $_POST['auctionDetails'];
    $item['auctionCategory'] = $_POST['auctionCategory'];
    $item['auctionStartPrice'] = $_POST['auctionStartPrice'];
    $item['auctionReservePrice'] = $_POST['auctionReservePrice'];
    $item['auctionEndDate'] = $_POST['auctionEndDate'];

    $item['auctionStartDate'] = date("Y-m-d H:i:s");

    return $item;
}

function printItem($item)
{
    $item_cat_print= '';
    if ($item['auctionCategory'] == 'SportsandHobbies')
        $item_cat_print = 'Sports, Hobbies & Leisure';
    if ($item['auctionCategory'] == 'HomeandGarden')
        $item_cat_print = 'Home & Garden';    
    if ($item['auctionCategory'] == 'CollectablesandArt')
        $item_cat_print = 'Collectables & Art';     
    if ($item['auctionCategory'] == 'BusiandIndu')
        $item_cat_print = 'Business, Office & Industrial Supplies';     

    echo "<p>auctionTitle: ${item['auctionTitle']}</p>";
    echo "<p>auctionDetails: ${item['auctionDetails']}</p>";
    echo "<p>auctionCategory:". $item_cat_print."</p>";
    echo "<p>auctionStartPrice: ${item['auctionStartPrice']}</p>";
    echo "<p>auctionReservePrice: ${item['auctionReservePrice']}</p>";
    echo "<p>auctionEndDate: ${item['auctionEndDate']}</p>";
    echo "<p>auctionStarDate: ${item['auctionStartDate']}</p>";
}

function saveToDatabase($item){
    $sMail = $_SESSION['username'];
    $query0 = "SELECT * FROM seller WHERE seller.email = '$sMail'";
    $result0 = mysqli_query($GLOBALS['connection'],$query0);
    $sellerId = mysqli_fetch_assoc($result0)['sellerId'];
    $item['auctionReservePrice']  = (int)$item['auctionReservePrice'];
    $query = "INSERT INTO auction (title,auctionDescription,category,startingPrice,reservePrice,startDate,endDate,sellerId)".
        "VALUES ('${item['auctionTitle']}','${item['auctionDetails']}','${item['auctionCategory']}',
        '${item['auctionStartPrice']}','{$item['auctionReservePrice']}','${item['auctionStartDate']}',
        '${item['auctionEndDate']}','$sellerId')";

    $result = mysqli_query($GLOBALS['connection'],$query)
    or die('Error connecting to MySQL server.' . mysql_error());
}

function checkRepetition($item)
{

    $query = "SELECT title,auctionDescription,category,startingPrice FROM auction";
    $result = mysqli_query($GLOBALS['connection'],$query);

    while ($row = mysqli_fetch_array($result))
    {
        if ($item['auctionTitle']==$row['title'] && $item['auctionDetails']==$row['auctionDescription'] &&$item['auctionCategory']==$row['category'] &&$item['auctionStartPrice']==$row['startingPrice'] )
        {
            #echo 'repeat, try again';
            $message = 'Same auction already exists! You will be redirected back to the create auction page.';
            runModal($message,"create_auction.php","Repeat Result");

            return NULL;
        }
    }

    return $item;

}

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
echo('<div class="text-center">Auction successfully created! <a href="mylistings.php">View your new listing.</a></div>');

?>

</div>



