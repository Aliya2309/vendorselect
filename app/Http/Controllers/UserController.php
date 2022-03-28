<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserController extends Controller
{
    public function searchbar(){
        
        //items is the item taken from html form
        $items= request('item_name');
        //$products=Items::where('name', $items)->get();
        // $products will have list of returned items by parser
        return view('searchpage', ['products'=>$products]);
    }

    public function iteminfo($name){


        
        //$product= Items::find($id);
        //$sellerinfo=User::where('id', $product['sellerid'])->get();;
        //$product = Items::where('id', $id)->get();
        $product_name = $name;
        return view('product', ['product_name'=>$product_name]);

    }
}
