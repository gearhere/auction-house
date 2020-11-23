<?php include_once("header.php")?>
<?php include_once("footer.php")?>

<script type="text/javascript">
    $(window).on('load',function(){
        $('#logResult').modal('show');
    });
</script>


<?php
include 'database.php';
if (isset($_POST["email"]) & isset($_POST["password"]) & !empty($_POST["email"]) & !empty($_POST["password"])) {
$email= trim($_POST["email"]);
$password = $_POST["password"];

$buyerQuery = "SELECT email, hash FROM buyer WHERE email = '$email' ";
$sellerQuery = "SELECT email, hash FROM seller WHERE email = '$email' ";
$fetchBuyer = mysqli_query($connection, $buyerQuery) ? mysqli_fetch_array(mysqli_query($connection, $buyerQuery)) : false;
$fetchSeller = mysqli_query($connection, $sellerQuery) ? mysqli_fetch_array(mysqli_query($connection, $sellerQuery)) : false;

if ($fetchBuyer) {

    if (password_verify($password, $fetchBuyer["hash"])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $email;
        $_SESSION['account_type'] = "buyer" ;
        $message = 'Logged in successfully! Redirecting...';
    }

    else {
        $message='Password incorrect! Redirecting...';
    }

}

else if ($fetchSeller) {
    if (password_verify($password, $fetchSeller["hash"])) {
        $_SESSION['logged_in'] = true;
        $_SESSION['username'] = $email;
        $_SESSION['account_type'] = "seller" ;
        $message = 'Logged in successfully! Redirecting...';
    }

    else {
        $message='Password incorrect! Redirecting...';
    }
}
else {
    $message='User not found... Redirecting...';



}
echo "<div class=\"modal hide fade\" id=\"logResult\" role=\"dialog\">
   <div class=\"modal-dialog\">
     <div class=\"modal-content\">
 
       <!-- Modal Header -->
       <div class=\"modal-header\">
         <h4 class=\"modal-title\">Registration Result</h4>
       </div>
 
       <!-- Modal body -->
       <div class=\"modal-body\">
         <p>$message</p>
       </div>
 
     </div>
   </div>
 </div>";
 header("refresh:3;url=browse.php");



}

?>