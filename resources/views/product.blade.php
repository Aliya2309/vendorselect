<a href="/"> Go Back </a><br><br>

<?php

foreach($product as $product)
{

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
      
      //this is the reviews
      //echo $server_output;

      $output = json_decode(json_decode($server_output, true),true);
      foreach($output as $key => $value)
      {
            if ($value['name'] == 'Amazon Customer')
            {
                  continue;
            }
            echo "name: ".$value['name']."<br><br>";
            echo "review: ".$value['review']."<br><br>";
           
      }

      
     

      $product_name = $product['name'];
      $pieces = explode(" ", $product_name);
      $first_part = implode(" ", array_splice($pieces, 0, 3));
      $name = array('name' => $first_part);
      $jsonproduct = json_encode($name, JSON_FORCE_OBJECT);

      echo "<br><br> REVIEW DONE";

      $url = "http://127.0.0.1:5000/";

      $url .= $first_part;

      $ch = curl_init();
      curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5000/");
      curl_setopt($ch, CURLOPT_POST, 1);
      curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonproduct);
      // Receive server response ...
      curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

      $response_json = curl_exec($ch);
      curl_close($ch);
      $tweets = json_decode(json_decode($response_json, true), true);

      echo gettype($tweets);

      foreach($tweets as $key => $value)
      {
            if($key == 'prediction')
            {
                  continue;
            }
            if($key == 'tweets')
            {
                  foreach($value as $v)     {
                        echo "name: ".$v."<br><br>";}
            }
      }


      //this is sentiment analysis json. it has 
      echo $response_json;


      $id_starred = $product['id'];
}
?>


<a href="/addstarred/{{$id_starred}}"> Add this product to your starred items </a>

 

