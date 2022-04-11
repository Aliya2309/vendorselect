
<a href="/"> Go Back </a><br><br>
<h4>Your Search Produced the following results:  </h4><br><br>
<?php
$output = json_decode(json_decode($products, true),true);
foreach($output as $p){
    echo "NAME:   ".$p['Product Name'].'<br><br>';
     echo "LINK:".$p['URL'].'<br><br>';
     echo "RATINGS:  ".$p['Ratings'].'<br><br>';
    echo "REVIEWS:  ".$p['Reviews'].'<br><br>';
    echo "PRICE:  ".$p['Price'].'<br><br>';
    
 }

