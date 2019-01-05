<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsTransaction extends Model
{
    //
    protected $table = 'MsTransaction';
    protected $fillable = [
        'id', 'Date', 'photo_id','user_id',
    ];

    public function MsTransaction1()
    {
        return $this->belongsToMany('App\User');
    }

    public function MsTransaction2()
    {
        return $this->belongsToMany('App\MsPhoto');
    }
}
