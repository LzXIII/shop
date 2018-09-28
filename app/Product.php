<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable=['name','price','image','sold'];

    public function cart()
    {return $this->HasMany('App\Cart');}
}
