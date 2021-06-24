<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactType extends Model
{
    protected $table = 'contact_type';
    protected $fillable = ['name'];

    public function contactContentTypes()
    {
        return $this->hasMany('App\ContactContentType', 'type_id', 'id');
    }
}
