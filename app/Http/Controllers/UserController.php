<?php

namespace App\Http\Controllers;
use App\Models\StarredItem;
use App\Models\Product;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchbar(){
        
        //items is the item taken from html form
        $items= request('item_name');
        //$products=Items::where('name', $items)->get();
        // $products will have list of returned items by parser
        //curl to the products search api here
        $ch = curl_init();
        $search = array('key' => $items);
        $abc = json_encode($search, JSON_FORCE_OBJECT);
        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5001/");
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $abc);


        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        $server_output = curl_exec($ch);
    
        curl_close ($ch);
    
        
    
    

        

        $output = json_decode(json_decode($server_output, true),true);
        //clearing db for new search results
        Product::truncate();
        foreach($output as $key => $value){
            $p_db = new Product;
            //taking all info from the json file the api returned
            //enter correct json info here
            if($value){
                $p_db->name = $value['Product Name'];
                $p_db->link = $value['URL'];
                $p_db->rating = $value['Ratings'];
                $p_db->review = $value['Reviews'];
                $p_db->price = $value['Price'];
                $p_db->image = $value['Image'];
                $user=auth()->user();
                $uid = $user -> id;
                $p_db->user_id = $uid;

            //save to db
                $p_db->save();
            }
        }
        $user=auth()->user();
        $uid = $user -> id;
        $db_products = Product::where('user_id', $uid)->get();

        //new object of the products model
        // $p_db = new Product;

        //taking all info from the json file the api returned
        //enter correct json info here
        // $p_db->name = $products['name'];
        // $p_db->link = $products['name'];
        // $p_db->rating = $products['name'];
        // $p_db->review = $products['name'];
        // $p_db->price = $products['name'];
        // $user=auth()->user();
        // $uid = $user -> id;
        // $p_db->user_id = $uid;

        //save to db
       // $p_db->save();

        //returns json of products to the searchpage
        //return view('searchpage', ['products'=>$products]);
        return view('searchpage',  ['products'=>$db_products]);
    }

    public function productinfo($id){
 
        $fproduct= Product::where('id', $id)->get();

        //$sellerinfo=User::where('id', $product['sellerid'])->get();;
        //$product = Items::where('id', $id)->get();
        //$product_name = $name;
        return view('product', ['product'=>$fproduct]);

    }

    public function starreditems(){
        $user=auth()->user();
        $uid = $user -> id;
        $sproducts = StarredItem::where('user_id', $uid)->get();
        echo $sproducts;
        return view('starred', ['sproducts'=>$sproducts]);
    }

    public function addtostarred($pid){
        $user=auth()->user();
        $uid = $user -> id;
        echo "hello";

        //creating new object of starred items model
        $s_db = new StarredItem;

        //adding all info in object
        $selected_product = Product::where('id', $pid)->get();
        foreach($selected_product as $selected_product)
        {
        $s_db->name = $selected_product->name;
        $s_db->link = $selected_product['link'];
        $s_db->rating = $selected_product['rating'];
        $s_db->review = $selected_product['review'];
        $s_db->price = $selected_product['price'];
        $s_db->image = $selected_product['image'];
        $s_db->user_id = $uid;
        }

        //save in db

        $s_db->save();

        app('App\Http\Controllers\UserController')->starreditems();

    }
}
