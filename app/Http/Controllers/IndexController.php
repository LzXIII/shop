<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\User;
use App\Cart;

class IndexController extends Controller
{
  function shop()
  {
    $product = Product::paginate(4);
    return view ('index',['product'=>$product]);
  }

  function insertproduct(Request $request)
  {
    $price=$request->input('price');
    $product=$request->input('product');
    $sql= Cart::where('product',$product)->count();
    if ($sql!=0)
    {
    $qt= Cart::where('product',$product)->increment('quant');
    }
    else {
      $cart = Cart::insert([
        'product'=>$product,
        'price'=>$price,
        'quant'=>1
    ]);
    }
    $products = Product::paginate(10);
    return view ('index',['products'=>$products]);
  }
}
