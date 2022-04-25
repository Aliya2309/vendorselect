<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<x-app-layout>
  

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                
<!-- 
                <h4 class="font-semibold">SEARCH PRODUCT: </h4>
                <form class="search-container" action="searchpage" method="post">
    <input type="text" id="item_name" placeholder="Eg. iPhone">
    <a href="#"><img class="search-icon" src="http://www.endlessicons.com/wp-content/uploads/2012/12/search-icon.png"></a>
  </form> -->
                <form class="form" action="searchpage" method="post">
                
                    <label > Name <label>
                    <input class="sb" type="text" name="item_name"><br><br>
                    
                    <button class="button" type="submit">Search</button>
                    <br><br>
                <h5 class="starred"><a href = '/starred'> Starred products </a></h5>
                <br><br><br><br><br><br><br><br>

            </div>
        </div>
    </div>
</x-app-layout>

<style>
.form{
  justify-content:center;
  text-align:center;
  align-items:center;
}
.starred{

  font-weight:bold;
  margin-top:30px;
}
  .sb{
    margin-top:30px;
    padding-top:20px;
  
   width:50%;
  }
  .button {
  background-color: #4CAF50; /* Green */
  border: none;
  color: white;
  padding: 15px 32px;
  text-align: center;
  text-decoration: none;
  display: inline-block;
  font-size: 16px;
  
  border-top-left-radius:25px;
border-top-right-radius:25px;
border-bottom-right-radius:25px;
border-bottom-left-radius:25px;
}
 h3{
   margin-top:5rem;
  text-align: center;
 }
p{
  position: relative;
  float: right;
  top: 10px;
  right: 50px;
}
.search-container{
  padding-top:3rem;
  width: 490px;
  display: block;
  margin: 0 auto;
}
input#search-bar{
  margin: 0 auto;
  width: 100%;
  height: 45px;
  padding: 0 20px;
  font-size: 1rem;
  border: 1px solid #D0CFCE;
  outline: none;
  &:focus{
    border: 1px solid #008ABF;
    transition: 0.35s ease;
    color: #008ABF;
    &::-webkit-input-placeholder{
      transition: opacity 0.45s ease; 
  	  opacity: 0;
     }
    &::-moz-placeholder {
      transition: opacity 0.45s ease; 
  	  opacity: 0;
     }
    &:-ms-placeholder {
     transition: opacity 0.45s ease; 
  	 opacity: 0;
     }    
   }
 }
.search-icon{
  position: relative;
  float: right;
  width: 75px;
  height: 75px;
  top: -62px;
  right: -10px;
}
.star-icon{
  position: relative;
  float: right;
  width: 75px;
  height: 75px;
  top: -20px;
  right: 60px;
}
</style>
</body>
</html>

