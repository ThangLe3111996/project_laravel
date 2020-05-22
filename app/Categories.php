<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    protected $table = "Categories";

    public function Products() {
        return $this->hasMany('App\Product','categories_id','id');
    }
}
