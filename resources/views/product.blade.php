

@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
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
      $product_name = $product['name'];
       $pieces = explode(" ", $product_name);
      $first_part = implode(" ", array_splice($pieces, 0, 3));
       $name = array('name' => $first_part);
       $jsonproduct = json_encode($name, JSON_FORCE_OBJECT);

       echo "<br><br>";

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
      
      
      
      ?>





<div class="container">
    
    <div class="products">
<div class="img-cap">
<figure>
  <p><img src="{{$product['image']}}"
    
    alt="">
  <figcaption><?php echo $product['name']; 
      ?></figcaption>
      <a href="/addstarred/{{$product['id']}}"> Add this product to your starred items </a>
</figure>
    
</div>
   
    <hr>

<?php foreach($tweets as $key => $value)
       {
             if($key == 'prediction')
            {
                   ?> <div class="p"><p> Prediction:  <?php echo $value ; ?> </p> <br>
            <?php }
      }?>


<?php foreach($output as $key => $value)
       {
             if ($value['name'] == 'Amazon Customer')
            {
                  continue;
            }
             echo "<p>Name: ".$value['name']."<span><br></span>";
             echo "Review: ".$value['review']."<span><br></span>";
           
      }?>
    
    
</div>



   
</div>

</div>

<?php } ?>
@endsection
</body>
</html>
    
<style>
    .img-cap{
        justify-content:center;
        text-align:center;
      align-items:center;
    }
    .p{
        margin-top:2rem;
        margin-left:-100px;
  padding-top:2rem;
  justify-content: center;
  align-items: center;
  text-align: centerleft;
    }
      

</style>


<?php

      
     

//       


//       $count = 0;
//       foreach($tweets as $key => $value)
//       {
//             if($key == 'prediction')
//             {
//                   echo "Prediction:  ".$value."<br><br>";
//             }
//             if($key == 'tweets')
//             {
//                   foreach($value as $v)     {
//                         echo "name: ".$v."<br><br>";
//                         $count = $count + 1;
//                         if ($count == 10)
//                         {
//                               break;
//                         }
                  
//                   }
//             }
//       }


//       //this is sentiment analysis json. it has 
      


//       $id_starred = $product['id'];
// }
?>




 

