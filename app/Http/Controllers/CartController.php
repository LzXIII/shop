<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\User;

class CartController extends Controller
{
    function shop()
    {
      $products = Product::paginate(10);
      return view ('index',['products'=>$products]);
    }

    function cartpage()
    {
      $cart = DB::table('cart')->paginate(10);
      $r= DB::table('cart')->pluck('id');
      $tot=0;
      foreach ($r as $id)
      {
      $m= DB::table('cart')->where('id',$id)->sum('quant');
      $sum= DB::table('cart')->where('id',$id)->sum('price');
      $tot=$sum*$m+$tot;
      }
      return view ('cart',['cart'=>$cart,'sum'=>$tot]);
    }

    function insertproduct(Request $request)
    {
      $price=$request->input('price');
      $product=$request->input('product');
      $sql= DB::table('cart')->where('product',$product)->count();
      if ($sql!=0)
      {
      $qt= DB::table('cart')->where('product',$product)->increment('quant');
      }
      else {
        $cart = DB::table('cart')->insert([
          'product'=>$product,
          'price'=>$price,
          'quant'=>1
      ]);
      }
      $products = DB::table('products')->paginate(10);
      return view ('index',['products'=>$products]);
    }

    function buy(Request $request)
    {
      $input=$request->all();
      User::insert(['name'=>$input['name'],'surname'=>$input['surname'],'email'=>$input['email']]);
      DB::table('cart')->update(['flag'=>1]);
      return redirect('shop');
    }
}
