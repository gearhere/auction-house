# Auction House

This is the UCL COMP0022 group database project. Keep calm and bid high!

<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'>Table of contents generated with markdown-toc</a></i></small>

- [Auction House](#auction-house)
  * [Progress](#progress)
    + [Database progress](#database-progress)
    + [Coding progress](#coding-progress)
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
- [ ] trigger
- [x] system event
- [ ] complete dummy data
- [x] engine
- [ ] email & transaction hash
- [x] winner
- [ ] query optimization
- [ ] spam

### Coding progress

| &#9744; Feature 1  | &#9745; Feature 2 | &#9744; Feature3 | &#9744; Feature4 |
| -------------------------- | ----------------- | ---------------- | ---------------- |
| &#9745; log in <br>&#9745; regirstration <br>&#9744; roles (privileges)     | &#9745; create auction <br>&#9745; input auction data <br>&#9745; store auction data | &#9745; search auction <br/>&#9745; sort <br/>&#9744; bugs | &#9744; create bid <br/>&#9744; list bids <br/>&#9744; close auction |

**Cross**



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
  - [ ] calendar language does not match with other parts and calendar does not like Safari
- winner & bid status
  - [x] winner event does not work
  - [ ] bid status 1 to 0 when placing a new bid
- trigger
  - [ ] watching trigger
  - [x] reserve price trigger
  - [x] cat trigger
- [ ] garbled chracters
- [ ] increment is not used
- [ ] address and telNo are not inserted into the database

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
7. current account and account data update


## Additional Resources

1. [What attributes should be assigned to relationships and what for entities?](https://www.geeksforgeeks.org/attributes-to-relationships-in-er-model/#:~:text=In%20ER%20model%2C%20entities%20have,have%20attributes%20associated%20to%20them.)

2. [Choosing a Primary Key: Natural or Surrogate?](http://www.agiledata.org/essays/keys.html)

