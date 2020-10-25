# auction-house-g13

[toc]

This is the UCL COMP0022 group database project. Yes!

## Progress:

- ✅ Two versions of ER diagram completed

## Attribute List

**Annotation**

- 【composite attribute】

- {possible value of the attribute:「value range」}

### @User

| Attribute |                      What it describes                       | Mandatory |
| :-------: | :----------------------------------------------------------: | :-------: |
|  userId   |                  the unique id of the user                   |     T     |
|   email   |                  email address of the user                   |     T     |
|   telNo   |               the telephone number of the user               |     T     |
| userName  | the name of the user, including the 【first name】 and the 【last name】 |     T     |
| password  |                   the password of the user                   |     T     |
|  address  | the address of the user, including【street】, 【city】, 【postcode】 |     T     |
|    age    |                     the age of the user                      |     T     |
|  gender   |  the age of the user: { 「{male」, 「female」, 「secret」}   |     F     |
|   level   |               the level of the user: {「1-5」}               |     T     |

#### @Seller

| Attribute |          What it describes          | Mandatory |
| :-------: | :---------------------------------: | :-------: |
| sellerId  | the unique id referring to a seller |     T     |



#### @ Buyer

| Attribute |         What it describes          | Mandatory |
| :-------: | :--------------------------------: | :-------: |
|  buyerId  | the unique id referring to a buyer |     T     |

### @Auction

|   Attribute   |                      What it describes                       | Mandatory |
| :-----------: | :----------------------------------------------------------: | :-------: |
|   auctionNo   |               the unique number of the auction               |     T     |
|   sellerId    |                              -                               |     T     |
| auctionStatus |                    { 「open」, 「close」}                    |     T     |
|  watchUserId  |        the id of the user who is watching the auction        |     T     |
|     title     |                the short title of the auction                |     T     |
|  description  |            the detail description of the auction             |     T     |
|     price     | the prices relevant to the auction, including【startingPrice】, 【reservePrice】, 【increments】 |     T     |
|     time      | the time information relevant to the auction, including【startDate】, 【endDate】 |     T     |
|     bidNo     |                              -                               |     T     |
|   /topBidNo   |       the number of the bid whose price is the highest       |     T     |

### @Items

|  Attribute  |       What it describes       | Mandatory |
| :---------: | :---------------------------: | :-------: |
|   itemNo    | the unique number of the item |     T     |
|  category   |    general types of items     |     T     |
| subcategory |         detailed type         |     F     |

### @Bids

| Attribute |                      What it describes                       | Mandatory |
| :-------: | :----------------------------------------------------------: | :-------: |
|   bidNo   |                 the unique number of the bid                 |     T     |
|  buyerId  |                              -                               |     T     |
| auctionNo |                              -                               |     T     |
| bidStatus |                     { 「win」, 「fail」}                     |     T     |
| bidAmount | the bid price : ①「> 【startingPrice】」; ② 「> top price + 【increments】」 |     T     |
|  bidTime  |               the time when the bid is created               |     T     |


## Optional Ideas

1. ratings
2. multiplicity & price history
3. administrator


## Questions

1. What attributes should be assigned to relationships and what for entities?