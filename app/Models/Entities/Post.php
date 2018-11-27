<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo('App\User', 'author_id');
    }

    public function postLink()
    {
        return $this->hasOne('App\Models\Entities\PostLink');
    }

    public function postImages()
    {
        return $this->hasMany('App\Models\Entities\PostImage');
    }

    public function postVideo()
    {
        return $this->hasOne('App\Models\Entities\PostVideo');
    }
}
