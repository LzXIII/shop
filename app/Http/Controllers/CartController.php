<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\User;
use App\Cart;

class CartController extends Controller
{

    function cartpage()
    {
      $cart = Cart::pluck('id');
      $tot=0;
      foreach ($r as $id)
      {
      $m= Cart::find($id)->sum('quant');
      $sum= Cart::find($id)->sum('price');
      $tot=$sum*$m+$tot;
      }
      return view ('cart',['cart'=>$cart,'sum'=>$tot]);
    }

    function buy(Request $request)
    {
      $input=$request->all();
      User::insert(['name'=>$input['name'],'surname'=>$input['surname'],'email'=>$input['email']]);
      Cart::update(['flag'=>1]);
      return redirect('shop');
    }
}
