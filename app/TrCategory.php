<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TrCategory extends Model
{
    //
    protected $table = 'TrCategory';
    protected $fillable = [
        'id', 'Date', 'photo_id','user_id',
    ];

    public function TrCategory1()
    {
        return $this->belongsToMany('App\User');
    }

    public function TrCategory2()
    {
        return $this->belongsToMany('App\Category');
    }
}
