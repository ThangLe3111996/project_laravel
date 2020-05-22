<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    protected $table = "Products";

    public function Categories() {
        return $this->belongsTo('App\Categories','categories_id','id');
    }

    public function OrderProducts() {
        return $this->hasMany('App\OrderProducts','products_id','id');
    }
}
