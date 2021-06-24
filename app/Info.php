<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Info extends Model
{
    protected $table = 'info';
    protected $fillable = ['type_id', 'name', 'content', 'img', 'date_start', 'date_end', 'location', 'organizer', 'calendar'];

    public function infoType()
    {
        return $this->hasOne('App\InfoTypes', 'id', 'type_id');
    }
    public function infoImgs()
    {
        return $this->hasMany('App\InfoImg', 'info_id', 'id');
    }
}
