<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $table = 'slider';
    protected $fillable = ['name','img','content'];

    // public function productType()
    // {
    //     return $this->hasOne('App\ProductType', 'id', 'type_id');
    // }
    // public function productImgs()
    // {
    //     return $this->hasMany('App\ProductImg', 'product_id', 'id');
    // }
}
