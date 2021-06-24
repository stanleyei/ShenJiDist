<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $table = 'contact';
    protected $fillable = ['content_id', 'sender', 'mail', 'content'];

    public function contactContentType()
    {
        return $this->hasOne('App\ContactContentType', 'id', 'content_id');
    }
}
