# auction-house-g13

This is the UCL COMP0022 group database project. Yes!

<small><i><a href='http://ecotrust-canada.github.io/markdown-toc/'>Table of contents generated with markdown-toc</a></i></small>

- [auction-house-g13](#auction-house-g13)
  * [Progress](#progress)
    + [Coding progress](#coding-progress)
  * [Optional Ideas](#optional-ideas)
  * [Questions](#questions)

## Progress

- [x] Two versions of ER diagram
- [x] Attribute list
- [x] Revision of ER diagram
- [x] Database first design
- [x] dummy data





- [ ] report
- [ ] demo vedio

### Coding progress

| &#9744; Feature 1  | &#9745; Feature 2 | &#9744; Feature3 | &#9744; Feature4 |
| -------------------------- | ----------------- | ---------------- | ---------------- |
| &#9745; log in <br>&#9745; regirstration <br>&#9744; roles (privileges)     | &#9745; create auction <br>&#9745; input auction data <br>&#9745; store auction data | &#9745; search auction <br/>&#9745; sort <br/> | &#9744; create bid <br/>&#9744; list bids <br/>&#9744; close auction |

**browse.php**

- [x] placeholder
- [ ] arrow
- [ ] price default value (without bid)
- [x] Sort by None
- [x] display total number of auctions that meet conditions
- [x] `print an informative message`
- [ ] bug: unable to search &
- [ ] the bid out of date
- [ ] the way of category value: can not use blank, ',',and'&', need to change the $post[cat] because on the page after successfully create auction, it will show value like "category: SportsandHobbies"
- [ ] (change the CSS of the line showing total number of reslults )

**create_auction.php**

- [ ] ( can not give float when giving price )
- [ ] (have the same "name" for category, it can work well with out this change, just may make the code looks more consistent )

**create_auction_result.php**

- [ ] (make pop a function)

**function.php**

- [ ] make it could be use by register and create auction

## Optional Ideas

1. ratings
3. administrator
3. subcategory
4. combination of items


## Questions

1. What attributes should be assigned to relationships and what for entities?