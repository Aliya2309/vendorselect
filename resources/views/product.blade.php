<a href="/"> Go Back </a><br><br>

<?php
//echo 'hello';

$url = "http://127.0.0.1:5000/";

$url .= $product_name;
echo $url;
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_HTTPGET, true);
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

        
   ?>
