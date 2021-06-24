<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Shop extends Model
{
    protected $table = 'shop';
    protected $fillable = ['type_id', 'name', 'url', 'phone', 'content', 'content_second', 'location'];

    public function shopType()
    {
        return $this->hasOne('App\ShopType', 'id', 'type_id');
    }
    public function shopImgs()
    {
        return $this->hasMany('App\ShopImg', 'shop_id', 'id');
    }
}
