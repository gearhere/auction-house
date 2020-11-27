<!-- Changes:
1) Uncomment the redirect function.
2) Name the form data for subsequent access. -->

<?php include_once("header.php")?>

<?php
  //(Uncomment this block to redirect people without selling privileges away from this page)
  // If user is not logged in or not a seller, they should not be able to
  // use this page.
  if (!isset($_SESSION['account_type']) || $_SESSION['account_type'] != 'seller') {
    header('Location: browse.php');
  }

?>

<div class="container">

<!-- Create auction form -->
<div style="max-width: 800px; margin: 10px auto">
  <h2 class="my-3">Create new auction</h2>
    <p id="demo"></p>
  <div class="card">
    <div class="card-body">
      <!-- Note: This form does not do any dynamic / client-side / 
      JavaScript-based validation of data. It only performs checking after 
      the form has been submitted, and only allows users to try once. You 
      can make this fancier using JavaScript to alert users of invalid data
      before they try to send it, but that kind of functionality should be
      extremely low-priority / only done after all database functions are
      complete. -->
      <form method="post" action="create_auction_result.php">
        <div class="form-group row">
          <label for="auctionTitle" class="col-sm-2 col-form-label text-right">Title of auction</label>
          <div class="col-sm-10">
            <input type="text" class="form-control" id="auctionTitle" name = 'auctionTitle' placeholder="e.g. Black mountain bike">
            <small id="titleHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> A short description of the item you're selling, which will display in listings.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="auctionDetails" class="col-sm-2 col-form-label text-right">Details</label>
          <div class="col-sm-10">
            <textarea class="form-control" id="auctionDetails" name = 'auctionDetails' rows="4"></textarea>
            <small id="detailsHelp" class="form-text text-muted">Full details of the listing to help bidders decide if it's what they're looking for.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="auctionCategory" class="col-sm-2 col-form-label text-right">Category</label>
          <div class="col-sm-10">
            <select class="form-control" id="auctionCategory" name = 'auctionCategory'>
              <option selected>Choose...</option>
              <option value="Fashion">Fashion</option>
              <option value="Electronics">Electronics</option>
              <option value="SportsandHobbies">Sports, Hobbies & Leisure</option>
              <option value="HomeandGarden">Home & Garden</option>
              <option value="Motors">Motors</option>
              <option value="CollectablesandArt">Collectables & Art</option>
              <option value="BusiandIndu">Business, Office & Industrial Supplies</option>
              <option value="Health">Health</option>
              <option value="Media">Media</option>
              <option value="Others">Others</option>
            </select>
            <small id="categoryHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Select a category for this item.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="auctionStartPrice" class="col-sm-2 col-form-label text-right">Starting price</label>
          <div class="col-sm-10">
	        <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">£</span>
              </div>
              <input type="number" class="form-control" id="auctionStartPrice" name = 'auctionStartPrice'>
            </div>
            <small id="startBidHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Initial bid amount.</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="auctionReservePrice" class="col-sm-2 col-form-label text-right">Reserve price</label>
          <div class="col-sm-10">
            <div class="input-group">
              <div class="input-group-prepend">
                <span class="input-group-text">£</span>
              </div>
              <input type="number" class="form-control" id="auctionReservePrice" name = 'auctionReservePrice'>
            </div>
            <small id="reservePriceHelpa" class="form-text text-muted">Optional. Auctions that end below this price will not go through. This value is not displayed in the auction listing.</small>
            <small id="reservePriceHelpb" class="form-text text-muted" style="display: none;">This price should higher than starting price</small>
          </div>
        </div>
        <div class="form-group row">
          <label for="auctionEndDate" class="col-sm-2 col-form-label text-right">End date</label>
          <div class="col-sm-10">
            <input type="datetime-local" class="form-control" id="auctionEndDate" name = 'auctionEndDate'>
            <small id="endDateHelp" class="form-text text-muted"><span class="text-danger">* Required.</span> Day for the auction to end.</small>
          </div>
        </div>
        <button type="submit" class="btn btn-primary form-control" id="submitAuc" disabled="true">Create Auction</button>
      </form>
    </div>
  </div>
</div>

</div>
<script>

var title = document.getElementById("auctionTitle");
var category = document.getElementById("auctionCategory");
var sPrice = document.getElementById("auctionStartPrice");
var rPrice = document.getElementById("auctionReservePrice");
var date = document.getElementById("auctionEndDate");
var button = document.getElementById("submitAuc");

var hasTitle = false;
var hasCategory = false;
var hasSPrice = false;
var goodRPrice = true;
var hasDate = false;

function checkTitle() {
    var warning = document.getElementById("titleHelp");
    if(title.value){
        hasTitle = true;
        warning.style.display = "none";
    } else {
        hasTitle = false;
        warning.style.display = "block";
    }
    checkForm();

}

// function getSelectedOption(sel) {
//     var opt;
//     for ( var i = 0, len = sel.options.length; i < len; i++ ) {
//         opt = sel.options[i];
//         if ( opt.selected === true ) {
//             break;
//         }
//     }
//     return opt;
// }

function checkCategory() {
    var warning = document.getElementById("categoryHelp");
    if(category.value !== "Choose..."){
        hasCategory = true;
        warning.style.display = "none";
    } else {
        hasCategory = false;
        warning.style.display = "block";
    }
    checkForm();
    //document.getElementById("demo").innerHTML = category.value;
}

function checkStartPrice() {
    var warning = document.getElementById("startBidHelp");
    if(sPrice.value > 0){
        hasSPrice = true;
        warning.style.display = "none";
    } else {
        hasSPrice = false;
        warning.style.display = "block";
    }
    checkForm();
}

function checkReservePrice() {
  var warning1 = document.getElementById("reservePriceHelpa");
  var warning = document.getElementById("reservePriceHelpb");
  if(rPrice.value){
    warning1.style.display = "none";
    if(rPrice.value <= sPrice.value){
       warning.style.display = "block";
       goodRPrice = false;
    }else{
      warning.style.display = "none";
      goodRPrice = true;
    }
  }else{
    warning1.style.display = "block";
  }
    checkForm();
}

function checkDate() {
    var warning = document.getElementById("endDateHelp");
    if(date.value){
        hasDate = true;
        warning.style.display = "none";
    } else {
        hasDate = false;
        warning.style.display = "block";
    }
    checkForm();
}

title.addEventListener("keyup", checkTitle);
category.addEventListener("change", checkCategory);
sPrice.addEventListener("keyup", checkStartPrice);
rPrice.addEventListener("keyup", checkReservePrice);
date.addEventListener("change", checkDate);

function checkForm() {
    if (hasTitle && hasSPrice && hasCategory && hasDate && goodRPrice) {
        button.disabled = false;
    } else {button.disabled = true;}
}

</script>

<?php include_once("footer.php")?>