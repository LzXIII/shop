<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Product;
use App\User;
use App\Cart;
use Auth;

class CartController extends Controller
{

    function cartpage()
    {
      $id=Auth::User()->id;
      $cart = Cart::where('user_id', $id)->pluck('id');
      $tot=0;
      foreach ($cart as $c)
      {
      $q= Cart::where('id',$c)->value('quantity');
      $sum= Cart::where('id',$c)->value('price');
      $tot=$sum*$q+$tot;
      }
      $cart=Cart::where('user_id', $id)->get();
      return view ('cart',['cart'=>$cart,'sum'=>$tot]);
    }

    function checkout()
    {
      return view ('checkout');
    }

    function buy(Request $request)
    {
      $input=$request->all();
      User::insert(['name'=>$input['name'],'surname'=>$input['surname'],'email'=>$input['email']]);
      Cart::update(['flag'=>1]);
      return redirect('shop');
    }
}
