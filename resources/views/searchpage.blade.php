<a href="/"> Go Back </a><br><br>
<h4>Your Search Produced the following results:  </h4><br><br>

//i didn't know if i should delete the code originally there so i added the new code here

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
 //new code ends

@foreach($products as $i)
<div> 
    <br>
    <a href="product/{{$i['Product Name']}}">{{$i->name}}</a></div>
    <div> 
    <br>
    <a href="product/{{$i['URL']}}">{{$i->link}}</a></div>
    <div> 
    <br>
    <a href="product/{{$i['Ratings']}}">{{$i->ratings}}</a></div>
    <div> 
    <br>
    <a href="product/{{$i['Reviews']}}">{{$i->reviews}}</a></div>
    <div> 
    <br>
    <a href="product/{{$i['Price']}}">{{$i->price}}</a></div>
    //<div> 
    //<br>
    //<a href="product/{{$i['Image']}}">{{$i->image}}</a></div>
<!--<div> {{$i->description}}</div>
<div> Rupees. {{$i->price}}</div>
<div> Category: {{$i->category}}</div> -->

@endforeach
