<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InfoTypes extends Model
{
    protected $table = 'info_types';
    protected $fillable = ['name'];

    public function infos()
    {
        return $this->hasMany('App\Info', 'type_id', 'id');
    }
}
