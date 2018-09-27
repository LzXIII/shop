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
      return view ('cartpage',['cart'=>$cart,'sum'=>$tot,'shipping'=>0,'shipping_type'=>""]);
    }

    function checkout(Request $request)
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
      // $shipping=$request->input('shipping');
      $shipping=4;
      $shipping_type=$request->input('shipping_type');
      return view ('checkout',['cart'=>$cart,'sum'=>$tot,'shipping'=>$shipping,'shipping_type'=>$shipping_type]);
    }

    function buy()
    {
      $id=Auth::User()->id;
      Cart::where('user_id',$id)->delete();
      return redirect('/');
    }
}
