@extends('master')
@section('content')

    <h3>Search Results</h3>

    <h4>Your Search Produced the following results:  </h4><br><br>
<?php
//$output = json_decode(json_decode($products, true),true);
foreach($products as $p){
    ?>
    <a href = "/product/{{$p['id']}}"><?php echo "NAME:   ".$p['name'].'<br><br>'; ?> </a>
    <?php
     echo "LINK:".$p['link'].'<br><br>';
     echo "RATINGS:  ".$p['rating'].'<br><br>';
    echo "REVIEWS:  ".$p['review'].'<br><br>';
    echo "PRICE:  ".$p['price'].'<br><br>'; ?>
     <img src="{{$p['image']}}"></img>
<?php }
    ?>


    
</div>
@endsection


