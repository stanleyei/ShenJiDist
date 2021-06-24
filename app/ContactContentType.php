<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ContactContentType extends Model
{
    protected $table = 'contact_content_type';
    protected $fillable = ['type_id', 'name'];

    public function contactType()
    {
        return $this->hasOne('App\ContactType', 'id', 'type_id');
    }
    public function contacts()
    {
        return $this->hasMany('App\Contact', 'content_id', 'id');
    }
}
