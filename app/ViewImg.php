<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ViewImg extends Model
{
    protected $table = 'view_img';
    protected $fillable = ['view_id', 'img'];

    public function view()
    {
        return $this->hasOne('App\View', 'id', 'view_id');
    }
}
