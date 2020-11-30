<?php require_once("header.php")?>

<head>
    <meta charset="utf-8">
    <!-- import echarts.js -->
    <script src="https://cdn.staticfile.org/echarts/4.3.0/echarts.min.js"></script>
</head>

<div class="container">

<?php
  $user_username = $_SESSION['username'];

  if ($_SESSION['account_type'] == 'buyer') {
      $user_id_query = "SELECT buyerId FROM buyer WHERE email='$user_username'";
      $user_id = intval(mysqli_fetch_row(mysqli_query($connection, $user_id_query))[0]);

      $query = "SELECT firstName, lastName, email, level, street, city, postcode, telNo, backupTelNo
                FROM buyer
                LEFT JOIN buyerCont
                ON buyer.buyerId=buyerCont.buyerId
                WHERE buyer.buyerId='$user_id'";

      $user_info = mysqli_fetch_row(mysqli_query($connection, $query));
      $user_name =  ucfirst($user_info[0]);
      $user_email =  $user_info[2];
      $user_level = $user_info[3];
      $user_street = $user_info[4];
      $user_city = $user_info[5];
      $user_postcode = $user_info[6];
      $user_tel = $user_info[7];
      $user_backuptel = $user_info[8];
    //   $bid_cat_query = "";
  }
  elseif ($_SESSION['account_type'] == 'seller') {
      $user_id_query = "SELECT sellerId FROM seller WHERE email='$user_username'";
      $user_id = intval(mysqli_fetch_row(mysqli_query($connection, $user_id_query))[0]);
      
      $query = "SELECT firstName, lastName, email, level, street, city, postcode, telNo, backupTelNo
                FROM seller
                LEFT JOIN sellerCont
                ON seller.sellerId=sellerCont.sellerId
                WHERE seller.sellerId='$user_id'";
      
      $user_info = mysqli_fetch_row(mysqli_query($connection, $query));
      $user_name =  ucfirst($user_info[0]);
      $user_email =  $user_info[2];
      $user_level = $user_info[3];
      $user_street = $user_info[4];
      $user_city = $user_info[5];
      $user_postcode = $user_info[6];
      $user_tel = $user_info[7];
      $user_backuptel = $user_info[8];
  }

?>

<br><br>

<h2 class="my-3">Welcome, <span class='blue'><?php echo $user_name ?></span>! You are using a <span class='blue'><?php echo strtoupper($_SESSION['account_type']) ?></span> account.<br><br></h2>
<h4>- Email: <?php echo $user_email ?><br><br></h4>
<h4>- User level: <?php echo $user_level ?><br><br></h4>
<h4>- Contact Information: <br><h4>
<h5 class="address-detail">&boxbox; Street: <?php echo $user_street ?><br><h5>
<h5 class="address-detail">&boxbox; City: <?php echo $user_city ?><br><h5>
<h5 class="address-detail">&boxbox; Postcode: <?php echo $user_postcode ?><h5>
<h5 class="address-detail">&boxbox; Telephone number: <?php echo $user_tel ?><h5>
<h5 class="address-detail">&boxbox; Backup telephone number: <?php echo $user_backuptel ?><h5>

<br>

<h2 id="visual-bid"></h2>
<b><font color="red" id="visual-explain"></font></b>

<div id="main" style="width: 1000px;height:400px;"></div>
    <script type="text/javascript">
    var user_type = "<?php echo $_SESSION['account_type']?>";
    
    if (user_type == "buyer") {
        document.getElementById("visual-bid").innerHTML = "Do you know how many times you've bid for each category?<br>";
        document.getElementById("visual-explain").innerHTML = "Here is just an example. The data is hard-coded due to time limited, but it is easy to write these SQL statements if there is a need.<br><br>";

        var myChart = echarts.init(document.getElementById('main'));
        // var electronics = "<?php echo $user_level;?>";
 
        var option = {
            title: {
                text: 'Bid Statistics'
            },
            tooltip: {},
            legend: {
                data:['Number of Bids']
            },
            grid: {
              bottom: 90
            },
            xAxis: {
                axisLabel:{
                  interval:0,
                  rotate:30
                  },
                data: ["Fashion", "Electronics", "Sports, Hobbies & Leisure", "Home & Garden", "Motors", "Collectables & Art", "Busi, Offi & Indu", "Health","Media","Others"]
            },
            yAxis: {},
            series: [{
                name: 'Number of Bids',
                type: 'bar',
                data: [3, 2, 0, 1, 0, 1, 0, 0, 0, 0]
            }]
        };
 
        myChart.setOption(option);
    }
    else
    {
    }
    </script>

