@extends('master')
@section('content')
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://fonts.googleapis.com/css?family=Raleway:400,600,700,800" rel='stylesheet' type='text/css'>
   

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/2.2.2/jquery.min.js"></script>
</head>






<body>
<h3>Search Results</h3>



<div class="tools">
       
        <div class="settings">
            <button id="view">Switch View</button>
        </div>
    </div>
    <?php
//$output = json_decode(json_decode($products, true),true);
foreach($products as $p){
    ?>
    
    <div class="products products-table">
        <div class="product">
            <div class="test">
            <div class="product-img">                                
                <img src="{{$p['image']}}" alt="" srcset="">
</div>
            <div class="product-content">
                <h3>
                <a href = "/product/{{$p['id']}}"><?php echo "NAME:   ".$p['name']; ?> </a>
                </h3>
                <p class="product-text price"><?php echo "PRICE:  ".$p['price']; ?></p>
                <p class="product-text genre"><?php  echo "RATINGS:  ".$p['rating']; ?></p>
            </div>
        </div>
        </div>

        </div>
    
    <?php } ?>
    <script>
        $("#view").click(function () {
            $(".products").toggleClass("products-table");
        });
    </script>
    @endsection
</body>
</html>
    
<style>
        input,
        textarea,
        button {
            height: 25px;
            margin: 0;
            padding: 10px;
            font-family: Raleway, sans-serif;
            font-weight: normal;
            font-size: 12pt;
            outline: none;
            border-radius: 0;
            background: none;
            border: 1px solid #282B33;
        }

        button,
        select {
            height: 45px;
            padding: 0 15px;
            cursor: pointer;
        }

        button {
            background: none;
            border: 1px solid black;
            margin: 25px 0;
        }

        button:hover {
            background-color: #282B33;
            color: white;
        }


        .tools {
            overflow: auto;
            zoom: 1;
        }

        .search-area {
            float: left;
            width: 60%;
        }

        .settings {
            display: none;
            float: right;
            width: 40%;
            text-align: right;
        }

        #view {
            display: none;
            width: auto;
            height: 47px;
        }

        #searchbutton {
            width: 60px;
            height: 47px;
        }

        input#search {
            width: 30%;
            width: calc(100% - 90px);
            padding: 10px;
            border: 1px solid #282B33;
        }

        @media screen and (max-width:400px) {
            .search-area {
                width: 100%;
            }
        }

        .products {
            width: 100%;
            font-family: Raleway;
        }

        .product {
            
            display: inline-block;
            width: calc(24% - 13px);
            margin: 10px 10px 30px 10px;
            vertical-align: top;
        }

        .product img {
            float:left;
            display: block;
            margin: 0 auto;
            width: auto;
            height: 200px;
            max-width: calc(100% - 20px);
            background-cover: fit;
            box-shadow: 0px 0px 7px 0px rgba(0, 0, 0, 0.8);
            border-radius: 2px;
        }

        .product-content {
            text-align: center;
        }

        .product h3 {
            font-size: 20px;
            font-weight: 600;
            margin: 10px 0 0 0;
        }

        .product h3 small {
            display: block;
            font-size: 16px;
            font-weight: 400;
            font-style: italic;
            margin: 7px 0 0 0;
        }

        .product .product-text {
            margin: 7px 0 0 0;
            color: #777;
        }

        .product .price {
            font-family: sans-serif;
            font-size: 16px;
            font-weight: 700;
        }

        .product .genre {
            font-size: 14px;
        }


        @media screen and (max-width:1150px) {
            .product {
                width: calc(33% - 23px);
            }
        }

        @media screen and (max-width:700px) {
            .product {
                width: calc(50% - 43px);
            }
        }

        @media screen and (max-width:400px) {
            .product {
                width: 100%;
            }
        }

        /* TABLE VIEW */

        @media screen and (min-width:401px) {
            .settings {
                display: block;
            }
            #view {
                display: inline;
            }
            .products-table .product {
                display: flex;
                flex-direction:row;
                width: auto;
                margin: 10px 10px 30px 10px;
            }
            .products-table .product .product-img {
                display: inline-block;
                margin: 0;
                width: 120px;
                height: 120px;
                vertical-align: middle;
            }
            .products-table .product img {
                width: auto;
                height: 120px;
                max-width: 120px;
            }
            .products-table .product-content {
                text-align: left;
                display: inline-block;
                margin-left: 20px;
                vertical-align: middle;
                width: calc(100% - 145px);
            }
            .products-table .product h3 {
                margin: 0;
            }
        }
    </style>











<!-- <body>
<h3>Search Results</h3>
<div id="main-container">
<?php
//$output = json_decode(json_decode($products, true),true);
//foreach($products as $p){
    ?>
  <div class="container">

    <div class="content">
    
      <p class="title"> <a href = "/product/{{$p['id']}}"><?php //echo "NAME:   ".$p['name'].'<br><br>'; ?> </a></p>
      <p class="sub-title"><?php  //echo "RATINGS:  ".$p['rating'].'<br><br>'; ?></p>
      <p class = "sub-title"> <?php //echo "PRICE:  ".$p['price'].'<br><br>'; ?> </p>

      <img src="{{$p['image']}}"></img>
    </div>
  </div>
  <?php //} ?>
  
</div>


</body>
</html>

<style>
#main-container {
  
  
}
.container {
 
  height: 200px;
  
  margin: 5px;
}
.box {
  display: inline-block;
  vertical-align: top;
  width: 85px;
  height: 85px;
  background: #446C74;
  margin: 5px;
}
.content {
    padding-left:10px;
  display: inline-block;
  vertical-align: top;
}
.title, .sub-title {
  margin: 0;
  padding: 3px 10px 3px 0;
}
.title {
  font-size: 17px;
  font-weight: bold;
}
.sub-title {
  font-weight: bold;
  color: #3F3F3F;
}
.img {
  width: 100px;
  height: 35px;
  border: 3px solid #EBEAAE;
}
  
</style> -->