<a href="/"> Go Back </a><br><br>
<h4>Your Search Produced the following results:  </h4><br><br>

@foreach($products as $i)
<!--<div> 
    <br>
    <a href="product/{{$i['id']}}">{{$i->name}}</a></div>
<div> {{$i->description}}</div>
<div> Rupees. {{$i->price}}</div>
<div> Category: {{$i->category}}</div> -->
@endforeach