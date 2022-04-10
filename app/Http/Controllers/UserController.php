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
        curl_setopt($ch, CURLOPT_URL,"http://127.0.0.1:5000/".$items);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);


        $server_output = curl_exec($ch);

        curl_close($ch);
        echo $server_output;
        
        $output = json_decode(json_decode($server_output, true),true);

        


        //clearing db for new search results
        Product::truncate();

        //new object of the products model
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
                //$p_db->image = $value['Image'];
                
                $user=auth()->user();
                $uid = $user -> id;
                $p_db->user_id = $uid;
    
            //save to db
                $p_db->save();
            }
        }
       
        

        //returns json of products to the searchpage
        return view('searchpage', ['products'=>$server_output]);
    }
    public function productinfo($id){
 
        $product= Product::find($id);
        //$sellerinfo=User::where('id', $product['sellerid'])->get();;
        //$product = Items::where('id', $id)->get();
        //$product_name = $name;
        return view('product', ['product'=>$product]);

    }

    public function starreditems(){
        $user=auth()->user();
        $uid = $user -> id;
        $sproducts = StarredItem::where('user_id', $uid)->get();
        return view('starred', ['sproducts'=>$sproducts]);
    }

    public function addtostarred($id){
        $user=auth()->user();
        $uid = $user -> id;

        //creating new object of starred items model
        $s_db = new StarredItem;

        //adding all info in object
        $selected_product = Product::where('id', $id)->get();
        $s_db->name = $selected_product['name'];
        $s_db->link = $selected_product['link'];
        $s_db->rating = $selected_product['rating'];
        $s_db->review = $selected_product['review'];
        $s_db->price = $selected_product['price'];
        $s_db->image = $selected_product['image'];
        $s_db->user_id = $uid;

        //save in db

        $p_db->save();

        return view('starred');

    }
}
