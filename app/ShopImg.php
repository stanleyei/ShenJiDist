<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ShopImg extends Model
{
    protected $table = 'shop_img';
    protected $fillable = ['shop_id', 'img', 'content'];

    public function shop()
    {
        return $this->hasOne('App\Shop', 'id', 'shop_id');
    }
}
