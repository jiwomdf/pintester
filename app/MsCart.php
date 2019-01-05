<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\MsPhoto;
use App\User;

class MsCart extends Model
{
    //
    protected $table = 'MsCart';
    protected $fillable = [
        'id', 'user_id', 'photo_id',
    ];

    public function MsComment1()
    {
        return $this->belongsToMany('App\User');
    }

    public function MsComment2()
    {
        return $this->belongsToMany('App\MsPhoto');
    }
}
