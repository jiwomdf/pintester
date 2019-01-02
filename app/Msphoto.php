<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsPhoto extends Model
{
    //
    protected $table = 'MsPhoto';
    protected $fillable = [
        'id', 'title', 'caption','image','price','category','user_id',
    ];

    public function MsPhoto()
    {
        return $this->belongsToMany('App\User');
    }
}
