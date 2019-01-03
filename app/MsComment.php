<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsComment extends Model
{
    //
    protected $table = 'MsComments';
    protected $fillable = [
        'id', 'user_id', 'photo_id','comment',
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
