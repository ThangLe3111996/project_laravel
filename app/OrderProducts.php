<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class OrderProducts extends Model
{
    protected $table = "OrderProducts";

    public function Products() {
        return $this->belongsTo('App\Product','products_id','id');
    }

    public function Orders() {
        return $this->belongsTo('App\Product','orders_id','id');
    }
}
