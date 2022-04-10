<a href="/"> Go Back </a><br><br>
<h4>Your Search Produced the following results:  </h4><br><br>

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
    <div> 
    <br>
    <a href="product/{{$i['Image']}}">{{$i->image}}</a></div>
<!--<div> {{$i->description}}</div>
<div> Rupees. {{$i->price}}</div>
<div> Category: {{$i->category}}</div> -->

@endforeach
