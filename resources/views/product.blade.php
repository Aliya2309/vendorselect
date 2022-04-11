<a href="/"> Go Back </a><br><br>

<?php

echo $product;

$strlink = strval($product['link']);
$ch = curl_init();
$link = array('link' => $strlink);
$abc = json_encode($link, JSON_FORCE_OBJECT);
curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5002/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $abc);
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$server_output = curl_exec($ch);
curl_close ($ch);
echo $server_output;

$product_name = $product['name'];
$pieces = explode(" ", $product_name);
$first_part = implode(" ", array_splice($pieces, 0, 3));
$name = array('name' => $first_part);
$product = json_encode($name, JSON_FORCE_OBJECT);



$url = "http://127.0.0.1:5000/";

$url .= $first_part;

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5000/");
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, $product);
// Receive server response ...
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

$response_json = curl_exec($ch);
curl_close($ch);

echo $response_json;
/*echo"Product Details:  ".'<br><br>';
    foreach($product as $p){
       echo "NAME:   ".$p['name'].'<br><br>';
        echo "DESCRIPTION:".$p['description'].'<br><br>';
        echo "CATEGORY:  ".$p['category'].'<br><br>';
       echo "PRICE:  ".$p['price'].'<br><br>';
    }*/

        
   // $id = strval($product['id']);
   $id=1; 

  ?>



<a href="/addstarred/{{$id}}"> Add this product to your starred items </a>


