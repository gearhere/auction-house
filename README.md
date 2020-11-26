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
- [ ] demo vedio

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

- [x] session variable --> user id
- [x] remove seller watchlist
- [x] where to put buyer watchlist

**browse.php**

- [x] Keep the input and selected value
- [x] price default value (without bid)
- [x] Sort by None
- [x] display total number of auctions that meet conditions
- [ ] ~~the bid out of date~~
- [x] the way of category value: can not use blank, ',',and'&', need to change the $post[cat] because on the page after successfully create auction, it will show value like "category: SportsandHobbies"
- [ ] `print an informative message`
- [ ] pagination arrow wrong display
- [ ] (change the CSS of the line showing total number of reslults )
- [ ] user can input page number to switch
- [ ] user can choose how many auctions listed in one page
- [ ] Garbled

**create_auction.php**

- [ ] ( can not give float when giving price )
- [ ] (have the same "name" for category, it can work well with out this change, just may make the code looks more consistent )
- [ ] for register and auction creating, it doesn't work smoothly for move forward and backword( sometimes the '* Required.'  doesn't  disappear)

**create_auction_result.php**

- [ ] (make pop a function)
- [ ] first insert into create auction table, then insert then auction table.
- [ ] replace

**function.php**

- [ ] make it could be use by register and create auction
- [x] move to create_auction_result.php
- [x] in save_to_database, modify sellerId to real value based on session variable and connection to database.

**process_registration.php**

- [ ] registration detail requirements wrong
- [ ] address and tel not inserted into database.

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
