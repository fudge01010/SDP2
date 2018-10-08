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
5 | print invoice (and its lines) | `&id=[1001]`
6 | print just invoice details | `&id=[1004]`
11 | gets all products (json) | `nil`
12 | gets specific product (json) | `&id=[1005]`
13 | gets all customers (json) | `nil`
14 | gets specific customer (json) | `&id=[12]`
15 | adds a new product | `(&id=[1055])&name=[panamax tablets]&cost=[1.49]&description=[this is a long description]`

note: any page > server transactions will require javascript `encodeURI()` calls. server>page does not have this requriement.

#### UPDATE: ####

during migration period, most queries 1-9 have a JSON-ified equivalent on 10-19. in future code the original tr-printing queries _will be refactored_ into purely json queries.