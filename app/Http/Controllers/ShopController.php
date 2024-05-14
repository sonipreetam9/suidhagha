<?php

namespace App\Http\Controllers;

use App\Models\ProductModel;
use Illuminate\Http\Request;

class ShopController extends Controller
{
   public function shop_page(){
    $products=ProductModel::all();
       return view('shop',compact('products'));
   }
}
