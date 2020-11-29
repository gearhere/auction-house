# Auction House

This is the UCL COMP0022 group database project. Keep calm and bid high!

<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'>Table of contents generated with markdown-toc</a></i></small>

- [Auction House](#auction-house)
  * [Progress](#progress)
    + [Database progress](#database-progress)
    + [Coding progress](#coding-progress)
  * [Killing Bugs](#killing-bugs)
  * [Tricks](#tricks)
  * [Optional Features](#optional-features)
  * [Additional Resources](#additional-resources)

## Progress

- [x] Two versions of ER diagram
- [x] Attribute list
- [x] Revision of ER diagram
- [x] Database first design
- [ ] report
- [ ] demo video

### Database progress

- [x] referential integrity
- [x] system event
- [ ] complete dummy data
- [x] engine
- [ ] email & transaction hash
- [x] winner
- [ ] query optimization

### Coding progress

| &#9745; Feature 1  | &#9745; Feature 2 | &#9745; Feature3 | &#9745; Feature4 | &#9745; Feature 5 & 6 |
| -------------------------- | ----------------- | ---------------- | ---------------- | ---------------- |
| &#9745; log in <br>&#9745; regirstration <br>&#9745; roles (privileges)    | &#9745; create auction <br>&#9745; input auction data <br>&#9745; store auction data | &#9745; search auction <br>&#9745; sort <br> | &#9745; create bid <br>&#9745; list bids <br>&#9745; close auction | &#9745; email watchlist <br>&#9745; email outbid <br>&#9745; recommendation |

**Cross**

- [x] account page

**browse.php**

- [ ] ~~the bid out of date~~
- [ ] the way of category value: can not use blank, ',',and'&', need to change the $post[cat] because on the page after successfully create auction, it will show value like "category: SportsandHobbies"
- [ ] `print an informative message`
- [ ] (change the CSS of the line showing total number of reslults )
- [ ] user can input page number to switch
- [ ] user can choose how many auctions listed in one page

**create_auction.php**

- [ ] (can not give float when giving price)

**create_auction_result.php**

- [ ] (make pop a function)

## Killing Bugs

- [x] fail to place a bid (fixed by change "require 'utilities.php'" to "require_once")
- [x] recommend page `redeclare runModal()`
- [x] missing bids for buyer 1 & 2
- [x] pagination arrow wrong display when there's no result for a search
- [x] registration password requirements wrong
- [x] triggers
- [ ] watching trigger
- [x] garbled chracters
- [x] Change info after placing bid. (currently shows 'registration result.')
- watchlist
  - [x] remove it from seller perspective
  - [x] existing auctions on watchlist can be seen, but they cannot be removed
  - [x] auctions cannot be added into watchlist
  - [ ] (optional) once bid for an auction on watchlist, it should be removed from the list
- auction
  - [x] missing auctions on mylisting
  - [x] error message after creating auction
  - [x] reserve price check fails when placing a new bid
  - [x] auction pass
  - [ ] (optional) calendar language does not match with other parts and calendar does not like Safari
- winner & bid status
  - [x] winner event does not work
  - [x] bid status 1 to 0 when placing a new bid
- [ ] 'increment' is not used
- [ ] some early users lack address dummy data
- [ ] telNos are not inserted into the database
- [ ] (optional) email is recognized as spam
- visual style
  - [ ] (optional) search bar align to the both edge.
  - [ ] (optional) size of arrow
## Tricks

**1. MySQL Event Scheduler does not work**

- First check the event scheduler status:

```sql
select @@event_scheduler;

show variables like 'event_scheduler';

show events;

show processlist;
```

- One-time open:

```sql
SET GLOBAL event_scheduler = ON;
```

- Permanent open:

  For **WAMP** , add `event_scheduler=on` under `[mysqld]` in `my.ini`. Restart the WAMP services, the event shall begin to execute.

## Optional Features

1. ratings
3. administrator
3. user as superclass
4. subcategory
5. combination of items
6. dynamic page (Countdown, immediate new bid notification)
7. account data update
8. cloud server (Azure)


## Additional Resources

1. [What attributes should be assigned to relationships and what for entities?](https://www.geeksforgeeks.org/attributes-to-relationships-in-er-model/#:~:text=In%20ER%20model%2C%20entities%20have,have%20attributes%20associated%20to%20them.)

2. [Choosing a Primary Key: Natural or Surrogate?](http://www.agiledata.org/essays/keys.html)

