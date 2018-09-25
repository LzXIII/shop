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
    $name=$request->input('name');
    $id=$request->input('id');
    $result=Cart::where(['name',$name],['user_id',$id])->get()->isEmpty();
    if ($result)
    {
    Cart::where('name',$name)->increment('quantity');
    }
    else {
      $cart = Cart::insert([
        'name'=>$name,
        'price'=>$price,
        'quantity'=>1,
        'user_id'=>$id
    ]);
    }
    return redirect ('/');
  }
}
