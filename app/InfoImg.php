<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoImg extends Model
{
    protected $table = 'info_img';
    protected $fillable = ['info_id', 'name', 'content', 'img'];

    public function info()
    {
        return $this->hasOne('App\Info', 'id', 'info_id');
    }
}
