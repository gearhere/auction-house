<?php include_once("header.php")?>

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
            
            function isDataValid()
            {
              $errorMessage = null;
              if (!isset($_POST['title']) or trim($_POST['title']) == '')
                $errorMessage = 'You must enter your title';
              #else if (!isset($_POST['detail']) or trim($_POST['detail']) == '')
              #  $errorMessage = 'You must enter your detail';
              else if (!isset($_POST['category']) or trim($_POST['category']) == '')
                $errorMessage = 'You must enter your category';
              else if (!isset($_POST['startprice']) or trim($_POST['startprice']) == '')
                $errorMessage = 'You must enter your startprice';
              #else if (!isset($_POST['reserveprice']) or trim($_POST['reserveprice']) == '')
              #  $errorMessage = 'You must enter your reserveprice';
              else if (!isset($_POST['date']) or trim($_POST['date']) == '')
                $errorMessage = 'You must enter your date';
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
              $item['title'] = $_POST['title'];
              $item['detail'] = $_POST['detail'];
              $item['category'] = $_POST['category'];
              $item['startprice'] = $_POST['startprice'];
              $item['reserveprice'] = $_POST['reserveprice'];
              $item['date'] = $_POST['date'];
              return $item;
            }
      
            function printItem($item)
            {
              echo "<p>title: ${item['title']}</p>";
              echo "<p>detail: ${item['detail']}</p>";
              echo "<p>category: ${item['category']}</p>";
              echo "<p>startprice: ${item['startprice']}</p>";
              echo "<p>reserveprice: ${item['reserveprice']}</p>";
              echo "<p>date: ${item['date']}</p>";
            }
      
            function saveToDatabase($item)
            {
             $connection = mysqli_connect("localhost","item","ucl", "auction_house")
             or die('Error connecting to MySQL server.' . mysql_error());
             $query = "INSERT INTO item (title,details,category,start_price,reserve_price,end_date)".
              "VALUES ('${item['title']}','${item['detail']}','${item['category']}','${item['startprice']}','${item['reserveprice']}','${item['date']}')";
             $result = mysqli_query($connection,$query)
             or die('Error making saveToDatabase query' . mysql_error());
             mysqli_close($connection);
            }

            #function saveToDatabase($item)
        #{
            #$connection = mysqli_connect('localhost','item','ucl','auction_house')
            #or die('Error connecting to MySQL server.' . mysql_error());
            #$query = "SELECT * FROM item ";
            #$result = mysqli_query($connection,$query);
            #$query = "INSERT INTO item (title, details,category,start_price)".
            #"VALUES ('${item['title']}','${item['detail']}','${item['category']}','${item['startprice']}')";
            #$result = mysqli_query($connection,$query)
            #or die('Error making saveToDatabase query' . mysql_error());
            #mysqli_close($connection);
        #}
            if (isDataValid())
            {
              $newItem = getItem();
              saveToDatabase($newItem);
              echo "<h2>item added</h2>";
              printItem($newItem);
            }
// If all is successful, let user know.
echo('<div class="text-center">Auction successfully created! <a href="listing.php">View your new listing.</a></div>');


?>

</div>


<?php include_once("footer.php")?>