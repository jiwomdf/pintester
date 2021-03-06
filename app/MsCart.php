<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\Category;
use App\User;

class MsCart extends Model
{
    //
    protected $table = 'MsCart';
    protected $fillable = [
        'id', 'user_id', 'photo_id',
    ];

    public function MsCart()
    {
        return $this->belongsToMany('App\User');
    }

    public function MsCart2()
    {
        return $this->belongsToMany('App\Category');
    }
}
