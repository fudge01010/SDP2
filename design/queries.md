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
4 | get specific customer | `&id=[11]`
5 | print invoice (and its lines) | `&id=[1001]`
6 | print just invoice details | `&id=[1004]`