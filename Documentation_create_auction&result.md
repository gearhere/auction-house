**Documentation\_Create\_Auction**

yujue&amp;yang(Nov 9-14)

# create\_auction.php

## 1. Feature: 
Allow buyers to input information about their auction, including data validation and then launch it.

## 2. Code structure:

A. External connection: header.php (), footer.php();

B. Pre-check: log in status and privileges.
- _$\_SESSION[&#39;account\_type&#39;]_
- redirect to browse.php if the user logged in is not buyer.

C. Form: name six user inputs and accessing methods.

- _$\_Post[&#39;auctionTitle&#39;]_
- _$\_Post[&#39;auctionDetails&#39;]_
- _$\_Post[&#39;auctionCategory&#39;]_ (Category: Fashion, Electrics, Sports, Hobbies &amp; Leisure, Home Garden, Motors, Collectables &amp; Art, Business, Office &amp; Industrial Supplies, Health &amp; Beauty, Media, Others)...
- _$\_Post[&#39;auctionStartPrice&#39;]_
- _$\_Post[&#39;auctionReservePrice&#39;]_
- _$\_Post[&#39;auctionEndDate&#39;]_

D. Dynamic data validation using JS(&#39;warning&#39; disappears when correct user input).

- Get input value(title, category, Sprice, date, button) via id, ie: _var title = document.getElementById(&quot;auctionTitle&quot;_); 
- Status variable: _hasTitle, hasCategory, hasSPrice, hasDate_;
- Warning variable: _warning.style.display_
- Write functions to check input value and change reminder:

    1. checkTitle(): if title is not empty, then … else…
    2. checkCategory(): if category != &quot;Choose...&quot;, then … else…
    3. checkStartPrice(): if startprice \&gt; 0, then … else…
    4. checkDate(): if date is not empty and selected date is valid, then… else...

- **Key step**, 'addEventListener': &#39;key up&#39; event for title and Price; &#39;change&#39; event for category and date.

# create\_auction\_result.php

1. Feature: After checking if data are valid and existing in the database, get them, put them into our database,and print them.

2. Code structure:

- The - include &#39;function.php&#39;

- put function into a spare php file for the convenience of future adjustment

- The function.php

Functions are suggested as function names

- isDataValid
  - $errorMessage = null;
  - if (!isset($\_POST[&#39;auctionTitle&#39;]) or trim($\_POST[&#39;auctionTitle&#39;]) == &#39;&#39;)
  - $errorMessage = &#39;You must enter your auctionTitle&#39;;
- getItem
- printItem
- saveToDatabase
- checkRepetition
  - while ($row = mysqli\_fetch\_array($result))
  - {
  - if ($item[&#39;auctionTitle&#39;]==$row[&#39;title&#39;] &amp;&amp; $item[&#39;auctionDetails&#39;]==$row[&#39;auctionDescription&#39;] &amp;&amp;$item[&#39;auctionCategory&#39;]==$row[&#39;category&#39;] &amp;&amp;$item[&#39;auctionStartPrice&#39;]==$row[&#39;startingPrice&#39;] )
  - {
  - echo &#39;repeat, try again&#39;;
  - return NULL;
  - }
  - }
  -
  -

- Process

Use &#39;if else&#39; .