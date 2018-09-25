<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Cart;

class CrudController extends Controller
{
  public function decrement($id)
  {
      $cart = Cart::where('name',$name)->increment('quantity');
      return redirect('cartpage');
  }

  public function increment($id)
  {
      $cart = Cart::where('name',$name)->increment('quantity');
      return redirect('cartpage');
  }

  public function destroy($id)
  {
      DB::table('cart')->where('id',$id)->delete();
      return redirect()->route('cartpage')
                      ->with('success','Article deleted successfully');
  }
}
