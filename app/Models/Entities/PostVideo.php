<?php

namespace App\Models\Entities;

use Illuminate\Database\Eloquent\Model;

class PostVideo extends Model
{
    public $timestamps = false;

    protected $table = 'posts_videos';

    public function post()
    {
        return $this->belongsTo('App\Models\Entities\Post');
    }
}
