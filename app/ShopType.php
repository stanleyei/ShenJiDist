<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopType extends Model
{
    protected $table = 'shop_type';
    protected $fillable = ['name'];

    public function shops()
    {
        return $this->hasMany('App\Shop', 'type_id', 'id');
    }
}
