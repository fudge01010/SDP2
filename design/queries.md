### query list ###

call `queries.php` with the operators you require in your code. either embed results as an iframe, or similar.


query ID is compulsary. cannot be blank, will error otherwise.
if arg is in brackets: (&sort=desc) then it's optional.
things in [a square box] are an example of the data format the query file takes.


$qid= | what it does | \<arg\> |
--- | :---: | --- 
1 | gets all products | `nil`
2 | gets specific product | `&id=[1005]`
3 | gets all customers | `nil`
~~4~~ | ~~get specific customer~~ | ~~`&id=[11]`~~
5 | print invoice (and its lines) (json) | `&id=[1001]`
6 | print just invoice (line) details (json) | `&id=[1004]`
11 | gets all products (json) | `nil`
12 | gets specific product (json) | `&id=[1005]`
13 | gets all customers (json) | `nil`
14 | gets specific customer (json) | `&id=[12]`
15 | adds a new product | `(&id=[1055])&name=[panamax tablets]&cost=[1.49]&description=[this is a long description]`

##### TODO Queries: #####
 | print all invoices (not invoice lines?) 
 | add a new customer
 | add a new invoice
 | print reports (based on input??)

##### Notes: #####

- QID 15: Note that the product ID is optional. if you send a product ID and it exists, it will overwrite the existing contents of that ID row - in other words, if you accidentally supply an ID of a product that exists when you are creating a new product, it will destroy the previous products entry and add the new product in it's place.  
If you don't supply an ID (which is acceptable, as it is optional), a new ID will be created from the `AUTO_INCREMENT` pool of values.  
_In other words_, this single query is both for *ADD* and *EDIT* items... use with care!

note: any page > server transactions will require javascript `encodeURI()` calls. server>page does not have this requriement.

#### UPDATE: ####

during migration period, most queries 1-9 have a JSON-ified equivalent on 10-19. in future code the original tr-printing queries _will be refactored_ into purely json queries.
