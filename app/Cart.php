<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
protected $fillable=['name','price','quantity','image','user_id','product_id'];

    public function user()
    {
      return $this->belongsTo('App\User');
    }
    public function product()
    {
      return $this->belongsTo('App\Product');
    }

}
