<?php

namespace App\Http\Middleware;

use Closure;
use Auth;
use App\Cart;

class CheckShipping
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $id=Auth::id();
        if(Cart::where('user_id',$id)->first())
        {
          return $next($request);
        }
        else {
          $request->session()->flash('empty', 'Nessun prodotto nel carrello');
          return redirect('/');
        }
    }
}
