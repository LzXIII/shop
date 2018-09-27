<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;

class CrudController extends Controller
{
  public function decrement($id)
  {
      $cart = Cart::where('id',$id)->decrement('quantity');
      if (Cart::where('id',$id)->value('quantity')==0)
      {
        $cart=Cart::where('id',$id)->delete();
      }
      return back();
  }

  public function increment($id)
  {
      $cart=Cart::where('id',$id)->increment('quantity');
      return back();
  }

  public function destroy($id)
  {
      Cart::where('id',$id)->delete();
      return back();
  }
}
