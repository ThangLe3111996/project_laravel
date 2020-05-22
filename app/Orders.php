<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Orders extends Model
{
    protected $table = "Orders";

    public function OrderProducts() {
        return $this->hasMany('App\OrderProducts','orders_id','id');
    }
}
