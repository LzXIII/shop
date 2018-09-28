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
      $shipping=$this->calculateShipping($id);
      return view ('cartpage',['cart'=>$cart,'sum'=>$tot,'shipping'=>$shipping]);
    }

    function calculateShipping($id)
    {
      $cart = Cart::where('user_id', $id)->pluck('id');
      $tot=0;
      foreach ($cart as $product)
      {
        $q= Cart::where('id',$product)->value('quantity');
        $sum= Cart::where('id',$product)->value('price');
        $tot=$sum*$q+$tot;
      }
      if($tot>=50)
      {
        return $shipping=0;
      }
      else {
        return $shipping=4.90;
        }
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
      $shipping=$this->calculateShipping($id);
      return view ('checkout',['cart'=>$cart,'sum'=>$tot,'shipping'=>$shipping]);
    }

    function buy()
    {
      $id=Auth::User()->id;
      $product_id=Cart::where('user_id',$id)->pluck('product_id');
      foreach ($product_id as $p)
      {
        Product::where('id',$p)->increment('sold');
      }
      Cart::where('user_id',$id)->delete();
      session()->flash('order', 'Ordine effettuato con successo');
      return redirect('/');
    }
}
