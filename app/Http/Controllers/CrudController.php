<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CrudController extends Controller
{
  public function decrement($id)
  {
      DB::table('cart')->where('id',$id)->decrement('quant');
      return redirect('home');
  }

  public function increment($id)
  {
      DB::table('cart')->where('id',$id)->increment('quant');
      return redirect('home');
  }

  public function destroy($id)
  {
      DB::table('cart')->where('id',$id)->delete();
      return redirect()->route('home')
                      ->with('success','Article deleted successfully');
  }
}
