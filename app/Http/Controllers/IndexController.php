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
    $product = Product::paginate(8);
    return view ('index',['product'=>$product]);
  }

  function insertcart(Request $request)
  {
    $price=$request->input('price');
    $name=$request->input('name');
    $id=$request->input('id');
    $image=$request->input('image');
    $result=Cart::where('user_id',$id)->where('name',$name)->first();
    if ($result)
    {
    $cart = Cart::where('user_id',$id)->where('name',$name)->increment('quantity');
    }else {
      $cart = Cart::insert([
        'name'=>$name,
        'price'=>$price,
        'quantity'=>1,
        'user_id'=>$id,
        'image'=>$image
    ]);
  }
    return redirect ('/');
  }

  function insertproduct(Request $request)
  {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|between:0,99.99,99',
        'image' => 'required|image',
    ]);
    $data=$request->all();
    $imageName = time().'.'.$request->image->getClientOriginalExtension();
    $request->image->move(public_path('img'), $imageName);
    Product::insert(['name'=>$data['name'],'price'=>$data['price'],'image'=>$imageName]);
    $request->session()->flash('success', 'Prodotto inserito correttamente!');
    return view ('insertproduct');
  }

}
