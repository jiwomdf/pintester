<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MsPhoto extends Model
{
    //
    protected $table = 'MsPhotos';
    protected $fillable = [
        'id', 'title', 'caption','image','price','category',
    ];

    public function User()
    {
        return $this->belongsTo(User::id);
    }
}
