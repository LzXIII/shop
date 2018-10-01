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

  function insertcart(Request $request)
  {
    $price=$request->input('price');
    $name=$request->input('name');
    $id=$request->input('id');
    $image=$request->input('image');
    $product_id=$request->input('product_id');
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
        'image'=>$image,
        'product_id'=>$product_id
    ]);
  }
    return redirect ('/');
  }

  function insertproduct(Request $request)
  {
    $validatedData = $request->validate([
        'name' => 'required',
        'price' => 'required|numeric|between:0,99.149,99',
        'image' => 'required|image',
    ]);
    $data=$request->all();
    $imageName = time().'.'.$request->image->getClientOriginalExtension();
    $request->image->move(public_path('img'), $imageName);
    Product::insert(['name'=>$data['name'],'price'=>$data['price'],'image'=>$imageName,'sold'=>0]);
    $request->session()->flash('success', 'Prodotto inserito correttamente!');
    return view ('insertproduct');
  }

  function controlpage()
  {
    $product = Product::paginate(4);
    return view ('insertproduct', ['product'=>$product]);
  }

  function updateproduct(Request $request)
  {
    dd($request);
    request()->validate([
      'name' => 'required',
      'price' => 'required|numeric|between:0,99.149,99',
      'image' => 'required|image',
    ]);
    if($request->input['name']="")
    {
      $request->input['name']=Product::find($id)->value('name');
    }
      Product::find($id)->update($request->all());
      return view ('insertproduct');
  }

}
